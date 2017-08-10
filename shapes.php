<?php
class Shapes
{
    private $_color = "black";
    private $_filled = "false";
    
    public function get_color()
    {
        return $this->_color;
    }
    
    public function set_color($color)
    {
        $this->_color=$color;
    }
    
    public function get_filled()
    {
        return $this->_filled;
    }
    
    public function set_filled($fill)
    {
        $this->_filled=$fill;
    }
        
}

class Circle extends Shapes
{
    private $_radius;
    
    public function get_radius()
    {
        return $this->_radius;
    }
    
    public function set_radius($rad)
    {
        $this->_radius=$rad;
    }
    
    public function calc_area()
    {
        return M_PI * pow($this->_radius,2);
    }
}

class Square extends Shapes
{
    private $_side;
    
    public function get_side()
    {
        return $this->side;
    }
    
    public function set_side($side)
    {
        $this->_side=$side;
    }
    
    public function calc_area()
    {
        return pow($this->_side, 4);
    }
}

echo "<h1>Inheritance</h1><br>";
$my_circl = new Circle;
$my_circl->set_color("green");
$my_circl->set_filled("hollow");
$my_circl->set_radius(4);
echo "I have a ". $my_circl->get_color()." ". $my_circl->get_filled(). " circle with an area: ". $my_circl->calc_area(). "m<sup>2</sup><br>";

$my_square = new Square;
$my_square->set_color("yellow");
$my_circl->set_filled("filled");
$my_square->set_side(5);
echo "I have a ". $my_square->get_color()." ". $my_square->get_filled(). " circle with an area: ". $my_square->calc_area(). "m<sup>2</sup><br>";

?>
