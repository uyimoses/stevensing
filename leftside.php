<script>
	function setLeftside(profile){
		$("#profile_name>p:nth-of-type(1)").text(profile.firstname);
		$("#profile_name>p:nth-of-type(2)").text(profile.firstname);
	}

	$("#profile_name").ready(
		action(
			"getProfileByUserAction", 
			setLeftside, 
			setLeftside, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>
			}
		)
	);
</script>
<section id="leftside" class="span-4">
	<div id="profile_info">
		<a href="#">
			<div id="profile_picture">
				<img src="./images/profile_image.jpg" alt="Profile Picture" title="Profile Picture"/>
				<div id="edit_profile_picture">Change</div>
			</div>
		</a>
		<div id="profile_name">
			<p></p>
			<p></p>
		</div>

		<div id="profile_edit">
			<a href="editprofile">Edit Profile</a>
		</div>
	</div>
	<div id="left_tag_current"></div>