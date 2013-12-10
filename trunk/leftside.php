<script>
	function setLeftside(profile){
		console.log(profile);
	}

	$("#leftside").ready(
		action(
			"getProfileByUserAction", 
			setLeftside, 
			setLeftside, 
			"POST", 
			{
				"user_id": ""
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
			<p>Zhi</p>
			<p>Qian</p>
		</div>

		<div id="profile_edit">
			<a href="editprofile">Edit Profile</a>
		</div>
	</div>
	<div id="left_tag_current"></div>