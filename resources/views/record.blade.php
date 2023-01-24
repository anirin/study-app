<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>RECORD</title>
    <link href="/css/reset.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="/css/record.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="main_wrap">   
    <header>
        <div class="logo">
          <a href="{{ url('/index') }}"><span>ポモドーロ・テクニック<br>TIMER</span></a>
        </div>
    </header>
    <div class="record_wrap">
        <form id="restore" action="{{route('study.restore')}}" method="post">
            <div class="content">
                <span>作業時間</span>
                <span id="studyTime">00：00：00</span>
            </div>
            @csrf
            <input type="hidden" id="hidden" name="hidden_time" value="{{$record->time}}">
            <input type="hidden" id="calendar_time" name="calendar_time">
            <div class="content">
                <span>内容</span>
                <select name="subject_id">
                    @foreach($subjects as $id => $subject)
                        <option value="{{ $id }}">{{ $subject }}</option>
                    @endforeach
                </select>    
            </div>
            <div class="content">
                <span>コメント</span>
                <input type="text" name="comment" value="コメント必須">
            </div>
        </form>
    </div>
    <div class="button_wrap">
        <button type="submit" form="restore">
            <span>記録</span>
        </button>
    </div>
    
</div>
</body>
</html>
<script>
    const record = {{$record->time}};
</script>
<script src='/js/record.js'></script>