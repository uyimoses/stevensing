<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#main_menu ul a:nth-child(2)").addClass('current');
	$("#left_tag_current").addClass("left_tag_3");
</script>
<nav id="left_tags">
		<ul>
			<a href="./friends.php"><li>Friend List</li></a>
			<li>Friend News</li>
			<a href="./friends_statuses.php"><li>Statuses</li></a>
			<a href="friends_blog.php"><li>Blog</li></a>
			<a href="./friends_events.php"><li>Events</li></a>
		</ul>
	</nav>
</section><!-- end of leftside -->
<section class="span-14 main_view">
	<section id="status_list">
		<h1>Recent statuses</h1>
		<ul>
			<li class="friend_status_list">
				<img src="./images/profile_image.jpg" alt="" title="">
				<div>
					<span>Ruo</span>&nbsp;<span>Jia</span>
				</div>
				<section>
					<p>
						Have a great day!
					</p>
					<div class="replyline">
						<span >2013-11-13 14:56</span>
						<a  href="javascript:;">Reply</a>
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