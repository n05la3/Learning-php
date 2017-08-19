<!--random_number_generator.php: generates random numbers between 1 and 100. This script just aims at showing how to use hidden form field
in order to make it much more useful, test all security issues.-->
<html>
    <head>
        <title>Random</title>
        <style>
            ul#chances{
                padding: 0;
               // background-color: blue;
            }
            ul#chances li {
                display: inline;
                margin: 10px;
                background-color: black;
                color: white;
                padding: 10px 20px;
                border-radius: 4px 4px 0 0;
               // border: 1px solid black;
            }
        </style>
    </head>
    <?php
    
    if(isset($_POST['submit_rand']))
    {
        display_chances();        
        validate_number();
        display_form();
    }
    else
        display_form();
    function validate_number()
    {
        $rand_num= rand(1, 100); 
        echo $rand_num;
        if(set_hidden_value()>4)
            die("<h2>You have exhausted your number of chances, thanks for trying</h2>");        
        if(!empty($_POST['rand_num']))
            if($_POST['rand_num']<1 || $_POST['rand_num']>100)
            {
                echo "You entered: ".$_POST['rand_num']."<br>";
                die ("<h2>You can only enter numbers between 1 and 100, thanks for trying</h2>");
            }
            if($rand_num===$_POST['rand_num'])
                die ("<h2>Waoh, u guessed right. EXCELLENT WORK!!!</h2>");               
        return true;
                
    }
    
       
    function display_chances()
    { ?>
        <ul id="chances">
            <li> <?php echo set_hidden_value() ?> </li>
            <li>5</li>
        </ul>
    <?php
    
    } 
    
    function set_hidden_value($no_rand_num="value")
    {
        if(empty($_POST['rand_num']) && !empty($_POST['hidden']) && $_POST['hidden']>0)
            return $_POST['hidden'];
        if(!isset($_POST['hidden']))
            return 0;            
        else
            return $_POST['hidden']+1;
            
    }
    
    function display_form()
    { ?> 
        <form action="random_number_generator.php" method="POST">
            <input type="hidden" value =" <?php echo set_hidden_value() ?> " name="hidden" id="value_manipulator" />
            <label for="rand">Enter a random number between 1 and 100</label><br/>
            <input type="number" name="rand_num" id="rand" placeholder="Enter the number here"/><br>
            <label for="submit">Click Submit to send guess</label><br/>
            <input type="submit" id="submit" name="submit_rand" value="Submit"/>
        </form>
    <?php
    } ?>
    
</html>
