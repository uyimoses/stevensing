<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<script>
	var user_id = -1;
	var error_messages = {
		1: 'picture',
		2: 'semester',
		3: "year", 
		4: 'degree',
		5: 'major',
		6: 'dob',
		7: 'gender',
		8: 'lastname',
		9: "middlename",
		10: 'firstname',
		11: 'answer',
		12: 'question',
		13: 'password2',
		14: 'password',
		15: 'email'
	};
	function registerStep(id){
		if (id>5){
			id = 5;
		}
		else if (id<1){
			id = 1;
		}
		//register
		if (id>=4 && user_id < 0){
			if (!register())
				return false;
		}
		//valication step 1 and step 2
		if (id==2 || id==3){
			if (valication(id-1)>0)
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
	function errorFocus(i){
		if (i>0){
			if (i<=10){
				registerStep(2);
				$("#"+error_messages[i]).focus();
			}
			else{
				registerStep(1);
				$("#"+error_messages[i]).focus();
			}
		}
	}
	function valication(i){
		var error = 0;
		if (i==0){
			if (!check_password() && error < 14){
				error = 14;
			}
			if (!check_email() && error < 15){
				error = 15;
			}
		}
		if (i>=1){
			if (!check_answer() && error < 11){
				error = 11;
			}
			if (!check_question() && error < 12){
				error = 12;
			}
			if (!check_password2() && error < 13){
				error = 13;
			}
			if (!check_password() && error < 14){
				error = 14;
			}
			if (!check_email() && error < 15){
				error = 15;
			}
		}
		if (i>=2){
			if (!check_year() && error < 3){
				error = 3;
			}
			if (!check_dob() && error < 6){
				error = 6;
			}
			if (!check_lastname() && error < 8){
				error = 8;
			}
			if (!check_middlename() && error < 9){
				error = 9;
			}
			if (!check_firstname() && error < 10){
				error = 10;
			}
		}
		errorFocus(error);
		return error;
	}
	function errorMessage(obj){
		var error = 0;
		$("#email_error").text(obj.email_error);
		if ($("#email_error").text() != "" && error < 15){
			error = 15;
		}
		$("#password_error").text(obj.password_error);
		if ($("#password_error").text() != "" && error < 14){
			error = 14;
		}
		$("#question_error").text(obj.question_error);
		if ($("#question_error").text() != "" && error < 12){
			error = 12;
		}
		$("#answer_error").text(obj.answer_error);
		if ($("#answer_error").text() != "" && error < 11){
			error = 11;
		}
		$("#firstname_error").text(obj.firstname_error);
		if ($("#firstname_error").text() != "" && error < 10){
			error = 10;
		}
		$("#middlename_error").text(obj.middlename_error);
		if ($("#middlename_error").text() != "" && error < 9){
			error = 9;
		}
		$("#lastname_error").text(obj.lastname_error);
		if ($("#lastname_error").text() != "" && error < 8){
			error = 8;
		}
		$("#gender_error").text(obj.gender_error);
		if ($("#gender_error").text() != "" && error < 7){
			error = 7;
		}
		$("#dob_error").text(obj.dob_error);
		if ($("#dob_error").text() != "" && error < 6){
			error = 6;
		}
		$("#major_error").text(obj.major_error);
		if ($("#major_error").text() != "" && error < 5){
			error = 5;
		}
		$("#degree_error").text(obj.degree_error);
		if ($("#degree_error").text() != "" && error < 4){
			error = 4;
		}
		$("#year_error").text(obj.year_error);
		if ($("#year_error").text() != "" && error < 3){
			error = 3;
		}
		$("#semester_error").text(obj.semester_error);
		if ($("#semester_error").text() != "" && error < 2){
			error = 2;
		}
		errorFocus(error);
	}
	function setId(obj){
		user_id = obj.user_id;
	}
	function register(){
		if (valication(3)==0){
			action(
				"registerAction", 
				setId,
				errorMessage, 
				"POST", 
				{
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
				}
			);
		}
		else
			return false;
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
			<li><span>Adding Courses</span></li>
			<li><span>Adding Friends</span></li>
		</ol>
	</section>
	<div name="registerForm">
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
				<input type="text" id="question" placeholder="Enter a question" required onblur="check_question(this);">
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
				<input type="text" id="middlename" placeholder="Middle Name" onblur="check_middlename(this);">
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
					<input type="radio" name="gender" id="male" value="M" checked><label for="male">Male</label>
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
			<!-- upload picture -->
			<div>
				<label for="file">Profile Picture</label>
				<form id="uploadForm" enctype="multipart/form-data">
					<input type="file" name="file" id="file">
					<button onclick="upload();">Upload</button>
				</form>
				<div id="preview"></div>
				<span class="check_icon"></span>
				<div class="check_message" id="picture_error"></div>
			</div>
			<div class="next_register_step">
				<a href="javascript:" onclick="registerStep(1);">Back</a>
				<a href="javascript:" onclick="registerStep(3);">Next</a>
			</div>
		</section>
		<!-- Policy Confirmation -->
		<section class="register_steps" id="register_step_3">

			<div class="next_register_step">
				<a href="javascript:" onclick="registerStep(2);">Back</a>
				<a href="javascript:" onclick="window.location.href='welcome';">Deny</a>
				<a href="javascript:" onclick="registerStep(4);">Register</a></div>
		</section>
		<!-- Adding courses -->
		<script type="text/javascript">

			function setCourseList(obj){
				$("#course_list>tbody").html("");
				for(var i = 0; i < obj.course_list.length; i++){
					var course = obj.course_list[i];
					var html =  "<tr><td>"
						+ course.department
						+ "</td><td>"
						+ course.number
						+ "</td><td>"
						+ course.name
						+ "</td><td>"
						+ course.professor
						+ "</td><td><input type='button' value='Add'><input type='button' value='Delete'></td>";
					$(html).appendTo('#course_list>tbody');
				}
			}
			function refreshCourseList(){
				action(
					"getALLCourseAction", 
					setCourseList, 
					defaultErrorHandler, 
					"POST", 
					{

					}
				);
			}

			$("#course_list").ready(function(){
				refreshCourseList();
			});

		</script>
		<section class="register_steps" id="register_step_4">
			<table id="course_list">
				<thead>
					<td><b>Department</b></td>
					<td><b>Course number</b></td>
					<td><b>Course name</b></td>
					<td><b>Professor</b></td>
					<td><b>Actions</b></td>
				</thead>
				<tbody id="course_list">
					<tr>
						<td>Blah</td>
						<td>Blah</td>
						<td>Blah</td>
						<td>Foo</td>
						<td><input type="button" value="Add" ><input type="button" value="Delete"></td>
					</tr>
				</tbody>
			</table>
			<div class="next_register_step">
				<a href="javascript:" onclick="registerStep(5);">Skip</a>
				<a href="javascript:" onclick="addfriends();registerStep(5);">Done</a>
			</div>
		</section>
		<!-- Adding friends -->
		<section class="register_steps" id="register_step_5">
			<div class="next_register_step">
				<a href="javascript:" onclick="registerStep(4);">Back</a>
				<a href="javascript:" onclick="window.location.href='home';">Skip</a>
				<a href="javascript:" onclick="addcourses();window.location.href='home'">Done</a>
			</div>
		</section>
	</div>
</section>
<?php

//include page footer
include "footer.php";