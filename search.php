<!DOCTYPE html>
<!-- main file for handling database queries and returning results -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>Search</title>
</head>
<body>
	<?php include 'includes/header.php'; ?>
	<div class="title">
        <h1><strong>Query the Database</strong></h1>
    </div>
	<div class="form">
		<form method="post" action="search.php" >
	        <div class="column">
	        	<div class="header">
	        		Search by starting hands
			        <div>
			            <input id="checkbox-1" class="checkbox-custom" name="QQ-AA" type="checkbox">
			            <label for="checkbox-1" class="checkbox-custom-label">QQ-AA</label>
			        </div>
			        <div>
			            <input id="checkbox-2" class="checkbox-custom" name="77-JJ" type="checkbox">
			            <label for="checkbox-2" class="checkbox-custom-label">77-JJ</label>
			        </div>
			        <div>
			            <input id="checkbox-3" class="checkbox-custom" name="22-66" type="checkbox">
			            <label for="checkbox-3" class="checkbox-custom-label">22-66</label>
			        </div>
			        <div>
			            <input id="checkbox-4" class="checkbox-custom" name="broadway" type="checkbox">
			            <label for="checkbox-4" class="checkbox-custom-label">Broadway</label>
			        </div>
			        <div>
			            <input id="checkbox-5" class="checkbox-custom" name="suited-connectors" type="checkbox">
			            <label for="checkbox-5" class="checkbox-custom-label">Suited Connectors</label>
			        </div>
			    </div>
		    </div>
		    <div class="column">
	        	<div class="header">
	        		Search by number of players
			        <div>
			            <input id="checkbox-6" class="checkbox-custom" name="7-9" type="checkbox">
			            <label for="checkbox-6" class="checkbox-custom-label">7-9</label>
			        </div>
			        <div>
			            <input id="checkbox-7" class="checkbox-custom" name="4-6" type="checkbox">
			            <label for="checkbox-7" class="checkbox-custom-label">4-6</label>
			        </div>
			        <div>
			            <input id="checkbox-8" class="checkbox-custom" name="heads-up" type="checkbox">
			            <label for="checkbox-8" class="checkbox-custom-label">heads up</label>
			        </div>
			    </div>
		    </div>
		    <div class="column">
	        	<div class="header">
	        		Search by flop texture
			        <div>
			            <input id="checkbox-9" class="checkbox-custom" name="paired" type="checkbox">
			            <label for="checkbox-9" class="checkbox-custom-label">paired</label>
			        </div>
			        <div>
			            <input id="checkbox-10" class="checkbox-custom" name="rainbow" type="checkbox">
			            <label for="checkbox-10" class="checkbox-custom-label">rainbow</label>
			        </div>
			        <div>
			            <input id="checkbox-11" class="checkbox-custom" name="montone" type="checkbox">
			            <label for="checkbox-11" class="checkbox-custom-label">montone</label>
			        </div>
			    </div>
		    </div>
		    <div class="column">
	        	<div class="header">
	        		Search by position
			        <div>
			            <input id="checkbox-12" class="checkbox-custom" name="early-position" type="checkbox">
			            <label for="checkbox-12" class="checkbox-custom-label">Early Position (one of first two players to act)</label>
			        </div>
			        <div>
			            <input id="checkbox-13" class="checkbox-custom" name="middle-position" type="checkbox">
			            <label for="checkbox-13" class="checkbox-custom-label">Middle Positon (3rd player to act up to cutoff)</label>
			        </div>
			        <div>
			            <input id="checkbox-14" class="checkbox-custom" name="button" type="checkbox">
			            <label for="checkbox-14" class="checkbox-custom-label">Button</label>
			        </div>
			        <div>
			            <input id="checkbox-15" class="checkbox-custom" name="small-blind" type="checkbox">
			            <label for="checkbox-15" class="checkbox-custom-label">Small Blind</label>
			        </div>
			        <div>
			            <input id="checkbox-16" class="checkbox-custom" name="big-blind" type="checkbox">
			            <label for="checkbox-16" class="checkbox-custom-label">Big Blind</label>
			        </div>
			    </div>
		    </div>
		    <div class="submit">
		    	<input type="button" class="button" name="search" value="Search">
		    </div>
    	</form>
	</div>
</body>
</html>
	<?php
		
	?>