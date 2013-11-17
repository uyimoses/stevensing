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
			<label for="email">Stevens Email</label>
			<input type="text" name="email" placeholder="xxxxxx@stevens.edu" required>
			<label for="firstname">First Name</label>
			<input type="text" name="firstname" placeholder="First Name" required>
			<label for="lastname">Last Name</label>
			<input type="text" name="lastname" placeholder="Last Name" required>
			<label for="password">Create a Password</label>
			<input type="password" name="password" placeholder="At least 8 characters" required>
			<a href="javascript:" onclick="registerStep(2);"><div>Next</div></a>
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