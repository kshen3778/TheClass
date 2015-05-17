<?php
$title = $_POST['title'];
$takeaway = $_POST['takeaway'];
$intro = $_POST['intro'];
$conclusion = $_POST['conclusion'];
$files = $_POST['files'];

$data = array();
$data[] = ['title' => $title, 'takeaway' => $takeaway, 'intro' => $intro, 'conclusion' => $conclusion, 'files' => $files];
//generate the json file and copy data to it
/*$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);*/

?>