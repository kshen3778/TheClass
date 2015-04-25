<!DOCTYPE HTML>
<html>
	<head>
		<title>Reset Password</title>
		<link rel="stylesheet" type="text/css" href="style-sign.css">
	</head>
	<body id="body-color">
		
		<div id="register-form">
			<fieldset style="width:30%"><legend>Enter your email to reset password</legend>
				<form method="POST" action ="">
					User <br><input type="text" name="user" size="40"><br>
					Email <br><input type="email" name="email" size="40"><br>
					<input id="button" type="submit" name="submit" value="Submit">
				</form>
			</fieldset>
		</div>
	<?php
		//Connection Config
		define('DB_HOST','localhost'); 
		define('DB_NAME','test'); //name of database
		define('DB_USER','root'); //mysql user
		define('DB_PASSWORD',''); //mysql password
		$con = new PDO('mysql:host=localhost;dbname=test','root','');
		$con2 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		
		function passReset($con, mysqli $con2){
			if(isset($_POST['user'])){
				$query = $con->prepare("SELECT * FROM UserName WHERE userName = :user");
				$query->bindParam(':user',$username);
				$username = $_POST['user'];
				
				$query->execute();
				$result = $query->fetch(PDO::FETCH_ASSOC);
				
				
				if(!empty($result)){ //if the user exists
					//get result and store in array
					//$rows = mysqli_fetch_array($result);
					//generate unique password reset token
					$key = uniqid(mt_rand(), true);
					$token = md5($_POST['email'].$key);
					
					
					//store token into the table in user's row and set it to expire in 48 hours
					$query2 = $con->prepare("UPDATE UserName SET resetkey = '$token', expire = NOW() + INTERVAL 48 HOUR WHERE userName = :user");
					$query2->bindParam(':user',$username);
					$query2->execute();
					
					//set the token to expire in 48 hours
					/*$query3 = $con->prepare("CREATE EVENT delete_expired_101 ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 48 HOUR DO UPDATE UserName SET resetkey = 'NULL' WHERE userName = :user");
					$query3->bindParam(':user',$username);
					$query3->execute();*/
					
						//send user password reset email
						require '/phpmailer/PHPMailerAutoload.php';

						$mail = new PHPMailer;

						//$mail->SMTPDebug = 3;                               // Enable verbose debug output

						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = 'kshen3778@gmail.com';                 // SMTP username
						$mail->Password = 'qazwsx1703';                           // SMTP password
						$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 587;                                    // TCP port to connect to

						$mail->From = 'kshen3778@gmail.com';
						$mail->FromName = 'Kevin Shen';
						//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
						$mail->addAddress('kevin.shen18@yahoo.com');               // Name is optional
						$mail->addReplyTo('kshen3778@gmail.com', 'Kevin Shen');
						//$mail->addCC('cc@example.com');
						//$mail->addBCC('bcc@example.com');

						//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
						//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
						$mail->isHTML(true);                                  // Set email format to HTML

						$mail->Subject = 'Here is the subject';
						$mail->Body    = "Your reset key is: " . $token;
						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						if(!$mail->send()) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						} else {
							echo 'Message has been sent';
						}
				}else{
					echo "Error, message not sent";
				}
			}
		}
		
		if(isset($_POST['submit'])){
			passReset($con, $con2);
		}
		
	?>
	
	</body>
</html>