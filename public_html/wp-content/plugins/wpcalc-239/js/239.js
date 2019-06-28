var a=0;
var b=0;
var c=0;
var d=0;
var e=0;
var f=0;
var g=0;
var h=0;
var i=0;
var j=0;
function calc()
{
var num=$("#i1").val();
tot=0;
for(i=0;i<num;i++)
{
var value = $("#z"+i).val();
if(value=="")
{
alert("Enter the resistor value");
$("#z"+i).focus();
return false;
}
var tot=(1/value)+tot;
}
var total=1/tot;
$("#i11").val((Math.round(1000*total)/1000));
}

function disp(obj)
{

document.getElementById("dis").innerHTML = "";
	var nog = parseFloat(obj.value);
 if(nog>1000)
        {
            alert("Количество резисторов должно быть до 1000");
        }
        else
        {
	// Declare variables and create the header, footer, and caption.
	var oTable = document.createElement("TABLE");
	var oTBody = document.createElement("TBODY");
	var oRow, oCell;
	var i, j;

	// Insert the created elements into oTable.
	oTable.appendChild(oTBody);
	//oTable.setAttribute("align","right");
	// Insert rows and cells into bodies.
	for (i=0; i<nog; i++)
	{
	    oRow = document.createElement("TR");
	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","left");
      
	    oCell.innerHTML = "Резистор R"+i;
	    oRow.appendChild(oCell);
	    
	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","right");      
	    oCell.innerHTML =" &nbsp;";
	    oRow.appendChild(oCell);	

	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","right");      
	    oCell.innerHTML =" &nbsp;";
	    oRow.appendChild(oCell);	
		
	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","right");      
	    oCell.innerHTML =" &nbsp;";
	    oRow.appendChild(oCell);	

	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","right");      
	    oCell.innerHTML =" &nbsp;";
	    oRow.appendChild(oCell);	
		
 	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","right");      
	    oCell.innerHTML =" &nbsp;";
	    oRow.appendChild(oCell);	
		
     	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","right");      
	    oCell.innerHTML =" &nbsp;";
	    oRow.appendChild(oCell);	
		
	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","right");      
	    oCell.innerHTML =" &nbsp;";
	    oRow.appendChild(oCell);	
		
	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","right");      
	    oCell.innerHTML =" &nbsp;";
	    oRow.appendChild(oCell);	
		
	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","right");      
	    oCell.innerHTML =" &nbsp;";
	    oRow.appendChild(oCell);	
		
	    oCell = document.createElement("TD");
	    oCell.setAttribute("align","center");
      
	    oCell.innerHTML =" = <input type=text id=z"+i+" onkeyup=checknum(this)> Ом ";
	    oRow.appendChild(oCell);
	    oTBody.appendChild(oRow);
  	}

  	// Insert the table into the document tree.
	var frtb = document.getElementById("dis");
	frtb.appendChild(oTable);
}

}

function clearall()
{
    $("#i1").val("");
    $("#dis").html("");
    $("#i11").val("");
}