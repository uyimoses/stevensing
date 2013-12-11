<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
//include leftside of courses
include "leftside_courses.php";
?>
<script>
	
</script>
<section class="span-14 main_view">
	<div id="editprofile">
	<h1>Add New Course</h1>
		<label for="department" class="required">Department:</label>
		<select id="department" size="1">
			<?php
			foreach ($majors as $key => $value) {
				echo "<option value='$key'>$value</option>";
			}
			?>
		</select>
		<label for="course_number">Course Number:</label>
		<input type="text" id="course_number" ><br>
		<label for="name">Course Name:</label>
		<input type="text" id="name"><br>
		<label for="description">Description</label>
		<textarea id="description"></textarea><br>
		<label for="professor">Professor</label>
		<input type="text" id="professor"><br>
		<input type="submit" name="submit" value="Submit">
	</div>
	<div class="block-bottom"></div>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";

