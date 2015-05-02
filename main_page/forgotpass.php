
	<?php
		//Connection Config
		include '../Login_Registration/config.php';
		
		$con = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER,DB_PASSWORD);
		//$con = new PDO('mysql:host=localhost;dbname=test','root','');
		//$con2 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		function passReset($con){
			
				$username = $_POST['name'];
				
				$query = $con->prepare("SELECT * FROM accounts WHERE username = :user");
				$query->bindParam(':user',$username);
				
				$query->execute();
				$result = $query->fetch(PDO::FETCH_ASSOC);
				
				
				if(!empty($result)){ //if the user exists
					
					//TODO: get the email from the selected row(because we no longer have an email input field)
					
					//generate unique password reset token
					$key = uniqid(mt_rand(), true);
					$token = md5($result['email'].$key);
					
					
					//store token into the table in user's row and set it to expire in 48 hours
					$query2 = $con->prepare("UPDATE accounts SET resetkey = '$token', expire = NOW() + INTERVAL 48 HOUR WHERE username = :user");
					$query2->bindParam(':user',$username);
					$query2->execute();
					
					//TODO: send email to the email retrieved from the first query
					//TODO: give user the link to the password reset page
					
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
				
			}
		}
		
		if(isset($_POST['name'])){
			echo "this function works";
			passReset($con);
		}else{
			echo "error1";
		}
		
	?>
