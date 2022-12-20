var message;
message = "record.js has read";
console.log(message);
var timer = 0;  

timer = record;

var h;
var m;
var s;
h = Math.floor(timer / 3600);
m = Math.floor((timer % 3600) / 60);
s = timer % 60;
var timer_show = document.getElementById("studyTime");
timer_show.innerHTML =("0"+h)+"：" + ("0"+m) +"：" + ("0"+s).slice(-2);
var message;
message = "record.js has done";
console.log(message);