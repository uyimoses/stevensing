<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";

//include leftside of home
include "leftside_home.php"

?>

<section class="span-14 main_view">
    <div id="editprofile">
        <label for="file">Upload Your Profile Picture:</label>
        <form  method="post" enctype="multipart/form-data">
        	<input type="file" name="file" id="file"><br>
        	<input type="submit" name="submit" value="Submit" id="ressubmit">
        </form>
    </div>
</section>


<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";