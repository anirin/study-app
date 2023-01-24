var start = document.getElementById('start');
var stop = document.getElementById("stop");
var reset = document.getElementById("reset");

var count   = 1800;
var min     = 0;      
var sec     = 0;
var i = 0;      
var start_f = false;
var timer_f = false;
var interval;
var interval_studyTime;
var timer = 0;
var mute_flag = 0;

start.addEventListener('click',count_start, false);
start.addEventListener('click',timer_start, false);
stop.addEventListener("click",count_stop, false);
stop.addEventListener("click",timer_stop, false);
reset.addEventListener("click",count_all_reset,false);


function count_start(){
    if (start_f === false) {
        interval = setInterval(count_down,1000);
        
        start_f = true;
    }
}

function timer_start(){
    if (timer_f === false) {
        interval_studyTime = setInterval(count_up,1000);
        timer_f = true;
    }
}

function count_up(){
    timer++;
}

function timer_stop(){
    clearInterval(interval_studyTime);
    var h;
    var m;
    var s;
    h = Math.floor(timer / 3600);
    m = Math.floor((timer % 3600) / 60);
    s = timer % 60;
    var timer_show = document.getElementById("studyTime");
    timer_show.innerHTML =("0"+h).slice(-2)+":" + ("0"+m).slice(-2) +":" + ("0"+s).slice(-2);
    timer_f = false;
    document.getElementById("hidden").value = String(timer);
    var message = "timer stop ";
    console.log(message);
}

function count_down(){
    if(count === 1){
        i++;
        var count_repeat = document.getElementById("count");
        count_repeat.innerHTML = i + "周";
        count_reset();
        count_start();
    }else {
        count--;
        if(count == 300){
            document.getElementById("rest_sound").play();
        }
        min = Math.floor(count / 60);
        sec = count % 60;
        var count_down = document.getElementById("time");
        count_down.innerHTML = ("0"+min).slice(-2) +":" + ("0"+sec).slice(-2);
    }
}

function count_stop(){
    clearInterval(interval);
    start_f = false;
}

function count_reset(){
    clearInterval(interval);
    count = 1800;
    start_f = false;
    min = Math.floor(count / 60);
    sec = count % 60;
    var count_down = document.getElementById("time");
    count_down.innerHTML = ("0"+min).slice(-2) +":" + ("0"+sec).slice(-2);
    document.getElementById("start_sound").play();
 }
 
 function count_all_reset(){
    clearInterval(interval);
    count = 1800;
    start_f = false;
    min = Math.floor(count / 60);
    sec = count % 60;
    var count_down = document.getElementById("time");
    count_down.innerHTML = ("0"+min).slice(-2) +":" + ("0"+sec).slice(-2);
    timer = 0;
    i = 0;
    document.getElementById("hidden").value = String(timer);
    var count_repeat = document.getElementById("count");
    count_repeat.innerHTML = i + "周";
 }
 
 function mute() {
    if (document.getElementById('rest_sound').muted) {
        document.getElementById('rest_sound').muted = false;
    } else {
        document.getElementById('rest_sound').muted = true;
    }
    
    if (document.getElementById('start_sound').muted) {
        document.getElementById('start_sound').muted = false;
    } else {
        document.getElementById('start_sound').muted = true;
    }
    
    if(mute_flag == 0){
　　    document.getElementById('mute_btn').src = "/image/mute.png";
　　    mute_flag = 1;
　  }else{
　　    document.getElementById('mute_btn').src = "/image/volume.png";
　　    mute_flag = 0;
　  }
}