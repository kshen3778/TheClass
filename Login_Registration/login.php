<?php
session_start(); //start the session for user profile page

/*define('DB_HOST','localhost'); 
define('DB_NAME','test'); //name of database
define('DB_USER','root'); //mysql user
define('DB_PASSWORD',''); //mysql password*/
include 'config.php';

$con = new PDO('mysql:host="'. DB_HOST .'";dbname="'. DB_NAME .'"', DB_USER,DB_PASSWORD);
function SignIn($con){
	$user = $_POST['user2']; //user input field from html
	$pass = $_POST['pass2']; //pass input field from html
	if(isset($_POST['user2'])){ //checking the 'user' name which is from Sign-in.html, is it empty or have some text
		$query = $con->prepare("SELECT * FROM UserName where userName = :user") or die($con->errorInfo());
		$query->bindParam(':user',$user);
		$query->execute();
		
		$data = $query->fetch(PDO::FETCH_ASSOC);
		//$username = $query->fetchColumn(1);
		//$pw = $query->fetchColumn(2);//hashed password in database
		//check username and password
		if($user==$data['userName'] && password_verify($pass, $data['pass'])) {
			// $user and $pass are from POST
			// $username and $pw are from the rows

			//$_SESSION['userName'] = $row['pass'];
			echo "Successfully logged in.";
			//TODO: direct user to main page
		}
		else { 
			header("Location: /sign-in.html");
			//TODO: ask leo to display error message on html
		}
	}
	else{
		echo "INVALID LOGIN";
		
	}
}

if(isset($_POST['submit2'])){
	SignIn($con);
}
?>