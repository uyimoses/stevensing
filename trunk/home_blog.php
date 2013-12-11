<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
//include leftside of home
include "leftside_home.php"
?>
<script>
	$("#left_tag_current").addClass("left_tag_3");
	function addBlog(){
		action(
			"addBlogAction", 
			refreshBlogs, 
			errorStatus, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"title":$("#blog_title").val(),
				"content": $("#blog_content").val()
			}
		);
	}
	function deleteBlog(id, timestamp){
		action(
			"deleteBlogAction", 
			refreshBlogs, 
			defaultErrorHandler, 
			"POST", 
			{
				"blog_id": id,
				"timestamp": timestamp
			}
		);
	}
	function refreshBlogList(obj){
		$("#status_list>ul").html("");
		for(var i = 0; i < obj.blog_list.length; i++){
			var blog = obj.blog_list[i];
			console.log(blog.picture_id);
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
				+ "</span><a href='javascript:' onclick='deleteBlog("
				+ blog.blog_id
				+ ", \""
				+ blog.timestamp
				+ "\")'>Delete</a></div><div class='OthersReply'><a href='javascript:'><span>First</span><span>Last</span></a><p>It's a nice day.</p>"
				+ "<span> 2013-11-13 14:56 </span><div><a href=''>Reply</a><a href=''>Delete</a></div></div>"
				+ "</section></li>";
			$(html).prependTo('#status_list>ul');
		}
	}
	function refreshBlogs(){
		action(
			"getBlogByUserAction", 
			refreshBlogList, 
			defaultErrorHandler, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				
			}
		);
	}
	
	$("#status_list").ready(
		refreshBlogs()
	);
</script>


<section class="span-14 main_view">
	<section class="block" id="contact">
		
	<div class="block-top"></div>
	  <div id="contact-content">
		<span id="contact-text">Create a blog:</span><br>
		<label>Title:</label>
		<input type="text" id= "blog_title" name="title"  onfocus="clearError(this);"><br>
		<div class="check_message" id="title_error"></div>
		<label>Content:</label>
		<form id="statuseForm" action="friends_statuses.php" method="post" name="statuseForm">
		  <div id="form_box">
			  <textarea class="fieldclass" id="blog_content" name="message" contenteditable="true" placeholder="Write something about yourself..." onfocus="clearError(this);"></textarea>
			  <div class="check_message" id="content_error"></div>
			<div id="button"><a href="javascript:" onclick="addBlog()"> send</a></div>
		  </div>
		</form>
	  </div>
	
	<div class="block-bottom"></div>
  
	</section>
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