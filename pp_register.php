<html>

<body>
	<?php
	include('pp_header.html');
	include('pp_db.php'); //Database connect file. To-Do
	
	//Sends registration info to: pp_register_controller.php
	?>
	
	<?php
		mysqli_close($db);
	?>

</body>

</html>