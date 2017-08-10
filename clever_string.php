<?php
//clever_string.php: using __get() to create intelligent string api

class CleverString
{
    private $_string="";
    private static $_allowed_functions = array("strlen", "strtoupper", "strpos"); 
    
    public function set_string($string_val)
    {
        $this->_string = $string_val;
        //echo "i'm here"; exit();
    }
    
    public function get_string()
    {
        return $this->_string;
    }
    
    public function __call($method, $args)
    {
        if(in_array($method, CleverString::$_allowed_functions, TRUE))
        {
            array_unshift($args, $this->_string);
            return call_user_func_array($method, $args);
        }
        else
            die("The method $method doesn't exist");
    }
}

$my_string = new CleverString;
$my_string->set_string("Here is a test");
echo "The string is: ". $my_string->get_string(). "<br>";
echo "The string in upper case is: ". $my_string->strtoupper(). "<br>";
echo "The char 'i' first appears at position: ". $my_string->strpos("i"). "<br>";
echo "And the length of test string is: ". $my_string->strlen();

?>