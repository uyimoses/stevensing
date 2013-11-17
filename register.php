<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<script type="text/javascript">
	$("#register_bar>li>a").hover(function() {
		/* Act on the event */
		alert(this.Id);
	});
</script>
<div class="span-24 big_title">
	Welcome to join Stevensing!
</div>
<section class="span-24" id="register_steps">
	<section class="span-24">
		<ul id="register_bar">
		  <li><a href="javascript:" id="register_bar_1" class="completed">Account Information</a></li>
		  <li><a href="#" id="register_bar_2">Profile Information</a></li>
		  <li><a href="#" id="register_bar_3">Adding Friends</a></li>
		  <li><a href="#" id="register_bar_4">Adding Courses</a></li>
		</ul>
	</section>
	<form action="./register.php" method="post">
		<!-- Creating an Account -->
		<section class="register_steps" id="register_step_1">
			<label for="email">Stevens Email</label>
			<input type="text" name="email" placeholder="xxxxxx@stevens.edu" required>
			<label for="firstname">First Name</label>
			<input type="text" name="firstname" placeholder="First Name" required>
			<label for="lastname">Last Name</label>
			<input type="text" name="lastname" placeholder="Last Name" required>
			<label for="password">Create a Password</label>
			<input type="password" name="password" placeholder="At least 8 characters" required>
			<input type="button" value="Next">
		</section>
		<!-- Creating a Profile -->
		<section class="register_steps" id="register_step_2">
		</section>
		<!-- Adding friends -->
		<section class="register_steps" id="register_step_3">
		</section>
		<!-- Adding courses -->
		<section class="register_steps" id="register_step_4">
		</section>
	</form>
</section>
<?php

//include page footer
include "footer.php";