function calc()
{
   resistance = $("#resist").val();
   reactance = $("#react").val();
   if(resistance=="")
   {
        alert("Введите реактивного значение");
        $("#resist").focus();
   }
   else if(reactance=="")
   {
        alert("Введите реактивного значение");
        $("#react").focus();
   }
   else
   {
        common = (resistance * resistance) + (reactance * reactance);
        fir = resistance / common;
        sec= reactance / common;
        fir = Math.round(1000*fir)/1000;
        sec = Math.round(1000*sec)/1000;
	if(sec<0)
	{
	    var secon = " + "+(-1*sec)+" j";
	}
	else
	{
	    var secon = " - "+sec+" j";
	}
        $("#admit").val(fir+""+secon);
    }
}