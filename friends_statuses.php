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

	var status_list = new Array();
	var count = 0;

	function refreshStatusList(){
		$("#status_list>ul").html("");
		for(var time in status_list){
			var status = status_list[time];
			var html =  "<li class='friend_status_list'><img class='mini_picture' src='"
				+ status.picture_id
				+ "' alt='' title=''><div><span>"
				+ status.firstname
				+ "</span>&nbsp;<span>"
				+ status.lastname
				+ "</span></div><section><p>"
				+ status.content
				+ "</p><div class='replyline'><span>"
				+ status.timestamp
				+ "</span></div><div class='OthersReply'><a href='javascript:'><span>First</span><span>Last</span></a><p>It's a nice day.</p>"
				+ "<span> 2013-11-13 14:56 </span><div><a href=''>Reply</a><a href=''>Delete</a></div></div>"
				+ "<li class='replyBox'><img src='./images/profile_image.jpg' alt='' title=''><textarea name='reply' contenteditable='true'></textarea>"
				+ "<div><a href='javascript:' onclick='addComment("
				+ status.status_id
				+ ", 1)'>Reply</a></div></li></section></li>";
			$(html).prependTo('#status_list>ul');
		}
	}


	function createStatusList(obj){
		for (var i = 0; i < obj.status_list.length; i++){
			var key = Date.parse(obj.status_list[i].timestamp);
			//console.log(key);
			var value = obj.status_list[i];
			while(status_list[key]!=undefined)
				key++;
			status_list[key] = value;
		}
		count ++;
		if (count >= friend_list.length){
			refreshStatusList();
		}
	}

	function refreshStatuses(){
		for (var i = 0; i < friend_list.length; i++){
			action(
				"getStatusByEntityAction", 
				createStatusList, 
				defaultErrorHandler, 
				"POST", 
				{
					"id": friend_list[i].user_id,
					"type": 1
				}
			);
		}
	}

	$("#status_list").ready(function(){
		if (friend_list != undefined){
			refreshStatuses();
		}
		else{
			getFriendList();
		}
	});
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