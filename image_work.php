<?php 
	
if(file_exists("noslac.jpg") && file_exists("copyright.png")){
	/*$myImage = imagecreatefromjpeg( "noslac.jpg" );
	$myCopyright = imagecreatefrompng( "copyright.png" );
	$destWidth = imagesx( $myImage );
	$destHeight = imagesy( $myImage );
	$srcWidth = imagesx( $myCopyright );
	$srcHeight = imagesy( $myCopyright );
	$destX = ($destWidth - $srcWidth) / 2;
	$destY = ($destHeight - $srcHeight) / 2;
	imagecopy( $myImage, $myCopyright, $destX, $destY, 0, 0, $srcWidth,
	$srcHeight );
	header( "Content-type: image/jpeg" );
	imagejpeg( $myImage );
	imagedestroy( $myImage );
	imagedestroy( $myCopyright );*/	

	
	$image = imagecreatefromjpeg("noslac.jpg");
	$copyright = imagecreatefrompng("copyright.png");
	$src_width = imagesx($copyright);
	$src_height = imagesy($copyright);
	$dest_width = imagesx($image);
	$dest_height = imagesy($image);
	$destX = ($dest_width - $src_width)/2;
	$destY = ($dest_height - $src_height)/2;
	$white = imagecolorexact($copyright, 255,255,255);
	imagecolortransparent($copyright, $white);
	imagecopy($image, $copyright, $destX, $destY, 0, 0, $src_width, $src_height);
	header( "Content-type: image/jpeg" );
	imagejpeg($image);
	imagedestroy($image);
	imagedestroy($copyright);
}
else 
	die("file not found");

?>
