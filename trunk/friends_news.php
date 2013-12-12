<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";

//include leftside of friends
include "leftside_friends.php";
?>
<script>
	$("#left_tag_current").addClass("left_tag_2");

	var countblog= 0;
	var countstatus = 0;
	var news_list = new Array();
	var get_status = false;
	var get_blog = false;
	var get_event = false;


	function deleteBlog(id, timestamp){
		action(
			"deleteBlogAction", 
			refreshNews, 
			defaultErrorHandler, 
			"POST", 
			{
				"blog_id": id,
				"timestamp": timestamp
			}
		);
	}

	function refreshFriendNewsList(){
		$("#status_list>ul").html("");
		if (get_status && get_blog ){
			for(var time in news_list){
				var news = news_list[time];
				var html = "";
				if (news.status_id != undefined){
					var status = news;
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
								+ "<li class='replyBox'><img class='mini_picture' src='<?php echo (isset($_SESSION['picture_id']))?$_SESSION['picture_id']:'./upload/picture/0.jpg' ?>' alt='mini_picture' title='mini_picture'><textarea name='reply' contenteditable='true'></textarea>"
								+ "<div><a href='javascript:' onclick='addComment("
								+ status.status_id
								+ ", 1)'>Reply</a></div></li></section></li>";
				}
				else if (news.blog_id != undefined){
					var blog = news;
					html =   "<li class='friend_status_list'><img class='mini_picture' src='"
							+ blog.picture_id
							+ "' alt='' title=''><div><span>"
							+ blog.firstname
							+ "</span>&nbsp;<span>"
							+ blog.lastname
							+ "</span></div><section><span>Title:"
							+ blog.title
							+"</span><p>"
							+ blog.content
							+ "</p><div class='replyline'><span>"
							+ blog.timestamp
							+ "</span></div><div class='OthersReply'><a href='javascript:'><span>First</span><span>Last</span></a><p>It's a nice day.</p>"
							+ "<span> 2013-11-13 14:56 </span><div><a href=''>Reply</a><a href=''>Delete</a></div></div>"
							+ "<li class='replyBox'><img class='mini_picture' src='<?php echo (isset($_SESSION['picture_id']))?$_SESSION['picture_id']:'./upload/picture/0.jpg' ?>' alt='mini_picture' title='mini_picture'><textarea name='reply' contenteditable='true'></textarea>"
							+ "<div><a href='javascript:' onclick='addComment("
							+ blog.blog_id
							+ ", 1)'>Reply</a></div></li></section></li>";
				}
				// else if (news.event_id != undefined){
				// 	var events = news;
				// 	html =  "<li><span>"
				// 		+ events.event_id
				// 		+ "<span id='event_title'>"
				// 		+ events.title
				// 		+ "</span><br>Event Start: <span id='event_start'>"
				// 		+ events.starttime
				// 		+ "</span><br>Event End: <span id='event_end'>"
				// 		+ events.endtime
				// 		+ "</span><br>Max attendance: <span id='num'>"
				// 		+ events.number
				// 		+ "</span><br>Details:<span>"
				// 		+ events.content
				// 		+ "</span><br><div id='button'><a href='javascript:;' onclick='("
				// 		+ events.events_id
				// 		+ ")'>Attend</a></div></li>";
				// }
				$(html).prependTo('#status_list>ul');
			}
		}
	}

	function createBlogList(obj){
		for (var i = 0; i < obj.blog_list.length; i++){
			var date = new Date("yyyy-mm-dd hh:mm:ss");
			var key = Date.parse(obj.blog_list[i].timestamp);
			//console.log(key);
			var value = obj.blog_list[i];
			while(news_list[key]!=undefined)
				key++;
			news_list[key] = value;
		}
				countblog ++;
				get_blog = true;
		if (countblog >= friend_list.length){
			refreshFriendNewsList();
		}
	}
	function createStatusList(obj){
		for (var i = 0; i < obj.status_list.length; i++){
			var key = Date.parse(obj.status_list[i].timestamp);
			//console.log(key);
			var value = obj.status_list[i];
			while(news_list[key]!=undefined)
				key++;
			news_list[key] = value;
		}
		countstatus ++;
		get_status = true;
		if (countstatus >= friend_list.length){
			refreshFriendNewsList();
		}
	}

	function refreshNews(){

		get_status = false;
		get_blog = false;
		get_event = false;
		news_list = new Array();
		for (var i = 0; i < friend_list.length; i++){
			action(
				"getBlogByUserAction", 
				createBlogList, 
				defaultErrorHandler, 
				"POST", 
				{
					"user_id": friend_list[i].user_id,
				}
			);
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
			refreshNews();
		}
		else{
			getFriendList();
		}
	});
</script>
<section class="span-14 main_view">
	<section id="status_list">
		<h1>All News:</h1>
		<ul>
			
		</ul>

	</section>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";