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
        <li><a href = "{{route('register')}}" ><span class="header_word">新規登録</span></a></li>
        <li><a href = "{{route('login')}}" ><span class="header_word">ログイン</span></a></li>
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
      <button type="submit" form="record">
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
    <a href="{{route('study.result')}}">
      <img alt="" src="/image/study_record.png">
      <span>学習記録</span>
    </a>
  </div>
  <div class="sub">
    <a href="{{route('study.ranking')}}">
    <img alt="" src="/image/motivate.png">
    <span>モチベ向上</span>
    </a>
  </div>
  <div class="sub">
    <a href="{{route('study.setting')}}">
    <img alt="" src="/image/setting.png">
    <span>設定</span>
    </a>
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
  <script src='/js/new.js'></script>
  <audio src='/mp3/start.mp3' id = "start_sound"></audio>
  <audio src='/mp3/rest.mp3' id = "rest_sound"></audio>
</body>
</html>