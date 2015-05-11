
		<?php
			session_start();
			//Connection Config
			include '../config.php';

			$con = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER,DB_PASSWORD);
		
			//Registration
			
			function Register($con){
				
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
							//create folder for user
							$dir = "../Users/" . $username;
							if(is_dir($dir) == false){
								mkdir($dir);
							}
							$_SESSION['username'] = $username;
							$_SESSION['password'] = $password;
							$_SESSION['email'] = $email;
							$_SESSION['firstname'] = $firstname;
							$_SESSION['lastname'] = $lastname;
			
							//direct user to another page
							header("Location: ../home_page/homepage-index.php");
						}else{
							echo "Error creating the user";
							$_SESSION['error'] = "Error creating user. Please try again.";
							header("Location: ../main_page/mainpage-index.php");
						}
					}
				}
			
			
			if(isset($_POST['regusername'])){
				echo "Registration php is running";
				Register($con);
			}
	?>



