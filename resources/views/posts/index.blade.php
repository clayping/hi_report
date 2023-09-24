<x-app-layout>
    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
        <x-flash-message :message="session('notice')" />
        {{-- <ul>
            @foreach ($posts as $post)
                <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li>
            @endforeach
        </ul> --}}
        <div class="pb-8">
            <a href="/markers"
                onclick="window.open('/markers', '', 'width=950,height=700,scrollbars=yes'); return false;">
                ▶一覧掲載地図
            </a>
        </div>
        <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($posts as $post)
                {{-- <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal"> --}}
                <article class="w-full px-4 text-xl text-gray-800 leading-normal">
                    <div class="py-1">
                        <a href="{{ route('posts.show', $post) }}">

                            <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                                <span
                                    class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}</span>
                                {{ $post->created_at }}
                            </p>
                            <div class="flex items-center pb-8">
                                {{-- <h3
                                class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words"> --}}
                                <h3 class="font-bold font-sans break-normal text-gray-900 pb-1 break-words px-2">
                                    登録No. {{ $post->id }}</h3>
                                <h3 class="px-2">種別:{{ $post->category }}</h3>
                                {{-- <h3>{{ $post->discovery_day }}</h3> --}}
                                {{-- <h3 class="px-2">{{ $post->status }}</h3> --}}
                                <p class="text-gray-700 text-base">{{ Str::limit($post->memo, 80) }}</p>

                            </div>

                        </a>
                    </div>

                </article>
            @endforeach
        </div>
        <h2 class="text-red-200">確認中</h2>

        <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($posts2 as $post)
                {{-- <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal"> --}}
                <article class="w-full px-4 text-xl text-gray-800 leading-normal">
                    <div class="py-1">
                        <a href="{{ route('posts.show', $post) }}">

                            <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                                <span
                                    class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}</span>
                                {{ $post->created_at }}
                            </p>
                            <div class="flex items-center pb-8">
                                {{-- <h3
                                class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words"> --}}
                                <h3 class="font-bold font-sans break-normal text-gray-900 pb-1 break-words px-2">
                                    登録No. {{ $post->id }}</h3>
                                <h3 class="px-2">種別:{{ $post->category }}</h3>
                                {{-- <h3>{{ $post->discovery_day }}</h3> --}}
                                {{-- <h3 class="px-2">{{ $post->status }}</h3> --}}
                                <p class="text-gray-700 text-base">{{ Str::limit($post->memo, 80) }}</p>

                            </div>

                        </a>
                    </div>

                </article>
            @endforeach
        </div>

        <h2 class="text-blue-100">対応中</h2>
        <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($posts3 as $post)
                {{-- <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal"> --}}
                <article class="w-full px-4 text-xl text-gray-800 leading-normal">
                    <div class="py-1">
                        <a href="{{ route('posts.show', $post) }}">

                            <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                                <span
                                    class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}</span>
                                {{ $post->created_at }}
                            </p>
                            <div class="flex items-center pb-8">
                                {{-- <h3
                                class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words"> --}}
                                <h3 class="font-bold font-sans break-normal text-gray-900 pb-1 break-words px-2">
                                    登録No. {{ $post->id }}</h3>
                                <h3 class="px-2">種別:{{ $post->category }}</h3>
                                {{-- <h3>{{ $post->discovery_day }}</h3> --}}
                                {{-- <h3 class="px-2">{{ $post->status }}</h3> --}}
                                <p class="text-gray-700 text-base">{{ Str::limit($post->memo, 80) }}</p>

                            </div>

                        </a>
                    </div>

                </article>
            @endforeach
        </div>
        {{-- <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($posts2 as $post)
                <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal">
                    <a href="{{ route('posts.show', $post) }}">
                        <h2
                            class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">
                            登録No. {{ $post->id }}</h2>
                        <h3>{{ $post->category }}</h3> --}}
                        {{-- <h3>{{ $post->discovery_day }}</h3> --}}
                        {{-- <h3>{{ $post->status }}</h3>
                        <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                            <span
                                class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}</span>
                            {{ $post->created_at }}
                        </p> --}}
                        {{-- <img class="w-full mb-2" src="{{ $post->image_url }}" alt="">
                        <img class="w-full mb-2" src="{{ $post->image2_url }}" alt=""> --}}

                        {{-- <p class="text-gray-700 text-base">{{ Str::limit($post->memo, 50) }}</p>
                    </a>
                </article>
            @endforeach
        </div> --}}

        {{-- <div class="flex flex-wrap -mx-1 lg:-mx-4 mb-4">
            @foreach ($posts3 as $post)
                <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal">
                    <a href="{{ route('posts.show', $post) }}">
                        <h2
                            class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">
                            登録No. {{ $post->id }}</h2>
                        <h3>{{ $post->category }}</h3> --}}
                        {{-- <h3>{{ $post->discovery_day }}</h3> --}}
                        {{-- <h3>{{ $post->status }}</h3>
                        <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                            <span
                                class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}</span>
                            {{ $post->created_at }}
                        </p> --}}
                        {{-- <img class="w-full mb-2" src="{{ $post->image_url }}" alt="">
                        <img class="w-full mb-2" src="{{ $post->image2_url }}" alt=""> --}}
{{-- 
                        <p class="text-gray-700 text-base">{{ Str::limit($post->memo, 50) }}</p> --}}
                    {{-- </a>
                </article>
            @endforeach
        </div> --}}

        {{-- {{ $posts->links() }} ページネーション関連 --}}
    </div>
</x-app-layout>
