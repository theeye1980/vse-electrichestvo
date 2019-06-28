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
var m=0.000001;
var precision=3;
var v=document.getElementById("v").value;
var c=document.getElementById("c").value;
var r=document.getElementById("r").value;
var c1=c*m;

var tcons=Math.round(100000000*r*c1)/100000000 ;
var e=(v*v*c1)/2;
var e1=Math.round(100000000*e)/100000000;

var e2=e1*0.00094781712;
document.getElementById("res").value=tcons;
document.getElementById("res1").value=e1;
//document.getElementById("res2").value=e2;
}
function rese()
{
 document.getElementById("v").value="";
 document.getElementById("c").value="";
 document.getElementById("r").value="";
 document.getElementById("res").value="";
 document.getElementById("res1").value="";
 //document.getElementById("res2").value=""; 
}