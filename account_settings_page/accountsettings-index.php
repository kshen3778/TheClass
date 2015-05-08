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
    <!--<div id="createpopupbox">-->
    <div id="createpopupbox" class="center">
            <div id="closecreate">
        <div class="xbutton">x</div>
            </div>
                <div id="resourcelessoncreate">resource/lesson</div>
                <div id="coursecreate">course</div>
    </div>
<body>
        <navbar id="navbar"></navbar>
    <div id="navbarinfo" class="center">
    <input id="generalsearch" type="text" placeholder="search" style="padding-left: 5px;" title="browse for courses, lessons, and resources">
        
                <div id="hyperlinkbuttons">
            <div id="browsebutton">Browse</div>
            <div id="peertutoring">Peer Tutoring</div>
            <div id="create">Create</div>
            <div id="forum">Forum</div>
        </div>
        
        
            <div id="navprofile"></div>
                <div id="profilesettingcon">
                    <div id="accountsettings">account settings</div>
                    <div id="logout">logout</div>
                </div>
    </div>
<div id="htmlpage" class="center">
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
            <div id="milestoneawards"></div>
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
        <div id="featuredlessonsandcourses">
            featured lessons and courses
        </div>
    <div id="youruploads"> your uploads</div>
    <div id="youractivity">your activity</div>
    <div id="addachapter"> 
            <div id="addchaptercircle">
                <div id="addchapterplusone"></div>
                <div id="addchapterplustwo"></div>
            </div>
        <div id="addchapterp">group your lessons to form a chapter</div>
    
    </div>
    </div>
</body>
</html>