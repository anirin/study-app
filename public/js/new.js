var start = document.getElementById('start');
var stop = document.getElementById("stop");
var reset = document.getElementById("reset");
var count_time = document.getElementById("time");
var work = document.getElementById("work");
var count_repeat = document.getElementById("count");

var count   = study_time + rest_time;
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
reset.addEventListener("click",count_all_reset, false);

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

function timer_stop(){
    clearInterval(interval_studyTime);
    var[h, m, s] = get_hms(timer);
    var timer_show = document.getElementById("studyTime");
    timer_show.innerHTML =("0"+h).slice(-2)+":" + ("0"+m).slice(-2) +":" + ("0"+s).slice(-2);
    timer_f = false;
    document.getElementById("hidden").value = String(timer);
    document.getElementById('record_btn').disabled = false;
}

function count_down(){
    if(count === 1){
        i++;
        count_repeat.innerHTML = i + "周";
        count_reset();
        count_start();
    }else {
        count--;
        if(count == rest_time){
            document.getElementById("rest_sound").play();
        }
        var s_count = count - rest_time;
        if(s_count > 0) {
            set_hms(s_count, count_time);
            work.innerHTML = "作業終了まで";
            console.log(h, m, s);
        } else {
            set_hms(count, count_time);
            work.innerHTML = "休憩終了まで";
        }
    }
}

function count_stop(){
    clearInterval(interval);
    start_f = false;
}

// タイマーが一巡した場合のリセット
function count_reset(){
    clearInterval(interval);
    count = study_time + rest_time;
    start_f = false;
    set_hms(count - rest_time, count_time);
    document.getElementById("start_sound").play();
    work.innerHTML = "作業終了まで";
 }
 
//  リセットボタン押された場合のリセット
 function count_all_reset(){
    clearInterval(interval);
    count = study_time + rest_time;
    start_f = false;
    set_hms(count - rest_time, count_time);
    timer = 0;
    i = 0;
    count_repeat.innerHTML = i + "周";
    document.getElementById("hidden").value = String(timer);
    var[h, m, s] = get_hms(rest_time);
    if(rest_time >= 60) {
        work.innerHTML = "作業時間" + "（休憩" + m + "分）";
    } else {
        work.innerHTML = "作業時間" + "（休憩" + s + "秒）";
    }
 }
 
//  音のon off
 function mute() {
    var rest_id = document.getElementById('rest_sound');
    var start_id = document.getElementById('start_sound');
    var mute_id = document.getElementById('mute_btn');
    if (rest_id.muted = false) {
        rest_id.muted = false;
        console.log("not mute");
    } else {
        rest_id.muted = true;
        console.log("mute");
    }
    if (start_id.muted = false) {
        start_id.muted = false;
    } else {
        start_id.muted = true;
    }
    if(mute_flag == 0){
　　    mute_id.src = "/image/mute.png";
　　    mute_flag = 1;
　  }else{
　　    mute_id.src = "/image/volume.png";
　　    mute_flag = 0;
　  }
}