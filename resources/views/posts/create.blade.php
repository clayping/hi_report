<x-app-layout>

    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
        <h2 class="font-bold text-2xl">投稿する</h2>
        <form method="POST" action="/discoveries" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="discovery_date">発見日</label>
                {{ $today }}
            </div>
            <div class="form-group">
                <label for="location">発見場所</label>
            </div>
            <div id="mapid" style="height: 400px; width:600px"></div>
            <script>
                var mymap = L.map('mapid').setView([38.9868, 141.1139], 18);

                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, '
                }).addTo(mymap);
                var markers = [];
                //クリックした場所にマーカーを追加
                mymap.on('click', function(e) {
                    var marker = L.marker(e.latlng).addTo(mymap);
                    markers.push(marker);

                    marker.on('click', function() {
                        mymap.removeLayer(marker); // マーカーを地図から削除
                        markers = markers.filter(function(m) {
                            return m !== marker;
                        }); // 配列から削除
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
            <form method="post" action="process.php">
                {{-- <label for="category">カテゴリーを選択:</label> --}}
                <select name="category" id="category">
                    <option value="option1">-</option>
                    <option value="option2">道路</option>
                    <option value="option3">災害</option>
                    <option value="option4">水道</option>
                    <option value="option5">鳥獣</option>
                </select>
            </form>
            <div class="form-group">
                <label for="description">内容</label>
                <textarea name="memo" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">投稿</button>
        </form>
    </div>
</x-app-layout>
