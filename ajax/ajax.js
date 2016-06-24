// global request variable 
var request;

$(document).ready(function(){
	// start by loading a random hand to display
	createNewHand();

	// makes an ajax call to the DB to update the page at the start of a new hand
	function createNewHand() {

		request = $.ajax({
	      url: "ajax/ajax.php",
	      method: "POST",
	      error: function(error) {
	          console.log(error);
	      }
	    });

	    request.success(function(data) {
	    	console.log(data[0]);
	    });
	}
});