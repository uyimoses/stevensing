<script>
	function setFriendRequest(obj){
		console.log(obj.friend_list.length)
		for(var i=0;i<obj.friend_list.length;i++){
			var friend = obj.friend_list[i];
			var html = "<li><img src='./images/profile_image.jpg' alt='profile_picture' title=''><div><span>"
			 + friend.firstname
			  + "</span>&nbsp;<span>"
			   + friend.lastname + "</span></div><div><button>Add</button><button>Ignore</button></div></li>";
			$(html).prependTo('#friend_request>ul');
		}
		
	}

	$("#friend_request").ready(
		action(
			"getFriendListAction", 
			setFriendRequest, 
			defaultErrorHandler, 
			"POST", 
			{
				"user_id": 11,
				"status": 1
			}
		)
	);
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