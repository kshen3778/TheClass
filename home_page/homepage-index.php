<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<link rel="stylesheet" type="text/css" href="homepage-stylesheet.css"/>
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type='text/javascript' src='homepage-script.js'></script>
    
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
    <input id="generalsearch" type="text" placeholder="search" style="padding-left: 5px;" title="browse for lessons and resources">
        
                <div id="hyperlinkbuttons">
            <div id="browsebutton">Browse</div>
            <div id="homepagelink" onclick="location.href = '../home_page/homepage-index.php';">Home Page</div>
            <div id="create">Create</div>
            <div id="forum">Forum</div>
        </div>
        
        
            <div id="navprofile"><?php echo $_SESSION['username'];?></div>
                <div id="profilesettingcon">
                    <div id="accountsettings" onclick="location.href = '../account_settings_page/accountsettings-index.php';">profile</div>
                    <div id="logout" onclick="location.href = '../Login_Registration/logout.php';">logout</div>
                </div>
    </div>
    <div id="htmlpage" class="center">
        <!-- insert links to to buttons-->

                <div id="dashboard">
                    <div id="dashboardtabcontainer">
                        <div id="dashboardyourcourses" class="dashboardtab"><p class="dashboardtabp">my courses</p></div>
                        <div id="dashboardyourtutoringsessions" class="dashboardtab"><p class="dashboardtabp">my tutoring</p></div>
                        <div id="dashboardyoursubs" class="dashboardtab"><p class="dashboardtabp">my subs</p></div>
                        <div id="dashboardyourhistory" class="dashboardtab"><p class="dashboardtabp">my history</p></div>
                        <div id="dashboardyourlikes" class="dashboardtab"><p class="dashboardtabp">my likes</p></div>
                        <div id="fillinspace"></div>
                    </div>
                    <div id="dashboardmystuff">
                        <div id="mycoursesbox">my courses</div>
                        <div id="mytutoringsessionsbox">my tutoring sessions</div>
                        <div id="mysubsbox">my subs box</div>
                        <div id="myhistorybox">my history</div>
                        <div id="mylikesbox">my likes</div>
                    </div>
                </div>
    </div>
</body>
</html>