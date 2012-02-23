<html>

	<?php

	//Receive login information from pp_login.php
	//via $_POST

	//Check login against database;
	//	On successful, set session variables and
	//	return to homepage.

	//	On failed, return to login page with
	//	error.
	
	include('pp_db.php'); //Database connect.

	?>
	
	<?php
		mysqli_close($db);
	?>


</html>
