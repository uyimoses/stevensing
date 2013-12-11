<script>
	function setCourseInfo(obj){
		$("#department").text(obj.department);
		$("#number").text(obj.number);
		$("#coursename").text(obj.name);
		$("#professor").text(obj.professor);
		$("#description").text(obj.description);

		for (var i = 0; i <= 5; i++){
			$("#score").removeClass('star_'+i);
		}
		$("#score").addClass('star_'+obj.score);
	}

	$("#courseinfo").ready(function(){
		action(
			"getCourseAction", 
			setCourseInfo, 
			defaultErrorHandler, 
			"POST",
			{
				"course_id": <?php echo (isset($_GET["course_id"]))?$_GET["course_id"]:0; ?>
			}
		);
	});
</script>
<section class="span-14 main_view">
<div id="courseinfo">
	<h1><span id="department"></span><span id="number"></span><span id="coursename"></span></h1>
	<div id="lcourse">
		<p id="professor"></p>
		<p id="description"></p>
	</div>
	<div id="rcourse">
		<div><a href="./courses.php">Back to List</a></div>
		<div>Course Rating: <span>4.0</span></div>
		<div class="star_rating star_4" id="score"></div>
	</div>		
</div>