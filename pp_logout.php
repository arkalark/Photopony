	<?php
	
	if(!isset($_SESSION)){session_start();}
	
		unset( $_SESSION['username'] );
		
	include('pp_home.php');
	
	?>
	
	<!--<a href="pp_home.php">Logged out! Go to home?</a>