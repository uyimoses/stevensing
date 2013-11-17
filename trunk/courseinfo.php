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
			<a href="./courses.php"><li>Return Course List</li></a>
			<a href="#news"><li>Course News</li></a>
			<li>Statuses</li>
			<li>Reviews</li>
			<li>Resources</li>
			<li>Events</li>
		</ul>
	</nav>
</section><!-- end of leftside -->
<section class="span-14 main_view">
	<div id="courseinfo">
		<h1><span id="department">CS</span><span id="number">546</span><span>Web Development</span></h1>
		<div id="lcourse">
			<p id="professor">Steven A Gabarro</p>
			<p id="description">This course will provide students with a first strong approach of internet programming. It gives the basic knowledge on how the Internet works and how to create advanced web sites by the use of script languages, after learning the basics of HTML. The course will teach the students the skills required in any business such as proper team work and coordination between groups.</p>
		</div>
		<div id="rcourse">
			<p>Evaluation:</p>
			<div class="star_rating star_4"></div>
		</div>		
	</div>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";