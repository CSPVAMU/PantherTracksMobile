<?php
class PQ extends SplPriorityQueue {
    protected $direction='desc';//queue is ordered highest to lowest priority, direction is changeable ONLY on __construct()

    function __construct($direction='desc'){
        //parent::__construct(); //Fatal error:  Cannot call constructor
        $this->direction=($direction=='asc') ? 'asc': 'desc';
    }

    function compare($priority1,$priority2){
        if($this->direction=='asc') return parent::compare($priority2, $priority1);
        return parent::compare($priority1,$priority2);
    }
}
?>