<?php 
include "book.class.php";
use Bookstore\Domain\Book;
echo "<pre>";
$mybook = new Book("prince", "cch", "1994");
print_r($mybook); echo "<br>";
echo $mybook->get_value("year_of_prod");
