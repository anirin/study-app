<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>RANKING & POST</title>
</head>
<body>
    <div>
      <a href = "{{ url('/') }}" >TOP</a>
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
</body>
</html>