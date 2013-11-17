<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#main_menu ul a:nth-child(1)").addClass('current');
	//$("#left_tag_current").addClass("left_tag_1");
</script>
<nav id="left_tags">
		<ul>
			<li>All News</li>
			<li>Statuses</li>
			<li>Blogs</li>
			<li>Events</li>
		</ul>
	</nav>
</section><!-- end of leftside -->
<section class="span-14 main_view">
	<h1>Edit Profile</h1>
	<form action="./profile.php" method="post">
		<!-- Creating an Account -->
		<section id="edit_profile">
			<div id="uploadpic">
				<label for="firstname">Change Profile Picture</label>
				<form action="upload_file.php" method="post" enctype="multipart/form-data">
					<input type="file" name="file" id="file"><br>
					<input type="submit" name="submit" value="Submit"><br>
				</form><br>
			</div>
			<label for="firstname">First Name</label>
			<input type="text" name="firstname" placeholder="First Name" ><br>
			<label for="firstname">Middle Name</label>
			<input type="text" name="middlename" placeholder="Middle Name" ><br>
			<label for="lastname">Last Name</label>
			<input type="text" name="lastname" placeholder="Last Name" ><br>
			<label for="lastname">Last Name</label>
			<input type="text" name="lastname" placeholder="Last Name" ><br>
			<label for="dob">Date of Birth</label>
			<input type="text" id="datepicker" /><br>
			<label for="major">Major</label>
			<input type="text" name="major" placeholder="Major" ><br>
			<label for="degree">Degree</label>
			<input type="text" name="degree" placeholder="Degree" ><br>
			<label for="entry_year">Entry Year</label>
			<select>
				<option value="2014">2014</option>
				<option value="2013">2013</option>
				<option value="2012" selected="selected">2012</option>
				<option value="2011">2011</option>
				<option value="2010">2010</option>
				<option value="2009">2009</option>
				<option value="2008">2008</option>
				<option value="2007">2007</option>
				<option value="2006">2006</option>
				<option value="2005">2005</option>
			</select><br>
			<label for="entry_semester">Entry Semester</label>
			<select>
				<option value="Fall">Fall</option>
				<option value="Spring">Spring</option>
			</select><br>
		</section>
	</form>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";