const time = document.getElementById('time'); 
const startButton = document.getElementById('start');
const stopButton = document.getElementById('stop');
//表示したい要素の宣言＋HTMLからの値取得

let startTime;
let stopTime = 0;
let timeoutID;

function displayTime() {
    const currentTime = new Date(Date.now() - startTime + stopTime);
    const m = String(0 - currentTime.getMinutes()).padStart(2, '0');
    const s = String(15 - currentTime.getSeconds()).padStart(2, '0'); 
    time.textContent =  `${m}:${s}`;
    /*if(s = 10) {
        document.getElementById("rest_sound").play();
    }
    if(s <= 0) {
        clearTimeout(TimeoutID);
    }*/
    timeoutID = setTimeout(displayTime, 1000);
}

startButton.addEventListener('click', function() {
    startButton.disabled = true;
    stopButton.disabled = false;
    startTime = Date.now();
    displayTime();
});

stopButton.addEventListener('click', function() {
    startButton.disabled = false;
    stopButton.disabled = true;
    clearTimeout(timeoutID);
    stopTime += (Date.now() - startTime);
  });