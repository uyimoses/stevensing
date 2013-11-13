<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#main_menu ul a:nth-child(3)").addClass('current');
	$("#left_tag_current").addClass("left_tag_5");
</script>
<nav id="left_tags">
		<ul>
			<li>Course News</li>
			<li>Statuses</li>
			<li>Reviews</li>
			<li>Resources</li>
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