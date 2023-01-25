<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
      <link rel="stylesheet" href="/css/index.css">
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
            <li><a href = "{{route('study.index')}}" ><span class="header_word">TOP</span></a></li>
          </ul>
        </nav>
    </header>
    <!--header finish-->
    <div id='calendar'></div>
</div>
</body>
</html>