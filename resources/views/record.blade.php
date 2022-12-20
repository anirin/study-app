<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>RECORD</title>
</head>
<body>
    <h1>勉強記録</h1>
    <p>勉強時間</p>
    <div id="studyTime">00：00：00</div>
    <form action="{{route('study.restore')}}" method="post">
        @csrf
        <input type="hidden" id="hidden" name="hidden_time" value="{{$record->time}}">
        科目
        <div>
            <input type="text" name="subject">
        </div>
        コメント
        <div>
            <input type="text" name="comment">
        </div>
        <div>
            <input type="submit" value="記録">
        </div>
    </form>
</body>
</html>
<script>
    const record = {{$record->time}};
</script>
<script src='/js/record.js'></script>