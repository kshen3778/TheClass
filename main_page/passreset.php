<!DOCTYPE HTML>
<html>
	<head>
		<title>Reset your password</title>
		<link rel="stylesheet" type="text/css" href="style-sign.css">
	</head>
	<body id="body-color">
		
		<div id="register-form">
			<fieldset style="width:30%"><legend>Reset your password</legend>
				<form method="POST" action ="">
					Enter account username <br><input type="text" name="user" size="40"><br>
					Code <br><input type="text" name="code" size="40"><br>
					New Password <br><input type="password" name="pass" size="40"><br>
					Confirm New Password <br><input type="password" name="confpass" size="40"><br>
					<input id="button" type="submit" name="submit" value="Submit">
				</form>
			</fieldset>
		</div>
	<?php
		//Connection Config
		include '../config.php';
		
		$con = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER,DB_PASSWORD);
		//$con2 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		
		function passReset( $con){
			if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['confpass']) && !empty($_POST['code'])){
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$confpass = $_POST['confpass'];
				$key = $_POST['code'];
				
				//purge expired reset keys
				$purge = $con->prepare("UPDATE accounts SET resetkey = NULL WHERE expire < NOW()");
				$purge->execute();
				
				if($pass == $confpass){
					//$dbunames = mysqli_query($con,"SELECT * FROM UserName WHERE userName='$user'");
					$query = $con->prepare("SELECT * FROM accounts WHERE username = :user");
					$query->bindParam(':user',$user);
					$query->execute();
					$result = $query->fetch(PDO::FETCH_ASSOC);
					
					if(!empty($result)){
						//set reset key to null
						$query2 = $con->prepare("UPDATE accounts SET resetkey = NULL WHERE username = :user");
						$query2->bindParam(':user',$user);
						$query2->execute();
						if($result['resetkey'] == $key){ //check if token is correct
								
							
							//RESET PASSWORD
							//check for password length
							if(strlen($pass) > 5){
								//Hashing of password
								$hpassword = password_hash($pass, PASSWORD_DEFAULT);
								
								//Prepared statements for SQL injection prevention
								$query3 = $con->prepare("UPDATE accounts SET password = :hpassword WHERE username = :user");
									
								//bind parameters
								$query3->bindParam(':user', $user);
								$query3->bindParam(':hpassword',$hpassword);
								
								if($query3->execute()){
									//Query successful
									echo "Password has been updated successfully";
									//direct user to another page
								}else{
									echo "Error1";
								}
							}else{
								echo "Password should be longer than 5 characters";
								exit;
							}
						}else{
							echo "No such reset key exists.";
						}
					}else{
						echo "No such username exist";
					}
					
				}else{
					echo "The two passwords don't match. Please reconfirm";
				}
			}
		
		}
		if(isset($_POST['submit'])){
			passReset($con);
		}
	?>
	</body>
</html>
