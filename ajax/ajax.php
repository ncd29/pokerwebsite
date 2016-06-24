<?php
	include "../includes/functions.php";

	// call load hand to return the array of rows
	header('Content-Type: application/json');
	echo json_encode(loadHand());
?>