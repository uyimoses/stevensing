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
			<a href="./homepage.php"><li>All News</li></a>
			<a href="./home_status.php"><li>Statuses</li></a>
			<a href="./home_blog.php"><li>Blog</li></a>
			<a href="./home_events.php"><li>Events</li></a>
		</ul>
	</nav>
	</nav>
</section><!-- end of leftside -->
<section class="span-14 main_view">
	<section id="status_list">
		<h1>Recent events</h1>
		<ul>
			<li class="course_status_list">
				
				<div>
					<a href="#" ><span>CS</span>&nbsp;<span>546</span></a>
				</div>
				<section>
					<p>
						Have a great day!
					</p>
					<div>
						<span>2013-11-13 14:56</span><a href="javascript:;">Reply</a>
					</div>
				</section>
			</li>
			<li class="course_status_list">
				
				<div>
					<a href="#" ><span>CS</span>&nbsp;<span>546</span></a>
				</div>
				<section>
					<p>
						I heard that you're settled down
						That you found a girl and you're married now
						I heard that your dreams came true
						Guess she gave you things I didn't give to you

						Old friend, why are you so shy?
						Ain't like you to hold back or hide from the light

						I hate to turn up out of the blue, uninvited
						But I couldn't stay away, I couldn't fight it
						I had hoped you'd see my face and that you'd be reminded
						That for me, it isn't over
					</p>
					<div>
						<span>2013-11-13 14:56</span><a href="javascript:;">Reply</a>
					</div>
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