<?php 
include "book.class.php";
//use Bookstore\Domain\Book;
echo "<pre>";
try{
	if(-1<0)
		throw new \Exception('Class book not found');
}catch(Exception $e){
	//echo $e->getMessage;
}finally{
	echo "unable to continue";
}
	
