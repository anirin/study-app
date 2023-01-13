<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Atsuki">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="classification" content="entertainment,miscellaneous">
<meta name="content-language" content="ja">
<meta name="description" content="ポモドーロ・テクニックタイマー">
<meta name="rating" content="general">
<meta name="robots" content="index,follow">
<link rel="stylesheet" href="/css/newindex.css">
	
<!-- font set -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	
<title>STOPWATCH</title>
</head>
	
<body>
<div class="main_wrap">
	
  <header>
    <div class="logo"><a href="#"><span>ポモドーロ・テクニック</span><br>
      TIMER</a></div>
    <nav>
      <ul>
        <li><a href = "{{route('register')}}" >新規登録</a></li>
        <li><a href = "{{route('login')}}" >ログイン</a></li>
      </ul>
    </nav>
  </header>
	
  <div class="time_wrap">
    <div class="time_box">
      <div id="time" class="timer">30:00</div>
      <div id="count" class="timeround">0<span>周</span></div>
    </div>
    <div id="buttons" class="timer_button_box">
      <ul class="timer_button">
        <li><span class="material-symbols-outlined">play_circle</span>
          <input id="start" type="button" value="Start">
        </li>
        <li><span class="material-symbols-outlined">stop_circle</span>
          <input id="stop" type="button" value="Stop">
        </li>
        <li>
			<span class="material-symbols-outlined">album</span>
          <form action="{{route('study.store')}}" method="post">
            <input type="hidden" id="hidden" name="hidden_time" value="0">
            <input type="submit" value="Record">
          </form>
        </li>
        <li><span class="material-symbols-outlined">pause_circle</span>
          <input type="button" class="mute_btn" onClick="mute()" value="Mute">
        </li>
      </ul>
    </div>
  </div>
  <!-- end .time_wrap-->
  
  <div class="sub_contents">
    <div class="sub_box"> <a href = "{{route('study.result')}}" class="nav1"> <span class="material-symbols-outlined">fact_check</span> 学習記録</a> </div>
    <div class="sub_box"> <a href = "{{route('study.ranking')}}" class="nav2"> <span class="material-symbols-outlined">sentiment_very_satisfied</span> モチベ向上</a> </div>
    <div class="sub_box"> <a href = "{{route('study.setting')}}" class="nav3"> <span class="material-symbols-outlined">settings</span> 設定</a> </div>
  </div>
  <!-- end .sub_contents--> 
  <!--勉強時間--> 
  <!--<div id="studyTime">00：00：00</div>--> 
  
</div>
<!-- end .main_wrap--> 

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