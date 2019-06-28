var elem=document.forms.form.elements;
function calcelectro(){
    var znach;
	
	if (elem.power.value=="") {
	znach = (+elem.voltag.value)*(+elem.tok.value)*(+elem.cosinus.value)
	  if (elem.faz[0].checked) {elem.power.value=Math.round(10000*znach)/10000} else {elem.power.value=Math.round(10000*Math.pow(3, 0.5) * (+znach))/10000}
	}
	if (elem.tok.value=="") {
	znach = (+elem.power.value)/((+elem.voltag.value)*(+elem.cosinus.value))
	  if (elem.faz[0].checked) {elem.tok.value=Math.round(10000*znach)/10000} else {elem.tok.value=Math.round(10000*(+znach)/Math.pow(3, 0.5))/10000}
	}
		
	var form = document.form;
	
    var a = form.resistunits.selectedIndex; //материал
	var resistunitsvalue = form.resistunits.options[a].value;
	
	var s = form.area.selectedIndex; //сечение
	var areavalue = form.area.options[s].value;
	
	var Precision=6;
	var l = form.length.value; //длина
	var p = form.power.value; //мощность
	var j = form.tok.value //ток
	var u = form.voltag.value; //напряжение
	var f = form.cosinus.value; //косинус
	var t = form.t.value; //температура
	var q = (p * Math.pow((1 - Math.pow(f, 2)), 0.5)) / f; //реактивная мощность
	var x = "";
	var sm = "";
	var sa = "";
	{
	if (areavalue == 0.034400) x = 0.000133, sm = 11, sa = 6; //акт. сопр., реакт. сопр., макс. ток медь/алюминий
	if (areavalue == 0.025800) x = 0.000123, sm = 15, sa = 9;
	if (areavalue == 0.017200) x = 0.000114, sm = 18, sa = 11;
	if (areavalue == 0.011467) x = 0.000107, sm = 23, sa = 14;
	if (areavalue == 0.006880) x = 0.000099, sm = 40, sa = 24;
	if (areavalue == 0.004300) x = 0.000098, sm = 50, sa = 32;
	if (areavalue == 0.002867) x = 0.000093, sm = 65, sa = 39;
	if (areavalue == 0.001720) x = 0.000087, sm = 90, sa = 60;
	if (areavalue == 0.001075) x = 0.000082, sm = 120, sa = 75;
	if (areavalue == 0.000688) x = 0.000081, sm = 160, sa = 105;
	if (areavalue == 0.000491) x = 0.000078, sm = 190, sa = 130;
	if (areavalue == 0.000344) x = 0.000077, sm = 235, sa = 165;
	if (areavalue == 0.000246) x = 0.000075, sm = 290, sa = 210;
	if (areavalue == 0.000181) x = 0.000074, sm = 330, sa = 255;
	if (areavalue == 0.000143) x = 0.000072, sm = 385, sa = 295;
	}
	var tks = "";
	{
	if (resistunitsvalue == 1) tks = 0.00428;
	if (resistunitsvalue == 1.58) tks = 0.0038;
	}
	var rl = areavalue * l * resistunitsvalue * (1 + (tks * (t - 20))); //акт. сопр. провода
	var rq = x * l; //реакт. сопр. провода
		
	if ((f > 1) || (isNaN(f)))
  {
    alert('Коэффициент мощности не может быть больше 1.');
    return(0);
  }
  
  if ((Math.pow(u, 2) / (2 * rl)) < p)
  {
    alert('Максимальная мощность в данном случае, с учётом сопротивления кабеля не может превышать ' + (Math.round(Math.pow(u, 2) / (2 * rl))) + ' Вт.');
    return(0);
  }

var k = "";
if (document.form.faz[1].checked==true) {
		k = "1" }
    else {
		k = "2" }
    
var result = k*(((p * rl) + (q * rq)) /u);
var result_1 = result / (u / 100);
var t = u / rl;
var ukl = u - result;

form.result.value = result.toPrecision(Precision);
form.result_1.value = result_1.toPrecision(Precision);
form.rl.value = rl.toPrecision(Precision);
form.kvar.value = q.toPrecision(Precision);
form.ukl.value = ukl.toPrecision(Precision);
return true;
}

function usPower(){
	if (elem.parRas[0].checked==true) {
		elem.tok.value=""; elem.tok.disabled=1; elem.power.disabled=0
	} 
	else {
		elem.power.value=""; elem.power.disabled=1; elem.tok.disabled=0
	}
}

function insvoltag()
{
	usPower()
	if (document.form.faz[1].checked==true)
		document.form.voltag.value = "380" 
    else
		document.form.voltag.value = "220"; 
}	