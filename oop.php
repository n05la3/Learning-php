<?php
class Car
{
    public $color;
    public $manufacturer;
    public $model;
    private $_speed=0;
    
    public function accelerate()
    {
        if($this->_speed>=100)
                return false;
        $this->_speed += 10;
        return true;
    }
    
    public function brake()
    {
        if($this->_speed<=0)
            return false;
        $this->_speed -= 10;
        return true;
    }
    
    public function get_speed()
    {
        return $this->_speed;
    }
}

$my_hummer=new Car;
$my_hummer->manufacturer="Kia";
$my_hummer->color="Green";
$my_hummer->model="utra 1.5";
printf("<h2>OOP</h2><br>oops a beautiful sunday, driving my %s %s %s<br>",$my_hummer->color, $my_hummer->manufacturer, $my_hummer->model);
echo "Stepping on the gas<br>";
while($my_hummer->accelerate())
    echo "Current speed: ". $my_hummer->get_speed(). "<br>";
echo "<br>Gone too high, got to slow down...<br><br>";
while($my_hummer->brake())
    echo "Current speed: ". $my_hummer->get_speed(). "<br>"; 
?>
