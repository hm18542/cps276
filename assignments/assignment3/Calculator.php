<?php
class Calculator{
    public function calc(){
        //Method with 3 arguments (string, int, int)
        $operation = func_get_arg(0);
        $int1 = func_get_arg(1);
        $int2 = func_get_arg(2);

        if(!is_string($operatration) || !is_numeric($int1) || !is_numeric($int2)){
            return "Cannot perform operation. You must have three arguments. A string for the operator 
            (+,-,*,/) and two integers or floats for the numbers" . "</br>";
        }

        //Add
        if($operation=="+"){
            return "The answer is  ".($int1+$int2)."</br>";
        }
        //Subtract
        if($operation=="-"){
            return "The answer is  ".($int1-$int2)."</br>";
        }
        //Multiply
        if($operation=="*"){
            return "The answer is  ".($int1*$int2)."</br>";
        }
        //Divide: error if int2 = 0
        if($operation=="/"){
            if($int2 != 0)
            return "The answer is  ".($int1/$int2)."</br>";
            else return "You cannot divide by 0. <br>";
        }
    }
}
?>