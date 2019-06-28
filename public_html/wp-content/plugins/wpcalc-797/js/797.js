function wpcalc() {
	var x1=jQuery("select[name='x1']").val();
	var x2=jQuery("select[name='x2']").val();
	var x3=jQuery("select[name='x3']").val();
	var x4=jQuery("select[name='x4']").val();
	var x5=jQuery("select[name='x5']").val();
	var x6=jQuery("select[name='x6']").val();
	var x7=jQuery("select[name='x7']").val();	
	var x8=jQuery("input[name='x8']").val();
	
	var y1 = (0.1*x1*x2*x3*x4*x5*x6*x7*x8).toFixed(2);
	var y2 = (0.1*x1*x2*x3*x4*x5*x6*x7*x8*1.2).toFixed(2);
	
	jQuery("#y1").html(y1 + ' кВт');
	jQuery("#y2").html(y2 + ' кВт');
	
	
}
	
	