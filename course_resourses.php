<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#main_menu ul a:nth-child(5)").addClass('current');
	$("#left_tag_current").addClass("left_tag_5");
</script>
<nav id="left_tags">
		<ul>
			<a href="./courses.php"><li>Return Course List</li></a>
			<a href="./courseinfo.php"><li>Course News</li></a>
			<a href="course_statuses.php"><li>Statuses</li></a>
			<a href="course_reviews.php"><li>Reviews</li></a>
			<a href="course_resourses.php"><li>Resources</li></a>
			<a href="course_events.php"><li>Events</li></a>
		</ul>
	</nav>
</section><!-- end of leftside -->
<section class="span-14 main_view">
	<div id="courseinfo">
		<h1><span id="department">CS</span><span id="number">546</span><span>Web Development</span></h1>
		<div id="lcourse">
			<p id="professor">Steven A Gabarro</p>
			<p id="description">This course will provide students with a first strong approach of internet programming. It gives the basic knowledge on how the Internet works and how to create advanced web sites by the use of script languages, after learning the basics of HTML. The course will teach the students the skills required in any business such as proper team work and coordination between groups.</p>
		</div>
		<div id="rcourse">
			<div><a href="./courses.php">Back to List</a></div>
			<div>Course Rating: <span>4.0</span></div>
			<div class="star_rating star_4"></div>
		</div>		
	</div>

	<div id="uploadres">
		<label>Upload new resourse:</label>
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