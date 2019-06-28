function checnum(as)
{
	var dd = as.value;
	
	if(isNaN(dd))
	{
		dd = dd.substring(0,(dd.length-1));
		as.value = dd;
	}		
}
 
function loan()
{
	var x1 = document.wpcalc.x1.value;
	var x2 = document.wpcalc.x2.value;
var x3 = document.wpcalc.x3.value;
var x4 = document.wpcalc.x4.value;
var x5 = document.wpcalc.x5.value;
var x6 = document.wpcalc.x6.value;
var x7 = document.wpcalc.x7.value;
var x8 = document.wpcalc.x8.value;
var x9 = document.wpcalc.x9.value;
var x10 = document.wpcalc.x10.value;
var x11 = document.wpcalc.x11.value;
if (x2!= '' && x2>0)
{var f1 = x2;}
else 
{var f1 = x1*0.58;}
var f2 = x5*1+x6*1+x7*1+x8*1+x11*1;
var f3 = x5*(x4*1+6)+x6*(x4*1.2+1.4)+x7*(x4*2+12)+x8*(x4*0.8+0.8)+x11*(x4*1+1);
var f4 = (f2*1+1)*0.005*f3/f2;

var p1 = Math.round(10*3) + Math.round(f1/10) + Math.round(f1) + 2;
var p2 = 0.08+f2*0.04+f4+x9*0.1+x10*0.1+x3*100*0.0005;
var prin1 = Math.round(p2*100)/100;

document.getElementById("res").innerHTML='Необходимая мощность насоса<b> '+prin1+' м<sup>3</sup>/ч</b> и высотой подъема<b> '+p1+' м.</b>';
      	

}