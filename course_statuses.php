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
	$("#left_tag_current").addClass("left_tag_3");
	function addComment(){

	}

	function addStatus(id, type){
		action(
			"addStatusAction", 
			refreshStatuses, 
			defaultErrorHandler, 
			"POST", 
			{
				"id": id,
				"type": type,
				"content": $("#content").val()
			}
		);
	}

	function refreshStatusList(obj){
		$("#status_list>ul").html("");
		for(var i = 0; i < obj.status_list.length; i++){
			var status = obj.status_list[i];
			var html =  "<li class='course_status_list'><div><a href='course_info_"
				+ obj.entity_id
				+ "'><span><?php echo isset($_SESSION['department'])?$_SESSION['department']:'';?></span>&nbsp;"
				+ "<span><?php echo isset($_SESSION['number'])?$_SESSION['number']:'';?></span>&nbsp;"
				+ "<span><?php echo isset($_SESSION['name'])?$_SESSION['name']:'';?></span></a></div><section><p>"
				+ status.content
				+ "</p><div class='replyline'><span>"
				+ status.timestamp
				+ "</span></div><div class='OthersReply'></div>"
				+ "<li class='replyBox'><img src='./images/profile_image.jpg' alt='' title=''><textarea name='reply' contenteditable='true'></textarea>"
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
	<div class="block-top"></div>
	<div id="contact-content">
		<span id="contact-text">Create new Status:</span>
		<form id="statuseForm" method="post" name="statuseForm">
			<div id="form_box">
			<textarea class="fieldcourse"  id="content" contenteditable="true" placeholder="Create status about the course..."></textarea>
			<div id="button"><a href="javascript:" onclick="addStatus(<?php echo (isset($_GET["course_id"]))?$_GET["course_id"]:0; ?>, 2)">Send</a></div>
		  </div>
		</form>
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