<x-app-layout>

    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
        <h2 class="font-bold text-2xl">投稿する</h2>
        {{-- <form method="POST" action="/discoveries" enctype="multipart/form-data"> --}}
        <form method="POST" action="/posts" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="discovery_day">発見日</label>
                <input type="hidden" name="discovery_day" value="{{ $today }}">
                {{ $today }}
            </div>
            <div class="form-group">
                <label for="location">発見場所</label>
            </div>


            <label for="latitude">緯度:</label>
            <input type="text" id="latitude" name="lat"><br>
            <label for="longitude">経度:</label>
            <input type="text" id="longitude" name="lng">

            <div id="mapid" style="height: 400px; width:600px"></div>
            <script>
                var mymap = L.map('mapid').setView([38.9868, 141.1139], 18);

                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, '
                }).addTo(mymap);
                var markers = [];

                var latitudeInput = document.getElementById('latitude');
                var longitudeInput = document.getElementById('longitude');
                //クリックした場所にマーカーを追加
                mymap.on('click', function(e) {
                    latitudeInput.value = e.latlng.lat;
                    longitudeInput.value = e.latlng.lng;

                    //マーカーを作成し､マップに追加
                    var marker = L.marker([latitudeInput.value, longitudeInput.value]).addTo(mymap);
                    markers.push(marker);

                    //マーカーがクリックされたときのイベントハンドラ
                    marker.on('click', function() {
                        mymap.removeLayer(marker); //マーカーを地図から削除
                        markers = markers.filter(function(m) {
                            return m !== marker;
                        }); //配列から削除
                    });

                });
            </script>

            <div class="form-group">
                <label for="photo_1">写真(近景)</label>
                <input type="file" name="photo_1" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="photo_2">写真(遠景)</label>
                <input type="file" name="photo_2" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="type">種類</label>
            </div>
            {{-- <label for="category">カテゴリーを選択:</label> --}}
            <select name="category" id="category">
                <option value="-">-</option>
                <option value="道路">道路</option>
                <option value="災害">災害</option>
                <option value="水道">水道</option>
                <option value="鳥獣">鳥獣</option>
            </select>

            <div class="form-group">
                <label class="block text-gray-700 text-sm mb-2" for="memo">
                    内容
                </label>
                <textarea name="memo" rows="10"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
                    required>{{ old('memo') }}</textarea>
            </div>

            <input type="hidden" name="status">
            <input type="hidden" name="admin_comment">

            <input type="submit" value="登録"
                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>
</x-app-layout>
