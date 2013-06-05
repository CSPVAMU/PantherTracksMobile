<?php
	header('Access-Control-Allow-Origin: *');
?>

<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width,user-scalable=no" />

<title>PantherTracks</title>

<style type="text/css">  
.searchbox {
position:absolute;
    top:-46px;
height:44px;
z-index:100;
	background-image:-webkit-linear-gradient(top, #2f3031, #161717 50%, #0a0a0a 51%, #000000);
	background-image:-webkit-linear-gradient(top, #2f3031, #161717 50%, #0a0a0a 51%, #000000);
	background-image:linear-gradient(rgba(255,255,255,0.15),rgba(255,255,255,0)),linear-gradient(top,#92a3b9,#7f93ad 50%,#768ba7 51%,#6d83a1);
	-webkit-box-shadow:rgba(255,255,255,0.3) 0 1px 0 inset;
	box-shadow:rgba(255,255,255,0.3) 0 1px 0 inset
border-top:solid 1px #95a5bc;
border-bottom:solid 1px #2d3642;
width:100%;
margin:0;
-webkit-transition: all 1s ease-out;
-webkit-transition-duration: 0.3s;
}
.searchbox form {
	position: relative;
	height:26px;
	-webkit-border-image:url(img/searchfield.png) 4 14 1 24;
	display:block;
	border-width:4px 14px 1px 24px;
	margin: 7px 80px 0 8px ; 
}

.searchbox input[type="search"]{
position:relative;
border:0;
-webkit-appearance:none;
height:18px;
float:left;
font-size:16px;
top:3px;
left:6px;
padding:0;
}

.searchbox input[type="search"]{
width:100%;
}

#search:focus{outline: none;}	

.searchbox #x{
	position: absolute;
	z-index: 20;
	right: -8px;
	top: 2px;
	-moz-border-radius: 15px;
	-webkit-border-radius: 15px;
	font-size: 17px;
	line-height: 14px;
	background: #b3b3b3;
	height: 20px;
	width: 20px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #fff;
	text-align: center;
	cursor:pointer;
	display:none;
}
#my_button{
	position:absolute;
	font-family:"Helvetica Neue",Helvetica;
	overflow:hidden;
	width:auto;
	height:29px;
	font-size:12px;
	font-weight:bold;
	line-height:29px;
	text-overflow:ellipsis;
	text-decoration:none;
	white-space:nowrap;
	background:none;
	bottom:6px;
	right:10px;
	margin:0;
	padding:0 10px;
	color:white;
	text-shadow: rgba(0, 0, 0, 0.5) 0px -1px 0;
	-webkit-box-shadow:rgba(255,255,255,0.2) 0 1px 0,rgba(0,0,0,0.2) 0 1px 2px inset;
	box-shadow:rgba(255,255,255,0.2) 0 1px 0,rgba(0,0,0,0.2) 0 1px 2px inset;
	border: 1px solid rgba(0, 0, 0, .4);
	-webkit-border-radius:5px;
	border-radius:5px;
	background-image:none;
	background-color:#50709a;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(76,76,76,0.2)), color-stop(50%,rgba(44,44,44,0.2)), color-stop(51%,rgba(0,0,0,0.2)), color-stop(100%,rgba(19,19,19,0.2)));
background: -webkit-linear-gradient(top, rgba(76,76,76,0.2) 0%,rgba(44,44,44,0.2) 50%,rgba(0,0,0,0.2) 51%,rgba(19,19,19,0.2) 100%);
	background: linear-gradient(top, rgba(76,76,76,0.2) 0%,rgba(44,44,44,0.2) 50%,rgba(0,0,0,0.2) 51%,rgba(19,19,19,0.2) 100%);
}
#my_button.active{
	border-color:#243346;
	background-image:none;
	background-color:#476489;
	background-image:-webkit-gradient(linear,50% 0%,50% 100%,color-stop(0%,#6b89b2),color-stop(50%,#50709a),color-stop(51%,#476489),color-stop(100%,#3e5779));
	background-image:-webkit-linear-gradient(top,#6b89b2,#50709a 50%,#476489 51%,#3e5779);
	background-image:linear-gradient(top,#6b89b2,#50709a 50%,#476489 51%,#3e5779);
	color:white;
	text-shadow: rgba(0, 0, 0, 0.5) 0px -1px 0;
}
</style>

<link rel="stylesheet" href="../user/src/apple.css"/>
<link rel="stylesheet" href="../user/src/itabbar.css"/>
<link rel="stylesheet" href="../user/src/style.css"/>

<script type="text/javascript" src="../user/src/iscroll.js"></script>
<script type='text/javascript' src='../user/src/zepto.min.js'></script> 
<script type='text/javascript' src='../user/src/jqtouch.min.js'></script>
<script type="text/javascript" charset="utf-8" src="../cordova-2.2.0.js"></script>
<script type="text/javascript" charset="utf-8" src="../main.js"></script>


<script type='text/javascript' src='../user/src/jqt.autotitles.min.js'></script>  
<script type='text/javascript' src='../user/src/yql.js'></script>  

<link rel="stylesheet" href="../user/src/add2home.css">
<script type="text/javascript" src="../user/src/add2home.js" charset="utf-8"></script>

<script type="text/javascript">
var myScroll;
function loaded() {
	setTimeout(function () {
		myScroll = new iScroll('wrapper');
	}, 100);
}

/* high compatibility (iDevice + Android)*/
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', setTimeout(function () { loaded(); }, 200), false);
</script>

<script type="text/javascript" charset="utf-8">
if((navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.match(/iPod/i))||(navigator.userAgent.match(/iPad/i))){
	var jQT = new $.jQTouch({
   		//cacheGetRequests: false,
    	icon: '../user/img/iTab-glossy.png',
    	icon4: '../user/img/iTab-glossy.png',
    	addGlossToIcon: false,
    	startupScreen: '../user/img/istartup.png',
    	themeSelectionSelector: '#jqt #themes ul',
		useFastTouch: true,
    	statusBar: 'default',
    	preloadImages: [
		'../user/img/loading.gif',
		'../user/img/iTab-glossy.png',
		'../user/img/pinstripes2.gif',
		'../user/img/UIBack.png',
		'../user/img/UIBackPressed.png',
		]
	});
} else {	
	var jQT = new $.jQTouch({
    	//statusBar: 'black-translucent',
    	themeSelectionSelector: '#jqt #themes ul',
		useFastTouch: false,
    	statusBar: 'default',
    	preloadImages: [
		'../user/img/loading.gif',
		'../user/img/iTab-glossy.png',
		'../user/img/pinstripes2.gif',
		'../user/img/UIBack.png',
		'../user/img/UIBackPressed.png',
		]
	});
	//alert('is not iPhone');
}
</script>

</head>

<body>
<div id="page">

<div id="jqt">

<!-- #home-->
<div id="home" class="current" style="background-image: url(../bk.jpg); color:white;">
                <div class="toolbar">
                    <h1>Home</h1>
                    <div onClick="onConfirm();" class="button">Logout</div>
                </div>
               
  </div>
<!-- End #home -->
    

<!-- #Sections -->
	<div id="classes" style="background-image: url(../bk.jpg); color:white;">
		<div class="toolbar">
			<h1>History</h1>
		</div>
		<div id="wrapper">
			<div id="scroller">            
				<ul class="edgetoedge">
            
            	</ul>
			</div>
	  </div>
  </div>

	<div id="schedule" style="background-image: url(../bk.jpg); color:white;">
		<div class="toolbar">
			<h1>Schedule</h1>
		</div>
		<div id="wrapper">
			<div id="scroller">            
				<ul class="edgetoedge">
           
            	</ul>
			</div>
	  </div>
  </div>

	<div id="settings" style="background-image: url(../bk.jpg); color:white;">
		<div class="toolbar">
			<h1>Settings</h1>
		</div>
		<div id="wrapper">
			<div id="scroller">            
				<ul class="edgetoedge">
            
            	</ul>
			</div>
	  </div>
  </div>
  
  	<div id="help" style="background-image: url(../bk.jpg); color:white;">
		<div class="toolbar">
			<h1>Help</h1>
		</div>
		<div id="wrapper">
			<div id="scroller">            
				<ul class="edgetoedge">
           
            	</ul>
			</div>
	  </div>
  </div>
  <!-- End #Sections -->
  
<!-- #search
   <form id="search"  class="form">
		<div class="toolbar">
			<h1>Search</h1>
			 <a class="cancel" href="#">Cancel</a></div>
		<div class="scroll">
                    <ul class="rounded">
                        <li><input type="search" id="searchid" name="s" value="" placeholder="Search" /></li>
                    </ul>
                    <a style="margin-top: 10px; margin-bottom: 10px; color:rgba(0,0,0,.9)" href="#rssfeed" id="submit" class="whiteButton">Submit</a>                </div>
    </form>
End #search -->
   
</div> 
<!-- End #jqt -->

<div id="loading"><p><img src="imgimg/loading.gif" /></p></div>

<nav id="tabbar">
    <ul >
     <!-- Action & navigation -->
<li><a href="#home" class="current flip"><strong>Home</strong><div class="home"></div></a></li>    
<li><a href="#classes" class="flip"><strong>History</strong><div class="page"></div></a></li>
<li><a href="#schedule" class="flip"><strong>Schedule</strong><div class="list"></div></a></li>
<li><a href="#settings" class="flip"><strong>Settings</strong><div class="more"></div></a></li>
<li><a href="#help" class="flip"><strong>Help</strong><div class="infos"></div></a></li>

    </ul>
</nav>
</div> <!-- End #page -->


</script>
<script type='text/javascript' src='../user/src/itabbar.js'></script> 
<script type='text/javascript' src='../user/src/fullscreen.js'></script>  

</body>
</html>