<?php

class Table {
private $_num; 
private $_min;
private $_max;

public function __construct($num, $min=0, $max=10 ){
    $this->_num = $num ;
    $this->_min = $min ;
    $this->_max = $max ;
}




public function calcTable():array{
        $result = array();

        for ($i=$this->_min; $i <= $this ->_max ; $i++){
            $result[$i] =$i * $this->_num;
        }
        return $result;
}

>