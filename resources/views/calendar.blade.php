<!DOCTYPE html>
<html>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="/css/index.css">
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