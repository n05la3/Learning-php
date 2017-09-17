<?php 
//namespace Bookstore\Domain;
class Book
{
	private static $id;
	protected $title;
	protected $author;
	protected $year_of_prod;

	public function __construct(string $title, string $author, string $year_of_prod)
	{
		$this->set_value($title,$author,$year_of_prod);
	}

	public function set_value(string $title, string $author, string $year_of_prod)
	{
		$properties = [&$this->title, &$this->author, &$this->year_of_prod];
		$data = [$title, $author, $year_of_prod];
		if(isset($title) && isset($author) && isset($year_of_prod)){
			for($i=0; $i <= 2;  $i++){
				$properties[$i] = $data[$i];
			}
		}

	}

	public function get_value(string $to_read)
	{
		$data = ["title", "author", "year_of_prod" ];
		$properties = [$this->title, $this->author, $this->year_of_prod];
		if(in_array($to_read, $data)){
			/*switch ($to_read) {
				case $properties[0]:
					return $this->id;
					break;
				case "title":
					return $this->title;
					break;
				case "author":
					return $this->author;
					break;
				case "year_of_prod":
					return $this->year_of_prod;
				default:
					return "Property not exist";
					break;
			}*/
			for($i=0; $i<=array_count_values($data); $i++)
			{
				if(($found=array_search($to_read, $data))){
					return $properties[$found];
					break;
				}
			}
		}
	}
	
}
echo "<pre>";
$mybook = new Book("prince", "cch", "1994");
print_r($mybook); echo "<br>";
echo $mybook->get_value("year_of_prod");
