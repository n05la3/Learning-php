<?php
class Calculator 
{
    private $num1;
    private $num2;
    
    public function __construct($n,$m)
    {
        $this->num1=$n;
        $this->num2=$m;
    }
    
    public function add()
    {
        return $this->num1+$this->num2;
    }
    
    public function multiply()
    {
        return $this->num1*$this->num2;
    }        
}

$calc = new Calculator(3,4);
echo "3 and 4 sum up to: ". $calc->add(). "<br>";
echo "multiplying 3 and 4 gives: ". $calc->multiply(). "<br>";