<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<link rel="stylesheet" type="text/css" href="accountsettings-stylesheet.css"/>
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type='text/javascript' src='accountsettings-script.js'></script>
    
		<head>
		<title>test</title>
		</head>
<body>
    <div id="navbar">
    <input id="generalsearch" type="text" placeholder="search" style="padding-left: 5px;"></input>
    </div>
<div id="page" class="center">
    <div id="topbar"></div>
    <div id="profile">
    <!--do the photo link for people that don't have a pic-->
        <div id="profiledata">
            <div id="name"></div>
            <div id="reputation">...reputation</div>
            <div id="followers">...followers</div>
        </div>
    </div>
        <div id="yourstats">
            <p id="statistics">Statistics</p>
            <p id="membersince">Member since</p>
            <p id="membersince">Content Liked:</p><!--500pgs-->
            <p id="membersince">Content Downloaded:</p>
        </div>
        <div id="personalinfo">
            <!-- get rid of backgorund color-->
        <p class="unchangeinfo">Username:
		<?php echo $_SESSION['username'];?>
		</p>
        <p class="unchangeinfo">Reset Password</p>
        <p class="unchangeinfo">E-mail:
		<?php echo $_SESSION['email'];?>
		</p>
            <div>
                <textarea maxlength="400" id="yourinterests" class="write" placeholder="What do you like?"></textarea>
                <div class="edit" title="click me to edit"> Your Interests:</div>
            </div>
            <div>
                <textarea maxlength="400" id="aboutyou" class="write" placeholder="tell us a bit of yourself"></textarea>
                <div id="aboutyoupar" class="edit" title="click me to edit">About You:</div>
            </div>
            <button id="savechanges">Save Changes</button>
            <button id="cancelchangeinfo">Cancel</button>
        </div>
        <div id="youractivity">
            <div id="activitytabs">
                <div id="activitycontenttab">Your Content</div>
                <div id="activitypeertuttab">Peer Tutoring Sessions</div>
            </div>
            <div id="youruploadedcontent">urpoloadedcontent</div>
            <div id="yourpeertutoringsessions">yourpeertutsessons</div>
        </div>
    </div>
</body>
</html>