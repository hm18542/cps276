<?php

class Calculator
{
    //variables
    private $num1;
    private $num2;
    private $operator;
    private $num3;
    private $error;
    private $result;

    //method
    public function calc()
    {
        if(func_num_args()==3){
            
        $this->operator = func_get_arg(0);
        $this->num1 = func_get_arg(1);
        $this->num2 = func_get_arg(2);

        if (is_string($this->operator) == 1 && is_int($this->num1) == 1 && is_int($this->num2) == 1) {
            //switch for operator input
            switch ($this->operator) {

                    //case for addition
                case "+":
                    $num3 = $this->num1 + $this->num2;
                    $result = "The sum of the numbers is ";
                    echo $result .= $num3 . '<br>';
                    break;

                    //case for division
                case "/":
                    //checks if denominator is 0
                    if ($this->num2 == 0) {
                        $error = "Cannot divide by zero.";
                        echo $error . '<br>';
                    } else {
                        $num3 = $this->num1 / $this->num2;
                        $result = "The division of the numbers is ";
                        echo $result .= $num3 . '<br>';
                    }
                    break;

                    //case for multiplication
                case "*":
                    $num3 = $this->num1 * $this->num2;
                    $result = "The product of the numbers is ";
                    echo $result .= $num3 . '<br>';
                    break;

                    //case for subtraction
                case "-":
                    $num3 = $this->num1 - $this->num2;
                    $result = "The difference of the numbers is ";
                    echo $result .= $num3 . '<br>';
                    break;
            }
        }
        } else return "Cannot perform operation. You must have three arguments. A string for the operator 
            (+,-,*,/) and two integers or floats for the numbers" . "</br>";
    }
}