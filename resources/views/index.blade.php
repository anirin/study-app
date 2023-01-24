<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>STOPWATCH</title>
    <link href="/css/reset.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="/css/index.css">
    
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
        <li><a href = "{{route('study.logout')}}" ><span class="header_word">ログアウト</span></a></li>
      </ul>
    </nav>
</header>
<!--header finish-->

<div id="timer_wrap" class="timer_wrap">
        <div class="timer" id="time">30:00</div>
        <div class="counter"><span id="count">0周</span></div>
</div>
<!--timer finish-->

<div class="button_wrap">
  <ul>
    <li class="button">
      <button id="reset" type="submit">
        <img src="/image/reset.png">
        <span>リセット</span>
      </button>
    </li>
    <li class="button">
      <button id="start" type="submit">
        <img src="/image/start.png">
        <span>スタート</span>
      </button>
    </li>
    <li class="button">
      <button id="stop" type="submit">
        <img src="/image/stop.png">
        <span>ストップ</span>
      </button>
    </li>
    <li class="button">
      <button id="record_btn" type="submit" form="record" disabled>
        <form id="record" action="{{route('study.store')}}" method="post">
          @csrf
          <input type="hidden" id="hidden" name="hidden_time" value="0">
          <img src="/image/record.png">
          <span>記録</span>
        </form>
      </button>
    </li>
    <li class="button">
      <button id="mute" onClick="mute()">
        <img class="mute_btn" id="mute_btn" src="/image/volume.png">
        <span>音量</span>
      </button>
    </li>
  </ul>
</div>
<!--bottons finish-->
      
<div class="sub_contents_wrap">
  <div class="sub">
    <a href="{{route('get-calendar')}}">
    <img alt="" src="/image/calendar.png">
    <span>カレンダー</span>
    </a>
  </div>
  <div class="sub">
    <a href="{{route('study.setting')}}">
    <img alt="" src="/image/setting.png">
    <span>設定</span>
    </a>
  </div>
</div>

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

<!--勉強時間-->
<div id="studyTime" hidden></div>

</div>
<!--end main wrap-->

  <script type="text/javascript">
    var study_time = {{$user->study_time}};
    var rest_time = {{$user->rest_time}};
    window.addEventListener("load", set_time);
    
    function set_time() {
      min = Math.floor(count / 60);
      sec = count % 60;
      var count_down = document.getElementById("time");
      count_down.innerHTML = ("0"+min).slice(-2) +":" + ("0"+sec).slice(-2);
      var message = "set time load";
      console.log(message);
    }
  </script>
  <script>
    const today_time = {{$today_time}};
    const month_time = {{$month_time}};
  </script>
  <script src='/js/result.js'></script>
  <script src='/js/new.js'></script>
  <audio src='/mp3/start.mp3' id = "start_sound"></audio>
  <audio src='/mp3/rest.mp3' id = "rest_sound"></audio>
</body>
</html>