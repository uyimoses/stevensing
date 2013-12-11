<script>
	var user_profile;
	function setLeftside(profile){

		$("#profile_name>p:nth-of-type(1)").text(profile.firstname);
		$("#profile_name>p:nth-of-type(2)").text(profile.lastname);
		$("#profile_picture>img").attr("src", profile.picture_id);
		
		try{
			user_profile = profile;
			setProfileDisplay();
		}
		catch(e){
			//do nothing
		}
		
		
	}

	$("#profile_name").ready(
		action(
			"getProfileByUserAction", 
			setLeftside, 
			defaultErrorHandler, 
			"POST", 
			{
				"user_id": <?php echo (isset($_SESSION["user_id"]))?$_SESSION["user_id"]:0; ?>
			}
		)
	);
</script>
<section id="leftside" class="span-4">
	<div id="profile_info">
		<a href="changeprofilepicture">
			<div id="profile_picture">
				<img src="./upload/picture/0.jpg" alt="Profile Picture" title="Profile Picture"/>
				<div id="edit_profile_picture">Change</div>
			</div>
		</a>
		<div id="profile_name">
			<p><?php echo (isset($_SESSION["firstname"]))?$_SESSION["firstname"]:0; ?></p>
			<p><?php echo (isset($_SESSION["lastname"]))?$_SESSION["lastname"]:0; ?></p>
		</div>

		<div id="profile_edit">
			<a href="editprofile">Edit Profile</a>
		</div>
	</div>
	<div id="left_tag_current"></div>