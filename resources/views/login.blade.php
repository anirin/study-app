<!doctype html>
<html lang = "ja">
<meta charset="utf-8">
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<div class="main_wrap">
<header class="site-header">
        <div class="wrapper site-header__wrapper">
          <a href="#" class="brand">ポモドーロ・テクニックタイマー</a>
          <nav class="nav">
            <button class="nav__toggle" aria-expanded="false" type="button">
              menu
            </button>
            <ul class="nav__wrapper">
            </ul>
          </nav>
        </div>
</header>
<body>
    <div class="register">
        <a href = "{{route('register')}}" >新規登録</a>
    </div>
    <div class="login">
        <a href = "{{route('login')}}" >ログイン</a>
    </div>
    <div class ="top">
        <a href = "{{ url('/index') }}" >TOP</a>
</div>
</body>
</div>
</html>