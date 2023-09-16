<x-guest-layout>

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
            <div id="mapid"></div>
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
            <div class="form-group">
                <label for="description">内容</label>
                <textarea name="memo" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">投稿</button>
        </form>
    </div>
</x-guest-layout>
