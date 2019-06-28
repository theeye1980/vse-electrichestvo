c = new Array();

c[0] = 0;
c[1] = 43;
c[2] = 96;
c[3] = 132;
c[4] = 217;
c[5] = 308;
c[6] = 367;
c[7] = 535;
c[8] = 763;
c[9] = 965;

function Conv()
{
 var res, vfrom, vto, vcash;
 vcash = document.getElementById("cash").value;
 if(isNaN())
 vfrom = document.getElementById("from").value;
 vcash = vcash.replace(',', '\.');
 vcash = vcash.replace(' ', '');
 vcash = vcash.replace(' ', '');
 vto = document.getElementById("to").value;
 res = vto * vcash + c[vfrom], 2;
 if(isNaN(res))
 {
  res = "0,00";
 }
 else
 {
  res = res.toFixed(2);
  res = res.toString();
  res = res.replace('\.', ',');
  res = res + " кг";
 }
  result.innerHTML = res;
}