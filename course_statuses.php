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
				+ "<li class='replyBox'><img class='mini_picture' src='<?php echo (isset($_SESSION['picture_id']))?$_SESSION['picture_id']:'./upload/picture/0.jpg' ?>' alt='mini_picture' title='mini_picture'><textarea name='reply' contenteditable='true'></textarea>"
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
			<textarea class="fieldcourse"  id="status_content" contenteditable="true" placeholder="Create status about the course..." onfocus="clearError(this);"></textarea>
			<div class="check_message" id="content_error"></div>
			<div id="button"><a href="javascript:" onclick="addStatus(<?php echo (isset($_GET["course_id"]))?$_GET["course_id"]:0; ?>, 2)">Send</a></div>
		  </div>
		</form>
	</div>
	<section id="status_list">
		<h1>Recent statuses</h1>
		<ul>
			
		</ul>
	</section>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";