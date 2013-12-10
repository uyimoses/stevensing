<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";

//include leftside of courses
include "leftside_courses.php";
?>
<script>
	$("#left_tag_current").addClass("left_tag_6");
</script>
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
	<div class="block-top"></div>
	<div id="contact-content">
		<span id="contact-text">Create new events:</span>
		<form id="statuseForm" method="post" name="statuseForm">
			<div id="form_box">
				<label for="title">Event title:</label>
				<input type="text" name="title" id="eventtitle" >
				<label for="starttime">Start datetime:</label>
			    <div id="datetimepicker" class="input-append">
					<input type="text"/>
					<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
					</span>
				</div>
				<label for="endtime">End datetime:</label>
			    <div id="datetimepicker2" class="input-append">
					<input type="text"/>
					<span class="add-on">
					<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
					</span>
				</div>
				<label for="title">Details:</label>
				<textarea class="fieldcourse"  name="message" contenteditable="true" placeholder="Write something about the event..."></textarea>
				<label for="num">Number of attendance:</label> <input type="text" name="num">
			<div id="button"><a href="#"> Create</a></div>
		</form>
	</div>
	
	<div class="block-bottom"></div>
	<div class="block-top"></div>
	<div id="event_list">
		<h1><span id="event_title">Pizza Night</span></h1>
		<ul>
			<li>Event Start: </span><span id="event_start">2013/12/09 12:12</span></li>
			<li>Event End: </span><span id="event_end">2013/12/09 20:12</span></li>
			<li>Max attendance: </span><span id="num">20</span></li>
			<li>Details:<span>Have fun!</span></li>
		</ul>
		<div id="button"><a href="#">Attend</a></div>
	</div>
	<div class="block-bottom"></div>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";