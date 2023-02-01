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
  <div class="timer">
    <span class="work" id="work">作業時間（休憩5分）</span>
    <span class="time" id="time">25:00</span>
  </div>
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
      
<div class="sub_contents_wrap">
  <div class="sub">
    <button id="record_btn" type="submit" form="record" disabled>
        <form id="record" action="{{route('study.store')}}" method="post">
          @csrf
          <input type="hidden" id="hidden" name="hidden_time" value="0">
          <img src="/image/record.png">
          <span>作業記録</span>
        </form>
      </button>
  </div>
  <div class="sub">
    <a href="{{route('get-calendar')}}">
    <img alt="" src="/image/calendar.png">
    <span>カレンダー</span>
    </a>
  </div>
  <div class="sub">
    <a href="{{route('study.setting')}}">
    <img alt="" src="/image/setting.png">
    <span>時間設定</span>
    </a>
  </div>
</div>

<div class = "record_wrap">
  <div class= "ranking">
  <span>利用者勉強順位</span>
  @if(!empty($records))
    @foreach($records as $record)
    <span>{{$record->rank}}/
    @endforeach
    @foreach($all_users as $all)
    {{$all->count}}位</span>
    @endforeach
  @endif
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
  var count_down = document.getElementById("time");
  window.addEventListener("load", set_all());
  
  function get_hms(all_time) {
  var h;
  var m;
  var s;
  h = Math.floor(all_time / 3600);
  m = Math.floor((all_time % 3600) / 60);
  s = all_time % 60;
  
  return [h, m, s];
  }

  function set_hms(all_time, id) {
      var [h, m, s] = get_hms(all_time);
      id.innerHTML =("0"+m).slice(-2) +":" + ("0"+s).slice(-2);
  }
  
  function set_all() {
    set_hms(study_time, count_down);
    
    var[h, m, s] = get_hms(rest_time);
    if(rest_time < 60) {
        work.innerHTML = "作業時間" + "（休憩"  + s + "秒）";
    } else if(all_time % 60 != 0) {
        work.innerHTML = "作業時間" + "（休憩" + m + "分" + s + "秒)";
    } else {
        work.innerHTML = "作業時間" + "（休憩" + m + "分）";
    }
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