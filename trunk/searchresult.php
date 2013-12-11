<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#left_tag_current").addClass("left_tag_1");

	function setSearchResult(obj){

	}
	
	function search(){
		action(
			"searchAction", 
			setSearchResult, 
			errorStatus, 
			"POST", 
			{
				"keyword": $("#keyword").val()
			}
		);
	}

	$("#searchForm").ready(function(){
		if ($("#keyword").val() != "")
			search();
	});
</script>
<nav id="left_tags">
		<ul>
			<li>Search</li>
		</ul>
	</nav>
</section><!-- end of leftside -->

<section class="span-14 main_view">
<section class ="advanced_search">	
	<form class = "form_search" id ="searchForm" method="POST" class="form_search">
		<fieldset>
			<legend> Search </legend>
			<label for="KeyWordinput">Key Word:</label>
			<input type="text" id="keyword" name="textarea" placeholder="Name,Course Name,Course Number..." value="<?php echo isset($_GET["keyword"])?$_GET["keyword"]:""; ?>"/> <br />
		
			<input type="button" value="Search" class="button" onclick="search();"/>
	
</fieldset>
</form>

</section>







<section id="search_list">
	<div id ="friend_list">
	
		<h1>Friends Result :</h1>
		<ul>
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div><span>Ruo</span>&nbsp;<span>Jia</span></div>
				<a href="#" ><div>Add</div></a>
			</li>
			
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div><span>Xiao</span>&nbsp;<span>Han</span></div>
				<a href="#" ><div>Add</div></a>
			</li>
			
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div><span>Cheng</span>&nbsp;<span>Liu</span></div>
				<a href="#" ><div>Add</div></a>
			</li>
		
		</ul>
	</div>
	<div id="course_search_list">
		<h1>Courses Result :</h1>
	<ul>
		<li>
			<div><a href="courseinfo.php"><span>CS</span>&nbsp;<span>546</span>&nbsp;<span>Web Programming</span></a></div>
			<span class="buttonCourse"><a href="#" ><div>Add</div></a></span>
		</li>
			
		<li>
			<div><a href="courseinfo.php">	<span>CS</span>&nbsp;<span>570</span>&nbsp;<span>Intro To Programming In C++</span></a></div>
			<span class="buttonCourse"><a href="#" ><div>Add</div></a></span>
		</li>
			
		<li>
			<div><a href="courseinfo.php">	<span>CS</span>&nbsp;<span>590</span>&nbsp;<span>Algorithms</span></a></div>
			<span class="buttonCourse"><a href="#" ><div>Add</div></a></span>
		</li>
	</ul>
	</div>
	
	</section>
		

</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";