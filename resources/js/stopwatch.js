const time = document.getElementById('time'); 
const startButton = document.getElementById('start');
const stopButton = document.getElementById('stop');
//表示したい要素の宣言＋HTMLからの値取得

let startTime;
let stopTime = 0;
let timeoutID;
//なぜletなのか？

function displaytime() {
    const currentTime = new Date(Date.now() - startTime + stopTime);
    const h = String(currentTime.getHours()).padStart(2, '0');
    const m = String(currentTime.getMinutes()).padStart(2, '0');

    time.textContent = '${h}:${m}';
}

startButton.addEventListener('click', function() {
    startButton.disabled = true;
    stopButton.disabled = false;
    resetButton.disabled = true;
    startTime = Date.now();
    displayTime();
});

stopButton.addEventListener('click', function() {
    startButton.disabled = false;
    stopButton.disabled = true;
    resetButton.disabled = false;
    clearTimeout(timeoutID);
    stopTime += (Date.now() - startTime);
  });

  resetButton.addEventListener('click', function() {
    startButton.disabled = false;
    stopButton.disabled = true;
    resetButton.disabled = true;
    time.textContent = '00:00:00.000';
    stopTime = 0;
  });
