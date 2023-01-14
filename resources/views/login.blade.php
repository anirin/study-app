<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>LOGIN</title>
    <link href="/css/reset.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="/css/login.css">
    
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&display=swap" rel="stylesheet">
    
</head>
<div class="main_wrap">
    
<header>
    <div class="logo">
      <span>ポモドーロ・テクニック<br>TIMER</span>
    </div>
</header>


<body>
    <div class="contents_wrap">
        
        <div class="link">
        <a href = "{{route('register')}}" >
            <img alt="" src="/image/register.png">
            <span>新規登録<span>
        </a>
        </div>
        <div class="link">
        <a href = "{{route('login')}}" >
            <img alt="" src="/image/login.png">
            <span>ログイン</span>
        </a>
        </div>
        <div class="link">
        <a href = "{{ url('/index') }}" >
            <img alt="" src="/image/timer.png">
            <span>TOP</span>
        </a>
        </div>
    </div>
</body>
</div>
</html>