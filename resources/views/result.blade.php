<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>STUDYRECORD</title>
    <link href="/css/reset.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="/css/result.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="main_wrap">
  
    <header>
        <div class="logo">
          <span>ポモドーロ・テクニック<br>TIMER</span>
        </div>
        <nav>
          <ul>
            <li><a href = "{{url('/index')}}" ><span class="header_word">TOP</span></a></li>
          </ul>
        </nav>
    </header>
    <!--header finish-->

    <div class = "record_wrap">
        <div class= "ranking">
        <span>利用者勉強時間</span>
        @foreach($records as $record)
        <span>{{$record->rank}}位</span>
        @endforeach
        </div>
        <div class="today_study">
            <span>今日の勉強時間</span>
            <span id="today_time">00：00：00</span>
        </div>
        <div class="month_study">
            <span>今月の勉強時間</span>
            <span id="month_time">00：00：00</span>
        </div>
    </div>
    <!--record_warp end-->
    
</div>
<!--main_wrap end-->
</body>
</html>

<script>
    const today_time = {{$today_time}};
    const month_time = {{$month_time}};
</script>
<script src='/js/result.js'></script>