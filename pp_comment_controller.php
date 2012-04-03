<?php if(!isset($_SESSION)){session_start();} ?>	
<?php
	include('pp_db.php');
		$content = $_POST['content'];
		$username = $_SESSION['username'];
		$thread = $_SESSION['thread'];	
		//$query = "INSERT INTO comments (id,username,thread,comment) VALUES (NULL,'$username', '$thread', '$content');";
		$query = "INSERT INTO comments (id,username,comment) VALUES (NULL,'$username', '$content');";
		mysqli_query($db, $query) or die("Error Querying Database: $query");
		
		$query = "SELECT * FROM comments order by id desc limit 1";
		$commentID = 0;
		$result = mysqli_query($db, $query);
		if(count(mysqli_fetch_array($result))!=0){
			$result = mysqli_query($db, $query);//temp solution, regarding some weird $result array behavior. Will look into it later
			while($row = mysqli_fetch_array($result)) {
				$commentID = $row['id'];
			}
		}
		
		$query = "INSERT INTO commentXthread (thread_id, comment_id) VALUES ($thread, $commentID);";
		mysqli_query($db, $query) or die("Error Querying Database: $query");
		echo "<tr><td><a href=\"pp_viewthread.php?thread=$thread\">Comment Success!</a></td></tr>\n";
?>