<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// メール機能のための追加
use Illuminate\Support\Facades\Mail;
use App\Mail\PostCreated;


use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function top()
    {
        $posts = Post::all();
        return view('posts.top', ['posts' => $posts]);
    }

    public function emergency()
    {
        $posts = Post::all();
        return view('posts.emergency', ['posts' => $posts]);
    }

    public function index()
    {
    // $posts = Post::where(function ($query){
    //         $query->where('status', '!=', '対応完了')
    //                 ->orWhereNull('status');
    // })
    //             ->with('user')
    //             ->latest()
    //             ->paginate(4);

    // $posts = Post::where(function ($query){
            // $query->where('status', '!=', '対応完了')
            //         ->orWhereNull('status');
    // })
    $posts = Post::whereNull('status')
                    ->with('user')
                    ->latest()
                    ->get();


    $posts2 = Post::where('status', '確認中')->with('user')
                                        ->latest()
                    ->get();
    $posts3 = Post::where('status', '対応中')->with('user')
                        ->latest()
                    ->get();

        return view('posts.index', compact('posts', 'posts2', 'posts3'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = date('Y-m-d H:i:s');
        return view('posts.create', ['today' => $today]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $post = new Post();
        $post->discovery_day = $request->discovery_day;
        $post->lat = $request->lat;
        $post->lng = $request->lng;
        $post->category = $request->category;
        $post->memo = $request->memo;
        $post->status = $request->status;
        $post->admin_comment = $request->admin_comment;

        $file1 = $request->file('photo_1');
        $post->photo_1 = date('YmdHis') . '_' . $file1->getClientOriginalName();

        $file2 = $request->file('photo_2');
        $post->photo_2 = date('YmdHis') . '_' . $file2->getClientOriginalName();

        $to = [
            [
                'email' => 'mailtestmugi@gmail.com',
                'name' => '斎藤宏太朗',
            ]
        ];

        Mail::to($to)->send(new PostCreated($post));

        // // トランザクション開始
        DB::beginTransaction();
        try {
            // 登録
            $post->save();

            // 画像アップロード
            if (!Storage::putFileAs('images/posts', $file1, $post->photo_1)) {
                // 例外を投げてロールバックさせる
                throw new \Exception('画像ファイルの保存に失敗しました。');
            }
            if (!Storage::putFileAs('images/posts', $file2, $post->photo_2)) {
                throw new \Exception('画像ファイルの保存に失敗しました。');
            }

            // トランザクション終了(成功)
            DB::commit();
        } catch (\Exception $e) {
            // トランザクション終了(失敗)
            DB::rollback();
            return back()->withInput()->withErrors($e->getMessage());
        }
        return redirect()
            ->route('top', $post)
        ->with('notice', '投稿完了しました');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::find($id);

        // if ($request->user()->cannot('update', $post)) {
        //     return redirect()->route('posts.show', $post)
        //         ->withErrors('自分の記事以外は更新できません');
        // }

        $file = $request->file('image');
        if ($file) {
            $delete_file_path = $post->image_path;
            $post->image = self::createFileName($file);
        }
        $post->fill($request->all());

        // トランザクション開始
        DB::beginTransaction();
        try {
            // 更新
            $post->save();

            if ($file) {
                // 画像アップロード
                if (!Storage::putFileAs('images/posts', $file, $post->image)) {
                    // 例外を投げてロールバックさせる
                    throw new \Exception('画像ファイルの保存に失敗しました。');
                }

                // 画像削除
                if (!Storage::delete($delete_file_path)) {
                    //アップロードした画像を削除する
                    Storage::delete($post->image_path);
                    //例外を投げてロールバックさせる
                    throw new \Exception('画像ファイルの削除に失敗しました。');
                }
            }

            // トランザクション終了(成功)
            DB::commit();
        } catch (\Exception $e) {
            // トランザクション終了(失敗)
            DB::rollback();
            return back()->withInput()->withErrors($e->getMessage());
        }

        return redirect()->route('posts.show', $post)
            ->with('notice', '登録情報を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        // トランザクション開始
        DB::beginTransaction();
        try {
            $post->delete();

            // 画像削除
            if (!Storage::delete($post->image_path)) {
                // 例外を投げてロールバックさせる
                throw new \Exception('画像ファイルの削除に失敗しました。');
            }

            // トランザクション終了(成功)
            DB::commit();
        } catch (\Exception $e) {
            // トランザクション終了(失敗)
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }

        return redirect()->route('posts.index')
            ->with('notice', '記事を削除しました');
    }

    private static function createFileName($file)
    {
        return date('YmdHis') . '_' . $file->getClientOriginalName();
    }


    public function markers()
    {
        $posts = Post::all();

        return view('posts.markers', ['posts' => $posts]);
    }
}
