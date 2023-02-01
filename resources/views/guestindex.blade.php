<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>STOPWATCH</title>
    <link href="/css/reset.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="/css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="main_wrap">
  
<header class="guest_header">
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
  <div class="timer">
    <span class="work" id="work">作業時間（休憩5分）</span>
    <span class="time" id="time">25:00</span>
  </div>
  <div class="counter"><span id="count">0周</span></div>
</div>
<!--timer finish-->

<div class="guest_button_wrap">
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

<!--<button type="submit" class="btn twitter-btn">-->
<!--    <a href="login/twitter"><i class="fab fa-twitter"></i> Twitter Login</a>-->
<!--</button>-->

</div>
<!--end main wrap-->

  <script src='/js/guestnew.js'></script>
  <audio src='/mp3/start.mp3' id = "start_sound"></audio>
  <audio src='/mp3/rest.mp3' id = "rest_sound"></audio>
</body>
</html>