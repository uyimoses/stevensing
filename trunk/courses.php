<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#main_menu ul a:nth-child(3)").addClass('current');
	$("#left_tag_current").addClass("left_tag_1");
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
			<li>
				<div id="course_list_name">
					<a href="course_info"><span>CS</span>&nbsp;<span>546</span>&nbsp;<span>Web Programming</span></a>
				</div>
				<li class="button">
					<a href="#" >Drop </a>
					<a href="course_info">Visit</a>
				</li>
			</li>
			<li>
				<div id="course_list_name">
				<a href="course_info"><span>CS</span>&nbsp;<span>570</span>&nbsp;<span>Intro To Programming In C++</span></a>
				</div>
				<li class="button">
					<a href="#" >Drop </a>
					<a href="course_info">Visit</a>
			</li>
			</li>
			<li>
				<div id="course_list_name">
				<a href="course_info"><span>CS</span>&nbsp;<span>590</span>&nbsp;<span>Algorithms</span></a>
				</div>
				<li class="button">
					<a href="#" >Drop </a>
					<a href="course_info">Visit</a>
				</li>
			</li>
		</ul>
	</section>
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";