<x-app-layout>
    @if (session('notice'))
        <div class="bg-blue-100 border-1-4 border-blue-500 text-blue-700 p-4 my-2">
            {{ session('notice') }}
        </div>
    @endif
    <div class="bg-green-200">
        <div class="text-center mt-8 pb-9">
            <h1 class="text-3xl font-bold mt-4">Hi-report</h1>
            <img src="{{ asset('images/animal_mogura_kouji2.png') }}" alt="画像の代替テキスト" class="w-64 h-64 mx-auto my-1">
            <div class="flex flex-col items-center justify-center space-y-8 md:space-y-12">
                <a href="{{ route('posts.create') }}"
                    class="w-72 bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-10 rounded-lg text-lg">投稿する</a>
                <a href="{{ route('markers') }}"
                    class="w-72 bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-10 rounded-lg text-lg">対応状況</a>
                <a href="{{ route('emergency') }}"
                    class="w-72 bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-10 rounded-lg text-lg">緊急時(電話通報)</a>
            </div>
        </div>
    </div>
    {{-- <style>
        /* 共通のスタイル */
        .button-link {
            display: inline-block;
            width: 300px; /* 固定幅を指定 */ 
            padding: 10px 20px; /* パディングを調整してボタンのサイズを変更 */
            background-color: #189d6a; /* ボタンの背景色 */
            color: #fff; /* ボタンのテキスト色 */
            text-decoration: none; /* 下線を削除 */
            border: none; /* ボーダーを削除 */
            border-radius: 5px; /* ボタンの角丸 */
            cursor: pointer;
            transition: background-color 0.3s; /* ホバー時のトランジション */
            margin: 5px; /* ボタン間の間隔を調整 */
            font-weight: bold;
        }

        .button-link:hover {
            background-color: #117848; /* ホバー時の背景色 */
        }
        
        /* 緊急ボタンのスタイル */
        .emergency-button {
            background-color: red;
        }
        .emergency-button:hover {
            background-color: #90132c;
        }

        
    </style> --}}

    {{-- <a href="{{ route('posts.create') }}" class="button-link">投稿する</a><br>
    <a href="{{ route('markers') }}" class="button-link">対応状況</a><br>
    <a href="{{ route('emergency') }}" class="button-link emergency-button">緊急時(電話通報)</a> --}}

</x-app-layout>
