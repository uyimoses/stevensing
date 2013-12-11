<?php
//include page header, which includes mysqli connection
include "header.php";

//include leftside bar
include "leftside.php";

//include leftside of home
include "leftside_home.php"

?>
<script>
	function changedPicture(obj){
		
		//window.location.href = "home";
	}


	function changePicture(picture_name){
		action(
			"changePictureAction", 
			changedPicture, 
			defaultErrorHandler, 
			"POST", 
			{
				"picture_name": picture_name
			}
		);
	}

	function uploadSuccess(obj){
		var html = "<h1>Preview</h1><img src='"
			+ obj.url
			+ "' title='Preview' alt='Preview' class='preview'><br><br><button onclick='changePicture(\""
			+ obj.picture_name
			+ "\");'>Submit</button>";
		$("#preview").html(html);
	}

	function uploadError(obj){
		$("#picture_error").text(obj.picture_error);
	}

	function uploadPicture(){
		var form = $('#uploadForm');
	    var formData = new FormData(document.getElementById("uploadForm"));
	    //console.log(formData);
	    $.ajax({
	        type: "POST",
	        url: "uploadPictureAction",
	        data: formData,
	        dataType: "text",
	        processData: false,
        	contentType: false,
	        success: function(data){
	            //console.log(data);
	            var obj = eval('(' + data + ')');
	            if (obj.error == "none"){
					uploadSuccess(obj);
				}
				else if (obj.error == "server"){
					stopHacking(obj);
				}
				else{
					uploadError(obj);
				}
	        },
		    error: function(data){
				alert("Sorry. The Web Server is not avaliable for now.");
			}
	    });
	}
</script>
<section class="span-14 main_view">
    <div id="editprofile">
        <h1>Profile Picture</h1>
        <form id="uploadForm" enctype="multipart/form-data">
        	<input type="file" name="file" id="file">
        </form>
        <div class="check_message" id="picture_error"></div>
        <button onclick="uploadPicture();">Upload</button>
        <div id="preview"></div>
    </div>
</section>


<?php
//include rightside bar
include "rightside.php";

//include page footer
include "footer.php";