<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>STOPWATCH</title>
</head>
<body>
  <h1>タイマー</h1>
  <div id="container">
    時間
    <div id="time">25：00</div>
    周回
    <div id="count">0</div>
    <div id="buttons">
      <input id="start" type="button" value="start">
      <input id="stop" type="button" value="stop">
    </div>
    勉強時間
    <div id="studyTime">00：00：00</div>
  </div>  
  <script src='/js/new.js'></script>
  <audio src='/mp3/start.mp3' id = "start_sound"></audio>
  <audio src='/mp3/rest.mp3' id = "rest_sound"></audio>
</body>
</html>