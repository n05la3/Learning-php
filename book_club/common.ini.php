<?php
function displayPageHeader()
{ ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta charset="utf-8">
		<title><?= $page_title ?></title>
		<link rel="stylesheet" type="text/css" href="../common.css">
		<style type="text/css" media="screen">
			th { text-align: left; background-color: #bbb; }
			th, td { padding: 0.4em; }
			tr.alt td { background: #ddd; }
		</style>
	</head>
	<body>
		<h1><?php echo $page_title; ?></h1>
	</body>
<?php 
}
function displayPageFooter()
{	
?>
	</body>
	</html>
<?php
}
?>