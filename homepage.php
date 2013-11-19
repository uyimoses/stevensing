<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#main_menu ul a:nth-child(1)").addClass('current');
	$("#left_tag_current").addClass("left_tag_1");
</script>
<nav id="left_tags">
		<ul>
			<li>All News</li>
			<a href=" home_status.php"><li>Statuses</li></a>
			<li>Blogs</li>
			<li>Events</li>
		</ul>
	</nav>
</section><!-- end of leftside -->
<section class="span-14 main_view">
	Content
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";