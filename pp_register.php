<?php if(!isset($_SESSION)){session_start();}  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
		<title>Register</title>
		<script type="text/javascript">
		function validate(){
			bad="#FFCCCC";
			good="#CCFFCC";
			//username
			if(((document.getElementById("username").value).replace(/^\s*((?:[\S\s]*\S)?)\s*$/, '$1').length < 3)<?php if($usernameExists){?>
				|| (document.getElementById("username").value == "<?php echo $_POST['username'] ?>" )<?php } ?>)
				{document.getElementById("username").style.background=bad;
				usernameOk=false;}
			else{
				document.getElementById("username").style.background=good;
				usernameOk=true;
			}
			if(document.getElementById("password").value.length < 4){
				document.getElementById("password").style.background=bad;
				passwordOk=false;
			}
			else{
				document.getElementById("password").style.background=good;
				passwordOk=true;
			}
			if((document.getElementById("confirmPassword").value.length < 4) || (document.getElementById("password").value != document.getElementById("confirmPassword").value)){
				document.getElementById("confirmPassword").style.background=bad;
				confirmPasswordOk=false;
			}
			else{
				document.getElementById("confirmPassword").style.background=good;
				confirmPasswordOk=true;
			}
			//button control
			if (usernameOk && passwordOk && confirmPasswordOk) {document.register.submit.disabled=false;}
			else {document.register.submit.disabled=true; }
		}
		</script>
	</head>
	<body onload="validate()">
		<div id = "wrap">
		<?php include("pp_header.html"); ?>
			<?php if(isset($errorMessage)){echo '<br><font color="red"><b>Error - the following entries need to be fixed:</b><ul>',$errorMessage,'</ul></font><br>',"\n";}?>
			<form name="register" method ="post" action="pp_register_controller.php" onsubmit="document.register.submit.disabled=true;document.register.submit.value='Processing...'">
			<table align=center>
				<tr>
					<td>Desired Username:</td>
					<td><input type="text" id="username" name="username" maxlength="20" onkeyup=validate() /><font size=-5> (minimum 3 letters)</font></td>
				</tr>
				<tr>
					<td>Desired Password:</td>
					<td><input type="password" id="password" name="password" maxLength="20" onkeyup=validate() /><font size=-5> (minimum 4 characters)</font></td>
				</tr>
				<tr>
					<td>Retype Password:</td>
					<td><input type="password" id="confirmPassword" name="confirmPassword" maxLength="20" onkeyup=validate() /></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Register Account"></td>
				</tr>
			</table>
			</form>
		</div>
	</body>
</html>