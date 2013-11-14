<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<div class="span-24 big_title">
	Joining Stevensing!
</div>
<section class="span-24" id="register_bar">
</section>
<section class="span-24" id="register_steps">
	<form action="register.php" method="post">
		<label for="email">Stevens Email</label>
		<input type="text" name="email" placeholder="xxxxxx@stevens.edu" required>
		<label for="firstname">First Name</label>
		<input type="text" name="firstname" placeholder="First Name" required>
		<label for="lastname">Last Name</label>
		<input type="text" name="lastname" placeholder="Last Name" required>
		<label for="password">Create a Password</label>
		<input type="password" name="password" placeholder="At least 8 characters" required>
		<input type="submit" value="Join Us">
	</form>
</section>
<?php

//include page footer
include "footer.php";