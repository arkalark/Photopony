
	<?php

<?php if(!isset($_SESSION)){session_start();}  ?>
<?php
	//Recieve Login Info
	$username = $_POST['username'];
	$pw = $_POST['password'];
	
	//Check login against database
	$query= "SELECT username FROM users WHERE password = pw";
	$result=mysqli_query($db, $query) or die ("Error Querying Database");
	
	//Receive login information from pp_login.php
	//via $_POST

	//Check login against database;
	//	On successful, set session variables and
	//	return to homepage.

	//	On failed, return to login page with
	//	error.
	
	//SHOULD USE THESE VARIABLES, SENT FROM pp_login.php: $_POST['username'], $_POST['password']
	/*Should construct the query, then consult the database;
		If there is a result, then set the SESSION VARAIBLES BELOW
			$_SESSION['username']
			
		If there is no results, then return to pp_login.php with $_POST['loginfail'] = "fail"
		
			header("http://localhost/photopony/pp_login.php?loginfail=fail");
			
			NOTE #1: this is a redirect and has to become before any code that is sent to the browser, ie <html>...
			NOTE #2: I haven't tested this, looked it up. If it doesn't work, poke around for your own way
				to get back to pp_login.php with loginfail=fail. Alternatively, just put in a link somewhere
				down below.
	*/
	
	session_start();
	include('pp_db.php'); //Database connect.

	?>
	
	<?php
		mysqli_close($db);
	?>



