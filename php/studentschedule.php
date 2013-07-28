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
		//Recursively go through prerequisites	
		$QueueNum=PutinQ($row[0]);
		if($QueueNum>$highest)
			$highest=$QueueNum;
		if(!isset(${"Queue".$QueueNum})){
			${"Queue".$QueueNum} = new PQ();
		}
		${"Queue".$QueueNum}-> insert($row[2],$filtered[$row[0]]['priority']); 
	}else
		$QueueNum=0;
	//echo "".$filtered[$row[0]][2]." - Queue: ".$QueueNum."<br>";
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

//Put all priority 0 classes in a stack based on # of credit hours
$hours = array ();
foreach ($sorted as $key => $row) {
	if($filtered[$row[0]]['priority']==0)	{
		$NumofHrs=$filtered[$row[0]]['3'];
		if(!isset(${"Stack".$NumofHrs})){
			array_push($hours,$NumofHrs);
			${"Stack".$NumofHrs} = new SplStack();
		}
		${"Stack".$NumofHrs}->push($filtered[$row[0]][0]);
	}
}
//Testing stack
/*${"Stack".$hours[1]}->rewind();
echo "HOURS: ".$hours[1]." <br>";
while( ${"Stack".$hours[1]}->valid() )
{
    $classNum=${"Stack".$hours[1]}->current();
	echo $filtered[$classNum][2]."<br>";
    ${"Stack".$hours[1]}->next();
}*/

//get user's settings - # of credit hours -
$defaultHours=settings($studentid, "hours");
//while priority queues remain, call semester function
	//Figure out what the next semester is 
	$month = date("m");
	if($month>0 && $month<9)
		$period = 0;
	else
		$period = 1;
while($highest>1){

	//call semester function *STOPPED HERE*
$highest--;	
}
//if there are still classes in the general queues, go through them
//output schedule
//send it over to JS
function semester($num, $period){
	//while credit hours remin
	//1) Go thrue queue 1, pop classes in order, if period matchs, schedule it, otherwise inster it in $num+1 queue
	//Schedule co-reqs too
	//if there are still hrs remaining, calculate optimal selection algorithm and schedule classes from general queues, keep coreqs in mind
}

/*
echo json_encode($remaining);
echo "<p></p>";
echo json_encode($filtered);
echo json_encode($list);
echo "<p></p>";
echo json_encode($class_nums);
echo "<p></p>";
echo json_encode($remaining);
*/

?>
