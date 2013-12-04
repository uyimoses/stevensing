$(function(){
	$( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: "1900:2014"
	});
	$( "#dob" ).datepicker({
	        changeMonth: true,
	        changeYear: true,
	        showButtonPanel: true,
	        yearRange: "1900:2014"
	});

	try{
		init();
	}
	catch(e){
		// do nothing
	}
});