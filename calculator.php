<?php
class Calculator 
{
    protected $num1;
    protected $num2;
    
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
    
    public function subtract()
    {
        return $this->num1-$this->num2;
    }
    
    public function divide()
    {
        return $this->num1/$this->num2;
    }
}

class Advance_calc extends Calculator
{
    private static $_allowed_functions = array('pow'=>2, 'sqrt'=>1, 'exp'=>1);
    public function __construct($arg1,$arg2=null)
    {
        parent::__construct($arg1,$arg2);
    }
    
    public function __call($method, $func_param)
    {
        if(!empty($func_param))
                die("Pass the arguments when the object is created");
        if(in_array($method, array_keys(Advance_calc::$_allowed_functions), TRUE))
        { 
            $func_param = array($this->num1);
            if(Advance_calc::$_allowed_functions[$method]===2)
                array_push ($func_param, $this->num2);
            return call_user_func_array($method, $func_param);
        }
    }   
}
$my_calc = new Advance_calc(3,4);
echo $my_calc->pow();