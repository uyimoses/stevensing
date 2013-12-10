	<script type="text/javascript">
		$("#main_menu ul a:nth-child(3)").addClass('current');
	</script>
	<nav id="left_tags">
		<ul>
			<a href="courses"><li>Return Course List</li></a>
			<a href="course_info_<?php echo isset($_GET["course_id"])?$_GET["course_id"]:0; ?>"><li>Course News</li></a>
			<a href="course_statuses_<?php echo isset($_GET["course_id"])?$_GET["course_id"]:0; ?>"><li>Statuses</li></a>
			<a href="course_reviews_<?php echo isset($_GET["course_id"])?$_GET["course_id"]:0; ?>"><li>Reviews</li></a>
			<a href="course_resources_<?php echo isset($_GET["course_id"])?$_GET["course_id"]:0; ?>"><li>Resources</li></a>
			<a href="course_events_<?php echo isset($_GET["course_id"])?$_GET["course_id"]:0; ?>"><li>Events</li></a>
		</ul>
	</nav>
</section><!-- end of leftside -->