<x-app-layout>
    @if (session('notice'))
        <div class="bg-blue-100 border-1-4 border-blue-500 text-blue-700 p-4 my-2">
            {{ session('notice') }}
        </div>
    @endif
    <div class="text-center mt-8 pb-9 bg-white bg-opacity-90">
        <h1 class="text-3xl font-bold mt-4">Hi-report</h1>
        <div class="w-2/3 mx-auto my-4 p-4">
        </div>
        <div class="flex flex-col items-center justify-center space-y-4 md:space-y-8">
            <div class="my-4"></div>
            <a href="{{ route('posts.create') }}"
                class="w-72 bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-10 rounded-lg text-lg">投稿する</a>
            <a href="{{ route('markers') }}"
                class="w-72 bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-10 rounded-lg text-lg">対応状況</a>
            <a href="{{ route('emergency') }}"
                class="w-72 bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-10 rounded-lg text-lg">緊急時(電話通報)</a>
        </div>
    </div>
    </div>
</x-app-layout>
