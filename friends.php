<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";

//include leftside of friends
include "leftside_friends.php";
?>
<script>
	$("#left_tag_current").addClass("left_tag_1");
	function setFriendList(obj){
		for(var i = 0; i < obj.friend_list.length; i++){
			var friend = obj.friend_list[i];
			var html = "<li><img src='./images/profile_image.jpg' alt='profile_picture' title=''><div><span>"
			 + friend.firstname
			  + "</span>&nbsp;<span>"
			   + friend.lastname + "</span></div><div><button>Add</button><button>Ignore</button></div></li>";
			$(html).prependTo('#friend_request>ul');
		}
	}
	$("#friend_list").ready(
		action(
			"getFriendListAction", 
			setFriendList, 
			defaultErrorHandler, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"status": 2
			}
		)
	);
</script>
<section class="span-14 main_view">
	<section id="friend_list">
		<h1>Friend List </h1>
		<span>Sort By</span>
			<select name="select">
				<option value="name" selected="selected">name</option>
				<option value="time" >time</option>
			</select>
		
		<ul>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Ruo</span>&nbsp;<span>Jia</span>
				</div>
				<a href="#" ><div>
					Delete
				</div></a>
			</li>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Xiao</span>&nbsp;<span>Han</span>
				</div>
				<a href="#" ><div>
					Delete
				</div></a>
			</li>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Cheng</span>&nbsp;<span>Liu</span>
				</div>
				<a href="#" ><div>
					Delete
				</div></a>
			</li>
		</ul>
	</section>
	
	

</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";