function checnum(as)
{
	var dd = as.value;

	if(dd.lastIndexOf(" ")>=0){
	  dd = dd.replace(" ","");
	  as.value = dd;
	}
	
 var strValidChars = "0123456789.-,";
   var strChar;
   var blnResult = true;
var strString=dd;
   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {

		dd = dd.substring(0,(dd.length-1));
		as.value = dd;
		}
	}		
}

function calc()
{
var d=document.getElementById("d").value;
var n=document.getElementById("n").value;
var bl=document.getElementById("bl").value;
var bd=document.getElementById("bd").value;
var i=document.getElementById("i").value;
var PI=3.141592;
var g= 1000000000;
var m= 1000000;
var k= 1000;
var res=bl/d;
var res1=Math.round(100000000*n/res)/100000000;
var re=Math.round(100000000*2*res1*d)/100000000;
var re2=Number(re)+Number(bd);
var res2=Math.round(100000000*re2)/100000000;
var rw=((Number(res1)*Number(d))+Number(bd))/2;
var re3=PI*rw*rw;
var res3=Math.round(100000000*re3)/100000000;
var lpt=2*PI*rw;
var re4=(lpt*n)/k;
var res4=Math.round(100000000*re4)/100000000;
var re5=0.0333*((0.812/2)*(0.812/2))/((d/2)*(d/2));
var res5=Math.round(100000000*re5)/100000000;
var res6=Math.round(100000000*res5*res4)/100000000;
var res7=Math.round(100000000*i*res6)/100000000;
var res8=Math.round(100000000*res7*i)/100000000;
document.getElementById("res").value=res;
document.getElementById("res1").value=res1;
document.getElementById("res2").value=res2;
document.getElementById("res3").value=res3;
document.getElementById("res4").value=res4;
document.getElementById("res5").value=res5;
document.getElementById("res6").value=res6;
document.getElementById("res7").value=res7;
document.getElementById("res8").value=res8;
}
function rese()
{
 document.getElementById("d").value="";
 document.getElementById("n").value="";
 document.getElementById("bl").value="";
 document.getElementById("bd").value="";
 document.getElementById("i").value="";
 document.getElementById("res").value="";
 document.getElementById("res1").value="";
 document.getElementById("res2").value="";
 document.getElementById("res3").value="";
 document.getElementById("res4").value="";
 document.getElementById("res5").value="";
 document.getElementById("res6").value="";
 document.getElementById("res7").value="";
 document.getElementById("res8").value=""; 
}