
		<?php
			//Connection Config
			include '../config.php';

			$con = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER,DB_PASSWORD);
		
			//Registration
			
			function Register($con){
				if(!empty($_POST['regusername']) && !empty($_POST['regpassword']) && !empty($_POST['regpasswordcon']) && !empty($_POST['regemail']) && !empty($_POST['regfirstname']) && !empty($_POST['reglastname'])){
					$username = $_POST['regusername'];
					$email = $_POST['regemail'];
					$password = $_POST['regpassword'];
					$cpassword = $_POST['regpasswordcon'];
					$firstname = $_POST['regfirstname'];
					$lastname = $_POST['reglastname'];
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
					$check = $con->prepare("SELECT * FROM accounts WHERE username=:user");
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
						$query = $con->prepare("INSERT INTO accounts (username, password, email, firstname, lastname) VALUES (:name,:hpassword,:email,:fname,:lname) ");
							
						//bind parameters
						$query->bindParam(':name',$username);
						$query->bindParam(':hpassword',$hpassword);
						$query->bindParam(':email',$email);
						$query->bindParam(':fname',$firstname);
						$query->bindParam(':lname',$lastname);
						
						if($query->execute()){
							//Query successful
							echo "User has been created successfully";
							//direct user to another page
						}else{
							echo "Error1";
						}
					}
				}else{
					echo "Please fill out the information";
				}
			}
			
			if(isset($_POST['regaccount'])){
				Register($con);
			}
	?>



