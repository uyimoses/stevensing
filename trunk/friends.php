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
			<a href="friends.php"><li>Friend List</li></a>
			<li>Friend News</li>
			<a href="friends_statuses.php"><li>Statuses</li></a>
			<li>Blogs</li>
			<li>Events</li>
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
					<span>FirstName</span>&nbsp;<span>LastName</span>
				</div>
				<a href="#" ><div>
					Delete
				</div></a>
			</li>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>FirstName</span>&nbsp;<span>LastName</span>
				</div>
				<a href="#" ><div>
					Delete
				</div></a>
			</li>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>FirstName</span>&nbsp;<span>LastName</span>
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