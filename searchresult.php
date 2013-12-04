<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#left_tag_current").addClass("left_tag_1");
</script>
<nav id="left_tags">
		<ul>
			<li>Search</li>
		</ul>
	</nav>
</section><!-- end of leftside -->

<section class="span-14 main_view">
<section id="advanced_search">	
	<form name ="searchAD"action="searchresult.php" method="POST" class="form_search">
		<fieldset>
	<legend> Advanced Search </legend>
			<label for="KeyWordinput">Key Word:</label>
			<input type="text" id="KeyWordinput" name="textarea" placeholder="Name,Course Name,Course Number..." /> <br />
			
			<label for="CorF">Choose Searching Area:</label>
			<select name="courseorfriends" id="CorF" onchange="if (value=='courses')
							{ searchAD.radioSet.male.disabled=true;
							  searchAD.radioSet.female.disabled=true;
							  searchAD.degree.disabled=true;
							}
							 else{searchAD.radioSet.female.disabled=false;
							 searchAD.radioSet.male.disabled=false;
							 searchAD.degree.disabled=false;}">
					 <option value="all" selected> All</option>
					 <option value="friends">Friends</option>
					 <option value="courses">Courses</option>
			</select><br/>
			
			<label>Gender:</label>
			<input type="radio" name="radioSet" id="male" value="Male" checked="checked" /><label for="option1">Male</label>
			<input type="radio" name="radioSet" id="female" value="Female" /><label for="option2">Female</label><br />
			

			<label for="Degree">Choose Degree:</label>
			<select  name="degree" id="Degree" size="1">
			        <option value="ALL">All 
					</option><option value="DC">Continuing Education
					</option><option value="DG">Graduate
					</option><option value="DU">Undergraduate
					</option>
			</select><br/>
			
			<label for="Major">Choose Major for friends or Departmental for courses:</label>
			<select name="major" id="Major"size="1">
					<?php
					foreach ($majors as $key => $value) {
						echo "<option value='$key'>$value</option>";
					}
					?>
				</select><br />

				<input type="submit" value="Search" class="button"/>
	
</fieldset>
</form>

</section>







<section id="search_list">
	<div id="friend_list">
	
		<h1>Result :</h1>
		<span>Sort By</span>
		<select name="select">
			<option value="name" selected="selected">name</option>
			<option value="time" >time</option>
		</select>
		
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
	<div id="course_list">
	<ul>
		<li>
			<div><a href="courseinfo.php"><span>CS</span>&nbsp;<span>546</span>&nbsp;<span>Web Programming</span></a></div>
			<span class="button"><a href="#" ><div>Add</div></a></span>
		</li>
			
		<li>
			<div><a href="courseinfo.php">	<span>CS</span>&nbsp;<span>570</span>&nbsp;<span>Intro To Programming In C++</span></a></div>
			<span class="button"><a href="#" ><div>Add</div></a></span>
		</li>
			
		<li>
			<div><a href="courseinfo.php">	<span>CS</span>&nbsp;<span>590</span>&nbsp;<span>Algorithms</span></a></div>
			<span class="button"><a href="#" ><div>Add</div></a></span>
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