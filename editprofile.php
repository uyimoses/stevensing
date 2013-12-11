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

		 $("firstname").val(user_profile.firstname);
		 $("lasttname").val(user_profile.lasttname);
		 $("middlename").val(user_profile.middlename);
		 $("lasttname").val(user_profile.laststname);
		 $("datepicker").val(user_profile.dob);
		 $("year").val(user_profile.entry_year);
		 var $major_set  =user_profile.major;
		 var $degree_set  =user_profile.dgree;
		 var $semester_set =user_profile.semester;
		 
	}

	
</script>
<section class="span-14 main_view">
	<div id="editprofile">
		<h1>Edit Profile</h1>
		<form action="./profile.php" method="post">
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
			<label for="firstname" required>First Name</label>
			<input type="text" id="firstname" placeholder="First Name" ><br>
			<label for="middlename">Middle Name</label>
			<input type="text" id="middlename" placeholder="Middle Name" ><br>
			<label for="lastname">Last Name</label>
			<input type="text" id="lastname" placeholder="Last Name" ><br>
			<label for="dob">Date of Birth</label>
			<input type="text" id="datepicker" /><br>
			<label for="major">Major</label>
			<select id="major"  size="1">
			<?php
					foreach ($majors as $key => $value) {
						if($value==$major_set)
							echo "<option value='$key'>$value</option>";
					}
			?>
			</select>
			<label for="degree">Degree</label>
			<select id="degree"  size="1">
			<?php
					foreach ($degrees as $value) {
						if($value==$degree_set)
						echo "<option value='$value'>$value</option>";
					}
			?>
			</select>
			<label for="year">Entry Year</label>
			<input type="text" id="year" placeholder="Year"  >
			<label for="entry_semester">Entry Semester</label>
			<select id="semester"  size="1">
			<?php
			foreach ($semesters as $key => $value) {
				if($value==$sememster_set)
				echo "<option value='$key'>$value</option>";
			}
			?>
			</select>
			<input type="submit" name="submit" value="Submit">
		</form>
	</div>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";