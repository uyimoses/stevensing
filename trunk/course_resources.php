<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";

//include leftside of courses
include "leftside_courses.php";

//include header of courses
include "header_course.php";
?>
<script>
	$("#left_tag_current").addClass("left_tag_5");
</script>
	<div class="block-bottom"></div>
	<div id="uploadres">
		<label for="file">Upload new resourse:</label>
		<form action="upload_res.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file" id="file"><br>
			<input type="submit" name="submit" value="Submit" id="ressubmit">
		</form><br>
	</div>
	<section id="resourse">
		<h1>Resourse</h1>
		<table>
			<tr>
				<td><b>Resourse Name</b></td>
				<td><b>Uploaded time</b></td>
				<td><b>Resourse Catalog</b></td>
				<td><b>Actions</b></td>
			</tr>
			<tr>
				<td>Blah</td>
				<td>Blah</td>
				<td>Foo</td>
				<td><form><input type="button" value="Download" download="filename.xxx" ><input type="button" value="Delete"></form></td>
			</tr>
		</table>
	</section>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";