function calc()
{
  p1=parseInt(document.getElementById("parm1").value);
  p2=parseInt(document.getElementById("parm2").value);
  k = 1.4;
 var sZapjatimi = p1 / p2 * k;
 
 function fixed(N, n) {
  return Math.round(sZapjatimi * Math.pow(10, n))/Math.pow(10, n);

}
out = fixed(sZapjatimi, 2);

 document.form.sumOut.value=out;
}