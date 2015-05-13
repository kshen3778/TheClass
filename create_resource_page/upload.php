<?php
if (isset($_POST['submit'])) {
	$j = 0;     // Variable for indexing uploaded image.
	$target_path = "../Users/";     // Declaring Path for uploaded images. TODO: put into individual user folder
	for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
		// Loop to get individual element from the array
		$validextensions = array("jpeg", "jpg", "png", "PNG", "JPG", "ppt", "pptx", "doc", "docx", "xls", "xlsx", "txt", "pdf", "mp4" );      // Extensions which are allowed.
		$ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
		$file_extension = end($ext); // Store extensions in the variable.
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
		$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
		if (($_FILES["file"]["size"][$i] < 1000000)  && in_array($file_extension, $validextensions)) {  // Approx. 1mb files can be uploaded.
			if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
				// If file moved to uploads folder.
				echo $j. ').<span id="noerror">File uploaded successfully!.</span><br/><br/>';
			} else {     //  If File Was Not Moved.
				echo $j. ').<span id="error">please try again!.</span><br/><br/>';
			}
		} else {     //   If File Size And File Type Was Incorrect.
			echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
		}
	}
}
?>