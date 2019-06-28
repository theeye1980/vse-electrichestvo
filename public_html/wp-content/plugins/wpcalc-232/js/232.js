function checnum(as)
{
	var dd = as.value;
	
	if(isNaN(dd))
	{
		dd = dd.substring(0,(dd.length-1));
		as.value = dd;
	}		
}

function calsi()
{
	var ty = document.for.ss.value;
	var m = document.for.res1.value;
	var a = document.for.res2.value;
	var f = document.for.res3.value;
			

	if(ty == 1)
		m = null;
	if(ty == 2)
		a = null;
	if(ty == 3)
		f = null;
	
	if(m == "" || a == "" || f == "")
	{
		alert(" Заполните необходимые поля ");
	}

	if(m != null && a != null){
		f = Math.round((m-1.25)*a/1.25*1000)/1000;
		document.for.res3.value=f;
	}
	else if(a != null && f != null){
		m = Math.round(1.25 *(1+(f/a))*1000)/1000;
		document.for.res1.value=m;
	}
	else if(m != null && f != null){
		a = Math.round((1.25*f)/(m-1.25)*1000)/1000;
		document.for.res2.value=a;
	}
	
	return false;
}

function modf()
{
	for(var h=1; h<4; h++)
	{
		var dd = "document.for.res"+h;
		ss = eval(dd);
		ss.disabled=false;
		ss.style.backgroundColor="#eefaff";
		ss.style.color= "#000000";
	}
	var vv = document.for.ss.value;
	sse(vv);
}

function sse(vv){
	var dd = "document.for.res"+vv;
	ss = eval(dd);
	ss.disabled=true;
	ss.value="";
	ss.style.color= "black";
	ss.style.backgroundColor="#bbc7dd";
}

function color(test)
{
	var myI=document.getElementsByTagName("input").item(4);
	myI.style.backgroundColor=test;
}


function color1(test)
{
var myI=document.getElementsByTagName("table").item(0);
//myI.setAttribute("style",ch);
myI.style.backgroundColor=test;
}