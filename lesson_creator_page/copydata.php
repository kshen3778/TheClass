<?php
session_start();
if (isset($_POST['title']) && !empty($_POST['title'])) {
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$lecture = $_POST['lecture'];
	$reading = $_POST['reading'];
	
	$target_path = "../Users/" . $_SESSION['username'] . "/Lessons/";     // Declaring Path for uploaded files. Upload to folder
	//$filename = $_FILES['fileToUpload']; //file name
	//$_SESSION['file'] = $_FILES['fileToUpload']['name']; //store the file name as a session
	
	//generate lesson directory
	$target_path = $target_path . $title;
	if(is_dir($target_path) == false){
		mkdir($target_path);
	}
	$target_path = $target_path . "/";
	$_SESSION['path'] = $target_path; //store the path to the lesson folder as a session variable				
	
	$target_path = $target_path . "data.txt";
	
	//1st line: title
	//2nd line: description
	//3rd line: lecture file
	//4th line: support file
	$myfile = fopen($target_path, "w");
	$data = $title . PHP_EOL . $desc . PHP_EOL . $lecture . PHP_EOL . $reading;
	fwrite($myfile, $data);
	/*$txt = $title . "\n";
	fwrite($myfile, $txt); //1st
	$txt = $desc . "\n";
	fwrite($myfile, $txt); //2nd
	$txt = $lecture . "\n";
	fwrite($myfile, $txt); //3rd
	$txt = $reading . "\n"; //Note: extra line when reading from file
	fwrite($myfile, $txt); //4th*/
	
	fclose($myfile);
		
	
}
?>