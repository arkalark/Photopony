<?php if(!isset($_SESSION)){session_start();}  ?>
<?php
	//Input validation
	//This MUST come before everything, including the header!
	$errorMessage="";
	if(strlen(trim($_POST['username'])) < 3)
		$errorMessage=$errorMessage.'<li>Username must be at least 3 letters long</li>'."\n"; 
	if(strlen($_POST['password']) < 4)
		$errorMessage=$errorMessage.'<li>Password must be at least 4 characters long</li>'."\n";
	if($_POST['password']!=$_POST['confirmPassword'])
		$errorMessage=$errorMessage.'<li>Confirmation password does not match</li>'."\n";
	//query sql for username
	$username=$_POST['username'];
	include('pp_db.php');
	$compareQuery="SELECT username FROM users ";
	$compareResult=mysqli_query($db, $compareQuery) or die("Error Querying Database");
	if(!isset($checkName)) {$checkName=NULL; }
	while($row=mysqli_fetch_array($compareResult) and $checkName!=$username){ $checkName=$row['username'];}
	//test if user exists
	if($checkName==$username){
		$usernameExists=true;
		$errorMessage=$errorMessage.'<li>That username already exists</li>'."\n";
	}
	if(strlen(trim($errorMessage)) > 0){
		include("pp_register.php");
		exit(0);
	}
	//End input validation
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <?php
	$username=$_POST['username'];
	$escapedusername=mysqli_real_escape_string($db,$username);
	$pw=$_POST['password']; 
	$escapedPw=mysqli_real_escape_string($db,$pw);
	//Actually put them in the database
	include('pp_db.php');
	//$query= "INSERT INTO users(username,password) VALUES ('".$escapedusername."','".$escapedPw."')";
	$query = "INSERT INTO  `photopony`.`users` (`username` ,`password`) VALUES ('".$username."','".$pw."')";
	$result = mysqli_query($db, $query) or die("Error Querying Database");
	mysqli_close($db);	
	//Rather than making them click stuff, just send them to the login page!
	$nonErrorMessage="Thank you for registering.";
	unset($errorMessage);
	include("pp_login.php");
?>
	<?php
	 function check_input($data, $problem=''){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		if ($problem && strlen($data) == 0){ show_error($problem);}
		return $data;
	}
	function show_error($myError){ ?>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
		<head>
			<title>Account Registration Confirmed</title>
		</head>
		<body>
			<b>Please correct the following error:</b><br />
			<?php echo $myError; ?>
			</br>
			</br>
			<a href="register.php"><font color="blue">Back to Registration Page</font></a>
		</body>
    </html>
	<?php exit();}?>
</html>
	<?php
	include('pp_db.php');
		mysqli_close($db);
	?>
	
