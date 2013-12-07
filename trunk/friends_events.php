<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";

//include leftside of friends
include "leftside_friends.php";
?>
<script>
	$("#left_tag_current").addClass("left_tag_4");
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
			<div id="button"><a href="#"> Create</a></div>
		</form>
	</div>
	<section id="status_list">
		<h1>Recent events</h1>
		<ul>
			<li class="friend_status_list">
				
				<div>
					<a href="#" ><span>CS</span>&nbsp;<span>546</span></a>
				</div>
				<section>
					<p>
						Have a great day!
					</p>
					<div>
						<span>2013-11-13 14:56</span><a href="javascript:;">Reply</a>
					</div>
					<div class="OthersReply">
						<a href="">Xiao Han</a>
						<p>It's a nice day.</p>
						<span> 2013-11-13 14:56 </span>
						<div>
						<a href="">reply</a>
						<a href="">delete</a>
						</div>
					</div>
					
					<li class="replyBox" >
				  		<img src="./images/profile_image.jpg" alt="" title="">
						<textarea name="reply" contenteditable="true"></textarea>
						<div><a href="#"> send</a></div>
					</li>
				</section>
			</li>
			<li class="friend_status_list">
				
				<div>
					<a href="#" ><span>CS</span>&nbsp;<span>546</span></a>
				</div>
				<section>
					<p>
						I heard that you're settled down
						That you found a girl and you're married now
						I heard that your dreams came true
						Guess she gave you things I didn't give to you

						Old friend, why are you so shy?
						Ain't like you to hold back or hide from the light

						I hate to turn up out of the blue, uninvited
						But I couldn't stay away, I couldn't fight it
						I had hoped you'd see my face and that you'd be reminded
						That for me, it isn't over
					</p>
					<div>
						<span>2013-11-13 14:56</span><a href="javascript:;">Reply</a>
					</div>
				</section>
			</li>
		</ul>
	</section>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";