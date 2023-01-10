<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>STOPWATCH</title>
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
  <div class="main_wrap">
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
          <a href="#" class="brand">ポモドーロ・テクニックタイマー</a>
          <nav class="nav">
            <button class="nav__toggle" aria-expanded="false" type="button">
              menu
            </button>
            <ul class="nav__wrapper">
              <li class="nav__item"><a href = "{{route('register')}}" >新規登録</a></li>
              <li class="nav__item"><a href = "{{route('login')}}" >ログイン</a></li>
            </ul>
          </nav>
        </div>
      </header>
    <div id="container" class="boxA">
      <div class="boxA">
        <div class="box1" id="time">30：00</div>
        <div class="box2"><span id="count">0周</span></div>
      </div>
      <div class="boxB" id="buttons">
        <input class="button1" type="button">
        <input class="button2" id="start" type="button" value="Start">
        <input class="button3" id="stop" type="button" value="Stop">
        <form action="{{route('study.store')}}" method="post">
        @csrf
        <input type="hidden" id="hidden" name="hidden_time" value="0">
        <input class="button4" type="submit" value="Record">
        </form>
        <input class="button5" type="button" class="mute_btn" onClick="mute()" value="Mute"></input>
      </div>
      <div class="container2">
        <a href = "{{route('study.result')}}" class="nav1">学習記録</a>
        <a href = "{{route('study.ranking')}}" class="nav2">モチベ向上</a>
        <a href = "{{route('study.setting')}}" class="nav3">設定</a>
      </div>
    <!--勉強時間-->
    <!--<div id="studyTime">00：00：00</div>-->
    </div>
  </div>
  
  <script type="text/javascript">
    var study_time = {{$user->study_time}};
    var rest_time = {{$user->rest_time}};
    window.addEventListener("load", set_time);
    
    function set_time() {
      min = Math.floor(count / 60);
      sec = count % 60;
      var count_down = document.getElementById("time");
      count_down.innerHTML = ("0"+min).slice(-2) +"：" + ("0"+sec).slice(-2);
      var message = "set time load";
      console.log(message);
    }
  </script>
  <script src='/js/new.js'></script>
  <audio src='/mp3/start.mp3' id = "start_sound"></audio>
  <audio src='/mp3/rest.mp3' id = "rest_sound"></audio>
</body>
</html>