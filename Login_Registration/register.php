
		<?php
			session_start();
			//Connection Config
			include 'config.php';
			
			$con = new PDO('mysql:host="'. DB_HOST .'";dbname="'. DB_NAME .'"', DB_USER,DB_PASSWORD);

			//Registration
			
			function Register($con){
				if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['confpass']) && isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
					$username = $_POST['user'];
					$email = $_POST['email'];
					$password = $_POST['pass'];
					$cpassword = $_POST['confpass'];
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
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



