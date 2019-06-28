var cmVal = 0
var lmVal = 0
var fmVal = 0
var dmVal = 0
var dm2Val = 0
var dm3Val = 0
var llmVal = 0

function checnum(as)
{
	var dd = as.value;

	if(dd.lastIndexOf(" ")>=0)
    {
	  dd = dd.replace(" ","");
	  as.value = dd;
	}
	if(dd.lastIndexOf(",")>=0)
    {
	  dd = dd.replace(",",".");
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
function prevC()
{
   if(document.getElementById("CM")){cmVal = eval(document.getElementById("CM").value);}
	if (document.getElementById("LM")){lmVal = eval(document.getElementById("LM").value);}
	if (document.getElementById("FM")){fmVal = eval(document.getElementById("FM").value);}
   if (document.getElementById("DM")){dmVal = eval(document.getElementById("DM").value);}
   if (document.getElementById("DM2")){dm2Val = eval(document.getElementById("DM2").value);}
   if (document.getElementById("DM3")){dm3Val = eval(document.getElementById("DM3").value);}
   if (document.getElementById("lM")){llmVal = eval(document.getElementById("lM").value);}
}
function unitC()
{
	var C = parseFloat(document.getElementById("C").value);
	var CM = eval(document.getElementById("CM").value)
	if (!C){return;}
  	C=(C*cmVal)/CM
  	document.getElementById("C").value = parseFloat(C)
}
function unitL()
{
	var L = parseFloat(document.getElementById("L").value);
	var LM = eval(document.getElementById("LM").value)
	if (!L){return;}
  	L=(L*lmVal)/LM
  	document.getElementById("L").value = parseFloat(L)
}
function unitF()
{
	var f = parseFloat(document.getElementById("f").value);
	var FM = eval(document.getElementById("FM").value)
	if (!f){return;}
  	f=(f*fmVal)/FM
  	document.getElementById("f").value = parseFloat(f)
}
function unitD()
{
	var D = parseFloat(document.getElementById("D").value);
	var DM = eval(document.getElementById("DM").value)
	if (!D){return;}
  	D=(D*dmVal)/DM
  	document.getElementById("D").value = parseFloat(D)
}
function unitD2()
{
	var D = parseFloat(document.getElementById("D2").value);
	var DM = eval(document.getElementById("DM2").value)
	if (!D){return;}
  	D=(D*dm2Val)/DM
  	document.getElementById("D2").value = parseFloat(D)
}
function unitH()
{
	var D = parseFloat(document.getElementById("h").value);
	var DM = eval(document.getElementById("DM3").value)
	if (!D){return;}
  	D=(D*dm3Val)/DM
  	document.getElementById("h").value = parseFloat(D)
}
function unitl()
{
	var l = parseFloat(document.getElementById("l").value);
	var lM = eval(document.getElementById("lM").value)
	if (!l){return;}
  	l=(l*llmVal)/lM
  	document.getElementById("l").value = parseFloat(l)
}
//-->
<!--
var Fk;
var Ek;

function clear01()
{
document.getElementById("w").value = ""
document.getElementById("l").value = ""
document.getElementById("L").value = ""
document.getElementById("D").value = ""
document.getElementById("d").value = ""
document.getElementById("c").value = ""
document.getElementById("R").value = ""
document.getElementById("Lww").value = ""
}

function EF(c)
{
 var a = 1;
 var b = Math.sqrt(1-Math.pow(c,2));
 var E = 1-Math.pow(c,2)/2;
 var i = 1;
 while (Math.abs(a-b) > 1e-15)
  {
   var a1 = (a + b)/2;
   var b1 = Math.sqrt(a*b);
   E = E - i*Math.pow((a - b)/2,2);
   i = 2*i;
   a = a1;
   b = b1;
  }
 Fk = Math.PI/(2*a);
 Ek = E*Fk;
}

function Mut(r1,r2,x,g)
{
 var l = Math.sqrt(Math.pow(r2-r1,2)+Math.pow(x,2));
 var c = 2*Math.sqrt(r1*r2)/Math.sqrt(Math.pow(r1+r2,2)+Math.pow(l-g,2));
 EF(c);
 Result = -0.004*Math.PI*Math.sqrt(r1*r2)*((c-2/c)*Fk+(2/c)*Ek);
 return Result;
}

function FindInductance()
{
 var I = parseFloat(document.getElementById("L").value);
 var D = parseFloat(document.getElementById("D").value);
 var dw = parseFloat(document.getElementById("d").value)/10;
 var k = parseFloat(document.getElementById("k").value)/10;
 var lk = parseFloat(document.getElementById("l").value);
 var LM = eval(document.getElementById("LM").value)
 var DM = eval(document.getElementById("DM").value)
 var lM = eval(document.getElementById("lM").value)
 if ((I==0) || (D==0) || (dw==0) ||(lk==0)){alert("Введите правильно данные"); return;}
 if (!I || !D || !dw ||!lk){alert("Введите правильно данные");return;}
 I=I*LM
 D=D*DM/10
 lk=lk*lM/10   
 
 var Ltotal = 0; // initialize variable of total self-inductance
 var lw =0;
 var r0 = (D + k)/2;
 var N = 0;
 var Nl = Math.floor(lk/k); //number of turns in layer
 g = Math.exp(-0.25)*dw/2;
 while (Ltotal < I) // start calculation loop increasing N-turns to reach requiring inductance (I)
 {
  N++;
  var Nc = (N-1) % Nl; //position of N-turn in layer 
  var nLayer = Math.floor((N-1)/Nl); //current layer for N-turn
  var nx = Nc*k; //x-offset of turn
  var ny = r0 + k*nLayer; //y-offset of turn 
  var Lns = Mut(ny,ny,g,0); //self inductance of current turn
  lw = lw + 2*Math.PI*ny; //length of wire with the current turn
  var M = 0; // start calculation loop of the mutual inductance - current turn (N) + all another turns (j)
  if (N > 1)
  {
   for (var j = N; j >= 2; j--)
   {
    var Jc = (j-2) % Nl;
    var jx = Jc*k;
    var jLayer = Math.floor((j-2)/Nl);
    var jy = r0 + k*jLayer;
    M = M + 2*Mut(ny,jy,nx-jx,g); //mutual inductance between current N-turn and j-turn
   }
  }
  Ltotal = Ltotal + Lns + M; //total summary inductance (adding self-inductance and mutual inductance of current N-turn)
 }
 var R = (0.0175*lw*1e-4*4)/(Math.PI*dw*dw); //resistance of the wire
 var lw0 = lw/100;
 document.getElementById("w").value = N;
 document.getElementById("R").value = Math.round(R*100)/100;
 document.getElementById("Lww").value = Math.round(lw0*100)/100;
 document.getElementById("Lcc").value = nLayer+1;
 document.getElementById("c").value = Math.round((nLayer+1)*k*100)/10;
}