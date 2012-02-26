<html>

<body>

	<?php
	include("pp_header.html"); 
	//This will be the visual login page

	//Take login information from a form and pass
	//it to pp_login_controller.php
	
	//SHOULD SEND OUT FOR LOGIN_CONTROLLER: $_POST['username'], $_POST['password']
	/*CHECK THE FOLLOWING VARIABLES: 
		$_POST['loginfail']
		If this is not null, then you are returning from a failed login from pp_login_controller.php
		The Php code to check the variable:
			if ( isset( $_POST['loginfail'] ) )
				{
				echo "Login fail";
				}
	*/
	include('pp_db.php'); //Database connect file; not ready yet.

	?>
	
	<?php
		mysqli_close($db);
	?>

</body>

</html>
