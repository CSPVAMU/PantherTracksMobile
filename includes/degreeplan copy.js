//Move DegreePlan/Class info to new js file
var classes = new Array();
for (i = 0; i < 45; i++) {
    classes[i] = new Array();
}

var prereqs = new Array();
for (i = 0; i < 45; i++) {
    prereqs[i] = new Array();
}

var coreqs = new Array();
for (i = 0; i < 45; i++) {
    coreqs[i] = new Array();
}

//Calculus I
classes[0][0]="1";
classes[0][1]="MATH 1124";
classes[0][2]="Calculus I";
classes[0][3]=4; //# of Credit Hours
classes[0][4]=2; //Fall & Spring
classes[0][5]="R"; //Required
classes[0][6]="N"; //prereqs
classes[0][7]="Y"; //coreqs
	/* Assume pre-reqs outside of degree plan have already been taken
	prereqs
		prereqs[0][0]="MATH 1123 OR MATH 1115";
	*/
	//coreqs
		coreqs[0][0]="GNEG 1121";
//Calculus I Lab
classes[1][0]="2";
classes[1][1]="GNEG 1121";
classes[1][2]="Engineering Appln. Lab II for Math";
classes[1][3]=1; //# of Credit Hours
classes[1][4]=2; //Fall & Spring
classes[1][5]="R"; //Required
classes[1][6]="N"; //prereqs
classes[1][7]="Y"; //coreqs
	//coreqs
		coreqs[1][0]="MATH 1124";
//Science I
classes[2][0]="3";
classes[2][1]="SCI Course";
classes[2][2]="Science Course*";
classes[2][3]=3; //# of Credit Hours
classes[2][4]=2; //Spring
classes[2][5]="R"; //Required
classes[2][6]="N"; //prereqs
classes[2][7]="Y"; //coreqs
	//coreqs
		coreqs[2][0]="SCI Lab";
//Science I Lab
classes[3][0]="4";
classes[3][1]="SCI Lab";
classes[3][2]="Science Lab*";
classes[3][3]=1; //# of Credit Hours
classes[3][4]=2; //Spring
classes[3][5]="R"; //Required
classes[3][6]="N"; //prereqs
classes[3][7]="Y"; //coreqs
	//coreqs
		coreqs[3][0]="SCI Course";
//Intro to Eng
classes[4][0]="5";
classes[4][1]="COMP 1011";
classes[4][2]="Intro to Engr. & CS Tech";
classes[4][3]=1; //# of Credit Hours
classes[4][4]=2; //Spring
classes[4][5]="R"; //Required
classes[4][6]="N"; //prereqs
classes[4][7]="N"; //coreqs	
//Into to CS Lab
classes[5][0]="6";
classes[5][1]="COMP 1021";
classes[5][2]="Intro to CS Lab";
classes[5][3]=1; //# of Credit Hours
classes[5][4]=2; //Fall
classes[5][5]="R"; //Required
classes[5][6]="N"; //prereqs
classes[5][7]="N"; //coreqs 		
//CS I 
classes[6][0]="7";
classes[6][1]="COMP 1214";
classes[6][2]="Computer Science and Labratory I";
classes[6][3]=4; //# of Credit Hours
classes[6][4]=0; //Fall
classes[6][5]="R"; //Required
classes[6][6]="N"; //prereqs
classes[6][7]="N"; //coreqs
	/* Assume pre-reqs outside of degree plan have already been taken
	prereqs
		prereqs[6][0]="MATH 1123 OR MATH 1115";
	*/
//English I 
classes[7][0]="8";
classes[7][1]="ENGL 1123";
classes[7][2]="Freshman Composition I";
classes[7][3]=3; //# of Credit Hours
classes[7][4]=2; //Fall
classes[7][5]="R"; //Required
classes[7][6]="N"; //prereqs
classes[7][7]="N"; //coreqs
//Calc II
classes[8][0]="9";
classes[8][1]="MATH 2024";
classes[8][2]="Calculus with Analytic Geormetry II";
classes[8][3]=4; //# of Credit Hours
classes[8][4]=2; //Fall
classes[8][5]="R"; //Required
classes[8][6]="Y"; //prereqs
classes[8][7]="Y"; //coreqs
	//prereqs
		prereqs[8][0]="MATH 1124";
	//coreqs
		coreqs[8][0]="GNEG 2021";
//Eng Lab III
classes[9][0]="10";
classes[9][1]="GNEG 2021";
classes[9][2]="Engineering Appln. Lab III for Math";
classes[9][3]=1; //# of Credit Hours
classes[9][4]=2; //Fall
classes[9][5]="R"; //Required
classes[9][6]="N"; //prereqs
classes[9][7]="Y"; //coreqs
	//coreqs
		coreqs[9][0]="MATH 2024";
//Fundamentals of Speech Comm. 
classes[10][0]="11";
classes[10][1]="COMM 1003";
classes[10][2]="Fundamentals of Speech Comm.";
classes[10][3]=3; //# of Credit Hours
classes[10][4]=2; //Fall
classes[10][5]="R"; //Required
classes[10][6]="N"; //prereqs
classes[10][7]="N"; //coreqs
//Computer Science and Laboratory II
classes[11][0]="12";
classes[11][1]="COMP 1224";
classes[11][2]="Computer Science and Laboratory II";
classes[11][3]=4; //# of Credit Hours
classes[11][4]=1; //Fall
classes[11][5]="R"; //Required
classes[11][6]="Y"; //prereqs
classes[11][7]="Y"; //coreqs
	//prereqs
		prereqs[11][0]="COMP 1214";
	//coreqs
		coreqs[11][0]="MATH 1124";
//Data Structures
classes[12][0]="13";
classes[12][1]="COMP 2013";
classes[12][2]="Data Structures";
classes[12][3]=3; //# of Credit Hours
classes[12][4]=0; //Fall
classes[12][5]="R"; //Required
classes[12][6]="Y"; //prereqs
classes[12][7]="N"; //coreqs
	//prereqs
		prereqs[12][0]="COMP 1224";
//US HIST
classes[13][0]="14";
classes[13][1]="HIST 1313";
classes[13][2]="U.S. to 1876";
classes[13][3]=3; //# of Credit Hours
classes[13][4]=2; //Fall
classes[13][5]="R"; //Required
classes[13][6]="N"; //prereqs
classes[13][7]="N"; //coreqs
//Discrete Structures
classes[14][0]="15";
classes[14][1]="COMP 2103";
classes[14][2]="Discrete Structures";
classes[14][3]=3; //# of Credit Hours
classes[14][4]=0; //Fall
classes[14][5]="R"; //Required
classes[14][6]="Y"; //prereqs
classes[14][7]="N"; //coreqs
	//prereqs
		prereqs[14][0]="COMP 1224";
//Technical Writing
classes[15][0]="16";
classes[15][1]="ENGL 1143";
classes[15][2]="Technical Writing";
classes[15][3]=3; //# of Credit Hours
classes[15][4]=2; //Fall
classes[15][5]="R"; //Required
classes[15][6]="N"; //prereqs
classes[15][7]="N"; //coreqs
//Science I
classes[16][0]="17";
classes[16][1]="SCI Course II";
classes[16][2]="Science Course II*";
classes[16][3]=3; //# of Credit Hours
classes[16][4]=2; //Spring
classes[16][5]="R"; //Required
classes[16][6]="N"; //prereqs
classes[16][7]="Y"; //coreqs
	//coreqs
		coreqs[16][0]="SCI Lab";
//Science I Lab
classes[17][0]="18";
classes[17][1]="SCI Lab II";
classes[17][2]="Science Lab II*";
classes[17][3]=1; //# of Credit Hours
classes[17][4]=2; //Spring
classes[17][5]="R"; //Required
classes[17][6]="N"; //prereqs
classes[17][7]="Y"; //coreqs
	//coreqs
		coreqs[17][0]="SCI Course";
//Assembly Language
classes[18][0]="19";
classes[18][1]="COMP 2033";
classes[18][2]="Assembly Language";
classes[18][3]=3; //# of Credit Hours
classes[18][4]=1; //Spring
classes[18][5]="R"; //Required
classes[18][6]="Y"; //prereqs
classes[18][7]="N"; //coreqs
	//prereqs
		prereqs[18][0]="COMP 1224";
//Elective
classes[19][0]="20";
classes[19][1]="COMP ELEC I";
classes[19][2]="Elective I";
classes[19][3]=3; //# of Credit Hours
classes[19][4]=2; //Spring
classes[19][5]="E"; //Required
classes[19][6]="N"; //prereqs
classes[19][7]="N"; //coreqs
//Elective
classes[20][0]="21";
classes[20][1]="COMP ELEC II";
classes[20][2]="Elective II";
classes[20][3]=3; //# of Credit Hours
classes[20][4]=2; //Spring
classes[20][5]="E"; //Required
classes[20][6]="N"; //prereqs
classes[20][7]="N"; //coreqs
//Govt I
classes[21][0]="22";
classes[21][1]="POSC 1113";
classes[21][2]="American Government I";
classes[21][3]=3; //# of Credit Hours
classes[21][4]=2; //Spring
classes[21][5]="R"; //Required
classes[21][6]="N"; //prereqs
classes[21][7]="N"; //coreqs
//Science I
classes[22][0]="23";
classes[22][1]="SCI Course III";
classes[22][2]="Science Course III*";
classes[22][3]=3; //# of Credit Hours
classes[22][4]=2; //Spring
classes[22][5]="R"; //Required
classes[22][6]="N"; //prereqs
classes[22][7]="Y"; //coreqs
	//coreqs
		coreqs[22][0]="SCI Lab III";
//Science I Lab
classes[23][0]="24";
classes[23][1]="SCI Lab III";
classes[23][2]="Science Lab III*";
classes[23][3]=1; //# of Credit Hours
classes[23][4]=2; //Spring
classes[23][5]="R"; //Required
classes[23][6]="N"; //prereqs
classes[23][7]="Y"; //coreqs
	//coreqs
		coreqs[23][0]="SCI Course";
//American Government II
classes[24][0]="25";
classes[24][1]="POSC 1123";
classes[24][2]="American Government II";
classes[24][3]=3; //# of Credit Hours
classes[24][4]=2; //Spring
classes[24][5]="R"; //Required
classes[24][6]="N"; //prereqs
classes[24][7]="N"; //coreqs
//Linear Algebra
classes[25][0]="26";
classes[25][1]="MATH 3073";
classes[25][2]="Linear Algebra";
classes[25][3]=3; //# of Credit Hours
classes[25][4]=2; //Spring
classes[25][5]="R"; //Required
classes[25][6]="Y"; //prereqs
classes[25][7]="N"; //coreqs
	//prereqs
		prereqs[25][0]="MATH 2024";
//Digital Logic Circuit
classes[26][0]="27";
classes[26][1]="COMP 3033";
classes[26][2]="Digital Logic Circuit";
classes[26][3]=3; //# of Credit Hours
classes[26][4]=0; //Spring
classes[26][5]="R"; //Required
classes[26][6]="Y"; //prereqs
classes[26][7]="N"; //coreqs
	//prereqs
		prereqs[26][0]="COMP 2033";
//Computer Org
classes[27][0]="28";
classes[27][1]="COMP 3043";
classes[27][2]="Computer Organization";
classes[27][3]=3; //# of Credit Hours
classes[27][4]=0; //Spring
classes[27][5]="R"; //Required
classes[27][6]="Y"; //prereqs
classes[27][7]="N"; //coreqs
	//prereqs
		prereqs[27][0]="COMP 2033";
//Computer Org
classes[28][0]="29";
classes[28][1]="MATH 3023";
classes[28][2]="Probability and Statistics";
classes[28][3]=3; //# of Credit Hours
classes[28][4]=2; //Spring
classes[28][5]="R"; //Required
classes[28][6]="N"; //prereqs
classes[28][7]="N"; //coreqs
//Analysis of Algorithms
classes[29][0]="30";
classes[29][1]="COMP 3053";
classes[29][2]="Analysis of Algorithms";
classes[29][3]=3; //# of Credit Hours
classes[29][4]=1; //Spring
classes[29][5]="R"; //Required
classes[29][6]="Y"; //prereqs
classes[29][7]="N"; //coreqs
	//prereqs
		prereqs[29][0]="COMP 2013";
		prereqs[29][0]="COMP 2103";
//Operating System
classes[30][0]="31";
classes[30][1]="COMP 3063";
classes[30][2]="Operating Systems";
classes[30][3]=3; //# of Credit Hours
classes[30][4]=1; //Spring
classes[30][5]="R"; //Required
classes[30][6]="Y"; //prereqs
classes[30][7]="N"; //coreqs
	//prereqs
		prereqs[29][0]="COMP 2013";
		prereqs[29][0]="COMP 3043";
//Software Engineering
classes[31][0]="32";
classes[31][1]="COMP 3224";
classes[31][2]="Software Engineeing";
classes[31][3]=3; //# of Credit Hours
classes[31][4]=1; //Spring
classes[31][5]="R"; //Required
classes[31][6]="Y"; //prereqs
classes[31][7]="N"; //coreqs
	//prereqs
		prereqs[29][0]="COMP 2013";
//Upper Level Elective
classes[32][0]="33";
classes[32][1]="COMP UPPER-ELECTIVE I";
classes[32][2]="Upper Level Elective I";
classes[32][3]=3; //# of Credit Hours
classes[32][4]=2; //Spring
classes[32][5]="E"; //Required
classes[32][6]="N"; //prereqs
classes[32][7]="N"; //coreqs
//Humanities & Arts
classes[33][0]="34";
classes[33][1]="H & V Core I";
classes[33][2]="Humanitie & Ars I";
classes[33][3]=3; //# of Credit Hours
classes[33][4]=2; //Spring
classes[33][5]="E"; //Required
classes[33][6]="N"; //prereqs
classes[33][7]="N"; //coreqs
//Ethics
classes[34][0]="35";
classes[34][1]="COMP 4001";
classes[34][2]="Ethics and Soc. Issues in Computing";
classes[34][3]=1; //# of Credit Hours
classes[34][4]=0; //Spring
classes[34][5]="R"; //Required
classes[34][6]="N"; //prereqs
classes[34][7]="Y"; //coreqs
	//coreqs
		coreqs[34][0]="COMP 4072";
//Senior Design Project I
classes[35][0]="36";
classes[35][1]="COMP 4072";
classes[35][2]="Senior Design Project I";
classes[35][3]=2; //# of Credit Hours
classes[35][4]=0; //Spring
classes[35][5]="R"; //Required
classes[35][6]="N"; //prereqs
classes[35][7]="Y"; //coreqs
	//coreqs
		coreqs[35][0]="COMP 4001";
//Computer Networks
classes[36][0]="37";
classes[36][1]="COMP 4123";
classes[36][2]="Computer Networks";
classes[36][3]=3; //# of Credit Hours
classes[36][4]=0; //Spring
classes[36][5]="R"; //Required
classes[36][6]="Y"; //prereqs
classes[36][7]="N"; //coreqs
	//prereqs
		prereqs[36][0]="COMP 3063";
//Formal Languages
classes[37][0]="38";
classes[37][1]="COMP 4133";
classes[37][2]="Formal Languages";
classes[37][3]=3; //# of Credit Hours
classes[37][4]=0; //Spring
classes[37][5]="R"; //Required
classes[37][6]="Y"; //prereqs
classes[37][7]="N"; //coreqs
	//prereqs
		prereqs[37][0]="COMP 2103";
//Database Management
classes[38][0]="39";
classes[38][1]="COMP 4953";
classes[38][2]="Database Management";
classes[38][3]=3; //# of Credit Hours
classes[38][4]=0; //Spring
classes[38][5]="R"; //Required
classes[38][6]="Y"; //prereqs
classes[38][7]="N"; //coreqs
	//prereqs
		prereqs[37][0]="COMP 2103";
//Social & Behavioral Sciencw
classes[39][0]="40";
classes[39][1]="S & B";
classes[39][2]="Social & Behavioral Science";
classes[39][3]=3; //# of Credit Hours
classes[39][4]=2; //Spring
classes[39][5]="E"; //Required
classes[39][6]="N"; //prereqs
classes[39][7]="N"; //coreqs
//Senior Design Project II
classes[40][0]="41";
classes[40][1]="COMP 4082";
classes[40][2]="Senior Design Project II";
classes[40][3]=2; //# of Credit Hours
classes[40][4]=1; //Spring
classes[40][5]="R"; //Required
classes[40][6]="Y"; //prereqs
classes[40][7]="N"; //coreqs
	//prereqs
		prereqs[40][0]="COMP 4072";
//Programming Languages
classes[41][0]="42";
classes[41][1]="COMP 4113";
classes[41][2]="Programming Languages Design";
classes[41][3]=3; //# of Credit Hours
classes[41][4]=1; //Spring
classes[41][5]="R"; //Required
classes[41][6]="Y"; //prereqs
classes[41][7]="N"; //coreqs
	//prereqs
		prereqs[41][0]="COMP 2013";
//Upper Level Elective
classes[42][0]="43";
classes[42][1]="COMP UPPER-LEVEL II";
classes[42][2]="Upper Level Elective II";
classes[42][3]=3; //# of Credit Hours
classes[42][4]=2; //Spring
classes[42][5]="E"; //Required
classes[42][6]="N"; //prereqs
classes[42][7]="N"; //coreqs
//U.S. Hist II
classes[43][0]="44";
classes[43][1]="HIST 1323";
classes[43][2]="The U.S.-1876 to Present";
classes[43][3]=3; //# of Credit Hours
classes[43][4]=2; //Spring
classes[43][5]="E"; //Required
classes[43][6]="N"; //prereqs
classes[43][7]="N"; //coreqs
//Humanities & Arts
classes[44][0]="45";
classes[44][1]="H & V Core II";
classes[44][2]="Humanitie & Ars II";
classes[44][3]=3; //# of Credit Hours
classes[44][4]=2; //Spring
classes[44][5]="E"; //Required
classes[44][6]="N"; //prereqs
classes[44][7]="N"; //coreqs