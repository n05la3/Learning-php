<!--factorial using recursion-->
<?php
function factorial($n)
{
    if(!isset($n))
    {
        echo "You want to calculate the factorial of which number?";
        exit(0);
    }
    if($n===1)
        return 1;
    return $n*factorial($n-1);
}
echo factorial(5);
?>
