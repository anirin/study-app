<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>SETTING</title>
    <link href="/css/reset.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="/css/setting.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="main_wrap">
<header>
    <div class="logo">
      <a href="{{ url('/index') }}"><span>ポモドーロ・テクニック<br>TIMER</span></a>
    </div>
    <nav>
        <ul>
            <li><a href = "{{url('/index')}}" ><span class="header_word">TOP</span></a></li>
        </ul>
    </nav>
</header>
    <div class="setting">
        <form action="{{ route('study.setting') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="set_wrap">
                <span>勉強時間</span>
                <input type="number" id="study_min" value="25">
                <span>分</span>
                <input type="number" id="study_sec" value="0">
                <span>秒</span>
                <input type="hidden" id="study_time" name="study_time" value="{{$setting->study_time}}">
            </div>
            <div class="set_wrap">
                <span>休憩時間</span>
                <input type="number" id="rest_min" value="5">
                <span>分</span>
                <input type="number" id="rest_sec" value="0">
                <span>秒</span>
                <input type="hidden" id="rest_time" name="rest_time" value="{{$setting->rest_time}}">
            </div>
            <div class="set_wrap">
                <button type="submit" onClick=set()>
                    <span>設定</span>
                </button>
            </div>
        </form>
    </div>
</div>
    <script src='/js/setting.js'></script>
</body>
</html>