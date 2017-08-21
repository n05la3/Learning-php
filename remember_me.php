<!--remember_me.php: uses cookie to remember user login information-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>User info</title>
	<link rel="stylesheet" href="">
</head>
<body>
    <?php
       if(isset($_POST['submit']))
        {
            if(!isset($_COOKIE['user_name']) && !isset($_COOKIE['user_pass']))
            {
                if(isset($_POST['rem_forget']) && $_POST['rem_forget']==='remember' && !empty($_POST['user_name']) && !empty($_POST['user_pass']))
                    {
                        setcookie("user_name", $_POST['user_name'], time() + 60 * 60*24*365, "/","", false, true);
                        setcookie("user_pass", $_POST['user_pass'], time() + 60 * 60 * 24, "/", "", false, true);
                    }
            }
            else
            {
                setcookie("user_name", get_user_name(), time() + (-60 * 60*24*365), "/","", false, true);
                setcookie ("user_pass", get_user_pass(), time()+ (-60*60*24), "/", "", false, true);
            }
             
        }
        //else die("Fill all fields before submitting");
        function get_user_name()
        {
            if(isset($_COOKIE['user_name']))
                return $_COOKIE['user_name'];
        }
        function get_user_pass()
        {
            if(isset($_COOKIE['user_pass']))
                return $_COOKIE['user_pass'];
        }
        function rem_or_forget()
        {
            if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_pass']))
                echo "Foget me";
            else
                echo "Remeber me";
        }
    ?>
    <form action="remember_me.php" method="POST" enctype="multipart/form-data">
        <label for="user_name">Login</label><br>
        <input type="text" value="<?php echo get_user_name()?>" placeholder="User Name" id="user_name" name="user_name"><br>
        <label for="user_pass">Password</label><br>
        <input type="password" id="user_pass" name="user_pass" value="<?php echo get_user_pass() ?>"><br>
        <label for="check"><?php rem_or_forget();?></label>
        <input type="checkbox" value="remember" id="check" name="rem_forget" ><br>
        <input type="submit" value="Login" id="user_name" name="submit">
    </form>
	
</body>
</html>
