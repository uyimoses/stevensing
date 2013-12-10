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
			var html =  "<li><img src='./images/profile_image.jpg' alt='' title=''><div><span>"
			 + friend.firstname
			  + "</span>&nbsp;<span>"
			   + friend.lastname
			    + "</span></div><a href='#'><div>Delete</div></a></li>";
			$(html).appendTo('#friend_list>ul');
		}
	}
	function refreshFriendList(){
		$("#friend_list>ul").html("");
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

	$("#friend_list").ready(function(){
		refreshFriendList();
	});
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
			
		</ul>
	</section>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";