<?php if(!isset($_SESSION)){session_start();}  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Search</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="contents">
  <?php
  include('pp_db.php');
  
  if (isset($_SESSION['users'])){
  echo "<p> Hi, ". $_SESSION['users'] . "</p>";
  }
  ?>
  <?php
  	$searchterm = mysqli_real_escape_string($db, $_GET['thread']);
	$_SESSION['thread'] = $searchterm;
	$threadname = "";
	$content = "";
	$piclink = "";
	$query = "SELECT * FROM threads WHERE id = '$searchterm'";
		//echo "$query";
  		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
   		
		if(count(mysqli_fetch_array($result))!=0){
			$result = mysqli_query($db, $query);//temp solution, regarding some weird $result array behavior. Will look into it later
			echo "<table border=1 id=\"hor-minimalist-b\">\n<tr><th>Thread Name</th><th>Thread Post</th><th>Picture!</th><tr>\n\n";
			while($row = mysqli_fetch_array($result)) {
				$threadname = $row['name'];
				$content = $row['content'];
				$piclink = $row['piclink'];
				echo "<tr><td>$threadname</td><td>$content</td><td><img src=\"$piclink\" /></td></tr>\n";
			}
		}
		else
		{
			echo "We couldn't find anything for $searchterm under the $board board! Sorry!<br>";
		}
	    echo "</table>\n"; 
		
		include('pp_comment.php');
		$thread=mysqli_real_escape_string($db, $_GET['thread']);
			$query="SELECT username,comment FROM comments WHERE thread = '".$thread."'"; 
			$result=mysqli_query($db, $query) or die("Error Querying Database");
			//Print the results
			if(count(mysqli_fetch_array($result))!=0){
				$result=mysqli_query($db, $query);
				echo "<p><table align=left frame = border rules=all border=1 cellpadding=15>\n<tr><th>User</th><th>Comment</th><tr>\n";
				while($row=mysqli_fetch_array($result)){ 
					$username = $row['username'];
					$comment = $row['comment'];
					echo "<tr><td>$username</td><td>$comment</td></tr>\n";
				}
			echo "</table></p>\n";
			}else{ //to display a message if there isn't any
				echo "<br>Be the first to comment on this thread!<br>";
			}
	?>
  