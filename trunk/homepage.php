<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
//include leftside of home
include "leftside_home.php"
?>
<script>
	$("#left_tag_current").addClass("left_tag_1");
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

	function setNewsList(){
		$("#status_list>ul").html("");
		if (get_status && get_blog && get_event){
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
						+ "</span><a href='javascript:' onclick='deleteStatusInNews("
						+ status.status_id
						+ ")'>Delete</a></div><div class='OthersReply'><a href='javascript:'><span>First</span><span>Last</span></a><p>It's a nice day.</p>"
						+ "<span> 2013-11-13 14:56 </span><div><a href=''>Reply</a><a href=''>Delete</a></div></div>"
						+ "</section></li>";
				}
				else if (news.blog_id != undefined){
					var blog = news;
					html =  "<li class='friend_status_list'><img class='mini_picture' src='"
						+ status.picture_id
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
						+ "</span><a href='javascript:' onclick='deleteBlog("
						+ blog.blog_id
						+ ", \""
						+ blog.timestamp
						+ "\")'>Delete</a></div><div class='OthersReply'><a href='javascript:'><span>First</span><span>Last</span></a><p>It's a nice day.</p>"
						+ "<span> 2013-11-13 14:56 </span><div><a href=''>Reply</a><a href=''>Delete</a></div></div>"
						+ "</section></li>";
				}
				else if (news.event_id != undefined){
					var events = news;
					html =  "<li><span>"
						+ events.event_id
						+ "<span id='event_title'>"
						+ events.title
						+ "</span><br>Event Start: <span id='event_start'>"
						+ events.starttime
						+ "</span><br>Event End: <span id='event_end'>"
						+ events.endtime
						+ "</span><br>Max attendance: <span id='num'>"
						+ events.number
						+ "</span><br>Details:<span>"
						+ events.content
						+ "</span><br><div id='button'><a href='javascript:;' onclick='("
						+ events.events_id
						+ ")'>Attend</a></div></li>";
				}
				$(html).prependTo('#status_list>ul');
			}
		}
	}

	function addStatusToNews(obj){
		for (var i = 0; i < obj.status_list.length; i++){
			var key = Date.parse(obj.status_list[i].timestamp);
			//console.log(key);
			var value = obj.status_list[i];
			while(news_list[key] != undefined)
				key++;
			news_list[key] = value;
		}
		get_status = true;
		setNewsList();
	}

	function addBlogsToNews(obj){
		for (var i = 0; i < obj.blog_list.length; i++){
			var key = Date.parse(obj.blog_list[i].timestamp);
			//console.log(key);
			var value = obj.blog_list[i];
			while(news_list[key] != undefined)
				key++;
			news_list[key] = value;
		}
		get_blog = true;
		setNewsList();
	}

	function addEventsToNews(obj){
		for (var i = 0; i < obj.event_list.length; i++){
			var key = Date.parse(obj.event_list[i].timestamp);
			//console.log(key);
			var value = obj.event_list[i];
			while(news_list[key] != undefined)
				key++;
			news_list[key] = value;
		}
		get_event = true;
		setNewsList();
	}

	function refreshNews(){
		get_status = false;
		get_blog = false;
		get_event = false;
		news_list = new Array();
		action(
			"getStatusByEntityAction", 
			addStatusToNews, 
			defaultErrorHandler, 
			"POST", 
			{
				"id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"type": 1
			}
		);
		action(
			"getBlogByUserAction", 
			addBlogsToNews, 
			defaultErrorHandler, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				
			}
		);
		action(
			"getEventByEntityAction", 
			addEventsToNews, 
			defaultErrorHandler, 
			"POST", 
			{
				"id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"type": 1
			}
		);
	}

	$("#status_list").ready(
		refreshNews()
	);
</script>
<section class="span-14 main_view">
	<section id="status_list">
		<h1>All News:</h1>
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
						<span>2013-11-13 14:56</span>
						<a href="javascript:;">Reply</a>
					</div>

					<div class="OthersReply">
						<a href="">Xiao Han</a>
						<p>It's a nice day.</p>
						<span> 2013-11-13 14:56</span>
						<div>
						<a href="">reply</a>
						<a href="">delete</a>
						</div>
					</div>
					<li class="replyBox" >
				  			<img src="./images/profile_image.jpg" alt="" title="">
				  			<!-- <span><a href="#">Ruo&nbsp;Jia</a></span> -->
							<textarea name="reply" contenteditable="true"></textarea>
							<div><a href="#"> send</a></div>
						</li>
				<section>

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