function light(obj){
var a=(obj.tip.value*obj.ploshad.value.replace(/,/,"."))/obj.lampa.value;
obj.res.value=a.toFixed(0);	
			}