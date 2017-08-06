<?php
$authors = array( "Steinbeck", "Kafka", "Tolkien", "Dickens", "Milton","Orwell" );
$books = array(
            array("title" => "The Hobbit","authorId" => 2,"pubYear" => 1937),
            array("title" => "The Grapes of Wrath","authorId" => 0,"pubYear" => 1939),
            array("title" => "A Tale of Two Cities","authorId" => 3,"pubYear" => 1859),
            array("title" => "Paradise Lost","authorId" => 4,"pubYear" => 1667),
            array("title" => "Animal Farm","authorId" => 5,"pubYear" => 1945),
            array("title" => "The Trial","authorId" => 1,"pubYear" => 1925),
            );
foreach($books as $key => &$value)
{    
    $value['author_name']=$authors[$value['authorId']];
}
echo "<pre>";
print_r($books);
?>
