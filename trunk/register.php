<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<script type="text/javascript">
	function registerStep(id){
		if (id>=4){
			register();
		}

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
	function valication(){
		return 1;
	}
	function register(){
		if (valication()){
			var form = document.forms["registerForm"];
			$.ajax({
				url: 'registerAction',
				type: 'POST',
				dataType: 'text',
				data: {
					"email": form.elements["email"].value,
					"password": form.elements["password"].value,
					"question": form.elements["question"].value,
					"answer": form.elements["answer"].value,
					"firstname": form.elements["firstname"].value,
					"middlename": form.elements["middlename"].value,
					"lastname": form.elements["lastname"].value,
					"gender": form.elements["gender"].value,
					"dob": form.elements["dob"].value,
					"major": form.elements["major"].value,
					"degree": form.elements["degree"].value,
					"year": form.elements["year"].value,
					"semester": form.elements["semester"].value
				},
				success: function(data){
					var obj = eval('(' + data + ')');
					// $("#email_error").text(obj.email);
					// $("#password_error").text(obj.password);
					// $("#question_error").text(obj.question);
					// $("#answer_error").text(obj.answer);
					// $("#firstname_error").text(obj.firstname);
					// $("#middlename_error").text(obj.middlename);
					// $("#lastname_error").text(obj.lastname);
					// $("#gender_error").text(obj.gender);
					// $("#dob_error").text(obj.dob);
					// $("#major_error").text(obj.major);
					// $("#degree_error").text(obj.degree);
					// $("#year_error").text(obj.year);
					// $("#semester_error").text(obj.semester);
				},
				error: function(data){

				}
			});
			

			// $.post('registerAction', 
			// 	{
			// 		"email": form.elements["email"].value,
			// 		"password": form.elements["password"].value,
			// 		"question": form.elements["question"].value,
			// 		"answer": form.elements["answer"].value,
			// 		"firstname": form.elements["firstname"].value,
			// 		"middlename": form.elements["middlename"].value,
			// 		"lastname": form.elements["lastname"].value,
			// 		"gender": form.elements["gender"].value,
			// 		"dob": form.elements["dob"].value,
			// 		"major": form.elements["major"].value,
			// 		"degree": form.elements["degree"].value,
			// 		"year": form.elements["year"].value,
			// 		"semester": form.elements["semester"].value
			// 	},
			// 	function(data, textStatus, xhr) {
			// 		alert(1);
			// 		$("#email_error").text(data.email);
			// 	},
			// 	"json"
			// );
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
		<?php echo isset($_POST["email"])?'$("#register_step_1>div:nth-of-type(3) input").focus();':'$("#register_step_1>div:nth-of-type(1) input").focus();';?>
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
				<input type="text" name="email" placeholder="xxxxxx@stevens.edu" required value="<?php echo isset($_POST["email"])?$_POST["email"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message" id="email_error" id="email_error">error message</div>
			</div>
			<div>
				<label for="password" class="required">Create a Password</label>
				<input type="password" name="password" placeholder="At least 8 characters" required value="<?php echo isset($_POST["password"])?$_POST["password"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message" id="password_error">error message</div>
			</div>
			<div>
				<label for="password2" class="required">Re-type the Password</label>
				<input type="password" name="password2" placeholder="Type the password again" required>
				<span class="check_icon"></span>
				<div class="check_message" id="password2_error">error message</div>
			</div>
			<div>
				<label for="question" class="required">Security Question</label>
				<input type="text" name="question" placeholder="Enter or select your question" required>
				<span class="check_icon"></span>
				<div class="check_message" id="question_error">error message</div>
			</div>
			<div>
				<label for="answer" class="required">Security Answer</label>
				<input type="text" name="answer" placeholder="Enter the answer" required>
				<span class="check_icon"></span>
				<div class="check_message" id="answer_error">error message</div>
			</div>
			<div class="next_register_step"><a href="javascript:" onclick="registerStep(2);">Next</a></div>
		</section>
		<!-- Creating a Profile -->
		<section class="register_steps" id="register_step_2">
			<div>
				<label for="firstname" class="required">First Name</label>
				<input type="text" name="firstname" placeholder="First Name" required value="<?php echo isset($_POST["firstname"])?$_POST["firstname"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message" id="firstname_error">error message</div>
			</div>
			<div>
				<label for="middle">Middle Name</label>
				<input type="text" name="middlename" placeholder="Middle Name" required>
				<span class="check_icon"></span>
				<div class="check_message" id="middlename_error">error message</div>
			</div>
			<div>
				<label for="lastname" class="required">Last Name</label>
				<input type="text" name="lastname" placeholder="Last Name" required value="<?php echo isset($_POST["lastname"])?$_POST["lastname"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message" id="lastname_error">error message</div>
			</div>
			<div>
				<label class="required">Gender</label>
				<div>
					<input type="radio" name="gender" id="male" value="M" checked><label for="male">Male</label>
					<input type="radio" name="gender" id="female" value="F"><label for="female">Female</label>
				</div>
				<span class="check_icon"></span>
				<div class="check_message" id="gender_error">error message</div>
			</div>
			<div>
				<label for="dob" class="required">Date of Birth</label>
				<input type="text" name="dob" placeholder="Select your birthday" required id="dob">
				<span class="check_icon"></span>
				<div class="check_message" id="dob_error">error message</div>
			</div>
			<div>
				<label for="major" class="required">Major</label>
				<select name="major" id="major" size="1">
					<?php
					foreach ($majors as $key => $value) {
						echo "<option value='$key'>$value</option>";
					}
					?>
				</select>
				<span class="check_icon"></span>
				<div class="check_message" id="major_error">error message</div>
			</div>
			<div>
				<label for="degree" class="required">Degree</label>
				<select name="degree" id="degree" size="1">
					<?php
					foreach ($degrees as $value) {
						echo "<option value='$value'>$value</option>";
					}
					?>
				</select>
				<span class="check_icon"></span>
				<div class="check_message" id="degree_error">error message</div>
			</div>
			<div>
				<label for="year" class="required">Entry Year</label>
				<input type="text" name="year" placeholder="Year" required>
				<span class="check_icon"></span>
				<div class="check_message" id="year_error">error message</div>
			</div>
			<div>
				<label for="semester" class="required">Entry Semester</label>
				<input type="text" name="semester" placeholder="Semester" required>
				<span class="check_icon"></span>
				<div class="check_message" id="semester_error">error message</div>
			</div>
			<div>
				<label for="picture">Profile Picture</label>
				<div>File Upload</div>
				<span class="check_icon"></span>
				<div class="check_message" id="picture_error">error message</div>
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