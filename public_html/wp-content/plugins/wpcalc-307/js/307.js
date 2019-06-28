function calcgrounding(){
    var form = document.form;	
var a = form.verh.selectedIndex;
    var verhunitsvalue = form.verh.options[a].value; // верхний слой грунта
var b = form.k_verh.selectedIndex;
    var k_verhunitsvalue = form.k_verh.options[b].value; // климат. коэфф. для вертикальных заземл.
var c = form.nign.selectedIndex;
    var nignunitsvalue = form.nign.options[c].value;// нижний слой
var d = "";
{
if (k_verhunitsvalue == 1.9) d= 5.75;
if (k_verhunitsvalue == 1.7) d= 4;  
if (k_verhunitsvalue == 1.45) d= 2.25;
if (k_verhunitsvalue == 1.3) d= 1.75;
}
var e = form.vert.selectedIndex;
    var vertunitsvalue = form.vert.options[e].value; // коэфф. использования для верт. заземлителей

var e1 = "";
{
if (vertunitsvalue == 1) e1= 1;
if (vertunitsvalue == 1.68) e1= 2;  
if (vertunitsvalue == 2.28) e1= 3;
if (vertunitsvalue == 2.84) e1= 4;
if (vertunitsvalue == 3.35) e1= 5;
if (vertunitsvalue == 3.9) e1= 6;  
if (vertunitsvalue == 4.41) e1= 7;
if (vertunitsvalue == 4.88) e1= 8;
if (vertunitsvalue == 5.31) e1= 9;
if (vertunitsvalue == 5.7) e1= 10;  
if (vertunitsvalue == 6.16) e1= 11;
if (vertunitsvalue == 6.6) e1= 12;
if (vertunitsvalue == 7.02) e1= 13;
if (vertunitsvalue == 7.42) e1= 14;  
if (vertunitsvalue == 7.8) e1= 15;
if (vertunitsvalue == 8.16) e1= 16;
if (vertunitsvalue == 8.5) e1= 17;
if (vertunitsvalue == 8.82) e1= 18;  
if (vertunitsvalue == 9.12) e1= 19;
if (vertunitsvalue == 9.4) e1= 20;
}
var Precision=5;
var g = form.g_verh.value; // глубина верхнего слоя грунта
var h = form.l_vert.value; // длина вертикального заземлителя
var t = form.g_gorizont.value; // глубина горизонт. заземлителя
var f = form.l_gorizont.value; // длина соединительной горизонтальной полосы
var j = (h * (e1 - 1)) - (-f); // длина горизонт. заземлителя
var k = form.b_vert.value; // диаметр верт. заземлителя
var l = form.b_gorizont.value; // ширина горизонт. заземлителя
var p = (verhunitsvalue * k_verhunitsvalue * nignunitsvalue * h) / (((verhunitsvalue * k_verhunitsvalue) * (h - g - (-t))) + (nignunitsvalue * (g - t)));
var m = p / (2 * Math.PI * h);
var m1 = p * d / (Math.PI * j);
var r = Math.log((2 * h) / k);
var n = Math.log(((4 * ((h / 2) - (-t))) - (-h)) / ((4 * ((h / 2) - (-t))) - h));
var s = Math.log(j / Math.sqrt(l * t));
if ((g <= 0) || (isNaN(g)))
  {
    alert('Глубина верхнего слоя должна быть больше 0');
    return(0);
  }
if ((h <= 0) || (isNaN(h)))
  {
    alert('Длина вертикального заземлителя должна быть больше 0');
    return(0);
  }
if ((t <= 0) || (isNaN(t)))
  {
    alert('Глубина горизонтального заземлителя должна быть больше 0');
    return(0);
  }
if ((f <= 0) || (isNaN(f)))
  {
    alert('Длина соединительной полосы должна быть больше 0');
    return(0);
  }
if ((k < 0.01) || (isNaN(k)))
  {
    alert('Диаметр вертикального заземлителя должен быть больше 10 мм.');
    return(0);
  }
if ((l < 0.02) || (isNaN(l)))
  {
    alert('Ширина полосы горизонтального заземлителя должна быть больше 20 мм.');
    return(0);
  }
var resist_ud = p;
form.resist_ud.value = resist_ud.toPrecision(Precision); // удельное электрическое сопротивление грунта

var resist_vert = m * (r + (n / 2));
form.resist_vert.value = resist_vert.toPrecision(Precision); // сопротивление одного верт. заземлителя

var dlina_gor = j;
form.dlina_gor.value = j.toPrecision(Precision); // длина горизонт. заземлителя

var resist_gor = m1 * s;
form.resist_gor.value = resist_gor.toPrecision(Precision); // сопротивление горизонт. заземлителя

var resist = ((resist_vert / vertunitsvalue) * resist_gor) / ((resist_vert / vertunitsvalue) + resist_gor);

form.resist.value = resist.toPrecision(Precision);
return true;
}