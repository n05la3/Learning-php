<!--fibonacci.php: Using recursion to perform a fibonaci series-->
<?php
$fib_store=array();
function fibonacci($n)
{
   if(!isset($n))
   {
       echo "You must provide nth term whose fibonacci you want to know";
       exit(0);
   }
   if($n===1||$n===0)//base case
       return 1;
   return fibonacci($n-1)+fibonacci($n-2);
      
}
echo fibonacci();

?>