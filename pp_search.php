
	<form method="post" action="pp_home.php">
	<input type="text" id="search" name="search"/><br />
	</form>

	<?php
	
		/*
			Implementation Sketch:
				Right now Ponybase.sql is set up with a boards and threads table. The threads table
				collates all the threads, one of the columns referring to which board it is in.
				Potential search format:
				
					Choose board from a drop down (there's only one explicity defined atm, 'art')
					Enter search term, and do a simple search seeing if any thread in that board
						contains the term.
					Return results in whatever fashion
		
		
		*/
	
	?>