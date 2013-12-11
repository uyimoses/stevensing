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
	$("#left_tag_current").addClass("left_tag_6");
</script>
	<div class="block-top"></div>
	<div id="contact-content">
		<span id="contact-text">Create new events:</span>
		<form id="statuseForm" method="post" name="statuseForm">
			<div id="form_box">
				<label for="title">Event title:</label>
				<input type="text" name="title" id="eventtitle" >
				<div class="check_message" id="title_error"></div>
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