<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<div class="span-24 big_title">
	Forgot Your Password?
</div>
<!-- Creating an Account -->
<div class="forgot">
	<label for="email" class="required">Stevens Email:<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
	<input type="text" id="email" placeholder="xxxxxx@stevens.edu" required onblur="check_email(this);" value="<?php echo isset($_POST["email"])?$_POST["email"]:"";?>">
	<span class="check_icon"></span>
	<div class="check_message" id="email_error" id="email_error"></div>
</div>
<div class="forgot">
	<label for="password" class="required">Input Your Password::<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
	<input type="password" id="password" placeholder="At least 8 characters" required onblur="check_password(this);" value="<?php echo isset($_POST["password"])?$_POST["password"]:"";?>">
	<span class="check_icon"></span>
	<div class="check_message" id="password_error"></div>
</div>
<div class="forgot">
	<label for="password" class="required">Input Your New Password:</label>
	<input type="password" id="password" placeholder="At least 8 characters" required onblur="check_password(this);" value="<?php echo isset($_POST["password"])?$_POST["password"]:"";?>">
	<span class="check_icon"></span>
	<div class="check_message" id="password_error"></div>
</div>
<div class="forgot">
	<label for="password2" class="required">Re-type the Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input type="password" id="password2" placeholder="Type the password again" required onblur="check_password2(this);">
	<span class="check_icon"></span>
	<div class="check_message" id="password2_error"></div>
</div>
<div class="next_register_step" id="forgot"><a href="javascript:">Send Email</a></div>
<?php
//include page footer
include "footer.php";