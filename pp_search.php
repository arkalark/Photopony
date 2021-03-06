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
  <p><b>How-To:</b><br>
	1. In the first box, enter a term to search for. <br>
	2. Choose a board to search on. You'll only get results from this board.<br>
	3. Press Search The Ponybase!<br>
	4. The site will search both in thread titles and thread keywords* to find you a match for your search term.<br>
	It will search for your term anywhere in the thread title, but must be an exact match for any thread keyword.<br>
  <p></p>
  <form method="post" action="pp_home.php">
    <!-- <label for="username">Search:</label>
	<input type="text" id="search" name="search" /> -->
	Search for What?<input type="text" id="searchterm" name="searchterm" /> <br>
	(Enter nothing to see the entire board)<br>
	On What Board?
	<select name="board">
		<option value="art">Art</option>
		<option value="food">Food</option>
		<option value="fun">Fun</option>
		<option value="random">Random</option>
		<option value="science">Science</option>
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
	$keyword = 0;
	
	$keyword_q_save = "SELECT * FROM keywords WHERE keyword = '$searchterm';";
	//Find the keyword id of the keyword matching the searchterm.
	$keyword_q = mysqli_query($db, "SELECT * FROM keywords WHERE keyword = '$searchterm';") or die ("DEV: Keyword query failure");
	if(count(mysqli_fetch_array($keyword_q))!=0){
		//echo "DEV: Now in the loop<br>";
		$keyword_q = mysqli_query($db, "SELECT * FROM keywords WHERE keyword = '$searchterm';") or die ("DEV: Keyword query failure");
		//DEV NOTE: Need to repeat the query inside the if, apparently, if you want to use it in the while below.
		while($row=mysqli_fetch_array($keyword_q)){
			$keyword = $row['id'];
			//echo "DEV Keyword ID set: is now $keyword<br>";
			//Only setup for single keyword at this point
		}
	}
	else{
		//echo "DEV: Keyword not found!<br>";
	}
	//End keyword id find
	
	// GOOD $namequery = "SELECT * FROM threads WHERE board='$board' AND name LIKE '%$searchterm%';";
	// GOOD $namequery = "SELECT * FROM threads INNER JOIN keywordXthread AS kXt ON kXt.kw_id = $keyword AND threads.board='$board';";
	
	
	//$namequery = "SELECT name, id FROM threads WHERE board='$board' AND name LIKE '%$searchterm%' 
	//$namequery = "SELECT name, id FROM threads WHERE name IN (SELECT name FROM threads WHERE board='$board') AND name LIKE '%$searchterm%'
	$namequery = "SELECT t.name, t.id FROM threads AS t INNER JOIN threadXboard AS tXb 
			ON t.name LIKE '%$searchterm%' AND tXb.thread_id=t.id AND tXb.board_name='$board';";
		/*UNION <-- Keyword Search Borked
		SELECT t.name, t.id FROM threads as t INNER JOIN
		(SELECT t.name, t.id FROM threads AS t INNER JOIN keywordXthread AS kXt ON kXt.thread_id=t.id AND kXt.kw_id=$keyword) AS q
		ON q.name LIKE '%$searchterm%' AND q.board_name='$board' AND t.id=q.id;";*/
		//UNION SELECT t.name, t.id FROM threads AS t INNER JOIN keywordXthread AS kXt ON kXt.kw_id=$keyword AND threads.board='$board';";
	$result=mysqli_query($db, $namequery) or die("Error Querying Database: $namequery");
	
	//if(count(mysqli_fetch_array($result))==0){
	//BEGIN printing links
	
	
	
	if(count(mysqli_fetch_array($result))==0){
		echo "We couldn't find anything for <i>$searchterm</i> under the <b>$board</b> board! Sorry!<br>"; 
	}else{
		echo "Here's the threads we found for <i>$searchterm</i>";
		if ($searchterm==""){
			echo " the whole <b>$board</b> board!";
		}
		else {
			echo " in the <b>$board</b> board.";
		}
		echo"<br>";
		$result=mysqli_query($db, $namequery) or die("Error Querying Database");
		echo "<table align=left>\n";
		while($row=mysqli_fetch_array($result)){
			$name = $row['name'];
			$id = $row['id'];
			echo "<tr><td><a href=\"pp_viewthread.php?thread=$id\">$name</a></td></tr>\n";
		}
		echo "</table>\n<br>";
	}
	//END printing links
	
	
  	}
  	
  ?>
  
  </div>
</body>
</html>