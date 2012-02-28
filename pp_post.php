
	<?php
	include('pp_db.php');
	include('pp_header.html');
	?>

<html>

	<?php
	
		/*
			Sketched Plan:
				Choose Board from drop down menu,
				Enter thread name
				Enter picture link
				Enter Content
				
				Submit
				
				See ponybase.sql for the threads table
			
		*/
	
	
	
	?>

	<form method="post" action="pp_post_controller.php">
	<label for="username">Post a New Thread</label><br>
	Choose a board, enter a thread title, and enter some content!<br>
	Picture Link: <input type="text" id="link" name="link" /><br>
	<select name="board">
		<option value="art">Art</option>
	</select>
    <input type="text" id="title" name="title" /><br>
	<textarea name="content" cols="40" rows="5">
	Enter your post here!
	</textarea><br>
	<input type="submit" value="Post!" name="submit" />
	</form>
	
</html>