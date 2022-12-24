<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>RESULT</title>
</head>
<body>
    <div>
      <a href = "{{ url('/') }}" >TOP</a>
    </div>
    <h1>今日の勉強時間</h1>
    <div id=today_time>00：00：00</div>
    <h1>今月の勉強時間</h1>
    <div id=month_time>00：00：00</div>
</body>
</html>
<script>
    const today_time = {{$today_time}};
    const month_time = {{$month_time}};
</script>
<script src='/js/result.js'></script>