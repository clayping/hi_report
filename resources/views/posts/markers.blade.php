<x-app-layout>


    {{-- 地図挿入 --}}
    <div id="mapid" style="height: 500px; width: 700px"></div>
    <script>
        var mymap = L.map('mapid').setView([{{ $post->lat }}, {{ $post->lng }}], 17);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, '
        }).addTo(mymap);
        
        @foreach ($posts as $post)
            var marker = L.marker([{{ $post->lat }}, {{ $post->lng }}]).addTo(mymap);
        @endforeach
        
    </script>
    </div>



</x-app-layout>
