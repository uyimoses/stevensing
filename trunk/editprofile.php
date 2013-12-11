<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
//include leftside of home
include "leftside_home.php"

?>
<script >

	function setProfileDisplay(){
		 $("#firstname").val(user_profile.firstname);
		 $("#lastname").val(user_profile.lastname);
		 $("#middlename").val(user_profile.middlename);
		 $("#dob").val(user_profile.dob);
		 $("#year").val(user_profile.year);
		 $("#major>option[value="+user_profile.major+"]").attr("selected", "selected");
		 $("#degree>option[value="+user_profile.degree+"]").attr("selected", "selected");
		 $("#semester>option[value="+user_profile.semester+"]").attr("selected", "selected");
		 
	}
	function setProfileErrorDisplay(obj){


			 $("#firstname_error").text(obj.firstname_error);
			 $("#lastname_error").text(obj.lastname_error);
			 $("#middlename_error").text(obj.middlename_error);
			 $("#dob_error").text(obj.dob_error);
			 $("#major_error").text(obj.major_error);
			 $("#degree_error").text(obj.degree_error);
			 $("#semester_error").text(obj.semester_error);
			 $("#year_error").text(obj.year_error);
	}
	function updateProfile(){
			action(
				"editProfileAction", 
				setLeftside, 
				setProfileErrorDisplay, 
				"POST", 
				{
					"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
					"firstname": $("#firstname").val(),
					"middlename":$("#middlename").val(),
					"lastname":$("#lastname").val(),
					"gender":user_profile.gender,
					"dob": $("#dob").val(),
					"major": $("#major>option:selected").val(),
					"degree":$("#degree>option:selected").val(),
					"year":$("#year").val(),
					"semester":$("#semester>option:selected").val(),


				}
			);
		}

	
</script>
<section class="span-14 main_view">
	<div id="editprofile">
		<h1>Edit Profile</h1>
		<form >
			<!-- Creating an Account -->
			<!--
			<div id="uploadpic">
				<label for="firstname">Change Profile Picture</label>
				<form action="upload_file.php" method="post" enctype="multipart/form-data">
					<input type="file" name="file" id="file">
					<input type="submit" name="submit" value="Submit">
				</form><br>
			</div>
			-->
			<div>
			<label for="firstname" required>First Name</label>
			<input type="text" id="firstname" placeholder="First Name" onfocus="clearError(this);"><br>
			<span class="check_icon"></span>
			<div class="check_message" id="firstname_error"></div>
			</div>
			<div>
			<label for="middlename">Middle Name</label>
			<input type="text" id="middlename" placeholder="Middle Name"  onfocus="clearError(this);"><br>
			<span class="check_icon"></span>
			<div class="check_message" id="middle_error"></div>
			</div>
			<div>
			<label for="lastname">Last Name</label>
			<input type="text" id="lastname" placeholder="Last Name"  onfocus="clearError(this);"><br>
			<span class="check_icon"></span>
			<div class="check_message" id="lastname_error"></div>
			</div>
			<div>
			<label for="dob">Date of Birth</label>
			<input type="text" id="dob" onfocus="clearError(this);"><br>
			<span class="check_icon"></span>
			<div class="check_message" id="dob_error"></div>
			</div>
			<div>
			<label for="major">Major</label>
			<select id="major" size="1"  onfocus="clearError(this);">
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
			<label for="degree">Degree</label>
			<select id="degree"  size="1"  onfocus="clearError(this);">
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
			<label for="year">Entry Year</label>
			<input type="text" id="year" placeholder="Year"  onfocus="clearError(this);" >
			<span class="check_icon"></span>
				<div class="check_message" id="year_error"></div>
			</div>
			<div>
			<label for="entry_semester">Entry Semester</label>
			<select id="semester"  size="1"  onfocus="clearError(this);">
			<?php
			foreach ($semesters as $key => $value) {
				echo "<option value='$key'>$value</option>";
			}
			?>
			</select>
			<span class="check_icon"></span>
			<div class="check_message" id="semester_error"></div>
			</div>
			<input type="button" name="submit" value="Submit" onclick='updateProfile()'>
		</form>
	</div>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";