<!DOCTYPE HTML>
<html>
	<link rel="stylesheet" type="text/css" href="createresources-stylesheet.css"/>
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type='text/javascript' src='createresources-script.js'></script>
    
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
        <input id="title" type="text" placeholder="title">
        <input id="takeaway" type="text" placeholder="takeaway EX: students should know how to find the area of a square by the end of the lesson">
        <div id="gendescriptioncon">
            <p id="gendescriptiontitle">Introduction</p>
            <textarea id="gendescription" maxlength="400" placeholder="short overview of lesson (optional)"></textarea>
        </div>
        <input id="uploadbutton" type="file" value="Upload Resources"/>
        <?php include "upload.php"; ?>
        <!--<div class="resourcecontainer">
            <div class="uploadresource"></div>
            <textarea class="resourcedescription" maxlength="800" placeholder="describe how it should be used in the classroom"></textarea>
        </div>-->
            <!--<div id="createordeleteresourcecon">
                <div id="addcircle">
                    <div id="addcircleplusone"></div>
                    <div id="addcircleplustwo"></div>
                </div>
                <div id="deletecircle">
                    <div id="deletecircleminus"></div>
                </div>
            </div>-->
        <div id="conclusioncon">
        <p id="conclusiontitle">Conclusion</p>
        <textarea id="conclusion" maxlength="800" placeholder="talk about your personal experience, precautions, or misconceptions"></textarea>
        </div>
        <div id="lastspecifications">
        <input id="tags" type="text" placeholder="tags">
        <!--<input id="schoolboard">-->
            <div id="submitresource">submit resource</div>
        </div>
    </div>
</body>
</html>