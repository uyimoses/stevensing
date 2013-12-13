<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#left_tag_current").addClass("left_tag_1");
	function added(){
		alert("Added!");
	}

	function requestFriend(friend_id){
		action(
			"requestFriendAction",
			added, 
			errorStatus, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"friend_id": friend_id
			}
		);
	}
	function joinCourse(course_id){
		action(
			"joinCourseAction",
			added, 
			errorStatus, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"course_id": course_id
			}
		);
	}
	function setSearchResult(obj){
		$("#friend_list>ul").html("");
		$("#course_search_list>ul").html("");
		for (var i = 0; i < obj.user_list.length; i++){
			var user = obj.user_list[i];
			if (user.user_id != <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>){
				var html = "<li><img src='"
					+ user.picture_id
					+ "' alt='profile_picture' title='"
					+ user.firstname + " " + user.lastname
					+ "'><div><span>"
					+ user.firstname
					+ "</span>&nbsp;<span>"
					+ user.lastname
					+ "</span></div><a href='javascript:' onclick='requestFriend("
					+ user.user_id
					+")'><div>Add</div></a></li>";
				$(html).prependTo('#friend_list>ul');
			}
		}
		for (var i = 0; i < obj.course_list.length; i++){
			var course = obj.course_list[i];
			var html = "<li><div><a href='course_info_"
				+ course.course_id
				+ "'><span>"
				+ course.department
				+ "</span>&nbsp;<span>"
				+ course.number
				+ "</span>&nbsp;<span>"
				+ course.name
				+ "</span></a></div><span class='buttonCourse'><a href='javascript:' onclick='joinCourse("
				+ course.course_id
				+ ")'><div>Add</div></a></span></li>";
			$(html).prependTo('#course_search_list>ul');
		}
	}
	
	function search(){
		action(
			"searchAction", 
			setSearchResult, 
			errorStatus, 
			"POST", 
			{
				"keyword": $("#keyword").val()
			}
		);
	}

	$("#searchForm").ready(function(){
		if ($("#keyword").val() != "")
			search();
	});
</script>
<nav id="left_tags">
		<ul>
			<li>Search</li>
		</ul>
	</nav>
</section><!-- end of leftside -->

<section class="span-14 main_view">
<section class ="advanced_search">	
	<form class = "form_search" id ="searchForm" method="POST" class="form_search">
		<fieldset>
			<legend> Search </legend>
			<label for="KeyWordinput">Key Word:</label>
			<input type="text" id="keyword" onfocus="clearError(this);" name="textarea" placeholder="Name,Course Name,Course Number..." value="<?php echo isset($_GET["keyword"])?strip_tags($_GET["keyword"]):""; ?>"/> <br />
			<div class="check_message" id="keyword_error"></div>
			<input type="button" value="Search" class="button" onclick="search();"/>
	
</fieldset>
</form>

</section>







<section id="search_list">
	<div id ="friend_list">
		<h1>Users Result:</h1>
		<ul>
			
		</ul>
	</div>
	<div id="course_search_list">
		<h1>Courses Result:</h1>
		<ul>
			
		</ul>
	</div>
	
	</section>
		

</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";