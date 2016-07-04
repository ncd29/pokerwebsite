<?php
	//phpinfo();
	require "config.php";
	// helper functions file
	echo "print\n";
	$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	// connection error for MYSQL
	if ($mysqli->connect_errno) {
		echo "connect error";
		print($mysqli->connect_error);
		//die();
	}

	// do queries first to save time and avoid repeating on a hand change
	$handsQuery = "SELECT hands.hand_id FROM hands INNER JOIN hand_action ON hands.hand_id = 
		hand_action.hand_id WHERE hand_action.cards <> 'N/A'";
	$handsResult = $mysqli->query($handsQuery);
	if ($handsResult === false) {
		echo 'Query error 1';
		trigger_error('Wrong SQL: ' . $handsQuery . ' Error: ' . $mysqli->error, E_USER_ERROR);
	}

	// add each hand_id to an array
	$HANDIDS = array();
	//echo $handsResult->fetch_row();
	while ($row = $handsResult->fetch_row()) {
		$HANDIDS[] = $row[0];
	}

	//echo "oh ok2";
	//echo $HANDIDS[0];

	// get the total number of hands
	$countQuery = "SELECT COUNT(*) FROM hands INNER JOIN hand_action ON hands.hand_id = 
		hand_action.hand_id WHERE hand_action.cards <> 'N/A'";

	$countResult = $mysqli->query($countQuery);

	$TOTALHANDS = $countResult->fetch_row()[0];

	if (!$countResult) {
		echo 'Query error2';
		//die();
	}

	// main function for loading all the data associated with a hand onto page
	// generates a hand randomly, returns json_encoded array of rows for ajax request
	function loadHand() {
		global $TOTALHANDS;
		global $HANDIDS;
		global $mysqli;
		// generate a random number to get a random hand
		//echo 'in function';
		$rowNum = mt_rand(0,$TOTALHANDS-1);
		$hand_id = $HANDIDS[$rowNum];
		//echo $rowNum;
		//echo "\n";
		//echo $hand_id;
		//echo "after vars\n";
		// problem is that handid might be a hand that only has 'N/A' cards
		$query = "SELECT * FROM hands INNER JOIN hand_action ON hands.hand_id = 
		hand_action.hand_id WHERE hand_action.cards <> 'N/A'
		AND hands.hand_id = $hand_id";

		$result = $mysqli->query($query);
		//echo 'after query';
		if (!$result) {
			echo 'Query error';
			//die();
		}

		// TODO: get results from query and create a hand
		//echo 'before while';
		$results = array();
		while ($row = $result->fetch_assoc()) {
			$hand_id = $row['hand_id'];
			$bb = $row['big_blind'];
			$num_players = $row['num_players'];
			$dealer = $row['dealer'];
			$flop = $row['flop'];
			$turn = $row['turn'];
			$river = $row['river'];
			$seat = $row['seat'];
			$position = $row['position'];
			$starting_amount = $row['starting_amount'];
			$cards = $row['cards'];
			$preflop_action = $row['preflop_action'];
			$flop_action = $row['flop_action'];
			$turn_action = $row['turn_action'];
			$river_action = $row['river_action'];
			$results[] = array("hand_id" => $hand_id,
				"big_blind" => $bb,
				"num_players" => $num_players,
				"dealer" => $dealer,
				"flop" => $flop,
				"turn" => $turn,
				"river" => $river,
				"seat" => $seat,
				"position" => $position,
				"starting_amount" => $starting_amount,
				"cards" => $cards,
				"preflop_action" => $preflop_action,
				"flop_action" => $flop_action,
				"turn_action" => $turn_action,
				"river_action" => $river_action
			); 
		}

		// don't jsonencode here
		return $results;

	}
?>