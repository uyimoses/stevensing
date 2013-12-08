
<?php
include "header.php";

 // if (!isset($_SESSION["username"])){
 //         echo "<script>window.location.href='index.php'</script>";
 // }
 // else{
?>
<h1>Manage Home</h1>
<div>
<span>Welcome, <?php echo $_SESSION["username"]?></span>&nbsp&nbsp<a href = "index.php">Log out</a><br />
<a href = "changepassword.php">Change Password</a>
</div>
<hr />
<div>
<a href = "manageusers.php">Manage Users</a><br />
<a href = "managecourses.php">Manage Courses</a><br />
<a href = "managevents.php">Manage Events</a><br />


</div>
<?php
// }
include "footer.php";