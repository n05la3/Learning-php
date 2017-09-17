<?php
namespace Bookstore\Domain;

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