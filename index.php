<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>PantherTracks</title>
        <link rel="stylesheet" href="jqtouch.css" title="jQTouch">
        <!--<link rel="stylesheet" href="master.css" type="text/css" media="screen" title="no title">-->

        <script src="zepto.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="jqtouch.min.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" charset="utf-8" src="cordova-2.2.0.js"></script>
        <!-- Uncomment the following two lines (and comment out the previous two) to use jQuery instead of Zepto. -->
        <!--<script src="jquery-1.8.3.min.js" type="application/x-javascript" charset="utf-8"></script>-->
        <!-- <script src="../../src/jqtouch-jquery.min.js" type="application/x-javascript" charset="utf-8"></script> -->

        <script src="jqt.themeswitcher.min.js" type="application/x-javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8" src="main.js"></script>
        <script type="text/javascript" charset="utf-8">

			var jQT = new $.jQTouch({
				icon: 'jqtouch.png',
				addGlossToIcon: false,
				startupScreen: 'img/jqt_startup.png',
				statusBar: 'black'
			});

		</script>

	</head>

	<body onLoad="onload();">

		<!---------- Login Screen --------->
		<div id="page1" style="background-image: url(img/bk.jpg); color:white;">
			<center>
				<br>
				<br>
				<img src="img/AppLogo2.png" width="242" height="155" align="top"><br>
      
      			<br>
				<br>
  				<form name="Form1" action="http://pvamu.hazar.us/php/login.php" method="post">
  				<div>
  					<div style="width: 263px; height: 44px; background: url(img/text.png) no-repeat; float: none;">
						<input title="Username" id="user" type="text" name="name" onClick="this.value='';"
     					onblur="this.value=!this.value?'Username':this.value;" value="Username" class="textInput" />
    				</div>
  
  					<br>
  
  					<div style="width: 263px; height: 44px; background: url(img/text.png) no-repeat; float: none;">
						<input title="Password" id="pass" type="password" name="passwd" value="Password" onClick="this.value='';" class="textInput" />
    				</div>
    
    				<br><br>
    			</div>
    				<button type="button" style="border: 0; position:fixed; bottom:35px; left:40px; background: transparent">
    					<a href="#page2"><img src="img/signUpButton.png" width="113" heght="42" alt="submit" /></a>
					</button>
    
					<button type="submit" id="sub" style="border: 0; position:fixed; bottom:35px; right:40px; background: transparent">
    					<img src="img/button.png" width="113" heght="42" alt="submit" />
					</button>
                    
   					
  		  		</form>
		  	</center>
		</div>

		<!-------- User Type Selection -------->
		<div id="page2" style="background-image: url(img/bk.jpg); color:white;">
			<div class="toolbar">
				<a href="#" class="back">back</a>
				<h1>Register</h1>
			</div>

			<center>
            	<br><br>
            	<img src="img/AppLogo2.png" width="165" height="104" align="top"></center>
  				<br><br>
            </center>
  
  			<div class="scroll">
            	<center>
                	<h2 style="color:white;">User Type</h2>
                </center>
                <ul class="rounded">
                	<li class="arrow"><a href="#page3">Student</a></li>
                    <li class="arrow"><a href="#page4">Faculty</a></li>
               	</ul>
            </div>
  		</div>

		<!-------- Student Signup -------->
        <div id="page3" style="background-image: url(img/bk.jpg); color:white;">
		
        	<div class="toolbar">
         		<h1>Student Sign Up</h1>
            	<a class="back" href="#">back</a>
        	</div>
            
        	<br>
  			<center><img src="img/AppLogo2.png" width="165" height="104" align="top"></center>
  			<br>

 			<center>
            	<form name="Form2" action="http://pvamu.hazar.us/php/signup.php" method="post" class="form">
 					<div style="height:200px;width:310px; overflow:scroll">
            	
                		Firstname
        				<center>
  							<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<input title="Firstname" id="fname" type="text" value="" name="field1" class="textInput2" />
  							</div>
    					</center>
    					<br>
    
    					Lastname
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<input title="Lastname" id="lname" type="text" value="" name="field2" class="textInput2" />
  							</div>
						</center>    
    					<br>
    
    					PV Email
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<input title="PVemail" id="email" type="text" value="" name="field3" class="textInput2" />
  							</div>
    					</center>
    					<br>
        
        				Password
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<input title="Password" id="passwd" type="password" value="" name="field4" class="textInput2" />
  							</div>
    					</center>
    					<br>
        
        				Retype Password
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<input title="RetypePassword" id="repass" type="password" value="" name="field5" class="textInput2" />
  							</div>
    					</center>
    					<br>
    
    					Major
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
    							<select name="Major" id="major" class="dropdown">
        							<option value="Computer Science">Computer Science</option>
            						<option value="Computer Engineering">Computer Engineering</option>
            						<option value="Electrical Engineering">Electrical Engineering</option>
            						<option value="Mechanical Engineering">Mechanical Engineering</option>
            						<option value="Chemical Engineering">Chemical Engineering</option>
        						</select>
  							</div>
						</center>
    					<br>
    
    					Classification
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<select name="field7" id="classif" class="dropdown">
        							<option value="Freshman">Freshman</option>
            						<option value="Sophmore">Sophmore</option>
            						<option value="Junior">Junior</option>
            						<option value="Senior">Senior</option>
            						<option value="Grad">Grad</option>
        						</select>
  							</div>
    					</center>
       				
  					</div>
  
  					<br>
        
					<button type="submit" style="border: 0; background: transparent">
    					<img src="img/submitButton.png" width="113" heght="42" alt="submit" onClick="return validateEmail('student');" />
        			</button>
                    
      			</form>
  			</center>
        
    	</div>
        
        <div id="page4" style="background-image: url(img/bk.jpg); color:white;">
		
        	<div class="toolbar">
         		<h1>Faculty Sign Up</h1>
            	<a class="back" href="#">back</a>
        	</div>
            
        	<br>
  			<center><img src="img/AppLogo2.png" width="165" height="104" align="top"></center>
  			<br>

 			<center>
            	<form name="Form3" action="http://pvamu.hazar.us/php/signupfac.php" method="post">
 					<div style="height:200px;width:310px; overflow:scroll">
            	
                		Firstname
        				<center>
  							<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<input title="Firstname" id="fname" type="text" value="" name="field9" class="textInput2" />
  							</div>
    					</center>
    					<br>
    
    					Lastname
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<input title="Lastname" id="lname" type="text" value="" name="field10" class="textInput2" />
  							</div>
						</center>    
    					<br>
    
    					PV Email
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<input title="PVemail" id="email" type="text" value="" name="field11" class="textInput2" />
  							</div>
    					</center>
    					<br>
        
        				Password
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<input title="Password" id="passwd" type="password" value="" name="field12" class="textInput2" />
  							</div>
    					</center>
    					<br>
        
        				Retype Password
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
  								<input title="RetypePassword" id="repass" type="password" value="" name="field13" class="textInput2" />
  							</div>
    					</center>
    					<br>
    
    					Department
        				<center>
    						<div style="width: 300px; height: 41px; background: url(img/textfield.png) no-repeat; float: none;">
    							<select name="depar" id="department" class="dropdown">
        							<option value="Computer Science">Computer Science</option>
            						<option value="Computer Engineering">Computer Engineering</option>
            						<option value="Electrical Engineering">Electrical Engineering</option>
            						<option value="Mechanical Engineering">Mechanical Engineering</option>
            						<option value="Chemical Engineering">Chemical Engineering</option>
        						</select>
  							</div>
						</center>
       				
  					</div>
  
  					<br>
        
					<button type="submit" style="border: 0; background: transparent">
    					<img src="img/submitButton.png" width="113" heght="42" alt="submit" onClick="return validateEmailFac('faculty');" />
        			</button>
                    
      			</form>
  			</center>
        
    	</div>
        
	</body>
</html>