// Prepare device for PhoneGap Modules
function onload() {
	document.addEventListener("deviceready", onDeviceReady, false);
}

// Cordova is ready
function onDeviceReady() {
    // Empty
}

// Begin initial execution of PTMobile
function test() {
	
	//alert("Test executed");
	
	// Get username and password
	var userName = document.Form1.field1.value;	
	var password = document.Form1.field2.value;

	// Check password conditions
	if(userName == "john" && password == "123456") {
		
		//unVerified();
		showAlert(userName);
		page();
	}
	else if((userName == " " || password == "") || (userName == "Username" || password == "Password")) {
		
		var message = 'Please enter a username and password.';
		var callback = onDeviceReady;
		var title = 'Invalid';
		var label = 'Ok';
		
		showConfirm(message,callback,title,label);
		//vibrate(200);
	}
	else {
		var message = 'Username or password is incorrect.';
		var callback = onDeviceReady;
		var title = 'PantherTracks Login';
		var label = 'Ok';
		showConfirm(message,callback,title,label); // PhoneGap Alert Message
	}
}

// Show a custom alertDismissed
function showAlert(userName) {
	
	window.location.href = "unver.html";
	
	navigator.notification.alert(
    'Login Successful.',  // message
    alertDismissed,         // callback
    'Hello '+userName+'!',            // title
    'Done'                  // buttonName
        );
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
	window.location.href = "index.html";
}

// process the confirmation dialog result
function onConfirm(button) {
	/*if(button == 2) {
		alert("A verification has been resent.");
	}*/
	
	window.location.href = "index.html";
	navigator.notification.alert('You have been logged out.',alertDismissed,'Logout Sucessful','Ok');
	
}

// Show a custom confirmation dialog
function showConfirm(message,callback,title,label) {
	navigator.notification.confirm(
    message,  // message
    callback,              // callback to invoke with index of button pressed
    title,            // title
    label          // buttonLabels
    );
}

function signUp() {
	window.location.href = "userType.html";	
}

// Redirect to signUp page
function redirect() {
	
	var valueChecked;	// Value passed in by user selection
	
	// Loop through radio buttons to find which is selected
	for(var index = 0; index < document.Form2.user.length; index++) {
		if(document.Form2.user[index].checked) {
			valueChecked = document.Form2.user[index].value;	
		}
	}
	
	// Determine if user has selected faculty or student
	if(valueChecked == "faculty") {
		window.location.href = "facultySignup.html";
	}
	else {
		window.location.href = "studentSignup.html";
	}
}

// Output user variables and confirm account has been created
function outPutValues(userType,user) {
	
	if(userType == 'student') {
		
		/*alert("Firstname: "+user.firstname+
		  	"\nLastname: "+user.lastname+
		  	"\nPV Email: "+user.pvemail+
		  	"\nPassword: "+user.passwd+
		  	"\nMajor: "+user.major+
		  	"\nClassification: "+user.classif+
		  	"\nUsername: "+user.uname);*/
		
		navigator.notification.alert(
    		'Your account has been created. Please verify your email to continue with PantherTracks Mobile.',  // message
    		alertDismissed,         // callback
    		'Welcome '+user.firstname+'!',            // title
    		'Done'                  // buttonName
        	);
		
		window.location.href = "index.html";
	}
	else {
		
		alert("Firstname: "+user.firstname+
		  	"\nLastname: "+user.lastname+
		  	"\nPV Email: "+user.pvemail+
		  	"\nPassword: "+user.passwd+
		  	"\nDepartment: "+user.depart+
		  	"\nUsername: "+user.uname);
		  
		navigator.notification.alert(
    		'Your account has been created. Please verify your email to continue with PantherTracks Mobile.',  // message
    		alertDismissed,         // callback
    		'Welcome '+user.firstname+'!',            // title
    		'Done'                  // buttonName
        	);
		
		window.location.href = "index.html";
	}
}

// Get user information from input fields
function getForm(user) {
	
	if(user == 'student') {
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
	
		if(student.firstname == "" && student.lastname == "" && student.passwd == "") {	
			navigator.notification.alert('Please enter your information.',onDeviceReady,'Sign Up','Ok');
		}
		else if(student.lastname == "" && student.passwd == "") {
			navigator.notification.alert('Please enter your: \nLastname and Password.',onDeviceReady,'Sign Up','Ok');
		}
		else if(student.firstname == "" && student.passwd == "") {
			navigator.notification.alert('Please enter your: \nFirstname and Password.',onDeviceReady,'Sign Up','Ok');
		}
		else if(student.firstname == "" && student.lastname == "") {
			navigator.notification.alert('Please enter your: \nFirstname and Lastname.',onDeviceReady,'Sign Up','Ok');
		}
		else if(student.firstname == "") {
			navigator.notification.alert('Please enter your: \nFirstname.',onDeviceReady,'Sign Up','Ok');
		}
		else if(student.lastname == "") {
			navigator.notification.alert('Please enter your: \nLastname.',onDeviceReady,'Sign Up','Ok');
		}
		else if(student.passwd == "") {
			navigator.notification.alert('Please enter your: \nPassword.',onDeviceReady,'Sign Up','Ok');
		}
		else if(student.passwd != document.Form2.field5.value) {
			navigator.notification.alert('Password fields do not match.',onDeviceReady,'Sign Up','Ok');
		}
		else if(student.passwd.length < 6) {
			navigator.notification.alert('Password must be at least six characters.',onDeviceReady,'Sign Up','Ok');
		}	
		else {
			outPutValues(user,student);
		}
	}
	else {
		var faculty = {
			firstname	: document.Form2.field1.value,
			lastname	: document.Form2.field2.value,
			pvemail		: document.Form2.field3.value,
			passwd		: document.Form2.field4.value,
			depart		: document.Form2.Major.value,
			uname		: ""
		
		};
	
		faculty.uname = faculty.pvemail.substring(0,faculty.pvemail.indexOf("@"));
	
		if(faculty.firstname == "" && faculty.lastname == "" && faculty.passwd == "") {	
			navigator.notification.alert('Please enter your information.',onDeviceReady,'Sign Up','Ok');
		}
		else if(faculty.lastname == "" && faculty.passwd == "") {
			navigator.notification.alert('Please enter your: \nLastname and Password.',onDeviceReady,'Sign Up','Ok');
		}
		else if(faculty.firstname == "" && faculty.passwd == "") {
			navigator.notification.alert('Please enter your: \nFirstname and Password.',onDeviceReady,'Sign Up','Ok');
		}
		else if(faculty.firstname == "" && faculty.lastname == "") {
			navigator.notification.alert('Please enter your: \nFirstname and Lastname.',onDeviceReady,'Sign Up','Ok');
		}
		else if(faculty.firstname == "") {
			navigator.notification.alert('Please enter your: \nFirstname.',onDeviceReady,'Sign Up','Ok');
		}
		else if(faculty.lastname == "") {
			navigator.notification.alert('Please enter your: \nLastname.',onDeviceReady,'Sign Up','Ok');
		}
		else if(faculty.passwd == "") {
			navigator.notification.alert('Please enter your: \nPassword.',onDeviceReady,'Sign Up','Ok');
		}
		else if(faculty.passwd != document.Form2.field5.value) {
			navigator.notification.alert('Password fields do not match.',onDeviceReady,'Sign Up','Ok');
		}
		else if(faculty.passwd.length < 6) {
			navigator.notification.alert('Password must be at least six characters.',onDeviceReady,'Sign Up','Ok');
		}	
		else {
			outPutValues(user,faculty);
		}
	}
}

// Make sure user has typed in a pv email address
function validateEmail(user) {
	
	var mail = document.Form2.field3.value;
	var emailString = /@student.pvamu.edu/g;
	var emailValidate = emailString.test(mail);
	
	if(!emailValidate) {
		navigator.notification.alert('Please enter in your PV email address.',onDeviceReady,'Sign Up','Ok');
		return false
	}
	
	getForm(user);
}

// Notify user that he or she is unverified
function unVerified() {
	
	$(document).ready(function(){

	var message = 'Our records show that you are an unverified user. Please verify your PV email address to continue with PantherTracks Mobile. Press \'resend\' to resend the verification.';
	var callback = onConfirm;
	var title = 'Verification Required';
	var label = 'Resend,Exit';
	showConfirm(message, callback, title, label);


});
	
	//window.location.href = "index.html";
}

function page() {
	window.location.href = "unver.html";	
}