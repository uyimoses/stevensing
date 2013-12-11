<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";

//include leftside of courses
include "leftside_courses.php";

//include header of courses
include "header_course.php";
?>
<script>
	$("#left_tag_current").addClass("left_tag_2");

	var news_list = new Array();
	var get_status = false;
	var get_review = false;
	// var get_event = false;

	// function deleteReview(id, timestamp){
	// 	action(
	// 		"deleteReviewAction", 
	// 		refreshNews, 
	// 		defaultErrorHandler, 
	// 		"POST", 
	// 		{
	// 			"course_id": id,
	// 			"timestamp": timestamp
	// 		}
	// 	);
	// }

	function setNewsList(){
		$("#status_list>ul").html("");
		if (get_status && get_review){
			for(var time in news_list){
				var news = news_list[time];
				var html = "";
				if (news.status_id != undefined){
					var status = news;
					var html =  "<li class='course_status_list'><div><a href='course_info_"
						+ status.course_id
						+ "'><span>"
						+ status.department
						+ "</span>&nbsp;"
						+ "<span>"
						+ status.number
						+ "</span>&nbsp;"
						+ "<span>"
						+ status.name
						+ "</span></a></div><section><p>"
						+ status.content
						+ "</p><div class='replyline'><span>"
						+ status.timestamp
						+ "</span></div><div class='OthersReply'></div>"
						+ "<li class='replyBox'><img class='mini_picture' src='"
						+ status.picture_id
						+ "' alt='' title=''><textarea name='reply' contenteditable='true'></textarea>"
						+ "<div><a href='javascript:' onclick='addComment("
						+ status.status_id
						+ ", 1)'>Send</a></div></li></section></li>";
				}
				else if (news.review_id != undefined){
					var review = news;
					var html =  "<li class='friend_status_list'><img class='mini_picture' src='"
						+ review.picture_id
						+ "' alt='' title=''><div><span>"
						+ review.firstname
						+ "</span>&nbsp;<span>"
						+ review.lastname
						+ "</span></div><section><div class='star_rating_mini mini_star_"
						+ review.score * 2
						+ "'></div><p>"
						+ review.content
						+ "</p><div class='replyline'><span >2013-11-13 14:56</span></div><div class='OthersReply'>"
						+ "<a href=''><span>First</span>&nbsp;<span>Last</span></a><p>It's a nice day.</p>"
						+ "<span> 2013-11-13 14:56 </span><div><a href=''>Reply</a><a href=''>Delete</a></div></div>"
						+ "<div class='replyBox'><img class='mini_picture' src='"
						+ review.picture_id
						+ "' alt='' title=''><textarea name='reply' contenteditable='true'></textarea>"
						+ "<div><a href='#'>Reply</a></div></div></section></li>";
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

	function addReviewToNews(obj){
		for (var i = 0; i < obj.review_list.length; i++){
			var key = Date.parse(obj.review_list[i].timestamp);
			//console.log(key);
			var value = obj.review_list[i];
			while(news_list[key] != undefined)
				key++;
			news_list[key] = value;
		}
		get_review = true;
		setNewsList();
	}

	// function addEventsToNews(obj){
	// 	for (var i = 0; i < obj.event_list.length; i++){
	// 		var key = Date.parse(obj.event_list[i].timestamp);
	// 		//console.log(key);
	// 		var value = obj.event_list[i];
	// 		while(news_list[key] != undefined)
	// 			key++;
	// 		news_list[key] = value;
	// 	}
	// 	get_event = true;
	// 	setNewsList();
	// }

	function refreshNews(){
		get_status = false;
		get_review = false;
		// get_event = false;
		news_list = new Array();
		action(
			"getStatusByEntityAction", 
			addStatusToNews,  
			defaultErrorHandler, 
			"POST", 
			{
				"id": <?php echo (isset($_GET["course_id"]))?$_GET["course_id"]:0; ?>,
				"type": 2
			}
		);
		action(
			"getReviewByCourseAction", 
			addReviewToNews, 
			defaultErrorHandler, 
			"POST", 
			{
				"course_id": <?php echo (isset($_GET["course_id"]))?$_GET["course_id"]:0; ?>
			}
		);
		// action(
		// 	"getEventByEntityAction", 
		// 	addEventsToNews, 
		// 	defaultErrorHandler, 
		// 	"POST", 
		// 	{
		// 		"id": <?php echo (isset($_SESSION["course_id"]))?$_SESSION["course_id"]:0; ?>,
		// 		"type": 1
		// 	}
		// );
	}

	$("#status_list").ready(
		refreshNews()
	);
</script>
	<section id="status_list">
		<h1>Recent News</h1>
		<ul>
		

		</ul>
	</section>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";