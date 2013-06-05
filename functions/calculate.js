function Calculate() {

//Call 'RetrieveSettings' in class 'Student' and get settings from 'StudentPreferences' table
var startDate="F10";
var DefaultHours=15;
var DegreePlan=1; //CS
	
//Call 'StudentRecords' in class 'Student' and get settings from 'StudentRecords' table
var records = new Array(3);
for (var i = 0; i < 3; i++) {
    records[i] = new Array(4);
}
 $.ajax({
    	url: "http://pvamu.hazar.us/includes/studenthistory.php",
    	async: false,
    	dataType: 'json',
    	success: function(data) {
    		for (var i=0, len=data.length; i < len; i++) {
				records[i][0]=data[i];
			}

/*//CS I
records[0][0]="1";
records[0][1]="COMP 1214";
records[0][2]="A";
records[0][3]="S10";
//Calculus I
records[1][0]="3";
records[1][1]="MATH 1124";
records[1][2]="B";
records[1][3]="S10";*/


//Dump class numbers to array
var takencareof = new Array();
for(i = 0; i < records.length; i++)
{
		takencareof[i]=records[i][1];
}

	
//First, see the number of credit hours taken and make sure they all apply to the degree plan
var completedhours = 8;
/*
for (var i=0;i<records.length;i++)
{
	for (var j=0;j<classes.length;j++)
	{
		if(records[i][1]==classes[j][1])
		{
			completedhours=completedhours+classes[j][3];
			
		}
	}
}*/

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
for (i = 0; i <= semestersleft; i++) {
    schedule[i] = new Array();
}

function semester(num, period){
	var hours=DefaultHours;
	var i=0;
	var k=0;
	while(hours>0 && i<classes.length)
	{
		for(var j=0; j<takencareof.length; j++)
		{
			if(classes[i][1]==takencareof[j]){
				i++;
				break;	
			}
		}
		if(j==takencareof.length && (classes[i][4]==2 || classes[i][4]==period)){
			var localhours=classes[i][3];
			//check for co-reqs
			if(classes[i][7]=="Y"){
				for(var n=0; n<coreqs[i].length; n++)
				{
					for(var q=0; q<classes.length; q++){
						if(coreqs[i]==classes[q][1]){
							//make sure coreq has not been taken already
							for(var z=0; z<takencareof.length; z++)
							{
								if(classes[q][1]==takencareof[z]){
									break;	
								}
							}
							if(z==takencareof.length)
								localhours+=classes[q][3];
							break;
						}
					}
				}
			}
			if (hours-localhours>=0){
				//check for prereqs of class + its co-reqs
				if(classes[i][7]=="Y"){
					if(classes[i][6]=="Y"){ //Check for prereqs
						//do this
						for(var n=0; n<prereqs[i].length; n++)
						{
							//check that every prereq is already taken
							for(var m=0; m<takencareof.length; m++){
								if(prereqs[i][n]==takencareof[m])
									break;	
							}
							if(m==takencareof.length){
								break;	
							}
						}
						var coreqtaken=false;
						if(m<takencareof.length){
							//check for pre-reqs of co-req if co-req has not been taken already
							for(var z=0; z<takencareof.length; z++)
							{
								if(classes[q][1]==takencareof[z]){
									//skip this class
									coreqtkane=true;
									break;
								}
							}
							if(z==takencareof.length){
								for(var n=0; n<prereqs[q].length; n++)
								{
									//check that every prereq is already taken
									for(var w=0; w<takencareof.length; w++){
										if(prereqs[q][n]==takencareof[q])
											break;	
									}
									if(q==takencareof.length){
										break;	
									}
								}
							}
							if(w<takencareof.length && coreqtaken!=true){
								takencareof[takencareof.length+1]=classes[i][1];
								takencareof[takencareof.length+1]=classes[q][1];
								hours=hours-localhours;	
								schedule[num][k]=classes[i][1];
								k++;
								schedule[num][k]=classes[q][1];
								k++;
							}else{
									i++;	
							}
						}else{
							i++;	
						}
					}else if(classes[q][6]=="Y"){
						for(var n=0; n<prereqs[q].length; n++)
						{
							//check that every prereq is already taken
							for(var m=0; m<takencareof.length; m++){
								if(prereqs[q][n]==takencareof[m])
									break;	
							}
							if(m==takencareof.length){
								break;	
							}
						}
						if(m<takencareof.length){
							takencareof[takencareof.length+1]=classes[i][1];
							takencareof[takencareof.length+1]=classes[q][1];
							hours=hours-localhours;	
							schedule[num][k]=classes[i][1];
							k++;
							schedule[num][k]=classes[q][1];
							k++;
						}else{
							i++;	
						}
					}else{
							takencareof[takencareof.length+1]=classes[i][1];
							takencareof[takencareof.length+1]=classes[q][1];
							hours=hours-localhours;	
							schedule[num][k]=classes[i][1];
							k++;
							schedule[num][k]=classes[q][1];
							k++;
					}	
				}else{
					if(classes[i][6]=="Y"){ //Check for prereqs
						//do this
						for(var n=0; n<prereqs[i].length; n++)
						{
							//check that every prereq is already taken
							for(var m=0; m<takencareof.length; m++){
								if(prereqs[i][n]==takencareof[m])
									break;	
							}
							if(m==takencareof.length){
								break;	
							}
						}
						if(m<takencareof.length){
							takencareof[takencareof.length+1]=classes[i][1];
							hours=hours-classes[i][3];	
							schedule[num][k]=classes[i][1];
							k++;
						}else{
							i++;	
						}
					}else {
							takencareof[takencareof.length+1]=classes[i][1];
							hours=hours-classes[i][3];	
							schedule[num][k]=classes[i][1];
							k++;
					}
				}
			}else
				i++;
		}else if(j==takencareof.length){
			i++;	
		}
	}
	
}
var num=0;
while (semestersleft){
	num++;
	semester(num, period);
	if (period==0)
		period=1;
	else
		period=0;
	semestersleft--;	
}



//testing
var totalhours=0;
for(i=1;i<=schedule.length-1;i++){
	hours=0;
	document.write("<p><b>Semester # "+i+"</b></p>");
	for(j=0;j<schedule[i].length;j++){
		document.write("<p>"+schedule[i][j]);	
		for(k=0;k<classes.length;k++){
			if(classes[k][1]==schedule[i][j]){
				document.write(" - "+classes[k][0]+"</p>");	
				hours=hours+classes[k][3];
				break;
			}
		}
	}
	document.write("<p>"+hours+" hours total</p>");
	totalhours+=hours;
	document.write("<br><br>");
}
document.write("<p>"+totalhours+" hours total total</p>");


//var x=document.getElementById("demo");
//x.innerHTML=semestersleft;


	
	//Choose first class based on first class found under degree plan that has not been compelted by the student yet & is offered this coming semester. Make sure student meets prereqs *ADD PREREQS to DEGREE PLAN*
	//Check for co-reqs
	//Move on to next class until there are no classes left.
}
    });
	
}