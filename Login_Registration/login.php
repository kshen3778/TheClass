<?php
session_start();
include '../config.php';

$con = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER,DB_PASSWORD);
		
function SignIn($con){
	if(!empty($_POST['username']) && !empty($_POST['password'])){ //checking if user and pass are empty or have some text
		$user = $_POST['username']; //user input field from html
		$pass = $_POST['password']; //pass input field from html
		
		$query = $con->prepare("SELECT * FROM accounts where username = :user");
		$query->bindParam(':user',$user);
		$query->execute();
		
		$data = $query->fetch(PDO::FETCH_ASSOC);
		//$username = $query->fetchColumn(1);
		//$pw = $query->fetchColumn(2);//hashed password in database
		//check username and password
		if($user==$data['username'] && password_verify($pass, $data['password'])) {
			// $user and $pass are from POST
			// $username and $pw are from the rows

			//$_SESSION['userName'] = $row['pass'];
			$_SESSION['username'] = $user;
			$_SESSION['password'] = $pass;
			$_SESSION['email'] = $data['email'];
			$_SESSION['firstname'] = $data['firstname'];
			$_SESSION['lastname'] = $data['lastname'];
			
			echo "Successfully logged in.";
			header("Location: ../home_page/homepage-index.php");
			
		}
		else { 
			$_SESSION['error'] = "Invalid username or password.";
			//echo "Invalid username or password";
			header("Location: ../main_page/mainpage-incorrect-index.php");
			
		}
	}
	else{
		echo "INVALID LOGIN";
		$_SESSION['error'] = "Please enter your username and password.";
		header("Location: ../main_page/mainpage-index.php");
		
	}
}

if(isset($_POST['signin'])){
	SignIn($con);
}
?>