<?php
error_reporting(-1);
header('Access-Control-Allow-Origin: *');

//DELETE THIS SECTION AFTER COMPLETION
$studentid=160;
//END DELETE


include '../includes/degreeplan.php';
include '../includes/studenthistory.php';
include '../php/studentsettings.php';
include '../includes/priorityQueue.php';

//Get student's taken classes in array form as list
$list = array();
$list = studentHistory($studentid,"list");

//Compare degree plan to student history and get remaining classes
$remaining = array();
$remaining = array_diff($class_nums, $list);

//Get full details for reminaing classes
$filtered = array();
foreach ($remaining as $key => $row) {
	$filtered[$classes[$key][0]][0]=$classes[$key][0];
	$filtered[$classes[$key][0]][1]=$classes[$key][1];
	$filtered[$classes[$key][0]][2]=$classes[$key][2];
	$filtered[$classes[$key][0]][3]=$classes[$key][3];
	$filtered[$classes[$key][0]][4]=$classes[$key][4];
	$filtered[$classes[$key][0]][5]=$classes[$key][5];
	$filtered[$classes[$key][0]][6]=$classes[$key][6];
	$filtered[$classes[$key][0]][7]=$classes[$key][7];
	
	//Extract class level
	$pieces = explode(" ", $classes[$key][1]);
	$filtered[$classes[$key][0]]['level']=$pieces[1];
	
	//Insert extra record to initialize all classes as not being prereqs for future classes
	$filtered[$classes[$key][0]][8]=0;
	//Insert extra record to initialize priority to NULL
	$filtered[$classes[$key][0]]['priority']=NULL;
}

//Sorting function 
function make_comparer() {
    // Normalize criteria up front so that the comparer finds everything tidy
    $criteria = func_get_args();
    foreach ($criteria as $index => $criterion) {
        $criteria[$index] = is_array($criterion)
            ? array_pad($criterion, 3, null)
            : array($criterion, SORT_DESC, null);
    }

    return function($first, $second) use (&$criteria) {
        foreach ($criteria as $criterion) {
            // How will we compare this round?
            list($column, $sortOrder, $projection) = $criterion;
            $sortOrder = $sortOrder === SORT_DESC ? -1 : 1;

            // If a projection was defined project the values now
            if ($projection) {
                $lhs = call_user_func($projection, $first[$column]);
                $rhs = call_user_func($projection, $second[$column]);
            }
            else {
                $lhs = $first[$column];
                $rhs = $second[$column];
            }

            // Do the actual comparison; do not return if equal
            if ($lhs < $rhs) {
                return -1 * $sortOrder;
            }
            else if ($lhs > $rhs) {
                return 1 * $sortOrder;
            }
        }

        return 0; // tiebreakers exhausted, so $first == $second
    };
}

//Sort filtered classes by descending order based on class level
$sorted = array();
$sorted=$filtered; 
usort($sorted, make_comparer('level'));
//Put filtered classes into queues
	//Process prereq classes
	function ProcessPrereqs($classIndex, $i){
	global $filtered; 	
	//Go through class's prereq classes & mark them
		if($filtered[$classIndex][6]!="0"){
			if (strpos($filtered[$classIndex][6],',') !== false) {
				$pieces = explode(",", $filtered[$classIndex][6]);
				$cnt=0;
				foreach ($pieces as $key => $row){
					$filtered[$row][8]=1;
					AssignPriority($pieces[$cnt], $i);
					$cnt++;	
				}
			}else{
				$next=$filtered[$classIndex][6];
				$filtered[$next][8]=1;
				AssignPriority($next, $i);	
			}
		}
	}
	
	//Recursive function that determines priority number
	function AssignPriority($classIndex, $i=0){
		global $filtered; 
		$i++;
		ProcessPrereqs($classIndex, $i);
		if($filtered[$classIndex]['priority']!=NULL){
			if($filtered[$classIndex]['priority']<$i)
				$filtered[$classIndex]['priority']=$i;
		}else{
			if($filtered[$classIndex][8]==0 && $filtered[$classIndex][6]=="0")
				$filtered[$classIndex]['priority']=0;
			else if($filtered[$classIndex][8]==0 && $filtered[$classIndex][6]!="0")
					$filtered[$classIndex]['priority']=1;		
			else
					$filtered[$classIndex]['priority']=$i;
		}
		return $filtered[$classIndex]['priority'];
	}
	
foreach ($sorted as $key => $row) {
	$PriorityNum=AssignPriority($row[0]);	
	//echo "".$filtered[$row[0]][2]." - Priority: ".$filtered[$row[0]]['priority']."<br>";
}
	function CheckLongestRoute($classIndex){
		global $filtered; 
		if (strpos($filtered[$classIndex][6],',') !== false) {
				$pieces = explode(",", $filtered[$classIndex][6]);
				$cnt=0;
				$num = Array();
				foreach ($pieces as $key => $row){
					$num[$cnt]['num']=PutinQ($pieces[$cnt]);
					$num[$cnt]['classIndex']=$pieces[$cnt];
					$cnt++;	
				}
				usort($num, make_comparer('num'));
				return $num[0]['classIndex'];
			}else{
				return $filtered[$classIndex][6];
			}	
	}
	function PutinQ($classIndex){
		global $filtered;
		if($filtered[$classIndex][6]=="0")
			return 1;
		else
			$next=CheckLongestRoute($classIndex);
		return 1+PutinQ($next);	
	}
//Assign priority queue
$highest=0;
foreach ($sorted as $key => $row) {
	if($filtered[$row[0]]['priority']!=0)	{
		//Before placing it in queue, see if it has co-reqs, only put in the class with the highest priority
		$highestPriority=processCoreqs($row[0]);
		//Recursively go through prerequisites	
		if($highestPriority==true){
			$QueueNum=PutinQ($row[0]);
			if($QueueNum>$highest)
				$highest=$QueueNum;
			if(!isset(${"Queue".$QueueNum})){
				${"Queue".$QueueNum} = new PQ();
			}
			${"Queue".$QueueNum}-> insert($row[0],$filtered[$row[0]]['priority']); 
		}
	}
}
function processCoreqs($index){
	$highestPriority=true;
	global $filtered;
	$coreq=$filtered[$index][7];
	global $filtered;
	if ($coreq>0 && isset($filtered[$coreq][0])){ //ASSUMING THERE IS ONLY ONE COREQ********************ERROR WARNING
		//if it has coreqs, does it have the highest of the 2 priorities?	
		$highestPriority=highestPriority($index,$coreq);
		if($highestPriority==true){
			//add # of credit hours to the class with the highest priority
			addHours($index,$coreq);	
		}
	}
	return $highestPriority;	
}
function highestPriority($index,$coreq){
	global $filtered;
	if($filtered[$index]['priority']>$filtered[$coreq]['priority'])
		return true;
	else if($filtered[$index]['priority']==$filtered[$coreq]['priority'] && $filtered[$index][3]>$filtered[$coreq][3])
		return true;
	else //THERE'S A CHANCE THE PRIORITY & HOURS ARE EQUAL IN WHICH CASE THIS WILL BREAK THE CODE AS BOTH CLASSES WONT BE LISTED***********ERORR WARNING
		return false;
}
function addHours($index1, $index2){
	global $filtered;
	$filtered[$index1][3]+=$filtered[$index2][3];
	if($filtered[$index2]['priority']>0)
		$filtered[$index1]['priority']+=$filtered[$index2]['priority'];
	else
		$filtered[$index1]['priority']+=$filtered[$index2][3];
}
//Print Queues *TESTING*
/*for($i=1; $i<=$highest; $i++){
	echo "QUEUE #: ".$i." :: COUNT->".${"Queue".$i}->count()."<BR>"; 
	
	//mode of extraction 
	${"Queue".$i}->setExtractFlags(PQ::EXTR_BOTH); 
	
	//Go to TOP 
	${"Queue".$i}->top(); 
	while(${"Queue".$i}->valid()){ 
		print_r(${"Queue".$i}->current()); 
		echo "<BR>"; 
		${"Queue".$i}->next(); 
	} 
}*/

//Put all priority 0 classes in a stack based on # of credit hours & period offered
$hours0 = array (); //Fall
$hours1 = array (); //Spring
$hours2 = array (); //Both
foreach ($sorted as $key => $row) {
	if($filtered[$row[0]]['priority']==0)	{
		$highestPriority=processCoreqs($row[0]);
		if($highestPriority==true){
			$NumofHrs=$filtered[$row[0]]['3'];
			$period=$filtered[$row[0]]['4'];
			if(!isset(${"Stack".$NumofHrs.$period})){
				array_push(${"hours".$period},$NumofHrs);
				${"Stack".$NumofHrs.$period} = new SplStack();
			}
			${"Stack".$NumofHrs.$period}->push($filtered[$row[0]][0]);
		}
	}
}
//Get number of classes per stack
$stacks = array();
for($i=0;$i<=2;$i++){
	foreach (${"hours".$i} as $key => $row) {
			$count=${"Stack".$row.$i}->count();
			$stacks[$row][$i]['hours']=$row;
			$stacks[$row][$i]['count']=$count;
			//echo "Stacks".$row.$i." , hours=".$row." , count=",$count. "<br>";
	}
}
//Testing stacks
/*$sem = array();
$sem[0]="Fall";
$sem[1]="Spring";
$sem[2]="Fall & Spring";
for($i=0;$i<=2;$i++){
	foreach ($stacks as $key => $row) {
		if(isset(${"Stack".$row[$i]['hours'].$i})){
			${"Stack".$row[$i]['hours'].$i}->rewind();
			echo "STACK Stack".$row[$i]['hours'].$i." of ".$sem[$i]." ".$row[$i]['hours']." hour classes containing ".$row[$i]['count']." classes:  <br>";
			while( ${"Stack".$row[$i]['hours'].$i}->valid() )
			{
				$classNum=${"Stack".$row[$i]['hours'].$i}->current();
				echo $filtered[$classNum][2]."<br>";
				${"Stack".$row[$i]['hours'].$i}->next();
			}
			echo "<br>";
		}
	}
}*/

//get user's settings - # of credit hours -
$defaultHours=settings($studentid, "hours");

//Declare schedule array
$schedule= array();
//while priority queues remain, call semester function
	//Figure out what the next semester is 
	$month = date("m");
	if($month>0 && $month<9)
		$period = 0;
	else
		$period = 1;
	//call semester function
	$num=1;
	while(isset(${"Queue".$num}) && ${"Queue".$num}->valid()){
		//Get Queues ready
		${"Queue".$num}->setExtractFlags(PQ::EXTR_BOTH); 
		$schedule[$num]['num']=semester($num, $period);
		if ($period==0)
			$period=1;
		else
			$period=0;
		$num++;
	}
	//If there are any classes remaining in general stacks, schedule them
	function CountClassesLeft(){
		$count=0;
		for($i=0;$i<=2;$i++){
			global ${"hours".$i};
			foreach (${"hours".$i} as $key => $row) {
				global ${"Stack".$row.$i};
					$count+=${"Stack".$row.$i}->count();
			}
		}
		return $count;	
	}
	$count=CountClassesLeft();
	while($count>0){
		$schedule[$num]['num']=semester($num, $period);
		if ($period==0)
			$period=1;
		else
			$period=0;
		$num++;	
		$count=CountClassesLeft();
	}
function semester($num, $period){
	$next_num=$num+1;
	global $defaultHours;
	global $filtered;
	global $schedule;
	global $stacks;
	global ${"Queue".$num};
	global ${"Queue".$next_num};
	if(!isset(${"Queue".$next_num})){
		${"Queue".$next_num} = new PQ();
	}
	//while credit hours remain
	$hours=0;
	$i=0;
	$cnt=0;
	$top=array();
	while($hours<$defaultHours && isset(${"Queue".$num}) && ${"Queue".$num}->valid()){
		//1) Go thrue queue 1, pop classes in order, if period matches, schedule it, otherwise insert it in $num+1 queue
		$top=${"Queue".$num}->current();
		${"Queue".$num}->next();
		$class=$top['data'];
		if(($filtered[$class][4]==$period || $filtered[$class][4]==2) && $hours+$filtered[$class][3]<=$defaultHours){
			$hours+=$filtered[$class][3];
			$schedule[$num][$cnt]=$class;
			$cnt++;		
			//---Schedule co-reqs too---
			if($filtered[$class][7]>0 && isset($filtered[$filtered[$class][7]][0])){
				$schedule[$num][$cnt]=$filtered[$class][7];
				$cnt++;		
			}
		}else{
			InsertinNextQ($next_num, $top['data'],$top['priority']);	
		}	
	}
	while(${"Queue".$num}->valid()){
		//Go thru remaining classes & push them to next queue	
		$top=${"Queue".$num}->current(); 
		${"Queue".$num}->next(); 
		InsertinNextQ($next_num, $top['data'],$top['priority']);
	}
	//If there are hours remaining, schedule from stacks
	//Step 1 - Go thru stacks and add their data to array
	foreach ($stacks as $key => $row) {
		for($k=0;$k<=2;$k++){
				if(isset($row[$k]) && ($k==$period || $k==2)){ //ONLY ADD STACKS WHOSE PERIOD MATCHES
					$data[$i]['index']=	"Stack".$row[$k]['hours'].$k;
					$data[$i]['hours']=	$row[$k]['hours'];
					$data[$i]['priority']= $row[$k]['hours'];
					$data[$i]['count']=$row[$k]['count'];
					$i++;
			}
		}
	}
	//Step 2
	$remainingHours=$defaultHours-$hours;
	$data=findBestPack($data, $remainingHours);
	
	//###if there are still hrs remaining, calculate optimal selection algorithm and schedule classes from general stacks, keep coreqs in mind###
	//In other words, schedule'em bitches!
	foreach ($data as $key => $row) {
		//check if it's referring to a stack or queue
		if(strpos($row['index'],'Stack') !== false){
			$s_hours=substr($row['index'], -2, 1); 
			$s_sem=substr($row['index'], -1, 1); 
			for($i=0;$i<$row['scheduled'];$i++){
				//pop class out of stack
				global ${$row['index']};
				$class=$schedule[$num][$cnt]=${$row['index']}->pop();
				$stacks[$s_hours][$s_sem]['count']--;
				$cnt++;
				if($filtered[$class][7]>0 && isset($filtered[$filtered[$class][7]][0])){
					$schedule[$num][$cnt]=$filtered[$class][7];
					$cnt++;		
				}
			}
		}else{
			$class=$schedule[$num][$cnt]=$row['index'];
			$cnt++;	
			if($filtered[$class][7]>0 && isset($filtered[$filtered[$class][7]][0])){
				$schedule[$num][$cnt]=$filtered[$class][7];
				$cnt++;		
			}
		}
	}
		return $cnt;
	
}

//Try knapsack method
/*function semester($num, $period){
	$next_num=$num+1;
	global $defaultHours;
	global $filtered;
	global $schedule;
	global $stacks;
	global ${"Queue".$num};
	global ${"Queue".$next_num};
	$data = array();
	$i=0;
	$cnt=0;
	$top=array();
	//Step 1: Create data array with priority, hours & number of classes
		//1-a)  Go thrue queue 1, pop classes in order, if period matches, add it to array otherwise send it to InsertinNextQueue function
		while(isset(${"Queue".$num}) && ${"Queue".$num}->valid()){ 
			$top=${"Queue".$num}->current();
			${"Queue".$num}->next();
			if($filtered[$top['data']][4]==$period || $filtered[$top['data']][4]==2){
				$data[$i]['index']=	$top['data'];
				$data[$i]['hours']=	$filtered[$top['data']][3];
				$data[$i]['priority']=$top['priority']+2;
				$data[$i]['count']=1;
				$i++;
			}else{	
				InsertinNextQ($next_num, $top['data'],$top['priority']);
			}
		}
		//1-b) Go thru stacks and add their data to array
		foreach ($stacks as $key => $row) {
			for($k=0;$k<=2;$k++){
					if(isset($row[$k]) && ($k==$period || $k==2)){ //ONLY ADD STACKS WHOSE PERIOD MATCHES
					$data[$i]['index']=	"Stack".$row[$k]['hours'].$k;
					$data[$i]['hours']=	$row[$k]['hours'];
					$data[$i]['priority']= $row[$k]['hours'];
					$data[$i]['count']=$row[$k]['count'];
					$i++;
				}
			}
		}
	//Step 2
	$data=findBestPack($data);
	//Step 3
		//3-a) schedule classes from queue & stacks
		foreach ($data as $key => $row) {
			if($row['scheduled']==0){
				//Put any unused classes from queue in the next queue
				//Make sure it's refering to classes from queues only
					if(strpos($row['index'],'Stack') !== false){
						//Don't do anything
					}else{
						InsertinNextQ($next_num, $row['index'],$row['priority']-2);
					}
			}else{
				//check if it's referring to a stack or queue
				if(strpos($row['index'],'Stack') !== false){
					$s_hours=substr($row['index'], -2, 1); 
					$s_sem=substr($row['index'], -1, 1); 
					for($i=0;$i<$row['scheduled'];$i++){
						//pop class out of stack
						global ${$row['index']};
						$class=$schedule[$num][$cnt]=${$row['index']}->pop();
						$stacks[$s_hours][$s_sem]['count']--;
						$cnt++;
						if($filtered[$class][7]>0 && isset($filtered[$filtered[$class][7]][0])){
							$schedule[$num][$cnt]=$filtered[$class][7];
							$cnt++;		
						}
					}
				}else{
					$class=$schedule[$num][$cnt]=$row['index'];
					$cnt++;	
					if($filtered[$class][7]>0 && isset($filtered[$filtered[$class][7]][0])){
						$schedule[$num][$cnt]=$filtered[$class][7];
						$cnt++;		
					}
				}
			}
		}
		return $cnt;
	
}*/
//Knapsack algorithm
function findBestPack($data,$remainingHours){
	$max = array(); //max pack value found so far
		$max[0][0]=0;
	$best = array(); //best combination found so far
		$best[0][0]=0;
	$opts = array();
		$opts[0]=0; //item index for 0 of item 0
	$p = array();
		$p[0]=1; //item encoding for 0 of item 0
	$choose = 0;
	for($j=0; $j<count($data);$j++){
		$opts[$j+1]=$opts[$j]+$data[$j]['count']; //item index for 0 of item j+1
		$p[$j+1] = $p[$j]*(1+$data[$j]['count']);	//item encoding for 0 of item j+1
	}
	for($j=0; $j<$opts[count($data)]; $j++){
		$max[0][$j+1] = $best[0][$j+1]=0; //best values and combos for empty pack: nothing	
	}
	for($w=1; $w<=$remainingHours; $w++){
		$max[$w][0]=0;
		$best[$w][0]=0;
		for ($j=0;$j<count($data);$j++){
			$n=$data[$j]['count']; //how many of these can we have?
			$base=$opts[$j]; //what is the item index for 0 of these
			for ($l=1; $l<=$n; $l++){
				$weight=$l*$data[$j]['hours']; //how many hours do these classes take up?
				$s= $w>=$weight ?1:0; //can we carry this many?
				$v= $s*$l*$data[$j]['priority']; //what are they worth?
				$itemnum = $base+$l; //what is the item number for this many?
				$wn = $w-$s*$weight; //how many hours left?
				$c = $l*$p[$j]+$best[$wn][$base]; //encoded combination
				$max[$w][$itemnum]=max($max[$w][$itemnum-1],$v+$max[$wn][$base]); //best value
				$choose = $best[$w][$itemnum]=$max[$w][$itemnum]>$max[$w][$itemnum-1]?$c : $best[$w][$itemnum-1];	
			}
		}
	}
	$bestest=array();
	//$wgt=0;
	//echo '<table><tr><td>Schedules</td><td>Index</td><td>Hours</td><td>Priority</td></tr>';
	for($j=count($data)-1; $j>=0; $j--){
		$bestest[$j]=floor($choose/$p[$j]); 
		$choose-=$bestest[$j]*$p[$j];	
	}
	for ($h= 0; $h<count($bestest); $h++) {
		$data[$h]['scheduled']=$bestest[$h];
		//test
		/*if (0==$bestest[$h]) continue;
		echo '<tr><td>'.$data[$h]['scheduled'].'</td><td>'.$filtered[$data[$h]['index']][2].'</td><td>'.$data[$h]['hours'].'</td><td>'.$data[$h]['priority'].'</td></tr>';
		$wgt+= $bestest[$h]*$data[$h]['hours'];*/
	}
	return $data;
	//echo '</table><br/>Total hours: '.$wgt;
	
}
function InsertinNextQ($q, $data, $priority){
	global ${"Queue".$q};
	if(!isset(${"Queue".$q})){
		${"Queue".$q} = new PQ();
	}
	${"Queue".$q}-> insert($data,$priority); 
}

//if there are still classes in the general queues, go through them

//Testing Schedule
foreach ($schedule as $key => $row) {
	echo "Semester # ".$key."<br>";
	$total=0;
	for($i=0;$i<$row['num'];$i++){
			echo $filtered[$row[$i]][2]." - ".$classes[$row[$i]-1][3]." - ".$filtered[$row[$i]]['priority']."<br>";
			$total+=$classes[$row[$i]-1][3];
	}
	echo "Total Hours: ".$total."<br><br>";
}
//send it over to JS




?>
