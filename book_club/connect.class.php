<!DOCTYPE html>
<html>
<head>
	<title>mysql connect</title>
</head>
<body>

</body>
</html>
<?php 
class Data_object
{
	protected $data = array();

	public function __construct($frm_db)
	{
		foreach ($frm_db as $key => $value) {
			if(array_key_exists($key,$this->data))
				$this->data[$key] = $value;
		}
		echo "<pre>";
		print_r($this->data);
	}

	function connect()
	{
		$conn = "";
		try{
			$conn = new PDO("mysql:host=localhost;dbname=mydatabase","root","Ddon_1020?");
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "There was an error connecting to db: ". $e->getMessage();
		}
		return $conn;
	}

	function disconnect($conn)
	{
		$conn = null;
	}
}

class Member extends Data_object
{
	protected $data = array(
		"id" => "",
		"username" => "",
		"firstName" => "",
		"lastName" => "",
		"joinData" => "",
		"gender" => "",
		"favoriteGenre" => "",
		"emailAddress" => "",
		"otherInterest" => "");
	function getMembers($order,$start,$numRows)
	{
		$conn = parent::connect();
		$st = $conn->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM members ORDER BY :order LIMIT :start, :numRows");
		try{			
			
			$st->bindValue(':start', $start, PDO::PARAM_INT);
			$st->bindValue(':numRows', $numRows, PDO::PARAM_INT);
			$st->bindValue(':order', $order, PDO::PARAM_STR);
			$st->execute();
			foreach($st->fetchAll() as $row)
			{	
				$test = new Member($row);
				
			}
		}catch(PDOException $e){
			echo "Unable to read values: {$e->getMessage()}";
			parent::disconnect($conn);
			die();
		}

	}

	function getMember($id)
	{
		$conn = parent::connect();

	}

	function create_member($usr_info)
	{
		$conn=parent::connect();
		try{
			$st = $conn->prepare("INSERT INTO members VALUES(:id, :username, password(:mypass), :firstName, :lastName, :joinDate, :gender, :favoriteGenre, :emailAddress, :otherInterest)");
			$st->bindParam(':id',$usr_info[0],PDO::PARAM_INT);
			$st->bindParam(':username',$usr_info[1],PDO::PARAM_STR);			
			$st->bindParam(':mypass',$usr_info[2],PDO::PARAM_STR);
			$st->bindParam(':firstName',$usr_info[3],PDO::PARAM_STR);
			$st->bindParam(':lastName',$usr_info[4],PDO::PARAM_STR);
			$st->bindParam(':joinDate',$usr_info[5],PDO::PARAM_STR);
			$st->bindParam(':gender',$usr_info[6],PDO::PARAM_STR);
			$st->bindParam(':favoriteGenre',$usr_info[7],PDO::PARAM_STR);
			$st->bindParam(':emailAddress',$usr_info[8],PDO::PARAM_STR);
			$st->bindParam('otherInterest',$usr_info[9],PDO::PARAM_STR);			
			if($st->execute()===FALSE)
				echo "Update was done successfully<br>";
			parent::disconnect($conn);
		}catch(PDOException $e){
			//die("Unable to update user information: {$e->getMessage()}");
			echo $e->getMessage();
		};
			

	}


}
$user_info = array(9,"Noslac","mypass","Dpro","Winter","2008-06-25","m","crime","prince@example.com", "Playing video games");
Member::create_member($user_info);


?>