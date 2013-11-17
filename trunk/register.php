<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<script type="text/javascript">
	function registerStep(id){
		for(var i = 1; i<=4; i++){
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
		</ol>
	</section>
	<form action="./register.php" method="post">
		<!-- Creating an Account -->
		<section class="prepend-7 register_steps" id="register_step_1">
			<div>
				<label for="email">Stevens Email</label>
				<input type="text" name="email" placeholder="xxxxxx@stevens.edu" required value="<?php echo $_POST["email"]?>">
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="firstname">First Name</label>
				<input type="text" name="firstname" placeholder="First Name" required value="<?php echo $_POST["firstname"]?>">
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="firstname">Middle Name</label>
				<input type="text" name="middlename" placeholder="Middle Name" required>
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="lastname">Last Name</label>
				<input type="text" name="lastname" placeholder="Last Name" required value="<?php echo $_POST["lastname"]?>">
				<span class="check_icon"></span>
				<div class="check_message">error message</div>
			</div>
			<div>
				<label for="password">Create a Password</label>
				<input type="password" name="password" placeholder="At least 8 characters" required value="<?php echo $_POST["password"]?>">
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
			<div>
				<a href="javascript:" onclick="registerStep(2);"><div>Next</div></a>
			</div>
		</section>
		<!-- Creating a Profile -->
		<section class="prepend-7 register_steps" id="register_step_2">
		</section>
		<!-- Adding friends -->
		<section class="prepend-7 register_steps" id="register_step_3">
		</section>
		<!-- Adding courses -->
		<section class="prepend-7 register_steps" id="register_step_4">
		</section>
	</form>
</section>
<?php

//include page footer
include "footer.php";