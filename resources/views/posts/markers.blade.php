<x-app-layout>

    <h2 class="text-center text-lg font-bold pt-6 tracking-widest">対応状況一覧マップ</h2>

    {{-- 地図挿入 --}}
    <div id="mapid" style="height: 500px; width: 700px items-center"></div>

    <style>
        .popup-image {
            width: 200px; /* 画像の幅を調整 */
            height: 150px; /* 高さを指定 */
            object-fit: cover; /* 画像のアスペクト比を維持したまま、指定の高さ・幅に収める */
            margin-right: 10px; /* 写真間の隙間を設定 */
        }
        .leaflet-popup-pane {
            width: 500px;
        }
    </style>

    <script>
        var mymap = L.map('mapid').setView([38.9871, 141.1141], 13);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, '
        }).addTo(mymap);
        
        @foreach ($posts as $post)
            @if($post->status)
                var popupContent = '<div style="font-size: 16px;">登録No.{{ $post->id }}   {{ $post->status }}</div><br><div class="flex flex-row"><a href="{{ Storage::url('images/posts/' . $post->photo_1) }}" data-lightbox="group"><img src="{{ Storage::url('images/posts/' . $post->photo_1) }}" alt="Photo 1" class="popup-image" ></a><a href="{{ Storage::url('images/posts/' . $post->photo_2) }}" data-lightbox="group"><img src="{{ Storage::url('images/posts/' . $post->photo_2) }}" alt="Photo 2" class="popup-image"></a></div>';
                var marker = L.marker([{{ $post->lat }}, {{ $post->lng }}]).addTo(mymap)
                    .bindPopup(popupContent, { maxWidth: 500 });  //ポップアップの最大幅を設定
            @endif
        @endforeach
        
    </script>
    </div>



</x-app-layout>
