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

//js valication
function check_email(){
	var str = $("#email").val();
	var pattern = /^([a-zA-Z0-9]+)@stevens.edu$/i;
	if (str.length <= 0){
		$("#email_error").text("You must set an email.");
		return false;
	}	
	else if (!str.match(pattern)){
		$("#email_error").text("Your email address is invalid.");
		return false;
	}
	else{
		$("#email_error").text("");
		return true;
	}
}

function check_password(){
	var str = $("#password").val();
	if (str.length <= 0){
		$("#password_error").text("You must set a password.");
		return false;
	}
	else if (str.length < 8){
		$("#password_error").text("Must be at least 8 characters.");
		return false;
	}
	else{
		$("#password_error").text("");
		return true;
	}
}

function check_password2(){
	var str = $("#password2").val();
	if (str.length <= 0){
		$("#password2_error").text("You must re-type the password.");
		return false;
	}
	else if (str != $("#password").val()){
		$("#password2_error").text("The passwords are not same.");
		return false;
	}
	else{
		$("#password2_error").text("");
		return true;
	}
}

function check_question(){
	var str = $("#question").val();
	if (str.length <= 0){
		$("#question_error").text("You must set a question.");
		return false;
	}	
	else if (str.length < 8){
		$("#question_error").text("Must be at least 8 characters.");
		return false;
	}
	else{
		$("#question_error").text("");
		return true;
	}
}

function check_answer(){
	var str = $("#answer").val();
	if (str.length <= 0){
		$("#answer_error").text("You must set a answer.");
		return false;
	}	
	else if (str.length < 8){
		$("#answer_error").text("Must be at least 8 characters.");
		return false;
	}
	else{
		$("#answer_error").text("");
		return true;
	}
}

function check_firstname(){
	var str = $("#firstname").val();
	var pattern = /^([a-z-']+)$/i;
	if (str.length <= 0){
		$("#firstname_error").text("You must set a first name.");
		return false;
	}	
	else if (!str.match(pattern)){
		$("#firstname_error").text("Your first name is invalid..");
		return false;
	}
	else{
		$("#firstname_error").text("");
		return true;
	}
}

function check_middlename(){
	var str = $("#middlename").val();
	var pattern = /^([a-z-']+)$/i;
	if (str.length > 0 && !str.match(pattern)){
		$("#middlename_error").text("Your middle name is invalid..");
		return false;
	}
	else{
		$("#middlename_error").text("");
		return true;
	}
}

function check_lastname(){
	var str = $("#lastname").val();
	var pattern = /^([a-z-']+)$/i;
	if (str.length <= 0){
		$("#lastname_error").text("You must set a last name.");
		return false;
	}	
	else if (!str.match(pattern)){
		$("#lastname_error").text("Your last name is invalid..");
		return false;
	}
	else{
		$("#lastname_error").text("");
		return true;
	}
}

function check_dob(){
	var str = $("#dob").val();
	var pattern = /^((0[1-9])|(1[012]))\/((0[1-9])|([12][0-9])|(3[01]))\/([1-9][0-9]{3})$/i;
	if (str.length <= 0){
		$("#dob_error").text("You must set a birthday.");
		return false;
	}	
	else if (!str.match(pattern)){
		$("#dob_error").text("Your birthday is invalid.");
		return false;
	}
	else{
		$("#dob_error").text("");
		return true;
	}
}

function check_year(){
	var str = $("#year").val();
	var pattern = /^([1-9][0-9]{3})$/i;
	if (str.length <= 0){
		$("#year_error").text("You must set a entry year.");
		return false;
	}	
	else if (!str.match(pattern)){
		$("#year_error").text("Your entry year is invalid.");
		return false;
	}
	else{
		$("#year_error").text("");
		return true;
	}
}