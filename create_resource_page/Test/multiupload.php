<!DOCTYPE html>
<html>
	<head>
	<title>Upload Files</title>
	<!-------Including jQuery from Google ------>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="script.js"></script>
	<!------- Including CSS File ------>
	<link rel="stylesheet" type="text/css" href="style.css">
	<body>
	<div id="maindiv">
	<div id="formdiv">
	<h2>Upload Files</h2>
	<form enctype="multipart/form-data" action="" method="post">
	First Field is Compulsory. Only allowed files types can be uploaded. File Size Should Be Less Than 1MB.
	<div id="filediv"><input name="file[]" type="file" id="file"/></div>
	<input type="button" id="add_more" class="upload" value="Add More Files"/>
	<input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
	</form>
	<!------- Including PHP Script here ------>
	<?php include "upload.php"; ?>
	</div>
	</div>
	</body>
</html>