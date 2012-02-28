	<?php
	
	if(!isset($_SESSION)){session_start();}
	
		unset( $_SESSION['username'] );
	
	?>
	
	<a href="pp_home.php">Logged out! Go to home?</a>