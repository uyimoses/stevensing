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
	$("#left_tag_current").addClass("left_tag_4");

	$("#contact-content").ready(function(){
		$("#rating_select").change(function() {
			var rate = $("#rating_select>option:selected").val();
			for (var i = 0; i <= 5; i++){
				$("#raing_stars_display").removeClass('star_'+i);
			}
			$("#raing_stars_display").addClass('star_'+rate);
		});
	});

	function addReview(){

	}


</script>
	<div class="block-top"></div>
	<div id="contact-content">
		<div>
			<label>Select your rate:</label>
			<div class="star_rating star_0" id="raing_stars_display"></div>
			<select id="rating_select">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div class="block-bottom"></div>
			<div>
				<span id="contact-text">Input your comment:</span>
				<div id="form_box">
					<textarea class="fieldcourse"  name="message" contenteditable="true" placeholder="Write something about the course..."></textarea>
					<div id="button"><a href="#">Send</a>
				</div>
			</div>
		</div>
	</div>
	<section id="status_list">
		<h1>Recent statuses</h1>
		<ul>
			<li class="course_status_list">
				
				<div>
					<a href="#" ><span>CS</span>&nbsp;<span>546</span></a>
				</div>
				<section>
					<p>
						Welcome, everyone! Today is the CEO presentation!
					</p>
					<div class="replyline">
						<span>2013-11-13 14:56</span>
						<a href="javascript:;">Reply</a>
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

	
</ul>
</section>
	
	

</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";