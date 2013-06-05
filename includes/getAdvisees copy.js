var records = new Array();
var recordsId = new Array();
function getAdvisees() {
	//get Advisee list
	$("#adviseeList").remove();
		$.ajax({
			url: "http://pvamu.hazar.us/php/getAdvisees.php",
			async: false,
			data: {sid: sessionStorage.id},
			dataType: 'json',
			success: function(data) {
			for (var i=0, len=data.length; i < len; i++) {
				records[i]=data[i][1];
				recordsId[i]=data[i][0];
			}
			//List all advisees
			var list = $("#scroller").append('<ul id="adviseeList" class="rounded"></ul>').find('ul');
			for (var i = 0; i < records.length; i++){
				list.append('<li id="student'+i+'" class="arrow" onClick="selectstudent('+recordsId[i]+');"><a href="#" onClick="selectstudent('+recordsId[i]+')">'+records[i]+'</a> </li>');

			}
		}
	});
	
	$("li#student0").click(function() {
		alert(records[0]);	
	});
}// JavaScript Document
function selectstudent(studentid) {
	sessionStorage.student=studentid;
	window.location.href = "facultyusers.html#studentInfo";

}