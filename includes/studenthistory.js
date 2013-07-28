function history(){
	if( $("h1.name")!=null ){
		$.post("http://pvamu.hazar.us/php/getName.php",{studentid: sessionStorage.student}, function(data) {
			var name=data;
			$("h1.name").html(name);
		});
	}
	var orderedrecords = new Array();
	var modifiedBy = new Array();
	var modifiedOn = new Array();
    $.ajax({
    	url: "http://pvamu.hazar.us/includes/studenthistory.php",
    	async: false,
		data: {studentid: sessionStorage.student, format: "json"},
		type: 'POST', 
    	dataType: 'json',
    	success: function(data) {
    		for (var i=0, len=data.length; i < len; i++) {
				orderedrecords[i]=data[i][0];
				if(typeof data[i][1] != 'undefined'){
					modifiedBy[i]=data[i][1];
					modifiedOn[i]=data[i][2];
				}
			}
			for (var i=0; i < 45; i++) {
				if(typeof modifiedBy[i]== 'undefined'){
					modifiedBy[i]="None";
					modifiedOn[i]="Never";
				}
			}
	//Call 'RetrieveSettings' in class 'Student' and get settings from 'StudentPreferences' table
	getsettings(function(logsdata){
		var logs=logsdata[0];
		if(logs=="unchecked")
			logs=false;
		else
			logs=true;
			
	
	var label='style="display: block; padding-left:10px; vertical-align:bottom;"';
	var input='style="display: inline-block;  position: relative; align=left;"';
	var title='style="display: inline-block; padding-left: 125px; height=10px; position: relative; vertical-align: top; top: -20px;"';

	var code ='<input type="hidden"  name="studentid" value="'+sessionStorage.student+'"/> <input type="hidden"  name="id" value="'+sessionStorage.id+'"/>';
	code+='<div style="width:320px;text-align: left;"><p style="color:#ffcc66;"><b><br>Check off the classes that you\'ve already completed below:<br><br></b></p>';
	//Freshman year
	code+='<p style="color:#ffcc66;background-color:#4a2e6b;padding-top:10px;padding-bottom:10px;padding-left:10px;"><b>Freshman Year: Fall Semester</b></p><p style="background-color:#4a2e6b;border:5px;">';
	code+='<ul  style="background-color:#4a2e6b" class="rounded">';
	for(i=0; i<7; i++){
		code+='<li style="background-color:#4a2e6b"><label style="background-color:#4a2e6b color:white; font-size:100%;"><input type="checkbox"  id="'+i+'" name="'+i+'" value="'+classes[i][0]+'" '+orderedrecords[i]+' /> <u>'+classes[i][1]+'</u></label><center><label style="color:#ffcc66; font-size:90%; font-weight:normal;"> '+classes[i][2]+'</center></label>';
		if (logs==true)
			code+='<label style="color:white; font-size:50%; font-weight:normal;"><center><b>Updated by '+modifiedBy[i]+' on '+modifiedOn[i]+'</b></center></label></li>';	
		else
			code+='</li>';
	}
	
	code+='</p></ul><p style="color:#ffcc66;background-color:#4a2e6b;padding-top:10px;padding-bottom:10px;padding-left:10px;"><b>Freshman Year: Spring Semester</b></p><p style="background-color:#4a2e6b;border:5px;">';
	code+='<ul  style="background-color:#4a2e6b" class="rounded">';
	for(i=7; i<12; i++){
		code+='<li style="background-color:#4a2e6b"><label style="color:white; font-size:100%;"><input type="checkbox"  id="'+i+'" name="'+i+'" value="'+classes[i][0]+'" '+orderedrecords[i]+' /> <u>'+classes[i][1]+'</u></label><center><label style="color:#ffcc66; font-size:90%; font-weight:normal;"> '+classes[i][2]+'</center></label>';	
		if (logs==true)
			code+='<label style="color:white; font-size:50%; font-weight:normal;"><center><b>Updated by '+modifiedBy[i]+' on '+modifiedOn[i]+'</b></center></label></li>';	
		else
			code+='</li>';
	}
	
	//Sophomore year
	code+='</p></ul><p style="color:#ffcc66;background-color:#4a2e6b;padding-top:10px;padding-bottom:10px;padding-left:10px;"><b>Sophomore Year: Fall Semester</b></p><p style="background-color:#4a2e6b;border:5px;">';
	code+='<ul  style="background-color:#4a2e6b" class="rounded">';
	for(i=12; i<18; i++){
		code+='<li style="background-color:#4a2e6b"><label style="color:white; font-size:100%;"><input type="checkbox"  id="'+i+'" name="'+i+'" value="'+classes[i][0]+'" '+orderedrecords[i]+' /> <u>'+classes[i][1]+'</u></label><center><label style="color:#ffcc66; font-size:90%; font-weight:normal;"> '+classes[i][2]+'</center></label>';	
		if (logs==true)
			code+='<label style="color:white; font-size:50%; font-weight:normal;"><center><b>Updated by '+modifiedBy[i]+' on '+modifiedOn[i]+'</b></center></label></li>';	
		else
			code+='</li>';
	}
	code+='</p></ul><p style="color:#ffcc66;background-color:#4a2e6b;padding-top:10px;padding-bottom:10px;padding-left:10px;"><b>Sophomore Year: Spring Semester</b></p><p style="background-color:#4a2e6b;border:5px;">';
	code+='<ul  style="background-color:#4a2e6b" class="rounded">';
	for(i=18; i<24; i++){
		code+='<li style="background-color:#4a2e6b"><label style="color:white; font-size:100%;"><input type="checkbox"  id="'+i+'" name="'+i+'" value="'+classes[i][0]+'" '+orderedrecords[i]+' /> <u>'+classes[i][1]+'</u></label><center><label style="color:#ffcc66; font-size:90%; font-weight:normal;"> '+classes[i][2]+'</center></label>';	
		if (logs==true)
			code+='<label style="color:white; font-size:50%; font-weight:normal;"><center><b>Updated by '+modifiedBy[i]+' on '+modifiedOn[i]+'</b></center></label></li>';	
		else
			code+='</li>';	
	}

	//Junior year
	code+='</p></ul><p style="color:#ffcc66;background-color:#4a2e6b;padding-top:10px;padding-bottom:10px;padding-left:10px;"><b>Junior Year: Fall Semester</b></p><p style="background-color:#4a2e6b;border:5px;">';
	code+='<ul  style="background-color:#4a2e6b" class="rounded">';
	for(i=24; i<29; i++){
		code+='<li style="background-color:#4a2e6b"><label style="color:white; font-size:100%;"><input type="checkbox"  id="'+i+'" name="'+i+'" value="'+classes[i][0]+'" '+orderedrecords[i]+' /> <u>'+classes[i][1]+'</u></label><center><label style="color:#ffcc66; font-size:90%; font-weight:normal;"> '+classes[i][2]+'</center></label>';	
		if (logs==true)
			code+='<label style="color:white; font-size:50%; font-weight:normal;"><center><b>Updated by '+modifiedBy[i]+' on '+modifiedOn[i]+'</b></center></label></li>';	
		else
			code+='</li>';	
	}
	code+='</p></ul><p style="color:#ffcc66;background-color:#4a2e6b;padding-top:10px;padding-bottom:10px;padding-left:10px;"><b>Junior Year: Spring Semester</b></p><p style="background-color:#4a2e6b;border:5px;">';
	code+='<ul  style="background-color:#4a2e6b" class="rounded">';
	for(i=29; i<34; i++){
		code+='<li style="background-color:#4a2e6b"><label style="color:white; font-size:100%;"><input type="checkbox"  id="'+i+'" name="'+i+'" value="'+classes[i][0]+'" '+orderedrecords[i]+' /> <u>'+classes[i][1]+'</u></label><center><label style="color:#ffcc66; font-size:90%; font-weight:normal;"> '+classes[i][2]+'</center></label>';		
		if (logs==true)
			code+='<label style="color:white; font-size:50%; font-weight:normal;"><center><b>Updated by '+modifiedBy[i]+' on '+modifiedOn[i]+'</b></center></label></li>';	
		else
			code+='</li>';
	}
	
	//Senior year
	code+='</p></ul><p style="color:#ffcc66;background-color:#4a2e6b;padding-top:10px;padding-bottom:10px;padding-left:10px;"><b>Senior Year: Fall Semester</b></p><p style="background-color:#4a2e6b;border:5px;">';
	code+='<ul  style="background-color:#4a2e6b" class="rounded">';
	for(i=34; i<40; i++){
		code+='<li style="background-color:#4a2e6b"><label style="color:white; font-size:100%;"><input type="checkbox"  id="'+i+'" name="'+i+'" value="'+classes[i][0]+'" '+orderedrecords[i]+' /> <u>'+classes[i][1]+'</u></label><center><label style="color:#ffcc66; font-size:90%; font-weight:normal;"> '+classes[i][2]+'</center></label>';	
		if (logs==true)
			code+='<label style="color:white; font-size:50%; font-weight:normal;"><center><b>Updated by '+modifiedBy[i]+' on '+modifiedOn[i]+'</b></center></label></li>';	
		else
			code+='</li>';
	}
	code+='</p></ul><p style="color:#ffcc66;background-color:#4a2e6b;padding-top:10px;padding-bottom:10px;padding-left:10px;"><b>Senior Year: Spring Semester</b></p><p style="background-color:#4a2e6b;border:5px;">';
	code+='<ul  style="background-color:#4a2e6b" class="rounded">';
	for(i=40; i<45; i++){
		code+='<li style="background-color:#4a2e6b"><label style="color:white; font-size:100%;"><input type="checkbox"  id="'+i+'" name="'+i+'" value="'+classes[i][0]+'" '+orderedrecords[i]+' /> <u>'+classes[i][1]+'</u></label><center><label style="color:#ffcc66; font-size:90%; font-weight:normal;"> '+classes[i][2]+'</center></label>';	
		if (logs==true)
			code+='<label style="color:white; font-size:50%; font-weight:normal;"><center><b>Updated by '+modifiedBy[i]+' on '+modifiedOn[i]+'</b></center></label></li>';	
		else
			code+='</li>';	
	}
	code+='</ul></div>';
	$("div.history").html(code);
	

});
    	}, cache: false

    });
	
	

}
