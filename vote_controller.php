<?php if(!isset($_SESSION)){session_start();}  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <?php
	//input was validated, adding them to the database
	$vote=$_POST['vote'];
	$query = "SELECT rating from threads WHERE threads name = '$_SESSION['thread']';";
	$currentVotes  = mysqli_query($db, $query) or die("Error Querying Database for rating");
	mysqli_close($db);
	include('pp_db.php');
	if($vote == "down"){
		$currentVotes = $currentVotes - 1;
		$query = "INSERT INTO  `photopony`.`threads` (`username` ,`password`) VALUES ('".$username."','".$pw."')";
		$result = mysqli_query($db, $query) or die("Error Querying Database");
		mysqli_close($db);
	}else{
		$currentVotes = $currentVotes + 1;
		$query = "INSERT INTO  `photopony`.`threads` (`username` ,`password`) VALUES ('".$username."','".$pw."')";
		$result = mysqli_query($db, $query) or die("Error Querying Database");
		mysqli_close($db);
	}
	include("pp_viewthread.php");
?>

	
