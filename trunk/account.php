<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";
?>
<script type="text/javascript">
	$("#main_menu ul a:nth-child(2)").addClass('current');
</script>
<section class="span-14">
	Content
</section>
<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";