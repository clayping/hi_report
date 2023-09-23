<x-app-layout>

    <div class="container lg:w-4/5 md:w-4/5 w-11/12 max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3 bg-whi">
        <h2 class="font-bold text-2xl mb-4">投稿する</h2>

        <form method="POST" action="/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="discovery_day" class="block text-gray-700">発見日</label>
                <input type="hidden" name="discovery_day" value="{{ $today }}">
                {{ $today }}
            </div>
            {{-- 発見場所 --}}
            <div class="mb-4">
                <label for="location" class="block text-gray-700">発見場所</label>
            </div>
            {{-- 緯度経度非表示 --}}
            <input type="hidden" id="latitude" name="lat">
            <input type="hidden" id="longitude" name="lng">

            <div id="mapid" style="height: 400px; width:600px"></div>
            <script>
                var mymap = L.map('mapid').setView([38.9868, 141.1139], 18);
                var marker = null; //マーカーを格納する変数

                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, '
                }).addTo(mymap);
                // var markers = [];

                //クリックした場所にマーカーを追加
                mymap.on('click', function(e) {
                    //既存のマーカーがあれば削除
                    if (marker) {
                        mymap.removeLayer(marker);
                    }

                    //マーカーを作成し､マップに追加
                    marker = L.marker(e.latlng).addTo(mymap);

                    //緯度と経度の入力フィールドを更新
                    document.getElementById('latitude').value = e.latlng.lat;
                    document.getElementById('longitude').value = e.latlng.lng;

                });
            </script>

            <div class="mb-4">
                <label for="photo_1" class="block text-gray-700">写真(近景)</label>
                <input type="file" name="photo_1" class="form-control-file">
            </div>

            <div class="mb-4">
                <label for="photo_2" class="block text-gray-700">写真(遠景)</label>
                <input type="file" name="photo_2" class="form-control-file">
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700">種類</label>
                <select name="category" id="category" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            {{-- <label for="category">カテゴリーを選択:</label> --}}
                <option value="-">-</option>
                <option value="道路">道路</option>
                <option value="災害">災害</option>
                <option value="水道">水道</option>
                <option value="鳥獣">鳥獣</option>
            </select>

            <div class="mb-4">
                {{-- <label class="block text-gray-700 text-sm mb-2" for="memo"> --}}
                <label for="memo" class="block text-gray-700">内容</label>
                <textarea name="memo" rows="10" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('memo') }}</textarea>
            </div>

            <input type="hidden" name="status">
            <input type="hidden" name="admin_comment">

            <!-- 登録ボタン -->
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">投稿する</button>
            {{-- <input type="submit" value="登録"
                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"> --}}
        </form>
    </div>
</x-app-layout>
