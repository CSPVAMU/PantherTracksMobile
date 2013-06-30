function getrecords(callback){
	 $.ajax({
		url: "http://pvamu.hazar.us/includes/studenthistory.php",
		async: false,
		data: {studentid: sessionStorage.student, format: "json"},
		dataType: 'json',
		success: callback,
		dataType: "json" 
	});
}
function schedulefunction() {
	//Clear array
	for (i = 0; i < 45; i++) {
		takencareof[i][0]=0;
		takencareof[i][1]=0;
	}
	var stoprunning=setTimeout(timeout(), 3000);
	clearTimeout(stoprunning);
	function timeout() {
		console.log("got here");
	if( $("h1.name2")!=null ){
		$.post("http://pvamu.hazar.us/php/getName.php", {studentid: sessionStorage.student}, function(data) {
			var name=data;
			$("h1.name2").html(name);
		});
	}
	//Call 'RetrieveSettings' in class 'Student' and get settings from 'StudentPreferences' table
	var i,j,k;
	var records = new Array();
	getrecords(function(data){
		for (i=0, len=data.length; i < len; i++) {
			records[i]=data[i][0];
			
		}
		getsettings(function(logs){
		var DefaultHours=logs[1];
		//Dump class numbers to array
		for(i = 0; i < records.length-1; i++)
		{
				if(records[i]=="checked"){
					takencareof[i][0]=classes[i][1];
				}
					takencareof[i][1]=0;
		}
		//First, see the number of credit hours taken and make sure they all apply to the degree plan
		var completedhours=0;
		for (i=0;i<records.length;i++)
		{
			if(records[i]=="checked")
			{
				completedhours+=classes[i][3];
				
			}
		}
		//No subtract 121 (+ original prereqs) - completed hours. Divide that by Student' # of hours preference to figure out number of semesters. Create array for # of semesters left. 
		var hoursleft= 121-completedhours;
		var semestersleft = Math.ceil(hoursleft/DefaultHours);
		//Figure out what the next semester is 
		var d = new Date();
		var month = d.getMonth();
		if(month>0 && month<9)
			var period = 0;
		else
			var period = 1;
		//Schedule classes for upcoming semesters
		var schedule = new Array();
		/*for (i = 0; i <= semestersleft; i++) {
			schedule[i] = new Array();
		}*/
		var num=0;
		schedule[num] = new Array();
		var calchours=0;
		//If there are remaining classes after all semesters are filled,go ahead and create more semesters as needed.
		while ((semestersleft>0 || calchours<hoursleft) && num<100){
			num++;
			schedule[num] = new Array();
			calchours+=semester(num, period);
			if (period==0)
				period=1;
			else
				period=0;
			semestersleft--;	
		}
		
		//console.log(classes[0][1]);
		
		var totalhours=0;
		//var label1='style="display: block; padding-left:10px; vertical-align:bottom;"';
		//var label2='style="display: inline-block; padding-left:10px; position: relative;"';
		var code='<div style="width:320px; "><p style="color:#ffcc66;"><b><br>Your calculated schedule is as follows:<br><br></b></p>';
		for(i=1;i<=schedule.length-1;i++){
			hours=0;
			code+=('<p style="color:#ffcc66;background-color:#4a2e6b;padding-top:10px;padding-bottom:10px;padding-left:10px;"><b>Semester # '+i+'</b></p><p style="background-color:#4a2e6b;border:5px;">');
			code+='<ul  style="background-color:#4a2e6b" class="rounded">';
			for(j=0;j<schedule[i].length;j++){
				code+=('<li style="background-color:#4a2e6b"><label style="color:#ffcc66; font-size:100%;">'+schedule[i][j]+'</label>');	
				for(k=0;k<classes.length;k++){
					if(classes[k][1]==schedule[i][j]){
						code+=('<center><label style="color:white; font-size:85%;"> '+classes[k][2]+'</label></center></li></p>');	
						hours=hours+classes[k][3];
						break;
					}
				}
			}
			code+=('<p style="background-color:#4a2e6b; font-weight:normal; font-size:90%;">'+hours+' hours total<br></p></ul></p>');
			totalhours+=hours;
			//code+=("<br><br>");
		}
		
		code+=('<center><label style="background-color:#4a2e6b;">'+totalhours+' hours total total</label></center></div>');
		if(totalhours!=hoursleft){
			code+=('<center><label style="background-color:red;">BAD ERROR</label></center></div>');	
		}
		$("div.schedule").html(code);
	function semester(num, period){
			var hours=DefaultHours;
	var i=0;
	var k=0;
	var taken=false;
	var skip=false;
	var prereqs_var=false;
	var coreqs_var=false;
	var preTestHours=0;
	var coreqhours=0;
	function addit(i,hours,num,k){
		var j;
		if(typeof coreqs[i]!='undefined' && coreqs[i].length>0){
			for(var n=0; n<coreqs[i].length; n++)
			{
				j=getindex(coreqs[i][n]);
				//check that every coreq is NOT already taken
				for(var m=0; m<takencareof.length; m++){
					if(classes[j][1]==takencareof[m][0]){
						break;	
					}
				}
				if(m==takencareof.length){
					for(m=0; m<takencareof.length; m++){
						if(takencareof[m][0]== 0){
							takencareof[m][0]=classes[j][1];
							takencareof[m][1]=num;
							break;
						}
					}
					hours=hours-classes[j][3];	
					schedule[num][k]=classes[j][1];
					k++;	
				}
			}
		}
		for(m=0; m<takencareof.length; m++){
			if(takencareof[m][0]== 0){
				takencareof[m][0]=classes[i][1];
				takencareof[m][1]=num;
				break;
			}
		}
		hours=hours-classes[i][3];	
		schedule[num][k]=classes[i][1];	
		return hours;
	}
	function getindex(coreq){
		for (var i=0; i<classes.length; i++){
			if(coreq==classes[i][1]){
				return i;	
			}
		}
		
	}
	function checkcoreqhours(i){
		var hours=0;
		var j;
		if(typeof coreqs[i]!='undefined' && coreqs[i].length>0){
			for(var n=0; n<coreqs[i].length; n++)
			{
				//check that every coreq is NOT already taken
				for(var m=0; m<takencareof.length; m++){
					if(coreqs[i][n]==takencareof[m][0]){
						break;	
					}
				}
				if(m==takencareof.length){
					//get the hours for that coreq
					j=getindex(coreqs[i][n]);
					hours+=classes[j][3];
				}
			}
			return hours;	
		}else{
			return 0;	
		}
	}
	function checkcoreqsprereqs(i,num){
		var j;
		var prereqs=false;
		if(typeof coreqs[i]!='undefined' && coreqs[i].length>0){
			for(var n=0; n<coreqs[i].length; n++)
			{
				j=getindex(coreqs[i][n]);
				prereqs=checkprereqs(j,num);
				if(prereqs==false)
					break;	
			}
			return prereqs;
		}else{
			return true;	
		}
	}
	function checkprereqs(i,num){

		if(typeof prereqs[i]!='undefined' && prereqs[i].length>0){

			//do this
			for(var n=0; n<prereqs[i].length; n++)
			{
				//check that every prereq is already taken
				for(var m=0; m<takencareof.length; m++){
					if(prereqs[i][n]==takencareof[m][0] && takencareof[m][1]<num ){
						break;	
					}
				}
				if(m==takencareof.length){
					break;	
				}
			}
			if(m<takencareof.length){
				return true;
			}else{
				return false;
			}
		}else{
			return true;	
		}
		
	}
	while(hours>0 && i<classes.length)
	{
		taken=false;
		skip=false;
		prereqs_var=false;
		coreqs_var=false;
		for(var j=0; j<takencareof.length; j++)
		{
			if(classes[i][1]==takencareof[j][0]){
				taken=true;
				i++;
				break;	
			}
		}
		console.log(takencareof.length);
		if(i<classes.length){
			//check for coreqs
			coreqhours=checkcoreqhours(i);
			preTestHours=hours-((classes[i][3])+coreqhours);
		}
		if(preTestHours<=0){
			skip=true;
			i++;	
		}
		if(taken==false && skip==false && (classes[i][4]==2 || classes[i][4]==period) ){
			//Check for prereqs
			coreqs_var=checkcoreqsprereqs(i,num);
			prereqs_var=checkprereqs(i,num);
			if(prereqs_var==true && coreqs_var==true){
				hours=addit(i,hours,num,k);
				k=(schedule[num].length);
			}else{
				i++;
			}
			
		}else if(taken==false){
			i++;	
		}
	}
	return DefaultHours-hours;
	}});
	});
			
}

}