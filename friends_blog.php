<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";

//include leftside of friends
include "leftside_friends.php";
?>
<script>
	$("#left_tag_current").addClass("left_tag_4");
	var blog_list = new Array();
	var count = 0;
	
	function refreshBlogList(){
		$("#status_list>ul").html("");
		for(var time in blog_list){
			var blog = blog_list[time];
			var html =  "<li class='friend_status_list'><img class='mini_picture' src='"
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
				+ "<li class='replyBox'><img src='./images/profile_image.jpg' alt='' title=''><textarea name='reply' contenteditable='true'></textarea>"
				+ "<div><a href='javascript:' onclick='addComment("
				+ blog.blog_id
				+ ", 1)'>Reply</a></div></li></section></li>";
			$(html).prependTo('#status_list>ul');
		}
	}
	function createBlogList(obj){
		for (var i = 0; i < obj.blog_list.length; i++){
			var date = new Date("yyyy-mm-dd hh:mm:ss");
			var key = Date.parse(obj.blog_list[i].timestamp);
			//console.log(key);
			var value = obj.blog_list[i];
			while(status_list[key]!=undefined)
				key++;
			blog_list[key] = value;
		}
		count ++;
		if (count >= friend_list.length){
			refreshBlogList();
		}
	}
	function refreshBlogs(){
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
		}
	}
	$("#status_list").ready(function(){
		if (friend_list != undefined){
			refreshBlogs();
		}
		else{
			getFriendList();
		}
	});
</script>
<section class="span-14 main_view">
	<section id="status_list">
		<h1>Recent blogs</h1>
		<ul>

</ul>
</section>
	

</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";