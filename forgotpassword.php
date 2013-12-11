<?php
//include page header, which includes mysqli connection and login form
include "header_login.php"
?>
<div class="span-24 big_title">
	Forgot Your Password?
</div>
<!-- Creating an Account -->
<div class="forgot">
	<label for="email" class="required">Stevens Email:<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
	<input type="text" id="email" placeholder="xxxxxx@stevens.edu" required onblur="check_email(this);" value="<?php echo isset($_POST["email"])?$_POST["email"]:"";?>">
	<span class="check_icon"></span>
	<div class="check_message" id="email_error" id="email_error"></div>
</div>
<div class="forgot">
	<label for="question" class="required">Input Your Security Question:</label>
	<input type="text" id="question" placeholder="Enter your question" required onblur="check_question(this);">
	<span class="check_icon"></span>
	<div class="check_message" id="question_error"></div>
</div>
<div class="forgot">
	<label for="answer" class="required">Input Your Security Answer:&nbsp;&nbsp;</label>
	<input type="text" id="answer" placeholder="Enter the answer" required onblur="check_answer(this);">
	<span class="check_icon"></span>
	<div class="check_message" id="answer_error"></div>
</div>
<div class="next_register_step" id="forgot"><a href="javascript:">Send Email</a></div>
<?php
//include page footer
include "footer.php";