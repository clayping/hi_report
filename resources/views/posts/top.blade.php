<x-app-layout>
    @if (session('notice'))
        <div class="bg-blue-100 border-blue-500 text-blue-700 border-l-4 p-4 my-2">
            {{ session('notice') }}
        </div>
    @endif
    <a href="{{ route('posts.create') }}">投稿する</a><br>
    <a href="{{ route('markers') }}">対応状況</a><br>
    <a href="{{ route('emergency') }}">緊急時(電話通報)</a>

</x-app-layout>
