<?php
//session_start();
if (isset($_POST['confirmresource'])) {
	//echo "upload php script is working";
	$j = 0;     // Variable for indexing uploaded image.
	$target_path = "../Users/" . $_SESSION['username'] . "/";     // Declaring Path for uploaded files. Upload to folder
	$filename = $_FILES['fileToUpload']; //file name
	$_SESSION['file'] = $_FILES['fileToUpload']['name']; //store the file name as a session
	
	//generate temporary directory
	$target_path = $target_path . md5(uniqid());
	if(is_dir($target_path) == false){
		mkdir($target_path);
	}
	$target_path = $target_path . "/";
	$_SESSION['path'] = $target_path; //store the path to the lesson folder as a session variable				
	
		// Loop to get individual element from the array
		$validextensions = array("jpeg", "jpg", "png", "PNG", "JPG", "ppt", "pptx", "doc", "docx", "xls", "xlsx", "txt", "pdf", "mp4" );      // Extensions which are allowed.
		//$ext = explode('.', basename($_FILES['fileToUpload']));   // Explode file name from dot(.)
		//$file_extension = end($ext); // Store extensions in the variable.
		//$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
		$dir = $target_path . "/" . basename($_FILES['fileToUpload']["name"]);
		//$j = $j + 1;      // Increment the number of uploaded files according to the files in array.
		if (($_FILES['fileToUpload']["size"] <= 1000000)) {  // Approx. 1mb files can be uploaded.
			if (move_uploaded_file($_FILES['fileToUpload']["tmp_name"], $dir)) {
				// If file moved to uploads folder.
				//echo "File has been uploaded";
				header("Location: createresources-index.php");
			} else {     //  If File Was Not Moved.
				//echo "File failed to upload";
			}
		} else {     //   If File Size And File Type Was Incorrect.
			//echo "File too large";
		}
		
		
	
}
?>