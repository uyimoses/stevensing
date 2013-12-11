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
	function deleteFriend(friend_id){
		action(
			"deleteFriendAction", 
			getFriendList, 
			defaultErrorHandler, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"friend_id": friend_id
			}
		);
	}

	function setFriendListDisplay(){
		$("#friend_list>ul").html("");
		for(var i = 0; i < friend_list.length; i++){
			var friend = friend_list[i];
			var html =  "<li><img class='mini_picture' src='"
				+ friend.picture_id
				+ "' alt='' title=''><div><span>"
			 	+ friend.firstname
			 	+ "</span>&nbsp;<span>"
			  	+ friend.lastname
			  	+ "</span></div><a href='javascript:' onclick='deleteFriend("
			    + friend.user_id
			    +")'><div>Delete</div></a></li>";
			$(html).appendTo('#friend_list>ul');
		}
	}

	$("#friend_list").ready(function(){
		if (friend_list != undefined){
			setFriendListDisplay();
		}
		else{
			getFriendList();
		}
	});
</script>
<section class="span-14 main_view">
	<section id="friend_list">
		<h1>Friend List </h1>
		
		<ul>
			
		</ul>
	</section>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";