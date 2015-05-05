<!DOCTYPE HTML>
<html>
	<head>
		<title>Reset Code Verification</title>
		<link rel="stylesheet" type="text/css" href="style-sign.css">
	</head>
	<body id="body-color">
		
		<div id="register-form">
			<fieldset style="width:30%"><legend>Enter the reset code sent to you via email</legend>
				<form method="POST" action ="">
					Username <br><input type="text" name="user" size="40"><br>
					Code <br><input type="text" name="code" size="40"><br>
					<input id="button" type="submit" name="submit" value="Submit">
				</form>
			</fieldset>
		</div>
			<?php
				//Connection Config
				include '../config.php';
		
				$con = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER,DB_PASSWORD);
				//$con2 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				
				function verify($con){
					if(!empty($_POST['user']) && !empty($_POST['code'])){
						$key = $_POST['code'];
						$query = $con->prepare("SELECT * FROM accounts WHERE username = :user");
						$query->bindParam(':user',$username);
						$username = $_POST['user'];
						$query->execute();
						$result = $query->fetch(PDO::FETCH_ASSOC);
						
						if(!empty($result)){
							//echo $key;
							if($result['resetkey'] == $key){ 
								//redirect user to password Reset page
								header("Location: passreset.php");
							}else{
								echo "No such code exists. Please try again";
							}
						}
					}
				}
				if(isset($_POST['submit'])){
					verify($con);
				}
			?>
	</body>
</html>