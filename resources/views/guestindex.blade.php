<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>STOPWATCH</title>
    <link href="/css/reset.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="/css/guestindex.css">
    
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
      <button id="mute" onClick="mute()">
        <img class="mute_btn" id="mute_btn" src="/image/volume.png">
        <span>音量</span>
      </button>
    </li>
  </ul>
</div>
<!--bottons finish-->


</div>
<!--end main wrap-->

  <script src='/js/guestnew.js'></script>
  <audio src='/mp3/start.mp3' id = "start_sound"></audio>
  <audio src='/mp3/rest.mp3' id = "rest_sound"></audio>
</body>
</html>