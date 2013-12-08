<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<script>
	var user_id = -1;
	function registerStep(id){
		if (id>5){
			id = 5;
		}
		else if (id<1){
			id = 1;
		}
		//register
		if (id>=4 && user_id < 0){
			register();
		}
		//valication step 1 and step 2
		if (id==2 || id==3){
			if (!valication(id-1))
				return false;
		}
		//display left navigation
		for(var i = 1; i<=5; i++){
			$("#register_step_"+i).hide();
			if (i==id){
				$("#register_bar li:nth-child("+i+")>span").addClass("current");
			}
			else if (i<id){
				$("#register_bar li:nth-child("+i+")>span").addClass("completed");
				$("#register_bar li:nth-child("+i+")>span").removeClass("current");
			}
			else{
				$("#register_bar li:nth-child("+i+")>span").removeClass("current");
				$("#register_bar li:nth-child("+i+")>span").removeClass("completed");
			}
				
		}
		$("#register_step_"+id).show();
	}
	function valication(i){
		var error = true;
		if (i==0){
			if (!check_password()){
				$("#password").focus();
				error = false;
			}
			if (!check_email()){
				$("#email").focus();
				error = false;
			}
		}
		else if (i==1){
			if (!check_answer()){
				$("#answer").focus();
				error = false;
			}
			if (!check_question()){
				$("#question").focus();
				error = false;
			}
			if (!check_password2()){
				$("#password2").focus();
				error = false;
			}
			if (!check_password()){
				$("#password").focus();
				error = false;
			}
			if (!check_email()){
				$("#email").focus();
				error = false;
			}
		}
		else if (i==2){
			if (!check_year()){
				$("#year").focus();
				error = false;
			}
			if (!check_dob()){
				$("#dob").focus();
				error = false;
			}
			if (!check_lastname()){
				$("#lastname").focus();
				error = false;
			}
			if (!check_middlename()){
				$("#middlename").focus();
				error = false;
			}
			if (!check_firstname()){
				$("#firstname").focus();
				error = false;
			}
		}
		else{
			return (valication(1) && valication(2));
		}
		return error;
	}
	function register(){
		if (valication(3)){
			$.ajax({
				url: 'registerAction',
				type: 'POST',
				dataType: 'text',
				data: {
					"email": $("#email").val(),
					"password": $("#password").val(),
					"question": $("#question").val(),
					"answer": $("#answer").val(),
					"firstname": $("#firstname").val(),
					"middlename": $("#middlename").val(),
					"lastname": $("#lastname").val(),
					"gender": $("input[name='gender']:checked").val(),
					"dob": $("#dob").val(),
					"major": $("#major").val(),
					"degree": $("#degree").val(),
					"year": $("#year").val(),
					"semester": $("#semester").val()
				},
				success: function(data){
					console.log(data);
					var obj = eval('(' + data + ')');
					if (obj.error == "data"){
						registerStep(1);
						$("#email_error").text(obj.email_error);
						$("#password_error").text(obj.password_error);
						$("#question_error").text(obj.question_error);
						$("#answer_error").text(obj.answer_error);
						$("#firstname_error").text(obj.firstname_error);
						$("#middlename_error").text(obj.middlename_error);
						$("#lastname_error").text(obj.lastname_error);
						$("#gender_error").text(obj.gender_error);
						$("#dob_error").text(obj.dob_error);
						$("#major_error").text(obj.major_error);
						$("#degree_error").text(obj.degree_error);
						$("#year_error").text(obj.year_error);
						$("#semester_error").text(obj.semester_error);
					}
					else if (obj.error == "server"){
						alert("Sorry. The Web Server is not avaliable for now.");
					}
					else if (obj.error == "none"){
						user_id = obj.id;
					}
					
				},
				error: function(data){

				}
			});
		}
		else{

		}
		
	}
	function addfriends(){

	}
	function addcourses(){
		
	}
	function init(){
		registerStep(1);
		<?php echo isset($_POST["email"])?'$("#password2").focus();':'$("#password2").focus();';?>
		valication(0);
	}
</script>
<div class="span-24 big_title">
	Welcome to join Stevensing!
</div>
<section class="span-24">
	<section class="span-6">
		<ol id="register_bar">
		  <li><span class="current">Account Information</span></li>
		  <li><span>Profile Information</span></li>
		  <li><span>Policy</span></li>
		  <li><span>Adding Friends</span></li>
		  <li><span>Adding Courses</span></li>
		</ol>
	</section>
	<form name="registerForm">
		<!-- Creating an Account -->
		<section class="register_steps" id="register_step_1">
			<div>
				<label for="email" class="required">Stevens Email</label>
				<input type="text" id="email" placeholder="xxxxxx@stevens.edu" required onblur="check_email(this);" value="<?php echo isset($_POST["email"])?$_POST["email"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message" id="email_error" id="email_error"></div>
			</div>
			<div>
				<label for="password" class="required">Create a Password</label>
				<input type="password" id="password" placeholder="At least 8 characters" required onblur="check_password(this);" value="<?php echo isset($_POST["password"])?$_POST["password"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message" id="password_error"></div>
			</div>
			<div>
				<label for="password2" class="required">Re-type the Password</label>
				<input type="password" id="password2" placeholder="Type the password again" required onblur="check_password2(this);">
				<span class="check_icon"></span>
				<div class="check_message" id="password2_error"></div>
			</div>
			<div>
				<label for="question" class="required">Security Question</label>
				<input type="text" id="question" placeholder="Enter or select your question" required onblur="check_question(this);">
				<span class="check_icon"></span>
				<div class="check_message" id="question_error"></div>
			</div>
			<div>
				<label for="answer" class="required">Security Answer</label>
				<input type="text" id="answer" placeholder="Enter the answer" required onblur="check_answer(this);">
				<span class="check_icon"></span>
				<div class="check_message" id="answer_error"></div>
			</div>
			<div class="next_register_step"><a href="javascript:" onclick="registerStep(2);">Next</a></div>
		</section>
		<!-- Creating a Profile -->
		<section class="register_steps" id="register_step_2">
			<div>
				<label for="firstname" class="required">First Name</label>
				<input type="text" id="firstname" placeholder="First Name" required onblur="check_firstname(this);" value="<?php echo isset($_POST["firstname"])?$_POST["firstname"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message" id="firstname_error"></div>
			</div>
			<div>
				<label for="middle">Middle Name</label>
				<input type="text" id="middlename" placeholder="Middle Name" required onblur="check_middlename(this);">
				<span class="check_icon"></span>
				<div class="check_message" id="middlename_error"></div>
			</div>
			<div>
				<label for="lastname" class="required">Last Name</label>
				<input type="text" id="lastname" placeholder="Last Name" required onblur="check_lastname(this);" value="<?php echo isset($_POST["lastname"])?$_POST["lastname"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message" id="lastname_error"></div>
			</div>
			<div>
				<label class="required">Gender</label>
				<div>
					<input type="radio" name="gender" id="male" value="M"><label for="male">Male</label>
					<input type="radio" name="gender" id="female" value="F"><label for="female">Female</label>
				</div>
				<span class="check_icon"></span>
				<div class="check_message" id="gender_error"></div>
			</div>
			<div>
				<label for="dob" class="required">Date of Birth</label>
				<input type="text" id="dob" placeholder="Select your birthday" required onchange="check_dob(this);" id="dob">
				<span class="check_icon"></span>
				<div class="check_message" id="dob_error"></div>
			</div>
			<div>
				<label for="major" class="required">Major</label>
				<select id="major" id="major" size="1">
					<?php
					foreach ($majors as $key => $value) {
						echo "<option value='$key'>$value</option>";
					}
					?>
				</select>
				<span class="check_icon"></span>
				<div class="check_message" id="major_error"></div>
			</div>
			<div>
				<label for="degree" class="required">Degree</label>
				<select id="degree" id="degree" size="1">
					<?php
					foreach ($degrees as $value) {
						echo "<option value='$value'>$value</option>";
					}
					?>
				</select>
				<span class="check_icon"></span>
				<div class="check_message" id="degree_error"></div>
			</div>
			<div>
				<label for="year" class="required">Entry Year</label>
				<input type="text" id="year" placeholder="Year" required onblur="check_year(this);">
				<span class="check_icon"></span>
				<div class="check_message" id="year_error"></div>
			</div>
			<div>
				<label for="semester" class="required">Entry Semester</label>
				<select id="semester" id="semester" size="1">
					<?php
					foreach ($semesters as $key => $value) {
						echo "<option value='$key'>$value</option>";
					}
					?>
				</select>
				<span class="check_icon"></span>
				<div class="check_message" id="semester_error"></div>
			</div>
			<div>
				<label for="picture">Profile Picture</label>
				<div>File Upload</div>
				<span class="check_icon"></span>
				<div class="check_message" id="picture_error"></div>
			</div>
			<div class="next_register_step">
				<a href="javascript:" onclick="registerStep(1);">Back</a>
				<a href="javascript:" onclick="registerStep(3);">Next</a></div>
		</section>
		<!-- Policy Confirmation -->
		<section class="register_steps" id="register_step_3">
			<div class="next_register_step">
				<a href="javascript:" onclick="registerStep(2);">Back</a>
				<a href="javascript:" onclick="window.location.href='welcome';">Deny</a>
				<a href="javascript:" onclick="registerStep(4);">Register</a></div>
		</section>
		<!-- Adding friends -->
		<section class="register_steps" id="register_step_4">
			<div class="next_register_step">
				<a href="javascript:" onclick="registerStep(3);">Back</a>
				<a href="javascript:" onclick="registerStep(5);">Skip</a>
				<a href="javascript:" onclick="addfriends();registerStep(5);">Done</a></div>
		</section>
		<!-- Adding courses -->
		<section class="register_steps" id="register_step_5">
			<div class="next_register_step">
				<a href="javascript:" onclick="registerStep(4);">Back</a>
				<a href="javascript:" onclick="window.location.href='home';">Skip</a>
				<a href="javascript:" onclick="addcourses();window.location.href='home'">Done</a></div>
		</section>
		
	</form>
</section>
<?php

//include page footer
include "footer.php";