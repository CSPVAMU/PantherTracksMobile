
function getFaculty() {
var records = new Array();
var recordsId = new Array();
var recordsAuth = new Array();

		//Get list of faculty members
	    $.ajax({
    	url: "http://pvamu.hazar.us/php/getFaculty.php",
    	async: false,
    	dataType: 'json',
    	success: function(data) {
			for (var i=0, len=data.length; i < len; i++) {
					records[i]=data[i][1];
					recordsId[i]=data[i][0];
					if(data[i][2]==0)
						recordsAuth[i]="unchecked";
					else
						recordsAuth[i]="checked";
			}
		
			//List them
			code='<div style="width:320px;text-align: left;"><p style="color:#ffcc66;"><b><br>Check the faculty members that you\'d like authorized:<br><br></b></p>';
			for (i=0; i<records.length; i++){
			code +='<ul  style="background-color:#4a2e6b" class="rounded"><li style="background-color:#4a2e6b"><label style="background-color:#4a2e6b color:white; font-size:100%;"><input type="checkbox"  id="'+recordsId[i]+'" name="'+recordsId[i]+'" value="'+recordsId[i]+'" '+recordsAuth[i]+' /> <u>'+records[i]+'</u></label></li></p></ul>';		
			}
			$("div.authorize").html(code);

		}
		});
}
