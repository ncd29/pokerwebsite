<!DOCTYPE html>
<!-- home page -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	// <script src="ajax/ajax.js"></script> -->
	<title>Poker Hand Trainer</title>
</head>
<body>
	<!-- nav bar goes here -->
	<?php include "includes/header.php" ?>
	<div id="table-interface">
		<!-- table and seats -->
		<!-- <div id="upper">
			<div id="table">
				correspond to each seat at the table
				<div class="seat" id="one">
					<div class="cards">
					</div>
				</div>
				<div class="seat" id="two">
					<div class="cards">
					</div>
				</div>
				<div class="seat" id="three">
					<div class="cards">
					</div>
				</div>
				<div class="seat" id="four">
					<div class="cards">
					</div>
				</div>
				<div class="seat" id="five">
					<div class="cards">
					</div>
				</div>
				<div class="seat" id="six">
					<div class="cards">
					</div>
				</div>
				<div class="seat" id="seven">
					<div class="cards">
					</div>
				</div>
				<div class="seat" id="eight">
					<div class="cards">
					</div>
				</div>
				<div class="seat" id="nine">
					<div class="cards">
					</div>
				</div>
			</div> -->
		</div>
		<!-- action buttons -->
		<div id="lower">
			<!-- contains the actions available for the hand -->
			<div id="actions">
				<?php
					// testing here - function works, ajax call doesn't
					echo "testing";
					//include "includes/functions.php";
					echo "oh rly";
					// $hand_data = loadHand();
					// var_dump($hand_data);
				?>
			</div>
			<!-- <div id="display-text">
			</div>
			<div id="next-hand">
				TODO: links
				<a class="button" href="index.php">Go to the next hand</a>
			</div> -->
		</div>
	</div>

	<div id="footer">
	</div>
</body>
</html>