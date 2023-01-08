<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>RECORD</title>
</head>
<body>
    <div>
      <a href = "{{ url('/index') }}" >TOP</a>
    </div>
    <h1>勉強記録</h1>
    <p>勉強時間</p>
    <div id="studyTime">00：00：00</div>
    <form action="{{route('study.restore')}}" method="post">
        @csrf
        <input type="hidden" id="hidden" name="hidden_time" value="{{$record->time}}">
        科目
        <div>
            <select name="subject_id">
                @foreach($subjects as $id => $subject)
                    <option value="{{ $id }}">{{ $subject }}</option>
                @endforeach
            </select>    
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