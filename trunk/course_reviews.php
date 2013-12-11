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
			for (var i = 0; i <= 10; i++){
				$("#raing_stars_display").removeClass('star_'+i);
			}
			$("#raing_stars_display").addClass('star_'+rate*2);
		});
	});

	

	function addReview(){
		action(
			"addReviewAction", 
			refreshReviews, 
			defaultErrorHandler, 
			"POST", 
			{
				"course_id": <?php echo (isset($_GET["course_id"]))?$_GET["course_id"]:0; ?>,
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"score": $("#rating_select>option:selected").val(),
				"content": $("#review_content").val()
			}
		);
	}

	function refreshReviewList(obj){
		$("#status_list>ul").html("");
		for(var i = 0; i < obj.review_list.length; i++){
			var review = obj.review_list[i];
			var html =  "<li class='friend_status_list'><img src='./images/profile_image.jpg' alt='' title=''><div><span>"
				+ review.firstname
				+ "</span>&nbsp;<span>"
				+ review.lastname
				+ "</span></div><section><div class='star_rating_mini mini_star_"
				+ review.score * 2
				+ "'></div><p>"
				+ review.content
				+ "</p><div class='replyline'><span >2013-11-13 14:56</span></div><div class='OthersReply'>"
				+ "<a href=''><span>First</span>&nbsp;<span>Last</span></a><p>It's a nice day.</p>"
				+ "<span> 2013-11-13 14:56 </span><div><a href=''>Reply</a><a href=''>Delete</a></div></div>"
				+ "<div class='replyBox'><img src='./images/profile_image.jpg' alt='' title=''><textarea name='reply' contenteditable='true'></textarea>"
				+ "<div><a href='#'>Reply</a></div></div></section></li>";
			$(html).prependTo('#status_list>ul');
		}
	}

	function refreshReviews(){
		action(
			"getReviewByCourseAction", 
			refreshReviewList, 
			defaultErrorHandler, 
			"POST", 
			{
				"course_id": <?php echo (isset($_GET["course_id"]))?$_GET["course_id"]:0; ?>
			}
		);
	}

	$("#status_list").ready(
		refreshReviews()
	);

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
					<textarea class="fieldcourse"  id="review_content" contenteditable="true" placeholder="Write something about the course..."></textarea>
					<div id="button"><a href="javascript:" onclick="addReview();">Send</a></div>
			</div>
		</div>
	</div>
	<section id="status_list">
		<h1>Recent statuses</h1>
		<ul>
			<li class="friend_status_list">
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Ruo</span>&nbsp;<span>Jia</span>
				</div>
				<section>
					<div class="star_rating_mini"></div>
					<p>
						Have a great day!
					</p>
					<div class="replyline">
						<span >2013-11-13 14:56</span>
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
					
					<div class="replyBox">
				  		<img src="./images/profile_image.jpg" alt="" title="">
						<textarea name="reply" contenteditable="true"></textarea>
						<div><a href="#">Reply</a></div>
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