jQuery(document).ready(function($){
	//open popup
	$('#cd-popup-trigger').on('click', function(event){

			event.preventDefault();

		$('.cd-popup').addClass('is-visible');
		$(".header-books").css("display","none");
	});

	//close popup
	$('.cd-popup').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
			$(".header-books").css("display","block");
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
		if(event.which=='27'){
			$('.cd-popup').removeClass('is-visible');
			$(".header-books").css("display","block");
		}
	});
});