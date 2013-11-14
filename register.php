<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<div class="span-24 big_title">
	Joining Stevensing!
</div>
<section class="span-24" id="register_steps">
	<section class="span-24" id="register_bar">
		<ol>
			<a href="#"><li>Account Information</li></a>
			<a href="#"><li>Profile Information</li></a>
			<a href="#"><li>Friends</li></a>
			<a href="#"><li>Courses</li></a>
		</ol>
	</section>
	<form action="./register.php" method="post">
		<!-- Creating an Account -->
		<section id="register_step_1">
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
		<section id="register_step_2">
		</section>
		<!-- Adding friends -->
		<section id="register_step_3">
		</section>
		<!-- Adding courses -->
		<section id="register_step_4">
		</section>
	</form>
</section>
<?php

//include page footer
include "footer.php";