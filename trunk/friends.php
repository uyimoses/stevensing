<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#main_menu ul a:nth-child(2)").addClass('current');
	$("#left_tag_current").addClass("left_tag_1");
</script>
<nav id="left_tags">
		<ul>
			<a href="./friends.php"><li>Friend List</li></a>
			<li>Friend News</li>
			<a href="./friends_statuses.php"><li>Statuses</li></a>
			<a href="./friends_blog.php"><li>Blog</li></a>
			<a href="./friends_events.php"><li>Events</li></a>
		</ul>
	</nav>
</section><!-- end of leftside -->
<section class="span-14 main_view">
	<section id="friend_list">
		<h1>Friend List </h1>
		<span>Sort By</span>
			<select name="select">
				<option value="name" selected="selected">name</option>
				<option value="time" >time</option>
			</select>
		
		<ul>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Ruo</span>&nbsp;<span>Jia</span>
				</div>
				<a href="#" ><div>
					Delete
				</div></a>
			</li>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Xiao</span>&nbsp;<span>Han</span>
				</div>
				<a href="#" ><div>
					Delete
				</div></a>
			</li>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Cheng</span>&nbsp;<span>Liu</span>
				</div>
				<a href="#" ><div>
					Delete
				</div></a>
			</li>
		</ul>
	</section>
	
	

</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";