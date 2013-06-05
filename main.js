
// Prepare device for PhoneGap Modules
function onload() {
	document.addEventListener("deviceready", null, false);
}

// Cordova is ready
function onDeviceReady() {
	// Empty
	window.location.href = "../index.html#page1";
}

// Show a custom alertDismissed
function showAlert(userName) {
	if( sessionStorage.role == 3){
			window.location.href = "user/studentusers.html";
			navigator.notification.alert(
			'Login Successful.',  // message
			null,         // callback
			'Hello '+userName+'!',            // title
			'Done'                  // buttonName
			);	
	}else if(sessionStorage.role == 2){
			window.location.href = "user/facultyusers.html";
			navigator.notification.alert(
			'Login Successful.',  // message
			null,         // callback
			'Hello '+userName+'!',            // title
			'Done'                  // buttonName
			);	
	}else if(sessionStorage.role == 1 ){
			window.location.href = "user/adminusers.html";
			navigator.notification.alert(
			'Login Successful.',  // message
			null,         // callback
			'Hello '+userName+'!',            // title
			'Done'                  // buttonName
			);
				
	}else{
			alert("Error: Role is not defined.");
	}
	/*$.post("http://pvamu.hazar.us/php/getRole.php",{username: userName}, function(data) {
		if(data == 3) {
			window.location.href = "user/studentusers.html";
			
			navigator.notification.alert(
			'Login Successful.',  // message
			null,         // callback
			'Hello '+userName+'!',            // title
			'Done'                  // buttonName
			);
		}
		else if(data == 2) {
			window.location.href = "user/facultyusers.html";
			
			navigator.notification.alert(
			'Login Successful.',  // message
			null,         // callback
			'Hello '+userName+'!',            // title
			'Done'                  // buttonName
			);
			
			
		}
		else if(data == 1) {
			window.location.href = "user/adminusers.html";
			
			navigator.notification.alert(
			'Login Successful.',  // message
			null,         // callback
			'Hello '+userName+'!',            // title
			'Done'                  // buttonName
			);
			
			
		}
		else {
			alert("Error");
			//alert("From getRole.php: "+data);
			$.post("http://pvamu.hazar.us/php/getUserInfo.php", function(data) {
				alert(data);
			});
		}
					
	});*/
}

// Make device play default notification
function playBeep() {
	navigator.notification.beep(1);
};

// Make device vibrate
var vibrate = function(num) {
	navigator.notification.vibrate(num);
};

// alert dialog dismissed
function alertDismissed() {

	//unVerified();
	window.location.href = "index.html#page1";
}

function alertDismissed2() {

	document.Form2.field1.value = "";
	document.Form2.field1.value = "";
	document.Form2.field2.value = "";
	document.Form2.field3.value = "";
	document.Form2.field4.value = "";
	document.Form2.field5.value = "";
	document.Form2.Major.value = "Computer Science";
	document.Form2.field7.value = "Freshman";
	window.location.href = "index.html#page1";
}

function alertDismissed3() {

	document.Form3.field1.value = "";
	document.Form3.field1.value = "";
	document.Form3.field2.value = "";
	document.Form3.field3.value = "";
	document.Form3.field4.value = "";
	document.Form3.field5.value = "";
	document.Form3.Department.value = "Computer Science";
	window.location.href = "index.html#page1";
}

// process the confirmation dialog result
function onConfirm(button) {

	if(button == 1) {

		$.post("http://pvamu.hazar.us/php/mailtest.php");

		navigator.notification.alert('You have been logged out.',null,'Logout Sucessful','Ok');
		navigator.notification.alert('An email verification has been resent.',null,'Confirmed','Ok');
	}
	else {
		var state="logout";
		$.post("http://pvamu.hazar.us/php/login.php",{state: state}, function(data) {
			
			//alert(data);
			if(data[4] == 3) {
				window.location.href = "../index.html";
				navigator.notification.alert('You have been logged out.',alertDismissed,'Logout Sucessful','Ok');	
			}
			else {
				alert("error occured");
				//alert("From login.php: "+data);
				$.post("http://pvamu.hazar.us/php/getUserInfo.php", function(data) {
					alert(data);
				});
			}
		},"json");
	}
}

// Show a custom confirmation dialog
function showConfirm(message,callback,title,label) {
	navigator.notification.alert(
			message,  // message
			callback,              // callback to invoke with index of button pressed
			title,            // title
			label          // buttonLabels
			);
			$("#loadpic").hide();
}

// Output user variables and confirm account has been created
function outPutValues(userType,user) {
	
	if(userType == 'student') {
		
		$("#loadpic2").hide();
		navigator.notification.alert(
				'Your account has been created. Please verify your email to continue with PantherTracks Mobile.',  // message
				alertDismissed2,         // callback
				'Welcome '+user.firstname+'!',            // title
				'Done'                  // buttonName
				);
	}
	else {
		
		$("#loadpic3").hide();
		navigator.notification.alert(
				'Your account has been created. Please verify your email to continue with PantherTracks Mobile.',  // message
				alertDismissed2,         // callback
				'Welcome '+user.firstname+'!',            // title
				'Done'                  // buttonName
				);
	}
}

// Get user information from input fields
function getForm(user,userType) {

	if(user == 'student') {
		outPutValues(user,userType);
	}
	else {
		outPutValues(user,userType);
	}
}

// Make sure user has typed in a pv email address
function validateEmail(user) {

	$("#loadpic2").show();
	var mail = document.Form2.field3.value;
	var emailString = /@student.pvamu.edu/g;
	var emailValidate = emailString.test(mail);
	
	var student = {
		firstname	: document.Form2.field1.value,
		lastname	: document.Form2.field2.value,
		pvemail		: document.Form2.field3.value,
		passwd		: document.Form2.field4.value,
		major		: document.Form2.Major.value,
		classif		: document.Form2.field7.value,
		 uname		: ""
	};

	student.uname = student.pvemail.substring(0,student.pvemail.indexOf("@"));

	if(!emailValidate) {
		navigator.notification.alert('Please enter in your PV email address.',null,'Sign Up','Ok');
		$("#loadpic2").hide();
		return false;
	}
	if(student.firstname == "" && student.lastname == "" && student.passwd == "") {	
		navigator.notification.alert('Please enter your information.',null,'Sign Up','Ok');
		$("#loadpic2").hide();
		return false;
	}
	else if(student.lastname == "" && student.passwd == "") {
		navigator.notification.alert('Please enter your: \nLastname and Password.',null,'Sign Up','Ok');
		$("#loadpic2").hide();
		return false;
	}
	else if(student.firstname == "" && student.passwd == "") {
		navigator.notification.alert('Please enter your: \nFirstname and Password.',null,'Sign Up','Ok');
		$("#loadpic2").hide();
		return false;
	}
	else if(student.firstname == "" && student.lastname == "") {
		navigator.notification.alert('Please enter your: \nFirstname and Lastname.',null,'Sign Up','Ok');
		return false;
	}
	else if(student.firstname == "") {
		navigator.notification.alert('Please enter your: \nFirstname.',null,'Sign Up','Ok');
		$("#loadpic2").hide();
		return false;
	}
	else if(student.lastname == "") {
		navigator.notification.alert('Please enter your: \nLastname.',null,'Sign Up','Ok');
		$("#loadpic2").hide();
		return false;
	}
	else if(student.passwd == "") {
		navigator.notification.alert('Please enter your: \nPassword.',null,'Sign Up','Ok');
		$("#loadpic2").hide();
		return false;
	}
	else if(student.passwd != document.Form2.field5.value) {
		navigator.notification.alert('Password fields do not match.',null,'Sign Up','Ok');
		$("#loadpic2").hide();
		return false;
	}
	else if(student.passwd.length < 6) {
		navigator.notification.alert('Password must be at least six characters.',null,'Sign Up','Ok');
		$("#loadpic2").hide();
		return false;
	}	
	else {
		$.post("http://pvamu.hazar.us/php/signup-check.php",{email:mail}, function(data) {
				//alert("Returned from isVerified.php "+data);
				if(data == 1) {
					navigator.notification.alert('An account with this email address already exists.',null,'Sign Up','Ok');
					$("#loadpic2").hide();
					return false;
				}
				else {
					getForm(user,student);
				}
		});
	}
}

function validateEmailFac(user) {

	$("#loadpic3").show();
	var mail = document.Form3.field3.value;
	var emailString = /@pvamu.edu/g;
	var emailValidate = emailString.test(mail);
	
	var faculty = {
		firstname	: document.Form3.field1.value,
		lastname	: document.Form3.field2.value,
		 pvemail	: document.Form3.field3.value,
		 passwd		: document.Form3.field4.value,
		 depart		: document.Form3.department.value,
		 uname		: ""
	};

	faculty.uname = faculty.pvemail.substring(0,faculty.pvemail.indexOf("@"));

	if(!emailValidate) {
		
		navigator.notification.alert('Please enter in your PV email address.',null,'Sign Up','Ok');
		$("#loadpic3").hide();
		return false;
	}
	else if(faculty.firstname == "" && faculty.lastname == "" && faculty.passwd == "") {	
		navigator.notification.alert('Please enter your information.',null,'Sign Up','Ok');
		$("#loadpic3").hide();
		return false;
	}
	else if(faculty.lastname == "" && faculty.passwd == "") {
		navigator.notification.alert('Please enter your: \nLastname and Password.',null,'Sign Up','Ok');
		$("#loadpic3").hide();
		return false;
	}
	else if(faculty.firstname == "" && faculty.passwd == "") {
		navigator.notification.alert('Please enter your: \nFirstname and Password.',null,'Sign Up','Ok');
		$("#loadpic3").hide();
		return false;
	}
	else if(faculty.firstname == "" && faculty.lastname == "") {
		navigator.notification.alert('Please enter your: \nFirstname and Lastname.',null,'Sign Up','Ok');
		$("#loadpic3").hide();
		return false;
	}
	else if(faculty.firstname == "") {
		navigator.notification.alert('Please enter your: \nFirstname.',null,'Sign Up','Ok');
		$("#loadpic3").hide();
		return false;
	}
	else if(faculty.lastname == "") {
		navigator.notification.alert('Please enter your: \nLastname.',null,'Sign Up','Ok');
		$("#loadpic3").hide();
		return false;
	}
	else if(faculty.passwd == "") {
		navigator.notification.alert('Please enter your: \nPassword.',null,'Sign Up','Ok');
		$("#loadpic3").hide();
		return false;
	}
	else if(faculty.passwd != document.Form3.field5.value) {
		navigator.notification.alert('Password fields do not match.',null,'Sign Up','Ok');
		$("#loadpic3").hide();
		return false;
	}
	else if(faculty.passwd.length < 6) {
		navigator.notification.alert('Password must be at least six characters.',null,'Sign Up','Ok');
		$("#loadpic3").hide();
		return false;
	}	
	else {
		$.post("http://pvamu.hazar.us/php/signup-check.php",{email:mail}, function(data) {

				if(data == 1) {
					navigator.notification.alert('An account with this email address already exists.',null,'Sign Up','Ok');
					$("#loadpic3").hide();
					return false;
				}
				else {
					getForm(user,faculty);
				}
		});
	}
}

// Notify user that he or she is unverified
function unVerified(u) {

	$(document).ready(function(){

		$.post("http://pvamu.hazar.us/php/isVerified.php",{userid: sessionStorage.id},function(data) {
			if(data == 1) {
				var message = 'Our records show that you are an unverified user. Please verify your PV email address to continue with PantherTracks Mobile. Press \'resend\' to resend the verification.';
				var callback = onConfirm;
				var title = 'Verification Required';
				var label = 'Resend,Exit';
				showConfirm(message, callback, title, label);
				$("#loadpic").hide();
				
				$("#user").val("Username");
				$("#pass").val("Password");
			}
			else {
				console.log("test");
				//alert("From isVerified.php: "+data);
				if(sessionStorage.role==2){
					console.log(" got here ");
					unAuthorized(u);
				}else{
					showAlert(u);
					$("#loadpic").hide();
				}
			}
		});
	});
}

function unAuthorized(u) {

	$(document).ready(function(){

		$.post("http://pvamu.hazar.us/php/isAuthorized.php",{userid: sessionStorage.id}, function(data) {
			if(data == 0) {
				var message = 'Our records show that you are an unauthorized faculty member. Please contact the admin (admin@pvamu.hazar.us) for assistance.';
				var title = 'Authorization Required';
				var label = 'Exit';
				showConfirm(message, title, label);
				$("#loadpic").hide();
				
				$("#user").val("Username");
				$("#pass").val("Password");
			}
			else {
				showAlert(u);
				$("#loadpic").hide();
			}
		});
	});
}

$(document).ready(function(){
		$("#loadpic").hide();
		$("#loadpic2").hide();
		$("#loadpic3").hide();
		
		$("button#sub").click( function() {
			$("#loadpic").show();
			
			var u = $("#user").val();
			var p = $("#pass").val();

			if( u == "" || p == "" ) {
				navigator.notification.alert('Please enter both username and password.',alertDismissed,'PantherTracks Login','Ok')
				$("#loadpic").hide();
			}
			else{ 
				
				$.post("http://pvamu.hazar.us/php/login.php",{username: u, password: p}, function(data) {
					if(data[4] == 1) {
						console.log("got here");
						sessionStorage.id=data[0];
						sessionStorage.student=data[0];
						sessionStorage.role=data[1];
						sessionStorage.username=data[3];
						unVerified(u);
					}
					else {
						//alert("From login.php: "+data);
						$("#loadpic").hide();
						var message = 'Username or password is incorrect.';
						var callback = null;
						var title = 'PantherTracks Login';
						var label = 'Ok';
						showConfirm(message,callback,title,label); // PhoneGap Alert Message
					}
				}, "json");
				
			}
		});
		
		$("button#sign").click( function() {
			$("#user").val("Username");
			$("#pass").val("Password");
		});
		
		$("p").click(function() {
			/*$.post("http://pvamu.hazar.us/php/getUserInfo.php", function(data) {
				alert(data);
			});*/
			alert(sessionStorage.username);
		});
		
		$("#student0").click(function() {
				alert("clicked");
		});
		
		//getAdvisees();
		//alert("test");
});

function logout() {

	onConfirm();
}

function helpbox() {
	navigator.notification.alert(
			'•Home Button: See your current status, course progress, GPA, and other useful information about your account. \n\n •History Button: Select the courses that you have already taken so that you have a recent and up to date schedule and idea of how far you are and how much more you have to go until graduation. \n\n •Schedule Button: Modify and or view your current graduation schedule.\n\n  •Settings Button: Preferences are located here as well as other configurations for the app.\n',  // message
			null,         // callback
			'Help',            // title
			'Ok'                  // buttonName
			)
}

function addStudent(button) {
	if(button == 1) {
		var Email = $('input#search').val();
		$.post("http://pvamu.hazar.us/php/addAdvisee.php",{studentEmail: Email, id:sessionStorage.id},function(data) {
			navigator.notification.alert(data,null,'Student Search','Ok');
		});
	}
}

function facultySearch() {
	//alert("called");
	var Email = $('input#search').val();
	//alert(Email);
	$.post("http://pvamu.hazar.us/php/facultySearch.php",{studentEmail: Email}, function(data) {
		if(data == 0) {
			navigator.notification.alert('User not found.',null,'Student Search','Ok');
		}
		else {
			//alert(data);
			navigator.notification.confirm('Add '+data+' to your student advisee list?',addStudent,'Student Search','Yes,No');
		}
	});
	//alert("executed");
}
function backtolist() {
	window.location.href = "facultyusers.html#studentInfo";

}
function savedhistory(){
	alert ("Your records have been updated successfully!");
	return true;
}

function savedsettings(){
	alert ("Your settings have been updated successfully!");
	return true;
}
function authorized(){
	alert ("The faculty authorized list has been successfully updated!");
	return true;
}
function gotohistory() {
	window.location.href = "facultyusers.html#classes";
	history();

}
function gotoschedule() {
	window.location.href = "facultyusers.html#schedule";
	schedulefunction();

}
function gotosettings() {
	window.location.href = "facultyusers.html#settings";
	settings();

}