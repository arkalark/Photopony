<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Photopony</title>
<link rel="stylesheet" href="styles.css" type="text/css" />

<body>
<!--<img src="manesix.jpg"/>-->
<h1><p>Photopony Homepage</p></h1>
	<?php
		include('pp_header.html');
		include('pp_db.php'); //Database connect; needs finishing
		if(!isset($_SESSION)){session_start();}
		if(isset($_SESSION['username'])){ $username = $_SESSION['username'];echo("Welcome back, $username!"); }
		
	?>
	
	<?php
		include('pp_search.php');
	?>
	
	<p>---------------------------------------------</p>
	
	<?php
		include('pp_post.php');
	?>
	
	<?php
		include('pp_bottom.html');
		mysqli_close($db);
	?>

</body>

</html>
