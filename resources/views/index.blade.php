<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>STOPWATCH</title>
</head>
<body>
  <div>
      <a href = "{{route('register')}}" >登録</a>
  </div>
  <div>
      <a href = "{{route('login')}}" >ログイン</a>
  </div>
  <h1>タイマー</h1>
  <div id="container">
    時間
    <div id="time">30：00</div>
    周回
    <div id="count">0</div>
    <div id="buttons">
      <input id="start" type="button" value="start">
      <input id="stop" type="button" value="stop">
    </div>
    勉強時間
    <div id="studyTime">00：00：00</div>
    <form action="{{route('study.store')}}" method="post">
      @csrf
      <input type="hidden" id="hidden" name="hidden_time" value="0">
      <input type="submit" value="送信">
    </form>
    <div>
      <a href = "{{route('study.result')}}" >学習記録</a>
    </div>
    <div>
      <a href = "{{route('study.ranking')}}" >モチベ向上</a>
    </div>
    <div>
      <a href = "{{route('study.setting')}}" >設定</a>
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