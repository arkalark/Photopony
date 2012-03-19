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
	(Enter nothing to see the entire board)<br>
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
	
	//Find the keyword id of the keyword matching the searchterm.
	$keyword_q = mysqli_query($db, "SELECT * FROM keywords WHERE keyword = '$searchterm'") or die ("DEV: Keyword query failure");
	if(count(mysqli_fetch_array($keyword_q))!=0){
		$keyword = $keyword_q['id'];
	}
	else{
		echo "DEV: Keyword not found!";
	}
	//End keyword id find
	
	$namequery = "SELECT * FROM threads as t INNER JOIN keywordXthread AS kXt ON t.id = kXt.thread_id AND kXt.thread_id = '$keyword' OR t.name LIKE '%$searchterm%';"
	// Old Simple Working Query; $namequery = "SELECT * FROM threads WHERE board = '$board' AND name LIKE '%$searchterm%';";
	$result=mysqli_query($db, $namequery) or die("Error Querying Database");
	
	//BEGIN printing links
	//if(count(mysqli_fetch_array($result))==0){

	if(count(mysqli_fetch_array($result))==0){
		echo "We couldn't find anything for $searchterm under the $board board! Sorry!<br>"; 
	}else{
		$result=mysqli_query($db, $namequery) or die("Error Querying Database");
		echo "<table align=left>\n";
		while($row=mysqli_fetch_array($result)){
			$name = $row['name'];
			$id = $row['id'];
			echo "<tr><td><a href=\"pp_viewthread.php?thread=$id\">$name</a></td></tr>\n";
		}
		echo "</table>\n";
	}
	//END printing links
  	
	/*$query = "SELECT * FROM threads WHERE board = '$board' AND name LIKE '%$searchterm%';";
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
				//echo "DEVTEST: $piclink";
			}
		}
		else
		{
			echo "We couldn't find anything for $searchterm under the $board board! Sorry!<br>";
		}
	    echo "</table>\n"; 
  	*/
  	}
  	
  
  ?>
  
  </div>
</body>
</html>