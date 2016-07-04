// global request variable 
var request;

$(document).ready(function(){
	// start by loading a random hand to display
	createNewHand();

	// makes an ajax call to the DB to update the page at the start of a new hand
	function createNewHand() {

		request = $.ajax({
	      url: "ajax/ajax.php",
	      method: "GET",
	      error: function(error) {
	          console.log(error);
	      }
	    });

	    // Callback handler that will be called on success
	    request.done(function(data){
	        // Log a message to the console
	        console.log("Success");
	        console.log(data[0]);
	    });

	    // Callback handler that will be called on failure
	    request.fail(function (textStatus, errorThrown){
	        // Log the error to the console
	        console.error(
	            "error: "+
	            textStatus, errorThrown
	        );
		});
	};
});
