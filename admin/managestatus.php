<?php
include "header.php";
include "mysqli_connection.php";

// if (!isset($_SESSION["username"])){
//         echo "<script>window.location.href='index.php'</script>";
// }
// else{
?>

<div>
<h1>Manage Status</h1>
<a href = "adminhome.php">Back to Manage Home</a>
</div>
<div>
<form action = "#" method = "GET">
<label for = "type">Type(1:user2:course): </label><input type = "text" name = "type" value = "<?php echo isset($_GET['type'])?$_GET['type']:"";?>" />
<label for = "id">PostID: </label><input type = "text" name = "id" value = "<?php echo isset($_GET['id'])?$_GET['id']:"";?>" />
<input type = "submit" value = "Search" />
</form>
</div>
<div>
</div>
<hr />
<div>
<table>
<thead >
<td>Status ID</td><td>Post ID</td><td>Type(1:user2:course)</td><td>Content</td><td>Time</td><td>Operation</td>
</thead>
<tbody>
<?php
$filter = "true";
 if (isset($_GET['type']) && $_GET['type'] !== ""){
         $param = "(entity_type = " . $mysqli->real_escape_string(trim($_GET['type'])) . ")";
         $filter .= " AND " . $param;
 }
 if (isset($_GET["id"]) && $_GET["id"] !== ""){
         $param = "(entity_id = '" . $mysqli->real_escape_string(trim($_GET["PostID"])) . "')";
         $filter .= " AND " . $param;
 }
 // if (isset($_GET["time"]) && $_GET["time"] !== ""){
 //         $param = "(timestamp LIKE '%" . $mysqli->real_escape_string(trim($_GET["title"])) . "%')";
 //         $filter .= " AND " . $param;
 // }
// if (isset($_GET["number"]) && $_GET["number"] !== ""){
//         $param = "(number = " . $mysqli->real_escape_string(trim($_GET["number"])) . ")";
//         $filter .= " AND " . $param;
// }
$perNumber = 25;
if(isset($_GET['page']))$page = $_GET['page'];
else $page=1;
$count = $mysqli->query("select count(*) from statuses WHERE " . $filter . ";");
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
$result = $mysqli->query("select * from statuses WHERE (" . $filter .") LIMIT $startCount, $perNumber");
if ($result){
        while ($row = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row["status_id"];?></td>
<td><?php echo $row["entity_id"];?></td>
<td><?php echo $row["entity_type"];?></td>
<td><?php echo $row["content"];?></td>
<td><?php echo $row["timestamp"];?></td>
<td><a href="javascript:" onclick = "show_delete_yes(this,<?php echo $row['status_id'];?>);" >Delete</a>&nbsp&nbsp<a href="editstatus.php?id=<?php echo $row['status_id'];?>">Edit</a></td>
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
                echo "<a href='managestatus.php?entity_id=" . $_GET['id'] .   "&entity_type=" . $_GET["type"] . "&page=" . ($page - 1) . "'>Back</a>&nbsp";
        }
        for ( $i = 1; $i <= $totalPage; $i++){
                if ($i == $page){
                        echo "&nbsp" . $i . "&nbsp";
                }
                else{
                        echo "&nbsp<a href='manageresources.php?entity_id=" . $_GET['id'] .   "&entity_type=" . $_GET["type"] ."&page=" . $i . "'>" . $i . "</a>&nbsp";
                }
        }
        if ($page < $totalPage) {
                echo "&nbsp<a href='manageresources.php?entity_id=" . $_GET['id'] .   "&entity_type=" . $_GET["type"] ."&page=" . ($page + 1) . "'>Next</a>";
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