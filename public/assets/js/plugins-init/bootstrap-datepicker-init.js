$(document).ready(function(){

	if(jQuery('#bsDatepicker').length > 0 ){
		$('#bsDatepicker').datepicker({
			format: 'mm/dd/yyyy',
			autoclose: true,
			todayHighlight: true
		});
	}

});