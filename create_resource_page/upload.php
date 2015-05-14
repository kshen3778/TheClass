<?php
session_start();
if (isset($_POST['submit'])) {
	$j = 0;     // Variable for indexing uploaded image.
	$target_path = "../Users/" . $_SESSION['username'] . "/";     // Declaring Path for uploaded files. Upload to folder
	$filename = $_FILES['file']['name']; //all the file names
	//$_SESSION['files'] = $filename; //store the array of files as a session variable
	
	//generate temporary directory
	$target_path = $target_path . md5(uniqid());
	if(is_dir($target_path) == false){
		mkdir($target_path);
	}
	$target_path = $target_path . "/";
	$_SESSION['path'] = $target_path; //store the path to the temporary folder as a session variable				
	for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
		// Loop to get individual element from the array
		$validextensions = array("jpeg", "jpg", "png", "PNG", "JPG", "ppt", "pptx", "doc", "docx", "xls", "xlsx", "txt", "pdf", "mp4" );      // Extensions which are allowed.
		$ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
		$file_extension = end($ext); // Store extensions in the variable.
		//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
		$target_path = $target_path . "/" . basename($_FILES['file']['name'][$i]) . "." . $ext[count($ext) - 1];
		$j = $j + 1;      // Increment the number of uploaded files according to the files in array.
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