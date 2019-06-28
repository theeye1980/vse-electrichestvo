function wpcalc() {    
    var plosha=jQuery("#plosha").val().replace(",",".");
    var step=jQuery("#step :selected").val();
    var result = (plosha*step).toFixed(2);
	jQuery("#result").val(result);
	
}