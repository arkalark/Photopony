<html>

<body>
	<?php
	include('pp_header.html');
	include('pp_db.php'); //Database connect file. To-Do
	
	//Sends registration info to: pp_register_controller.php
	/*SHOULD SEND THE FOLLOWING VARIABLES;
		$_POST['username']
		$_POST['password']
		... Do we have anything else in registration? 
			If so, add more and work it into pp_register_controller.php as well
			
	  *Duplicate username checking done in pp_register_controller.php, don't worry about it here
	  
	  SHOULD LOOK FOR THE FOLLOWING VARIABLES;
		$_POST['registerfail']
		If this is not null, then you're being redirected back from a failed register attempt,
		from pp_register_controller.php. Leave a message or something.
		
		The Php code to check the variable:
			if ( isset( $_POST['registerfail'] ) )
				{
				echo "Register fail";
				}
	
		*/
	?>
	
	<?php
		mysqli_close($db);
	?>

</body>

</html>