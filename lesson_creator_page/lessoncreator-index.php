<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<link rel="stylesheet" type="text/css" href="lessoncreator-stylesheet.css"/>
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type='text/javascript' src='lessoncreator-script.js'></script>
    
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
        <input id="lessontitle" placeholder="title of your lesson">
        <textarea id="lessondescription" placeholder="your lesson description" maxlength="800"></textarea>
        
        

        
        <!--lecture upload-->
        <div id="submitsupportingcontentcon">
            <div id="submitsupportingcontent"> Submit Lecture Content</div>
        </div>

        	<form id="confirmresourceform" enctype="multipart/form-data" method="post" style="display: none;">
		      <input id="uploadsupportingcontent" name="fileToUpload1" type="file" value="Upload Resources"/>
	       </form>
        
		<!-- Text area for supporting reading-->
        <div id="uploadtextareaorreading">
        <textarea id="writenlecture"></textarea>
		
        <!--reading upload-->
        <div id="insertreading">Insert Reading</div>
            <form id="confirmreadingform" enctype="multipart/form-data" method="post" style="display: none;">
		      <input id="uploadreading" name="fileToUpload2" type="file" value="Upload Resources"/>
	       </form>
        </div>
        <div id="submitchanges">Submit Changes</div>
    </div>
</body>
</html>