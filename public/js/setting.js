function set(){
var study_min = document.getElementById('study_min');
var study_sec = document.getElementById('study_sec');
var study_time = document.getElementById('study_time');
var a = study_min.value;
var b = study_sec.value;
var rest_min = document.getElementById('rest_min');
var rest_sec = document.getElementById('rest_sec');
var rest_time = document.getElementById('rest_time');
var c = rest_min.value;
var d = rest_sec.value;

study_time.value = Number(a) * 60 + Number(b);
rest_time.value = Number(c) * 60 + Number(d);

console.log(study_time.value);
console.log(rest_time.value);
}