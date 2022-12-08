<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>STOPWATCH</title>
</head>
<body>
  <h1>Stopwatch</h1>
  <div id="container">
    <div id="time">00:00:00.000</div>
    <div id="buttons">
      <input id="start" type="button" value="start">
      <input id="stop" type="button" value="stop">
      <input id="reset" type="button" value="reset">
    </div>
  </div>  
  <script src="{{ asset('/js/stopwatch.js') }}"></script>
</body>
</html>