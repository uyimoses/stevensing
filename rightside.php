<script>
	function refreshFriends(obj){
		refreshFriendRequest();
		try{
			refreshFriendList();
		}
		catch(e){
			
		}
	}

	function acceptFriendRequest(friend_id){
		action(
			"acceptFriendAction", 
			refreshFriends, 
			defaultErrorHandler, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"friend_id": friend_id
			}
		);
	}

	function setFriendRequest(obj){
		$("#friend_request>ul").html("");
		for(var i = 0; i < obj.friend_list.length; i++){
			var friend = obj.friend_list[i];
			var html = "<li><img status.picture_id src='"
				+ friend.picture_id
				+ "' alt='profile_picture' title=''><div><span>"
			 	+ friend.firstname
			  	+ "</span>&nbsp;<span>"
			   	+ friend.lastname + "</span></div><div><button onclick='acceptFriendRequest("
			   	+ friend.user_id
			   	+ ");'>Add</button><button onclick='denyFriendRequest("
			   	+ friend.user_id
			   	+ ")'>Ignore</button></div></li>";
			$(html).prependTo('#friend_request>ul');
		}
	}

	function refreshFriendRequest(){
		action(
			"getFriendListAction", 
			setFriendRequest, 
			defaultErrorHandler, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"status": 1
			}
		);
	}

	$("#friend_request").ready(function(){
		refreshFriendRequest();
	});
</script>
<section id="rightside" class="span-6 last">
	<section id="friend_request">
		<h1>Friend Requests</h1>
		<ul>
		</ul>
	</section>
	<section id="message">
		<h1>Recent Comments</h1>
		<ul>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Ruo</span>&nbsp;<span>Jia</span>
				</div>
				<section>
					<p>
						Have a great day!
					</p>
					<div>
						<span>2013-11-13 14:56</span><a href="javascript:;">Reply</a>
					</div>
				<section>
			</li>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Steven</span>&nbsp;<span>Gabarro</span>
				</div>
				<section>
					<p>
						I heard that you're settled down
						That you found a girl and you're married now
						I heard that your dreams came true
						Guess she gave you things I didn't give to you

						Old friend, why are you so shy?
						Ain't like you to hold back or hide from the light

						I hate to turn up out of the blue, uninvited
						But I couldn't stay away, I couldn't fight it
						I had hoped you'd see my face and that you'd be reminded
						That for me, it isn't over
					</p>
					<div>
						<span>2013-11-13 14:56</span><a href="javascript:;">Reply</a>
					</div>
				<section>
			</li>
		</ul>
	</section>
</section>