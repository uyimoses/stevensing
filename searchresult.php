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
					<option value="BME">Biomedical Engineering
					</option><option value="CPE">Computer Engineering
					</option><option value="CS">Computer Science
					</option><option value="EE">Electrical Engineering
					</option><option value="EM">Engineering Management
					</option><option value="MIS">Information Systems
					</option><option value="IPD">Integrated Product Development
					</option><option value="E">Interdepartmental Engineering
					</option><option value="MGT">Management
					</option><option value="MT">Materials Engineering
					</option><option value="MA">Mathematics
					</option><option value="ME">Mechanical Engineering
					</option><option value="NANO">Nanotechnology
					</option><option value="NE">Naval Engineering
					</option><option value="NIS">Networked Information Systems
					</option><option value="OE">Ocean Engineering
					</option><option value="PME">Pharmaceutical Manufacturing
					</option><option value="PE">Physical Education
					</option><option value="PEP">Physics &amp; Engineering Physics
					</option><option value="PAE">Product Architecture and Engineering
					</option><option value="PRV">Provost
					</option><option value="QF">Quantitative Finance
					</option><option value="SSW">Software Engineering
					</option><option value="SYS">Systems Engineering
					</option><option value="SES">Systems Engineering Security
					</option>
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
				<div><span>FirstName</span>&nbsp;<span>LastName</span></div>
				<a href="#" ><div>Add</div></a>
			</li>
			
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div><span>FirstName</span>&nbsp;<span>LastName</span></div>
				<a href="#" ><div>Add</div></a>
			</li>
			
			<li>
				<img src="./images/profile_image.jpg" alt="" title="">
				<div><span>FirstName</span>&nbsp;<span>LastName</span></div>
				<a href="#" ><div>Add</div></a>
			</li>
		
		</ul>
	</div>
	<div id="course_list">
	<ul>
		<li>
			<div><a href="courseinfo.php"><span>CS</span>&nbsp;<span>546</span>&nbsp;<span>Web Programming</span></a></div>
			<a href="#" ><div>Add</div></a>
		</li>
			
		<li>
			<div><a href="courseinfo.php">	<span>CS</span>&nbsp;<span>570</span>&nbsp;<span>Intro To Programming In C++</span></a></div>
				<a href="#" ><div>Add</div></a>
		</li>
			
		<li>
				<div><a href="courseinfo.php">	<span>CS</span>&nbsp;<span>590</span>&nbsp;<span>Algorithms</span></a></div>
				<a href="#" ><div>Add</div></a>
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