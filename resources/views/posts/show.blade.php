<x-app-layout>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-8 py-4 bg-white shadow-md">

        @if (session('notice'))
            <div class="bg-blue-100 border-blue-500 text-blue-700 border-l-4 p-4 my-2">
                {{ session('notice') }}
            </div>
        @endif

        <x-validation-errors :errors="$errors" />
        <article class="mb-2">
            <h3 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">登録No. {{ $post->id }}</h3>

            <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                <span class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->discovery_day ? 'NEW' : '' }}</span>
                {{ $post->discovery_day }}
            </p>

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


            <img src="{{ $post->image_url }}" alt="" class="mb-4">
            <img src="{{ $post->image2_url }}" alt="" class="mb-4">
            <h3>投稿者メモ</h3>
            <p class="text-gray-700 text-base">{!! nl2br(e($post->memo)) !!}</p>

            <h3>管理者コメント</h3>
            <p class="text-gray-700 text-base">{!! nl2br(e($post->admin_comment)) !!}</p>

            <h3>ステータス</h3>
            <p>{{ $post->status }}</p>


        </article>

        <div class="flex flex-row text-center my-4">
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">更新</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){return false};" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                </form>
            @endcan
        </div>
    </div>
</x-app-layout>
