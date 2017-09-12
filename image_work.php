<?php 
	
	$image = imagecreatefromjpeg("test.jpg");
	if(file_exists("test.jpg")){
		header( "Content-type: image/jpeg" );
		imagejpeg($image);
		imagedestroy($image);
	}
	else 
		die("file not found");
	?>
