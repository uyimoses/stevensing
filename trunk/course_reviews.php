<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#main_menu ul a:nth-child(4)").addClass('current');
	$("#left_tag_current").addClass("left_tag_4");
</script>
<nav id="left_tags">
		<ul>
			<a href="./courses.php"><li>Return Course List</li></a>
			<a href="./courseinfo.php"><li>Course News</li></a>
			<a href="course_statuses.php"><li>Statuses</li></a>
			<a href="course_reviews.php"><li>Reviews</li></a>
			<a href="course_resourses.php"><li>Resources</li></a>
			<a href="course_events.php"><li>Events</li></a>
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
			<div><a href="./courses.php">Back to List</a></div>
			<div>Course Rating: <span>4.0</span></div>
			<div class="star_rating star_4"></div>
		</div>		
	</div>

	<div class="block-top"></div>
	<div id="contact-content">
		<div id="rcourse">
			<span>Rate the course:</span>
			<div class="star_rating star_4"></div>
		</div>
		<div class="block-bottom"></div>
		<div>
			<span id="contact-text">Input your comment:</span>
			<form id="statuseForm" action="course_statuses.php" method="post" name="statuseForm">
				<div id="form_box">
				<textarea class="fieldcourse"  name="message" contenteditable="true" placeholder="Write something about the course..."></textarea>
				<div id="button"><a href="#"> send</a></div>
			  </div>
			</form>
		</div>
	</div>
	<section id="status_list">
		<h1>Recent statuses</h1>
		<ul>
			<li class="course_status_list">
				
				<div>
					<a href="#" ><span>CS</span>&nbsp;<span>546</span></a>
				</div>
				<section>
					<p>
						Welcome, everyone! Today is the CEO presentation!
					</p>
					<div class="replyline">
						<span>2013-11-13 14:56</span>
						<a href="javascript:;">Reply</a>
					</div>
					<div class="OthersReply">
						<a href="">Xiao Han</a>
						<p>It's a nice day.</p>
						<span> 2013-11-13 14:56 </span>
						<div>
						<a href="">reply</a>
						<a href="">delete</a>
						</div>
					</div>
					
					<li class="replyBox" >
				  		<img src="./images/profile_image.jpg" alt="" title="">
						<textarea name="reply" contenteditable="true"></textarea>
						<div><a href="#"> send</a></div>
					</li>
				</section>
			</li>

	
</ul>
</section>
	
	

</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";