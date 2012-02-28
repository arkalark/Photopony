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
  include('db_connect.php');
  
  if (isset($_SESSION['users'])){
  echo "<p> Hi, ". $_SESSION['users'] . "</p>";
  }
  ?>
  
  <h1>Search</h1>
  <p>For example, you can type 'art' or user?? </p>
  <form method="post" action="search.php">
    <!-- <label for="username">Search:</label>
	<input type="text" id="search" name="search" /> -->
	<input type="text" id="searchterm" name="searchterm" />
	<input type="text" id="board" name="board" />
    <input type="submit" value="go" name="submit" />
  </form>
  
  <?php
  include "pp_db.php";
  if (isset($_POST['search']))
  {
  	$searchterm = $_POST['search'];
	$threads = $_POST['threads'];
	$users = $_POST['users'];
	$board = $_POST['board'];
	
  	$query = "SELECT * FROM threads ORDER BY id WHERE board = $board LIKE '%$searchterm%'";
  
  		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
   		echo "<table id=\"hor-minimalist-b\">\n<tr><th>threads</th><th>threads</th><tr>\n\n";
   		while($row = mysqli_fetch_array($result)) {
  			$threads = $row['threads'];
  			$content = $row['content'];
			
		  	echo "<tr><td  >$threads</td><td >$content</td></tr>\n";
	    }
	    echo "</table>\n"; 
  	
  	}
  	
  }
  ?>
  <p>&nbsp;</p><p><a href="logout.php">logout</a></p>
  </div>
</body>
</html>