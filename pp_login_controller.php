<?php if(!isset($_SESSION)){session_start();}  ?>
<?php
	//Connect to the Database
	include('pp_db.php');
		
	//Recieve Login Info
	$username = $_POST['username'];
	$pw = $_POST['password'];	
	//echo "$pw<br>";
	$pwHash = sha1($pw);
	/*echo "$pwHash<br>";
	$check = sha1('aaaa');
	echo "$check"; */
	//Check login against database
	$query= "SELECT * FROM users WHERE username = '$username' AND password = '$pwHash'";
	$result=mysqli_query($db, $query) or die ("Error Querying Database");
	echo "LOGIN QUERY: $query";
	if ($row = mysqli_fetch_array($result)){
		$row['username']=$username;	
		$_SESSION['username']=$username;
		include("pp_home.php");
	}else{	
		$errorMessage="Invalid username or password.";
		include("pp_login.php");
	}
?>




