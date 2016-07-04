<?php
	// only seems to work like this, not with ../
	include "./includes/functions.php";
	// when this is commented out ajax fails, suggesting its failing in loadHand()
	echo "ok";
	// call load hand to return the array of rows
	//header('Content-Type: application/json');
	// loadHand() failing here but not when called in index.php
	$handData = loadHand();
	echo "after fnx call";
	var_dump($handData);
	echo json_encode($handData);
?>