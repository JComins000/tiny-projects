<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='style.css'/>
<link rel='icon' type='image/jpeg' href='favicon.jpg'>
<script src='http://code.jquery.com/jquery-3.0.0.min.js'></script>
<script>
$(function() {
	$('#fileForm').submit( function (e) {
		e.preventDefault();
        $.ajax({
            processData: false,
    		contentType: false,
            url: 'upload.php',
            type: 'POST',
            data: new FormData(this),
        })
          .done( function (data) {
            $.post('markup.php', 'wc=' + data, function (response) {
    		    $('#wc').html(response);
            });
    	});
    });
    $('#fileBox').click( function(){
        $('#upload').click();
    });
	$('#upload').change( function() {
	  $('#fileForm').submit();
	});
});
</script>
</head>
<body>
<?php include 'header.php';?>
<div class='contain'>
<form id='fileForm' enctype='multipart/form-data'>
    <input type='file' name='fileToUpload' id='upload'>
	<input type='button' class='btn btn-gry' id='fileBox' value='Upload' autofocus>
</form>
<div id='wc'></div>
</div>
</body>
</html>