<?php if(!isset($_SESSION)){session_start();}  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <?php
	//input was validated, adding them to the database
	include('pp_db.php');
	$vote=$_POST['vote'];
	$thread = $_SESSION['thread'];
	if($vote == "down"){
		$query = "UPDATE threads SET rating = rating - 1 WHERE id = '$thread';";
	}else{
		$query = "UPDATE threads SET rating = rating + 1 WHERE id = '$thread';";
	}
	$result = mysqli_query($db, $query) or die("Error Querying Database");
	mysqli_close($db);
	echo "<tr><td><a href=\"pp_viewthread.php?thread=$thread\">Your vote has been counted!</a></td></tr>\n";
?>

	
