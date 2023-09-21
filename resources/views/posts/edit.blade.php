<x-app-layout>
    <div class="container lg:w-4/5 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">登録情報編集</h2>

        <x-validation-errors :errors="$errors" />

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data"
            class="rounded pt-3 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="title">
                    登録No.{{ $post->id }}
                </label>

                <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                    <span class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->discovery_day ? 'NEW' : '' }}</span>
                    {{ $post->discovery_day }}
                </p>
            </div>

            {{-- 地図挿入 --}}
            <div id="mapid" style="height: 400px; width: 600px"></div>
            <script>
                var mymap = L.map('mapid').setView([{{ $post->lat }}, {{ $post->lng }}], 17);
                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, '
                }).addTo(mymap);

                var marker = L.marker([{{ $post->lat }}, {{ $post->lng }}]).addTo(mymap);
                
            </script>

            <br>
            <br>

            <div class="flex">
            <img src="{{ $post->image_url }}" alt="" class="mb-4 px-4" width="400">
            <img src="{{ $post->image2_url }}" alt="" class="mb-4 px-4" width="400">
            </div>

            <div class="text-xl">
            <h3>【投稿者メモ】</h3>
            <p class="text-gray-700 text-lg">{!! nl2br(e($post->memo)) !!}</p>
            </div>
            <br>
            <div class="mb-4">
                <label class="block text-gray-700 text-lg mb-2" for="body">
                    管理者コメント
                </label>
                <textarea name="admin_comment" rows="5"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
                    placeholder="対応状況など">{{ old('admin_comment', $post->admin_comment) }}</textarea>
            </div>

        
            <div>
                <p>対応ステータス<br>
                    <input type="radio" name="status" value="確認中" {{ $post->status === "確認中" ? 'checked' : '' }}> 確認中
                    <input type="radio" name="status" value="対応中" {{ $post->status === "対応中" ? 'checked' : '' }}> 対応中
                    <input type="radio" name="status" value="対応完了" {{ $post->status === "対応完了" ? 'checked' : '' }}> 対応完了
                </p>
            </div>


            <div class="flex flex-row text-center my-4">
                <input type="submit" value="更新"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline w-20 mr-2">
                <a href="/posts">
                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-30">一覧に戻る</button>
                </a>
            </div>
        </form>

    </div>
</x-app-layout>
