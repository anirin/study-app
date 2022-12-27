var timer = today_time;
var h;
var m;
var s;
h = Math.floor(timer / 3600);
m = Math.floor((timer % 3600) / 60);
s = timer % 60;
var timer_show = document.getElementById("today_time");
timer_show.innerHTML =("0"+h).slice(-2)+"：" + ("0"+m).slice(-2) +"：" + ("0"+s).slice(-2);

timer = month_time;
h = Math.floor(timer / 3600);
m = Math.floor((timer % 3600) / 60);
s = timer % 60;
var timer_show = document.getElementById("month_time");
timer_show.innerHTML =("0"+h).slice(-2)+"：" + ("0"+m).slice(-2) +"：" + ("0"+s).slice(-2);