<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>connecting to mysql</title>
	<link rel="stylesheet" href="">
</head>
<body>
<h1>Reading data from mysql database</h1>
	<?php 

	$user_name = "root";
	$pass_word = "Ddon_1020?";
	$dsn = $dsn = "mysql:dbname=mydatabase";

	try{
		$conn = new PDO($dsn,$user_name,$pass_word);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}

	$sql = "SELECT * FROM fruit";
	echo "<ul>";
	try{
		$rows = $conn->query($sql);
		print_r($rows);
		foreach ($rows as $row) {
			print_r($row);
			echo "<li>A ".$row['name']. " is ". $row['color']."</li>";
		}
	}catch(PDOException $e){
		echo "Query failed: ". $e->getMessage();
	}

	echo "</ul>";
	$conn = NULL;

	?>
</body>
</html>