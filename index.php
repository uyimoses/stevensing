<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<div class="span-24 last big_title">
	Enjoy your campus life at Stevens!
</div>
<section class="span-15">
	<img src="./images/big_logo.png" alt="big_logo" title="Let's Stevensing!" id="big_logo">
</section>
<section class="span-6 last" id="quick_sign">
	<h1>
		We are Stevensing!
	</h1>
	<form action="#" method="post">
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