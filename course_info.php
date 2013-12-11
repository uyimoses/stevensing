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
	$("#left_tag_current").addClass("left_tag_2");

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
			var html =  "<li class='friend_status_list'><img class='mini_picture' src='"
				+ review.picture_id
				+ "' alt='' title=''><div><span>"
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
				+ "<div class='replyBox'><img class='mini_picture' src='"
				+ review.picture_id
				+ "' alt='' title=''><textarea name='reply' contenteditable='true'></textarea>"
				+ "<div><a href='#'>Reply</a></div></div></section></li>";
			$(html).prependTo('#status_list>ul');
		}
	}

	function refreshReviews(){
		refreshCourseInfo();
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

<script>
	$("#left_tag_current").addClass("left_tag_3");

	function refreshStatusList(obj){
		$("#status_list>ul").html("");
		for(var i = 0; i < obj.status_list.length; i++){
			var status = obj.status_list[i];
			var html =  "<li class='course_status_list'><div><a href='course_info_"
				+ obj.entity_id
				+ "'><span>"
				+ status.department
				+ "</span>&nbsp;"
				+ "<span>"
				+ status.number
				+ "</span>&nbsp;"
				+ "<span>"
				+ status.name
				+ "</span></a></div><section><p>"
				+ status.content
				+ "</p><div class='replyline'><span>"
				+ status.timestamp
				+ "</span></div><div class='OthersReply'></div>"
				+ "<li class='replyBox'><img class='mini_picture' src='"
				+ status.picture_id
				+ "' alt='' title=''><textarea name='reply' contenteditable='true'></textarea>"
				+ "<div><a href='javascript:' onclick='addComment("
				+ status.status_id
				+ ", 1)'>Send</a></div></li></section></li>";
			$(html).prependTo('#status_list>ul');
		}
	}
	function refreshStatuses(){
		action(
			"getStatusByEntityAction", 
			refreshStatusList, 
			defaultErrorHandler, 
			"POST", 
			{
				"id": <?php echo (isset($_GET["course_id"]))?$_GET["course_id"]:0; ?>,
				"type": 2
			}
		);
	}

	$("#status_list").ready(
		refreshStatuses()
	);
</script>
	<section id="status_list">
		<h1>Recent News</h1>
		<ul>
			<li class="friend_status_list">
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Ruo</span>&nbsp;<span>Jia</span>
				</div>
				<section>
					<p>
						Have a great day!
					</p>
					<div class="replyline">
						<span >2013-11-13 14:56</span>
						<a  href="javascript:;">Reply</a>
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