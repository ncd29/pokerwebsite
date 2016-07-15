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
		<form method="post" action="search.php">
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
			            <label for="checkbox-11" class="checkbox-custom-label">monotone</label>
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
		    	<input type="submit" class="button" name='search' value="Search">
		    </div>
    	</form>
	</div>
	<div class="results">
		<?php
			echo "starting";
			//include 'includes/functions.php';
			include "config.php";

			// constants for determining whether to use AND or OR in queries
			$CARDS = 1;
			$PLAYERS = 2;
			$FLOP = 3;
			$POSITION = 4;

			// stores the type of WHERE clause that was appended most recently
			$prevQuery = 0;

			if (isset($_POST['search'])) {
				echo 'submit';
				// TODO - test all queries individually
				$query = "SELECT * FROM hands INNER JOIN hand_action ON hands.hand_id = 
						  hand_action.hand_id WHERE ";
				// this keeps track of the number of boxes checked so far
				$conditions = 0;
				if (isset($_POST['QQ-AA'])) {
					$query = $query . "hand_action.group_id = 'BPS'";
					$prevQuery = $CARDS;
					$conditions = $conditions + 1;
				}
				if (isset($_POST['77-JJ'])) {
					$addition = "hand_action.group_id = 'MPS'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						$query = $query . " OR " . $addition;
					}
					$conditions = $conditions + 1;
					$prevQuery = $CARDS;
				}
				if (isset($_POST['22-66'])) {
					$addition = "hand_action.group_id = 'SPS'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						$query = $query . " OR " . $addition;
					}
					$conditions = $conditions + 1;
					$prevQuery = $CARDS;
				}
				if (isset($_POST['broadway'])) {
					$addition = "hand_action.group_id = 'BRD'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						$query = $query . " OR " . $addition;
					}
					$conditions = $conditions + 1;
					$prevQuery = $CARDS;
				}
				if (isset($_POST['suited-connectors'])) {
					$addition = "hand_action.group_id = 'SC'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						$query = $query . " OR " . $addition;
					}
					$conditions = $conditions + 1;
					$prevQuery = $CARDS;
				}
				if (isset($_POST['7-9'])) {
					$addition = "hands.num_players > 6";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						$query = $query . " AND (" . $addition;
					}
					$conditions = $conditions + 1;
					$prevQuery = $PLAYERS;
				}
				if (isset($_POST['4-6'])) {
					$addition = "hands.num_players < 7 AND hands.num_players > 3";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						if ($prevQuery == $PLAYERS) {
							$query = $query . " OR " . $addition;
						}
						else {
							$query = $query . " AND (" . $addition;
						}
					}
					$conditions = $conditions + 1;
					$prevQuery = $PLAYERS;
				}
				if (isset($_POST['heads-up'])) {
					$addition = "hands.num_players = 2";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						if ($prevQuery == $PLAYERS) {
							$query = $query . " OR " . $addition;
						}
						else {
							$query = $query . " AND " . $addition;
						}
					}
					$conditions = $conditions + 1;
					$prevQuery = $PLAYERS;
				}

				// check if query contains a '(' if it does, need to add one
				$leftParen = strpos($query,"(");
				if ($leftParen !== FALSE) {
					$query = substr($query,0,strlen($query)) . ")";
				}

				if (isset($_POST['paired'])) {
					$addition = "hands.group_id = 'PRD'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						$query = $query . " AND (" . $addition;
					}
					$conditions = $conditions + 1;
					$prevQuery = $FLOP;
				}
				if (isset($_POST['rainbow'])) {
					$addition = "hands.group_id = 'RBW'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						if ($prevQuery == $FLOP) {
							$query = $query . " OR " . $addition;
						}
						else {
							$query = $query . " AND (" . $addition;
						}
					}
					$conditions = $conditions + 1;
					$prevQuery = $FLOP;
				}
				if (isset($_POST['montone'])) {
					$addition = "hands.group_id = 'MON'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						if ($prevQuery == $FLOP) {
							$query = $query . " OR " . $addition;
						}
						else {
							$query = $query . " AND " . $addition;
						}
					}
					$conditions = $conditions + 1;
					$prevQuery = $FLOP;
				}

				// check if query contains a second '(' if it does, need to add one
				if ($leftParen !== FALSE) {
					$leftParen2 = strpos(substr($query,$leftParen+1),"(");
					if ($leftParen2 !== FALSE) {
						$query = substr($query,0,strlen($query)) . ")";
					}
				}
				else {
					$leftParen = strpos($query,"(");
					if ($leftParen !== FALSE) {
						$query = substr($query,0,strlen($query)) . ")";
					}
				}

				if (isset($_POST['early-position'])) {
					# should probably check this position logic
					$addition = "hand_action.position = 'UTG'
					OR hand_action.position = 'UTG+1'
					OR (hands.num_players = 6 AND 
					hand_action.position = 'HJ')";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						$query = $query . " AND (" . $addition;
					}
					$conditions = $conditions + 1;
					$prevQuery = $POSITION;
				}
				if (isset($_POST['middle-position'])) {
					$addition = "hand_action.position = 'UTG+2'
					OR hand_action.position = 'UTG+3'
					OR (hands.num_players <> 6 AND 
					hand_action.position = 'HJ')
					OR hand_action.position = 'CO'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						if ($prevQuery == $POSITION) {
							$query = $query . " OR " . $addition;
						}
						else {
							$query = $query . " AND (" . $addition;
						}
					}
					$conditions = $conditions + 1;
					$prevQuery = $POSITION;
				}
				if (isset($_POST['button'])) {
					$addition = "hand_action.position = 'D'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						if ($prevQuery == $POSITION) {
							$query = $query . " OR " . $addition;
						}
						else {
							$query = $query . " AND (" . $addition;
						}
					}
					$conditions = $conditions + 1;
					$prevQuery = $POSITION;
				}
				if (isset($_POST['small-blind'])) {
					echo 'small-blind';
					$addition = "hand_action.position = 'SB'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						if ($prevQuery == $POSITION) {
							$query = $query . " OR " . $addition;
						}
						else {
							$query = $query . " AND (" . $addition;
						}
					}
					$conditions = $conditions + 1;
					$prevQuery = $POSITION;
				}
				if (isset($_POST['big-blind'])) {
					echo 'big-blind';
					$addition = "hand_action.position = 'BB'";
					if ($conditions == 0) {
						$query = $query . $addition;
					}
					else {
						if ($prevQuery == $POSITION) {
							$query = $query . " OR " . $addition;
						}
						else {
							$query = $query . " AND " . $addition;
						}
					}
					$conditions = $conditions + 1;
					$prevQuery = $POSITION;
				}

				// check if query contains a third '(' if it does, need to add ')'
				if ($leftParen2 !== FALSE and $leftParen !== FALSE) {
					$leftParen3 = strpos(substr($query,$leftParen2+1),"(");
					if ($leftParen3 !== FALSE) {
						$query = substr($query,0,strlen($query)) . ")";
					}
				}
				else {
					$leftParen = strpos($query,"(");
					if ($leftParen !== FALSE) {
						$query = substr($query,0,strlen($query)) . ")";
					}
				}

				// if query does not contain any conditions, remove the where clause
				if ($conditions == 0) {
					$query = substr($query,0,-7);
				}
				var_dump($query);

				// TODO do processing that will calculate stuff like 3-bet percentage and those stats
				// for the given situation
				// fix parentheses logic
			}

			echo "made it";
		?>
	</div>
</body>
</html>