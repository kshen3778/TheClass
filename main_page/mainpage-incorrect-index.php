<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<link rel="stylesheet" type="text/css" href="mainpage-incorrect-stylesheet.css"/>
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type='text/javascript' src='mainpage-incorrect-script.js'></script>
    
		<head>
		<title>test</title>
		</head>
<body>
    <div id="navbar">
    <input id="generalsearch"type="text" placeholder="search" title="browse for courses, lessons, and resources"></input>
    </div>
    <p id="slogan" class="center">Bring your Passion of Teaching Outside the Classroom</p>
    <div id="openlogin" class="center"> Login</div>
    <div id="logintab" class="center">
        <div id="closetablog">
        <div class="xbutton">x</div>
        </div>
		<form name="form" method="POST" action="../Login_Registration/login.php">
        <input id="username" name="username" class="loginform" type="text" style="color: white;" placeholder="Username">
        <input id="password" name="password" class="loginform" type="password" style="color: white;" placeholder="Password">
        <input id="SigninButton" style="color: #ffffff" type="submit" name="signin" value="Log-in">
		<?php
		if(isset($_SESSION['error'])){
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}
		?>
		</form>
    <div id="remember-background">
   
    <div id="forgotpass">forgot your password?</div>
	
	<!--<input id="forgotpass" type="submit" name="forgotpass" value="forgot your password?">-->
	
    <input id="remembermebox" type="checkbox" >
    <p id="rememberpass">remember me</p>
        
    </div>
        <div id="incorrectpassoruser"> Incorrect password or username</div>
    <div id="remember-backtop"></div>
    </div>
        <div id="register" class="center"> Register </div>
    <div id="registrationtab" class="center">
        <div id="closetabreg">
        <div class="xbutton">x</div>
        </div>
		<form method="POST" action="../Login_Registration/register.php">
        <input id="regemail" name="regemail"class="loginform" type="text" style="color: white;" placeholder="Email">
        <input id="regusername" name="regusername"class="loginform" type="text" style="color: white;" placeholder="Username">
        <input id="regpassword" name="regpassword"class="loginform" type="password" style="color: white;" placeholder="Password">
        <input id="regpasswordcon" name="regpasswordcon"class="loginform" type="password" style="color: white;" placeholder="Confirm Password">
        <input id="regfirstname" name="regfirstname"class="loginform" type="text" style="color: white;" placeholder="Firstname">
        <input id="reglastname" name="reglastname"class="loginform" type="text" style="color: white;" placeholder="Lastname">
        <!--<div id="regaccount" name="regaccount">Register!</div>-->
		<input id="regaccount" style="color: #ffffff" type="submit" name="regaccount" value="Register">
		</form>
        <div id="regbackground"></div>
        <div id="regbacktop"></div>
		
		
    </div>
</body>
</html>