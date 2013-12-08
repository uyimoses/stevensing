
<?php
include "header.php";
include "mysqli_connection.php";
// if (!isset($_SESSION["username"])){
//         echo "<script>window.location.href='index.php'</script>";
// }
// else{

?>

<div>
<h1>Manage Courses</h1>
<a href = "adminhome.php">Back to Manage Home</a>
</div>
<div>
<form action = "#" method = "GET">
<label for = "department">Department: </label><input type = "text" name = "department" value = "<?php echo isset($_GET['department'])?$_GET['department']:"";?>" />
<label for = "number">Number: </label><input type = "text" name = "number"  value = "<?php echo isset($_GET['number'])?$_GET['number']:"";?>" />
<label for = "name">Name: </label><input type = "text" name = "name"  value = "<?php echo isset($_GET['name'])?$_GET['name']:"";?>" />
<input type = "submit" value = "Search" />
</form>
</div>
<div>
<a href="editcourse.php">Add a new course</a>
</div>
<hr />
<div>
<table>
<thead >
<td>Course ID</td><td>Department</td><td>Number</td><td>Name</td><td>Professor</td><td>Operation</td>
</thead>
<tbody>
<?php
$filter = "true";
if (isset($_GET["course_id"]) && $_GET["course_id"] !== ""){
        $param = "(course_id = " . $mysqli->real_escape_string(trim($_GET["course_id"])) . ")";
        $filter .= " AND " . $param;
}
if (isset($_GET["department"]) && $_GET["department"] !== ""){
        $param = "(department = '" . $mysqli->real_escape_string(trim($_GET["department"])) . "')";
        $filter .= " AND " . $param;
}
 if (isset($_GET["name"]) && $_GET["name"] !== ""){
         $param = "(name LIKE '%" . $mysqli->real_escape_string(trim($_GET["name"])) . "%')";
         $filter .= " AND " . $param;
 }
if (isset($_GET["number"]) && $_GET["number"] !== ""){
        $param = "(number = " . $mysqli->real_escape_string(trim($_GET["number"])) . ")";
        $filter .= " AND " . $param;
}
$perNumber = 25;
if(isset($_GET['page']))$page = $_GET['page'];
else $page=1;
$count = $mysqli->query("select count(*) from Courses WHERE " . $filter . ";");
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
$result = $mysqli->query("select * from Courses WHERE (" . $filter .") LIMIT $startCount, $perNumber");
if ($result){
        while ($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row["course_id"];?></td>
<td><?php echo $row["department"];?></td>
<td><?php echo $row["number"];?></td>
<td><?php echo $row["name"];?></td>
<td><?php echo $row["professor"];?></td>
<td><a href="javascript:" onclick = "show_delete_yes(this,<?php echo $row['course_id'];?>);" >Delete</a>&nbsp&nbsp<a href="editcourse.php?id=<?php echo $row['course_id'];?>">Edit</a></td>
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
                echo "<a href='managecourses.php?department=" . $_GET["department"] . "&number=" . $_GET["number"] . "&name=" . $_GET["name"] . "&page=" . ($page - 1) . "'>Back</a>&nbsp";
        }
        for ( $i = 1; $i <= $totalPage; $i++){
                if ($i == $page){
                        echo "&nbsp" . $i . "&nbsp";
                }
                else{
                        echo "&nbsp<a href='managecourses.php?department=" . $_GET["department"] . "&number=" . $_GET["number"] . "&name=" . $_GET["name"] . "&page=" . $i . "'>" . $i . "</a>&nbsp";
                }
        }
        if ($page < $totalPage) {
                echo "&nbsp<a href='managecourses.php?department=" . $_GET["department"] . "&number=" . $_GET["number"] . "&name=" . $_GET["name"] . "&page=" . ($page + 1) . "'>Next</a>";
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