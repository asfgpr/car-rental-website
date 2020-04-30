$(document).ready(function() {
  // Handler for .ready() called.


  updatevalue = function(){
  	result = $.ajax({
	  	url: 'ajax/update.php',
	  	method: 'post'
	  });

	  result.done(function(responce, txtstatus){
	  	if(txtstatus == 'success'){
	  		arr = JSON.parse(responce);
	  		booking = arr[0];
	  		query = arr[1];
	  		testimonial = arr[2];
	  		newbox = $('.sample-box');
	  		appendbox = $('.appendbox');
	  		container = document.createElement('div');
	  		if(arr[0] != 0){
	  			$('.nbooking').text(booking);
	  			$('.nbookinglink').attr('href', "manage-new-bookings.php");
	  			newbox.clone().appendTo(container);
	  			$(container).find('.sample-box').attr('class', 'newclass1 col-md-3');
	  			$(container).find('.newclass1 .boxheading').text(arr[0]);
	  			$(container).find('.newclass1 a').attr('href', 'manage-new-bookings.php');
	  			$(container).find('.newclass1 .boxtitle').text('NEW BOOKING');
	  		}

	  		if(arr[1] != 0){
	  			$('.nquery').text(query);
	  			$('.nquerylink').attr('href', "manage-new-conactusquery.php");
	  			newbox.clone().appendTo(container);
	  			$(container).find('.sample-box').attr('class', 'newclass2 col-md-3');
	  			$(container).find('.newclass2 .boxheading').text(arr[1]);
	  			$(container).find('.newclass2 a').attr('href', 'manage-new-conactusquery.php');
	  			$(container).find('.newclass2 .boxtitle').text('NEW QUERIES');
	  		}

	  		if(arr[2] != 0){
	  			$('.ntestimonial').text(testimonial);
	  			$('.ntestimoniallink').attr('href', "new_testimonials.php");
	  			newbox.clone().appendTo(container);
	  			$(container).find('.sample-box').attr('class', 'newclass3 col-md-3');
	  			$(container).find('.newclass3 .boxheading').text(arr[2]);
	  			$(container).find('.newclass3 a').attr('href', 'new_testimonials.php');
	  			$(container).find('.newclass3 .boxtitle').text('INACTIVE TESTIMONIAL');
	  		}
	  		
	  		appendbox.html(container);
	  	}
	  });
  }

  window.setInterval(function(){
	  /// call your function here
	  updatevalue();
	}, 10000);

});