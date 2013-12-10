<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";

//include leftside of friends
include "leftside_friends.php";
?>
<script>
	$("#left_tag_current").addClass("left_tag_3");

	function refreshStatusList(obj){
		$("#status_list>ul").html("");
		for(var i = 0; i < obj.status_list.length; i++){
			var status = obj.status_list[i];
			var html =  "<li class='friend_status_list'><img src='./images/profile_image.jpg' alt='' title=''><div><span>"
				+ status.firstname
				+ "</span>&nbsp;<span>"
				+ status.lastname
				+ "</span></div><section><p>"
				+ status.content
				+ "</p><div class='replyline'><span>"
				+ status.timestamp
				+ "</span><a href='javascript:' onclick='deleteStatus("
				+ status.status_id
				+ ", \""
				+ status.timestamp
				+ "\")'>Delete</a></div><div class='OthersReply'><a href='javascript:'><span>First</span><span>Last</span></a><p>It's a nice day.</p>"
				+ "<span> 2013-11-13 14:56 </span><div><a href=''>reply</a><a href=''>delete</a></div></div>"
				+ "<li class='replyBox'><img src='./images/profile_image.jpg' alt='' title=''><textarea name='reply' contenteditable='true'></textarea>"
				+ "<div><a href='javascript:' onclick='addComment("
				+ status.status_id
				+ ", 1)'>Send</a></div></li></section></li>";
			$(html).prependTo('#status_list>ul');
		}
	}

	function createStatusList(obj){

	}

	function refreshStatuses(){
		action(
			"getFriendListAction", 
			setFriendList, 
			defaultErrorHandler, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"status": 2
			}
		);
	}

	$("#status_list").ready(
		refreshStatuses()
	);
</script>
<section class="span-14 main_view">
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