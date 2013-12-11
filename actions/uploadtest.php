<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
<script>
	function upload(){
		var popup = window.open()
	    var form = $('#uploadForm');
	    var formData = new FormData(document.getElementById("uploadForm"));
	    console.log(formData);
	    $.ajax({
	        type: "POST",
	        url: "uploadPictureAction.php",
	        data: formData,
	        dataType: "text",
	        processData: false,
        	contentType: false,
	        success: function(data){
	            console.log(data);
	        }
	    });
	}
</script>
<form id="uploadForm" enctype="multipart/form-data">
	<input type="file" name="file" id="file">
	<a href="javascript:" onclick="upload();">Upload</a>
</form>
</body>