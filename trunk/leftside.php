<script>
	function getProfile(){
		$.ajax({
			url: 'getProfileAction',
			type: 'POST',
			dataType: 'text',
			data: {
				"user_id": ""
			},
			success: function(data){
				console.log(data);
				// var obj = eval('(' + data + ')');
				// if (obj.error == "data"){
				// 	alert("Invalid username or password.");
				// }
				// else if (obj.error == "server"){
				// 	alert("Sorry. The Web Server is not avaliable for now.");
				// }
				// else if (obj.error == "none"){
				// 	window.location.href = "home";
				// }
				
			},
			error: function(data){

			}
		});
	}
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