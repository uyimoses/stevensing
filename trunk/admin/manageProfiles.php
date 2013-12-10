
<?php
include "header.php";
include "../mysqli_connection.php";

// if (!isset($_SESSION["username"])){
//         echo "<script>window.location.href='index.php'</script>";
// }
// else{
?>

<div>
<h1>Manage Profile</h1>
<a href = "adminhome.php">Back to Manage Home</a>
</div>
<div>
<form action = "#" method = "GET">
<label for = "user_id">User id: </label>
<input type = "text" name = "user_id" value = "<?php echo isset($_GET['user_id'])?$_GET['user_id']:"";?>" />
<label for = "firstname">Firstname Name: </label>
<input type = "text" name = "firstname" value = "<?php echo isset($_GET['firstname'])?$_GET['firstname']:"";?>" />
<label for = "lastname">Middle Name: </label>
<input type = "text" name = "middlename" value = "<?php echo isset($_GET['middlename'])?$_GET['middlename']:"";?>" />
<label for = "firstname">Firstname Name: </label>
<input type = "text" name = "lastname" value = "<?php echo isset($_GET['lastname'])?$_GET['lastname']:"";?>" />

<input type = "submit" value = "Search" />
</form>
</div>
<div>
<a href="editprofile.php">Add a new user</a>
</div>
<hr />
<div>
<table>
<thead >
<td>User ID</td> <td>First Name</td> <td>Middle Name</td> <td>Last Name</td> <td>Gender</td> <td>Birthday</td>
<td>Major</td> <td>Degree</td> <td>Entry Year</td> <td>Entry Semester</td>
<td>Picture ID</td> <td>Operation</td>
</thead>
<tbody>
<?php
$filter = "true";
if (isset($_GET["user_id"]) && $_GET["user_id"] !== ""){
         $param = "(user_id = " . $mysqli->real_escape_string(trim($_GET["user_id"])) . ")";
         $filter .= " AND " . $param;
 }
if (isset($_GET["firstname"]) && $_GET["firstname"] !== ""){
        $param = "(firstname = '" . $mysqli->real_escape_string(trim($_GET["firstname"])) . "')";
        $filter .= " AND " . $param;
}
if (isset($_GET["middlename"]) && $_GET["middlename"] !== ""){
         $param = "(middlename LIKE '%" . $mysqli->real_escape_string(trim($_GET["middlename"])) . "%')";
         $filter .= " AND " . $param;
 }
 if (isset($_GET["lastname"]) && $_GET["lastname"] !== ""){
         $param = "(lastname LIKE '%" . $mysqli->real_escape_string(trim($_GET["lastname"])) . "%')";
         $filter .= " AND " . $param;
 }
// if (isset($_GET["number"]) && $_GET["number"] !== ""){
//         $param = "(number = " . $mysqli->real_escape_string(trim($_GET["number"])) . ")";
//         $filter .= " AND " . $param;
// }
$perNumber = 25;
if(isset($_GET['page']))$page = $_GET['page'];
else $page=1;
$count = $mysqli->query("select count(*) from profiles WHERE " . $filter . ";");
$rs = mysqli_fetch_array($count);
$totalNumber = $rs[0];
if ($totalNumber == 0){
        echo "<div><font color='red'>No result!</font></div>";
}
else{
        echo "<div>Found " . $totalNumber. " courses.</div>";
}
$totalPage = ceil($totalNumber / $perNumber);
if ($page < 1) {
        $page = 1;
}
else if ($page > $totalPage){
        $page = $totalPage;
}
$startCount = ($page - 1) * $perNumber;
$result = $mysqli->query("select * from profiles WHERE (" . $filter .") LIMIT $startCount, $perNumber");
if ($result){
        while ($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row["user_id"];?></td>
<td><?php echo $row["firstname"];?></td>
<td><?php echo $row["middlename"];?></td>
<td><?php echo $row["lastname"];?></td>
<td><?php echo $row["gender"];?></td>
<td><?php echo $row["dob"];?></td>
<td><?php echo $row["major"];?></td>
<td><?php echo $row["degree"];?></td>
<td><?php echo $row["entry_year"];?></td>
<td><?php echo $row["entry_semester"];?></td>
<td><?php echo $row["picture_id"];?></td>
<td><a href="javascript:" onclick = "show_delete_yes(this,<?php echo $row['user_id'];?>);" >Delete</a>&nbsp&nbsp<a href="editprofile.php?id=<?php echo $row['user_id'];?>">Edit</a></td>
</tr>
</tbody>
<?php
        }
 }
?>

</table>
<div>
<?php
if ($totalPage > 1){
        if ($page != 1) {
                echo "<a href='manageusers.php?department=" . $_GET["user_id"] .  "&page=" . ($page - 1) . "'>Back</a>&nbsp";
        }
        for ( $i = 1; $i <= $totalPage; $i++){
                if ($i == $page){
                        echo "&nbsp" . $i . "&nbsp";
                }
                else{
                        echo "&nbsp<a href='manageusers.php?department=" . $_GET["user_id"] . "&page=" . $i . "'>" . $i . "</a>&nbsp";
                }
        }
        if ($page < $totalPage) {
                echo "&nbsp<a href='manageusers.php?department=" . $_GET["user_id"] . "&page=" . ($page + 1) . "'>Next</a>";
        }
}
?>
</div>
</div>
<script>
function show_delete_yes(link, id){
        var top = $(link).offset().top;
        $("#deleteyes").css("display","block");
        $("#deleteyes").css("top", top);
        $("#course_id").val(id);
}
function hide_delete_yes(){
        $("#deleteyes").css("display","none");
}
</script>
<div id = "deleteyes" style="display:none;">
<div class = "confirm_delete_text">Do you really want to delete it?</div>
<form action = "deletecourse.php" method = "POST">
<input type = "hidden" name = "id" id = "course_id" />
<input type = "submit" value = "Yes" />
<input type = "button" value = "No" onclick = "hide_delete_yes();false;" />
</form>
</div>
<?php
// }
include "footer.php";