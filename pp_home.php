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
	<br><br>
	<?php
		include('pp_post.php');
	?>
	
	<?php
	//<p>---------------------------------------------</p>
		include('pp_search.php');
	?>

</body>
	<?php
	if (isset($namequery)){
		echo "<br><br><b><font size=2>Database Queries for this search:</b><br> $keyword_q_save -- Used to get a matching keyword id if your search term matches an existing keyword.
		<br> $namequery --The actual query to get your threads.";
		//From pp_search.php for Sprint 2
		}
		include('pp_bottom.html');
		mysqli_close($db);
	?>
</html>
