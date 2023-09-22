<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('posts.create') }}">投稿する</a><br>
    <a href="{{ route('markers') }}">対応状況</a><br>
    <a href="{{ route('emergency') }}">緊急時(電話通報)</a>
</body>
</html>
