<html>
	<?php
		if(isset($_SESSION['username'])){
	?>
	<form method="post" action="pp_comment_controller.php">
	<br><font size=4><b>Post a Comment</b></font></label><br>
	<textarea name="content" cols="40" rows="5">
	Enter your comment here!
	</textarea><br>
	<input type="submit" value="submit" name="submit" />
	</form>
	<?php
		}
		else{
			echo("You should log in if you want to comment!<br>");
		}
	?>
	<br>
</html>