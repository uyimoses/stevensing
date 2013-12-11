<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#main_menu ul a:nth-child(3)").addClass('current');
	$("#left_tag_current").addClass("left_tag_1");

	function leaveCourse(course_id){
		action(
			"leaveCourseAction", 
			refreshCourseList, 
			defaultErrorHandler, 
			"POST", 
			{
				"course_id": course_id,
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>
			}
		);
	}

	function setCourseList(obj){
		$("#course_list>ul").html("");
		for(var i = 0; i < obj.course_list.length; i++){
			var course = obj.course_list[i];
			var html =  "<li><div class='course_list_name'><a href='course_info_"
				+ course.course_id
				+ "'><span>"
				+ course.department
				+ "</span>&nbsp;<span>"
				+ course.number
				+ "</span>&nbsp;<span>"
				+ course.name
				+ "</span></a></div><li class='button'><a href='javascript:' onclick='leaveCourse("
				+ course.course_id
				+ ")'>Drop</a><a href='course_info_"
				+ course.course_id
				+ "'>Visit</a></li></li>";
			$(html).appendTo('#course_list>ul');
		}
	}
	function refreshCourseList(){
		action(
			"getCourseListAction", 
			setCourseList, 
			defaultErrorHandler, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>,
				"status": 2
			}
		);
	}

	$("#course_list").ready(function(){
		refreshCourseList();
	});

</script>
<nav id="left_tags">
	<ul>
		<li>Course List</li>
	</ul>
</nav>
</section><!-- end of leftside -->
<section class="span-14 main_view">
	<section id="course_list">
		<h1>Course List </h1>
		<span>Sort By</span>
		<select name="select">
			<option value="name" selected="selected">name</option>
			<option value="number" >time</option>
		</select>
		<ul>
		</ul>
		<a id="course_add" href="course_add.php">Create a new course</a>
	</section>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";