<?php
session_start();

$title = $_POST['title'];
$takeaway = $_POST['takeaway'];
$intro = $_POST['intro'];
$conclusion = $_POST['conclusion'];
$files = $_POST['filenames'];

$data = array(
	'title' => $title, 
	'takeaway' => $takeaway,
	'intro' => $intro, 
	'conclusion' => $conclusion, 
	'files' => $files
);
//$data[] = ['title' => $title, 'takeaway' => $takeaway, 'intro' => $intro, 'conclusion' => $conclusion, 'files' => $files];
echo $_SESSION['path'];
//generate the json file and copy data to it
$fp = fopen($_SESSION['path'] . 'data.json', 'w');
fwrite($fp, json_encode($data));
fclose($fp);

?>