<?php if(!isset($_SESSION)){session_start();} ?>	
<?php
	include('pp_db.php');
		$content = $_POST['content'];
		$username = $_SESSION['username'];
		$thread = $_SESSION['thread'];	
		$query = "INSERT INTO comments (id,username,thread,comment) VALUES (NULL,'$username', '$thread', '$content');";
		mysqli_query($db, $query) or die("Error Querying Database");		
		echo "<tr><td><a href=\"pp_viewthread.php?thread=$thread\">Comment Success!</a></td></tr>\n";
?>