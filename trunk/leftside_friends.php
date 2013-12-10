	<script type="text/javascript">
		$("#main_menu ul a:nth-child(2)").addClass('current');
		var friend_list;
		function setFriendList(obj){
			friend_list = obj.friend_list;
			try{
				setFriendListDisplay();
			}
			catch(e){
				//do nothing
			}
		}
		function getFriendList(){
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

		$("#left_tags").ready(function(){
			getFriendList();
		});
	</script>
	<nav id="left_tags">
		<ul>
			<a href="friends"><li>Friend List</li></a>
			<a href="friends_news"><li>Friend News</li></a>
			<a href="friends_statuses"><li>Statuses</li></a>
			<a href="friends_blog"><li>Blog</li></a>
			<a href="friends_events"><li>Events</li></a>
		</ul>
	</nav>
</section><!-- end of leftside -->