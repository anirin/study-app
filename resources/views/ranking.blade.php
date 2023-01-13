<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>RANKING & POST</title>
    <link href="/css/reset.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="/css/ranking.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="main_wrap">
    <div>
      <a href = "{{ url('/index') }}" >TOP</a>
    </div>
    <div>
    ランキング
    @foreach($records as $record)
    <tr>
        <td>{{$record->rank}}</td>
    </tr>
    @endforeach
    </div>
    コメント一覧
    @foreach($comments as $comment)
    <tr>
        <td>{{$comment->comment}}</td>
    </tr>
    @endforeach
    投稿場所
    <div class="form">
        <form action={{route('study.ranking')}} method="POST">
            @csrf
            <div class="input-form">
                <textarea name="comment"></textarea>
            </div>
            <div class="input-form">
                <input type="submit" value="submit">
            </div>
        </form>
    </div>
</div>
</body>
</html>