<?php
include "header.php";
include "../mysqli_connection.php";

// if (!isset($_SESSION["username"])){
//         echo "<script>window.location.href='index.php'</script>";
// }
// else{
?>
<div>
<h1>Manage Resources</h1>
<a href = "adminhome.php">Back to Manage Home</a>
</div>
<div>
<form action = "#" method = "GET">
<label for = "course_id">Course ID: </label><input type = "text" name = "course_id" value = "<?php echo isset($_GET['course_id'])?$_GET['course_id']:"";?>" />
<label for = "title">Title: </label><input type = "text" name = "title" value = "<?php echo isset($_GET['title'])?$_GET['title']:"";?>" />
<label for = "upload_id">Upload ID: </label><input type = "text" name = "upload_id"  value = "<?php echo isset($_GET['upload_id'])?$_GET['upload_id']:"";?>" />
<input type = "submit" value = "Search" />
</form>
</div>
<div>
<a href="editresource.php">Upload resource</a>
</div>
<hr />
<div>
<table>
<thead >
<td>Resources ID</td><td>Title</td><td>CourseID</td><td>Upload ID</td><td>Catalog</td><td>Upload time</td><td>URL</td><td>Operation</td>
</thead>
<tbody>
<?php
$filter = "true";
 if (isset($_GET['course_id']) && $_GET['course_id'] !== ""){
         $param = "(course_id = " . $mysqli->real_escape_string(trim($_GET['course_id'])) . ")";
         $filter .= " AND " . $param;
 }
 if (isset($_GET["upload_id"]) && $_GET["upload_id"] !== ""){
         $param = "(entity_id = '" . $mysqli->real_escape_string(trim($_GET["PostID"])) . "')";
         $filter .= " AND " . $param;
 }
 if (isset($_GET["title"]) && $_GET["title"] !== ""){
         $param = "(title LIKE '%" . $mysqli->real_escape_string(trim($_GET["title"])) . "%')";
         $filter .= " AND " . $param;
 }
// if (isset($_GET["number"]) && $_GET["number"] !== ""){
//         $param = "(number = " . $mysqli->real_escape_string(trim($_GET["number"])) . ")";
//         $filter .= " AND " . $param;
// }
$perNumber = 25;
if(isset($_GET['page']))$page = $_GET['page'];
else $page=1;
$count = $mysqli->query("select count(*) from resources WHERE " . $filter . ";");
$rs = mysqli_fetch_array($count);
$totalNumber = $rs[0];
if ($totalNumber == 0){
        echo "<div><font color='red'>No result!</font></div>";
}
else{
        echo "<div>Found " . $totalNumber. " events.</div>";
}
$totalPage = ceil($totalNumber / $perNumber);
if ($page < 1) {
        $page = 1;
}
else if ($page > $totalPage){
        $page = $totalPage;
}
$startCount = ($page - 1) * $perNumber;
$result = $mysqli->query("select * from resources WHERE (" . $filter .") LIMIT $startCount, $perNumber");
if ($result){
        while ($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row["resource_id"];?></td>
<td><?php echo $row["title"];?></td>
<td><?php echo $row["course_id"];?></td>
<td><?php echo $row["user_id"];?></td>
<td><?php echo $row["catalog"];?></td>
<td><?php echo $row["timestamp"];?></td>
<td><?php echo $row["url"];?></td>
<td><a href="javascript:" onclick = "show_delete_yes(this,<?php echo $row['resources_id'];?>);" >Delete</a>&nbsp&nbsp<a href="editresources.php?id=<?php echo $row['resources_id'];?>">Edit</a></td>
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
                echo "<a href='manageresources.php?course_id=" . $_GET['course_id'] .   "&upload_id=" . $_GET["PostID"] . "&title=" . $_GET["title"] ."&page=" . ($page - 1) . "'>Back</a>&nbsp";
        }
        for ( $i = 1; $i <= $totalPage; $i++){
                if ($i == $page){
                        echo "&nbsp" . $i . "&nbsp";
                }
                else{
                        echo "&nbsp<a href='manageresources.php?course_id=" . $_GET['course_id'] . "&upload_id=" . $_GET["PostID"] . "&title=" . $_GET["title"] ."&page=" . $i . "'>" . $i . "</a>&nbsp";
                }
        }
        if ($page < $totalPage) {
                echo "&nbsp<a href='manageresources.php?course_id=" . $_GET['course_id'] .  "&upload_id=" . $_GET["PostID"] ."&title=" . $_GET["title"] ."&page=" . ($page + 1) . "'>Next</a>";
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