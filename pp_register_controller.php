

	<?php
	include('pp_db.php');
	//Accept from information from register.php and process into database
	//If invalid data, return to pp_register.php
	//If info is good, go to pp_login.php with registration message
	
	/*
		SHOULD USE THE FOLLOWING VARIABLES:
			$_POST['username']
			$_POST['password']
			... anything else designated as necessary info in pp_register.php
			
		SHOULD CHECK TO SEE IF THERE IS A USER WITH THAT USERNAME ALREADY
		IF THERE IS, REDIRECT (or leave a link back to) pp_register.php
		
		header("http://localhost/photopony/pp_login.php?loginfail=fail");
			
			NOTE #1: this is a redirect and has to become before any code that is sent to the browser, ie <html>...
			NOTE #2: I haven't tested this, looked it up. If it doesn't work, poke around for your own way
				to get back to pp_register.php with registerfail=fail. Alternatively, just put in a link somewhere
				down below.
	
	*/
	?>

	<?php
		mysqli_close($db);
	?>
	
