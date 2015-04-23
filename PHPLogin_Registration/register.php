<!-- <!DOCTYPE HTML>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="style-sign.css">
	</head>
	<body id="body-color">
		
		<div id="register-form">
			<fieldset style="width:30%"><legend>Register as User</legend>
				<form method="POST" action ="">
					Email <br><input type="email" name="email" size="40"><br>
					User <br><input type="text" name="user" size="40"><br>
					Password <br><input type="password" name="pass" size="40"><br>
					Confirm Password <br><input type="password" name="confpass" size="40"><br>
					<input id="button" type="submit" name="submit" value="Register">
				</form>
			</fieldset>
		</div> -->
		<?php
			session_start();
			//Connection Config
			define('DB_HOST','localhost'); 
			define('DB_NAME','test'); //name of database
			define('DB_USER','root'); //mysql user
			define('DB_PASSWORD',''); //mysql password
			$con = new PDO('mysql:host=localhost;dbname=test','root','');
			//$con2 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
			//$db = mysqli_select_db($con,DB_NAME) or die(mysqli_connect_error()); 
			//Registration
			function Register($con){
				if(isset($_POST['user']) && isset($_POST['pass'])){
					$username = $_POST['user'];
					$email = $_POST['email'];
					$password = $_POST['pass'];
					$cpassword = $_POST['confpass'];
					//check username for weird symbols
					if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)){
						// one or more of the 'special characters' found in string
						//header("Location: /register.php");
						echo "Your username should only contain letters and numbers";
						exit;
					}
					
					//check for password length
					if(strlen($password) < 6){
						echo "Password should be longer than 5 characters";
						exit;
					}
					
					//confirm password(check if two pass are the same)
					if(!($password == $cpassword)){
						echo "The passwords are not the same. Please reconfirm your password.";
						exit;
					}
					
					//check if username is taken
					$check = $con->prepare("SELECT * FROM UserName WHERE userName=:user");
					$check->bindParam(':user',$username);
					$check->execute();
					$result = $check->fetch(PDO::FETCH_ASSOC);
					
					if(!empty($result)){
						//header("Location: /register-page.html"); //direct browser back to sign in
						echo "User is already taken";
						exit;
					}else{ //otherwise proceed to register new user
						
						//Hashing of password
						$hpassword = password_hash($password, PASSWORD_DEFAULT);
						
						//Prepared statements for SQL injection prevention
						$query = $con->prepare("INSERT INTO UserName (userName, pass, email) VALUES (:name,:hpassword,:email) ");
							
						//bind parameters
						$query->bindParam(':name',$username);
						$query->bindParam(':hpassword',$hpassword);
						$query->bindParam(':email',$email);
						
						if($query->execute()){
							//Query successful
							echo "User has been created successfully";
							//direct user to another page
						}else{
							echo "Error1";
						}
					}
				}else{
					echo "Error2";
				}
			}
			
			if(isset($_POST['submit'])){
				Register($con);
			}
	?>
<!--	</body>
</html> -->


