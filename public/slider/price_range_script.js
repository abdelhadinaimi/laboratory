
$(document).ready(function(){
	


	


	$(function () {
	  $("#slider-range").slider({
		range: true,
		orientation: "horizontal",
		min: 2000,
		max: 2018,
		values: [2000, 2018],
		step: 1,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#from").text(ui.values[0]);
		  $("#to").text(ui.values[1]);
		}
	  });


	});

	

});