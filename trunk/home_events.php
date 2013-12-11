<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
//include leftside of home
include "leftside_home.php"
?>
<script>
	$("#left_tag_current").addClass("left_tag_4");

	function refreshEventList(obj){
		$("#event_list>ul").html("");
		for(var i = 0; i < obj.event_list.length; i++){
			var events = obj.event_list[i];
			var html =  "<li><span>"
				+ events.event_id
				+ "<span id='event_title'>"
				+ events.title
				+ "</span></li><li>Event Start: </span><span id='event_start'>"
				+ events.starttime
				+ "</span></li><li>Event End: </span><span id='event_end'>"
				+ events.endtime
				+ "</span></li><li>Max attendance: </span><span id='num'>"
				+ events.number
				+ "</span></li><li>Details:<span>"
				+ events.content
				+ "</span></li><li><div id='button'><a href='javascript:;' onclick='addEventList("
				+ events.events_id
//				+ user.id
				+ ")'>Attend</a></div></li>"
				
			$(html).prependTo('#event_list>ul');
		}
	}
	function refreshEvents(){
		action(
			"getEventByEntityAction", 
			refreshEventList, 
			defaultErrorHandler, 
			"POST", 
			{
				"id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"type": 1
			}
		);
	}

	$("#event_list").ready(
		refreshEvents()
	);
</script>

<section class="span-14 main_view">
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
				<label for="num">Number of attendance:</label>
				<input type="int">
			<div id="button"><a href='javascript:' onclick='addEvent'> Create</a></div>
		</form>
	</div>
	<div class="block-bottom"></div>

	<div class="block-top"></div>
	<div id="event_list">
		<ul>
			<li><span>Id</span><span id="event_title">Pizza Night</span></li>
			<li>Event Start: </span><span id="event_start">2013/12/09 12:12</span></li>
			<li>Event End: </span><span id="event_end">2013/12/09 20:12</span></li>
			<li>Max attendance: </span><span id="num">20</span></li>
			<li>Details:<span>Have fun!</span></li>
			<li><div id="button"><a href="javascript:;" onclick="addEventList">Attend</a></div></li>
		</ul>
	</div>
	<div class="block-bottom"></div>
</section>

<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";