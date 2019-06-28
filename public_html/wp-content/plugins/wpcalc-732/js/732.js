function loan()
{
var f1 = document.form.x1.value;
var f2 = document.form.x2.value;
var f3 = document.form.x3.value;
var f4 = document.form.x4.value;

if (f3==1 && f4==1){
var f5 = 150;}
else if (f3==2 && f4==1){
var f5 = 120;}
else if (f3==3 && f4==1){
var f5 = 190;}
else if (f3==1 && f4==2){
var f5 = 80;}
else if (f3==2 && f4==2){
var f5 = 60;}
else if (f3==2 && f4==3){
var f5 = 100;}

var p = f5*f1/100*f2/100/1000;
var r = Math.round(p*10)/10;

if(f1=='' || f2=='')
{
var print = 'Поля заполнены неправильно. Пожалуйста, заполните все поля верно';
}
else 
{
var print = 'Необходимая мощность кабеля не менее <strong>'+r+'м<sup>2</sup></strong>, то есть  <strong>'+f5+' Вт/м<sup>2</strong>';
}


document.getElementById("result").innerHTML=print;    	

}