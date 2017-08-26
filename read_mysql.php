<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Working with mysql</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
	$dsn = "mysql:dbname=mydatabase";
	try{
		$conn = new PDO($dsn,"root","Ddon_1020?");
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Connection to database failed: ". $e->getMessage();
	}
	$rows = $conn->query("SELECT * FROM members WHERE age<25");
	?>
	<table border="1px solid black">
		<caption>information captured from database</caption>
		<thead>
			<tr>
				<th>id</th><th>first Name</th><th>Last Name</th><th>Age</th><th>Date Joined</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($rows as $member_detail) {
				echo "<tr><td>{$member_detail['id']}</td>" . "<td>{$member_detail['first_name']}</td>" . "<td>{$member_detail['last_name']}</td>"."<td>{$member_detail['age']}</td>"."<td>{$member_detail['date']}</td></tr>";
			} 
			?>	
		</tbody>
	</table>
	
	
</body>
</html>