<?php
echo "Here is(are) the choice(s) you made: <br>";
//$_POST['my_choice]: is an array which contain the values sent from the multiple form.
foreach($_POST['my_choice'] as $form_name=>$form_value)
{
    echo $form_value."<br>";
}

echo "Here is(are) the choice(s) you made: <br>";
foreach($_POST as $key=>$value)//alternatively, looping through the $_POST superglobal the multi-values can be gotten.
{
    foreach ($value as $form_name => $form_value)
    {
        echo $form_value."<br>";
    }
}


?>
