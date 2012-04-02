<html>
	<?php
		if(isset($_SESSION['username'])){
	?>
	<form method="post" action="pp_vote_controller.php">
		<input type="radio" name="vote" value="up"/> Up Vote<br />
		<input type="radio" name="vote" value="down" /> Down Vote<br />
		<input type="submit" value="Submit" />
	</form>
	<?php
		}
		else{
			echo("You should log in if you want to comment!<br>");
		}
	?>
	<br>
</html>