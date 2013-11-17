<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<script type="text/javascript">
	function registerStep(id){
		for(var i = 1; i<=5; i++){
			$("#register_step_"+i).hide();
			if (i==id){
				$("#register_bar li:nth-child("+i+")>a").addClass("current");
			}
			else if (i<id){
				$("#register_bar li:nth-child("+i+")>a").addClass("completed");
				$("#register_bar li:nth-child("+i+")>a").removeClass("current");
			}
			else{
				$("#register_bar li:nth-child("+i+")>a").removeClass("current");
				$("#register_bar li:nth-child("+i+")>a").removeClass("completed");
			}
				
		}
		$("#register_step_"+id).show();
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
		  <li><a href="javascript:" onclick="registerStep(1);" class="current">Account Information</a></li>
		  <li><a href="javascript:" onclick="registerStep(2);">Profile Information</a></li>
		  <li><a href="javascript:" onclick="registerStep(3);">Adding Friends</a></li>
		  <li><a href="javascript:" onclick="registerStep(4);">Adding Courses</a></li>
		  <li><a href="javascript:" onclick="registerStep(5);">Get Start</a></li>
		</ol>
	</section>
	<form action="./register.php" method="post">
		<!-- Creating an Account -->
		<section class="register_steps" id="register_step_1">
			<div>
				<label for="email">Stevens Email</label>
				<input type="text" name="email" placeholder="xxxxxx@stevens.edu" required value="<?php echo isset($_POST["email"])?$_POST["email"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="password">Create a Password</label>
				<input type="password" name="password" placeholder="At least 8 characters" required value="<?php echo isset($_POST["password"])?$_POST["password"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="password2">Re-type the Password</label>
				<input type="password" name="password2" placeholder="Type the password again" required>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="question">Security Question</label>
				<input type="text" name="question" placeholder="Enter or select your question" required>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="answer">Security Answer</label>
				<input type="text" name="answer" placeholder="Enter the answer" required>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div class="next_register_step"><a href="javascript:" onclick="registerStep(2);">Next</a></div>
		</section>
		<!-- Creating a Profile -->
		<section class="register_steps" id="register_step_2">
			<div>
				<label for="firstname">First Name</label>
				<input type="text" name="firstname" placeholder="First Name" required value="<? echo isset($_POST["firstname"])?$_POST["firstname"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="middle">Middle Name</label>
				<input type="text" name="middlename" placeholder="Middle Name" required>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="lastname">Last Name</label>
				<input type="text" name="lastname" placeholder="Last Name" required value="<?php echo isset($_POST["lastname"])?$_POST["lastname"]:"";?>">
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label>Gender</label>
				<div>
					<input type="radio" name="gender" id="male" value="M" checked><label for="male">Male</label>
					<input type="radio" name="gender" id="female" value="F"><label for="female">Female</label>
				</div>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="dob">Date of Birth</label>
				<input type="text" name="dob" placeholder="Select your birthday" required id="dob">
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="major">Major</label>
				<input type="text" name="major" placeholder="Major" required>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="degree">Degree</label>
				<input type="text" name="degree" placeholder="Degree" required>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="year">Entry Year</label>
				<input type="text" name="year" placeholder="Year" required>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="semester">Entry Semester</label>
				<input type="text" name="semester" placeholder="Semester" required>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="picture">Profile Picture</label>
				<div>File Upload</div>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div class="next_register_step"><a href="javascript:" onclick="registerStep(1);">Back</a><a href="javascript:" onclick="registerStep(3);">Next</a></div>
		</section>
		<!-- Adding friends -->
		<section class="register_steps" id="register_step_3">
			<div class="next_register_step"><a href="javascript:" onclick="registerStep(2);">Back</a><a href="javascript:" onclick="registerStep(4);">Next</a></div>
		</section>
		<!-- Adding courses -->
		<section class="register_steps" id="register_step_4">
			<div class="next_register_step"><a href="javascript:" onclick="registerStep(3);">Back</a><a href="javascript:" onclick="registerStep(5);">Done</a></div>
		</section>
		<!-- Get Start -->
		<section class="register_steps" id="register_step_5">
			<div>Some Guide here, and jump to <a href="./homepage.php">homepage</a>.</div>
		</section>
	</form>
</section>
<?php

//include page footer
include "footer.php";