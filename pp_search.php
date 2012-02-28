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
  
  <h2>Search for Stuff!</h2>
  <p></p>
  <form method="post" action="pp_home.php">
    <!-- <label for="username">Search:</label>
	<input type="text" id="search" name="search" /> -->
	Search for What?<input type="text" id="searchterm" name="searchterm" /> <br>
	On What Board?
	<select name="board">
		<option value="art">Art</option>
		<option value="pony">Pony</option>
	</select><br>
    <input type="submit" value="Search the Ponybase!" name="submit" /> <br>
  </form>
  
  <?php
  
  if (isset($_POST['searchterm']))
  {
  	$searchterm = $_POST['searchterm'];
	//$threads = $_POST['threads'];
	//$users = $_POST['users'];
	$board = $_POST['board'];
	$threadname = "";
	$content = "";
	$piclink = "";
	
  	$query = "SELECT * FROM threads WHERE board = '$board' AND name LIKE '%$searchterm%';";
		//echo "$query";
  		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
   		echo "<table border=1 id=\"hor-minimalist-b\">\n<tr><th>Thread Name</th><th>Thread Post</th><th>Picture!</th><tr>\n\n";
   		while($row = mysqli_fetch_array($result)) {
  			$threadname = $row['name'];
  			$content = $row['content'];
			$piclink = $row['piclink'];
		  	echo "<tr><td>$threadname</td><td>$content</td><td><img src=\"$piclink\" /></td></tr>\n";
			//echo "DEVTEST: $piclink";
	    }
	    echo "</table>\n"; 
  	
  	}
  	
  
  ?>
  
  </div>
</body>
</html>