<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    type="text/javascript"></script>
<script type="text/javascript" src="jquery.form.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    $('#submitButton').click(function () {
    	    $('#uploadForm').ajaxForm({
    	        target: '#outputImage',
    	        url: 'uploadFile_image.php',
    	        beforeSubmit: function () {
    	        	  $("#outputImage").hide();
    	        	   if($("#uploadImage").val() == "") {
    	        		   $("#outputImage").show();
    	        		   $("#outputImage").html("<div class='error'>Choose a file to upload.</div>");
                    return false; 
                }
    	            $("#progressDivId").css("display", "block");
    	            var percentValue = '0%';

    	            $('#progressBar').width(percentValue);
    	            $('#percent').html(percentValue);
    	        },
    	        uploadProgress: function (event, position, total, percentComplete) {

    	            var percentValue = percentComplete + '%';
    	            $("#progressBar").animate({
    	                width: '' + percentValue + ''
    	            }, {
    	                duration: 5000,
    	                easing: "linear",
    	                step: function (x) {
                        percentText = Math.round(x * 100 / percentComplete);
    	                    $("#percent").text(percentText + "%");
                        if(percentText == "100") {
                        	   $("#outputImage").show();
                        }
    	                }
    	            });
    	        },
    	        error: function (response, status, e) {
    	            alert('Oops something went.');
    	        },
    	        
    	        complete: function (xhr) {
    	            if (xhr.responseText && xhr.responseText != "error")
    	            {
    	            	  $("#outputImage").html(xhr.responseText);
    	            }
    	            else{  
    	               	$("#outputImage").show();
        	            	$("#outputImage").html("<div class='error'>Problem in uploading file.</div>");
        	            	$("#progressBar").stop();
    	            }
    	        }
    	    });
    });
});
</script>

</head>
<body>
     
    <div class="form-container">
        
        <form action="uploadFile_image.php" id="uploadForm" name="frmupload"   method="post" enctype="multipart/form-data">
            <input type="file" id="uploadImage" name="uploadImage" /> &nbsp;<input  id="submitButton" type="submit" name='btnSubmit'value="Upload Image" />
             <?php
             $title=$_REQUEST['tit'];
             
             ?>
            <input type="hidden" name="title" value="<?php echo $title; ?>">
        </form>
        <div class='progress' id="progressDivId">
            <div class='progress-bar' id='progressBar'></div>
            <div class='percent' id='percent'>0%</div>
        </div>
        <div style="height: 0px;"></div>
        <div id='outputImage'></div>
     
    </div>
</body>
</html>