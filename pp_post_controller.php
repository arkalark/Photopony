
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
		$keyword = $_POST['keyword'];
		//echo("Checking: $_POST[content]");
		
		$keyword_q = mysqli_query($db, "SELECT * FROM keywords WHERE keyword = '$keyword'");
		if(count(mysqli_fetch_array($keyword_q))==0){
			$query = "INSERT INTO keywords (id, keyword) VALUES (NULL, '$keyword');";
			mysqli_query($db, $query) or die("Error Querying Database");
		}
			
		$query = "INSERT INTO threads (id, name, piclink, content, board) VALUES (NULL, '$title', '$link', '$content', '$board');";
		mysqli_query($db, $query) or die("Error Querying Database");
		
		$kw = mysqli_query($db, "SELECT id FROM keywords WHERE keyword = '$keyword'");
		while($row=mysqli_fetch_array($kw)){
			$kw_id = $row['id'];
		}
		$thread = mysqli_query($db, "SELECT id FROM threads WHERE name = '$title'");
		while($row=mysqli_fetch_array($thread)){
			$thread_id = $row['id'];
		}
		$query = "INSERT INTO keywordXthread (thread_id, kw_id) VALUES ('$thread_id', '$kw_id');";
			mysqli_query($db, $query) or die("Error Querying Database");
	include('pp_home.php');
	
	?>