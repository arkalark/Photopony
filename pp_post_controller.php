
	<?php
	
	include('pp_db.php');
	
		/*

		$_POST['content']
		$_POST['title']
		$_POST['board']
		$_POST['link']
		
		*/
		$content = $_POST['content'];
		$title = $_POST['title'];
		$board = $_POST['board'];
		$link = $_POST['link'];
		
		//echo("Checking: $_POST[content]");
		
		$query = "INSERT INTO threads (id, name, piclink, content, board) VALUES (NULL, '$title', '$link', '$content', '$board');";
		echo("$query");
		
		mysqli_query($db, $query) or die("Error Querying Database");
		
	include('pp_home.php');
	
	?>