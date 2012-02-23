<html>

	<?php
	include('pp_db.php');
	//Accept from information from register.php and process into database
	//If invalid data, return to pp_register.php
	//If info is good, go to pp_login.php with registration message
	?>

	<?php
		mysqli_close($db);
	?>
	
</html>