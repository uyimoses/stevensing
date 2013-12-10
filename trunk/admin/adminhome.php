
<?php
include "header.php";

 // if (!isset($_SESSION["username"])){
 //         echo "<script>window.location.href='index.php'</script>";
 // }
 // else{
?>
<h1>Manage Home</h1>
<div>
<span>Welcome, <?php echo $_SESSION["user_id"]?></span>&nbsp&nbsp<a href = "../index.php">Log out</a><br />
<a href = "changepassword.php">Change Password</a>
</div>
<hr />
<div>
<a href = "manageusers.php">Manage Users</a><br />
<a href = "manageblogs.php">Manage Blogs</a><br />
<a href = "managecourses.php">Manage Courses</a><br />
<a href = "managereviews.php">Manage Reviews</a><br />
<a href = "managecourselist.php">Manage Course List</a><br />
<a href = "managevents.php">Manage Events</a><br />
<a href = "manageventlist.php">Manage Event List</a><br />
<a href = "managestatus.php">Manage Status</a><br />
<a href = "managepictures.php">Manage Pictures</a><br />
<a href = "manageresources.php">Manage Resources</a><br />
<a href = "manageProfiles.php">Manage Profiles</a><br />




</div>
<?php
// }
include "footer.php";