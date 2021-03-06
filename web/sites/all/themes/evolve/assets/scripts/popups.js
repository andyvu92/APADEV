//ALL POPUPS FUNCTIONS ARE TO BE PLACED IN THIS FILE

jQuery(document).ready(function() {

    //CALL POPUPS
    $('[popup-target]').on('click', function (e) {
        e.preventDefault();
        if ( $('body, .html, html').find('.overlay').length == 0 ){
            $('body').append('<div class="overlay"><section class="loaders"><span class="loader loader-quart"></span></section></div>');
        }
        target = $(this).attr('popup-target');
        $('.overlay').fadeIn();
        $('#'+ target).fadeIn();
        $('#'+ target).focus();
    });

    //DISMISS POPUPS
    $('[popup-dismiss]').on('click', function (e) {
        e.preventDefault();
        
        target = $(this).attr('popup-dismiss');
        $('.overlay').fadeOut();
        $('#'+ target).fadeOut();
    });

    //CLOSE BUTTON FOR POPUP
    $('.close-popup').on('click', function (e) {
        $('.overlay').fadeOut();
        $(this).parent().fadeOut();
    });

	$('.apa_policy_button').click(function() {
		$('[aria-describedby=privacypolicyWindow]').fadeOut();
	});
	$('#privacypolicyl').click(function() {
		$('[aria-describedby=privacypolicyWindow]').fadeIn();
	});

    //-------------------------------------------------------------

	$('.pd_terms_close').click(function() {
		$('[aria-describedby=PDTermsWindow]').fadeOut();
	});
	$('#pd_terms_open').click(function() {
		$('[aria-describedby=PDTermsWindow]').fadeIn();
    });
    
    //-------------------------------------------------------------

    $('#insuranceControl').click(function(){
		$('.overlay').fadeIn();
		$("#insurancePopUp").fadeIn();
	});
	$('.cancelInsuranceButton').click(function() {
		$('#insurancePopUp').fadeOut();
		$('.overlay').fadeOut();
    });
    
    //-------------------------------------------------------------

    $('[popup-target="insurancePopUp"]').click(function(){
		$('.overlay').fadeIn();
		$("#insurancePopUp").fadeIn();
	});
	$('.cancelInsuranceButton').click(function() {
		$('#insurancePopUp').fadeOut();
		$('.overlay').fadeOut();
    });

});