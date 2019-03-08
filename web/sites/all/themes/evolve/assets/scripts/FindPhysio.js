jQuery(document).ready(function($) {

	// AUTO SCROLL TO ANCHOR MINUS NAV HEIGHT
  	$('a[href^="#"]').on('click', function(event) {
		var target = $(this.getAttribute('href'));
		var alt_target = $(this).attr('href');
		if( target.length ) {
			event.preventDefault();

			var window_width = $(window).width();
			if (window_width >= 993) {
				$('html, body').stop().animate({
					scrollTop: target.offset().top - $('#section-header').height()
				}, 1000, function(){
					window.location.href = alt_target;
					$('html, body').stop().animate({
						scrollTop: target.offset().top - $('#section-header').height()
					}, 0);
				});
			} else {
				$('html, body').stop().animate({
					scrollTop: target.offset().top
				}, 1000, function(){
					window.location.hash = alt_target;
					$('html, body').stop().animate({
						scrollTop: target.offset().top
					}, 0);
				});
			}
		}

		// RESOLVE ISSUE WITH PARALLAX IMAGE
		if ( $(this).attr('href') == '#scroll-point' ) {
			if( target.length ) {
				event.preventDefault();
	
				var window_width = $(window).width();
				if (window_width >= 993) {
					$('html, body').stop().animate({
						scrollTop: target.offset().top - $('#section-header').height()
					}, 1000, function(){
						$('html, body').stop().animate({
							scrollTop: target.offset().top - $('#section-header').height()
						}, 0);
					});
				} else {
					$('html, body').stop().animate({
						scrollTop: target.offset().top
					}, 1000, function(){
						$('html, body').stop().animate({
							scrollTop: target.offset().top
						}, 0);
					});
				}
			}
		}

		//STOP PAGE SCROLLING ON ACCORDION PANEL
		if ( $(this).attr('data-parent') ) {
			event.preventDefault();
			$('html, body').stop();
		}

		//STOP PAGE SCROLLING ON TAB CONTENT
		if ( $(this).attr('data-toggle') ) {
			event.preventDefault();
			$('html, body').stop();
		}


	});

	// smooth scroll to the anchor id
	if(window.location.hash){
		// direct browser to top right away
		scroll(0,0);
		// takes care of some browsers issue
		setTimeout(function(){scroll(0,0);}, 0);
		
		$(window).load(function(){
			var target = window.location.hash;
			$('html, body').stop().animate({
				scrollTop: $(target).offset().top - $('#section-header').height()
			}, 1000);
		});
	}
	
	//END AUTO SCROLL TO ANCHOR

	$('#useCurrent').click(function() {
		var currentLocation = window.location; 
		if(!String(currentLocation).includes("?")) currentLocation += "?";
		var locationC = String(currentLocation);
		if(String(currentLocation).includes("CrData=y")) { // when the value (CrData) is not set
			locationC = locationC.replace("&CrData=y","");
			locationC = locationC.replace("CrData=y","");
		}
		if($('#useCurrent').prop('checked')) {
			if(locationC.includes("ASCDESC=")) {
				locationC = locationC.replace("ASCDESC=DESC","");
				locationC = locationC.replace("ASCDESC=ASC","");
			}
			locationC = locationC + "&CrData=y";
		}
		window.location = locationC;
	}); 
	
	$("#FindAPhysio .FindForm .filterArea .event1").click(function(){
		$("#FindAPhysio .FindForm .filterArea .event1").animate({ fontSsize: "16px" }, 100);
		$("#FindAPhysio .FindForm .filterArea .event1").animate({ color: "rgb(0,159,218)" }, 100);
	});
	
	$("#practiceName").keyup(function() {
		$value = $(this).val();
		if($value == null || $value == "") {
			$('#distance').prop("disabled", false);
			$(".tt-input").prop("disabled", false).attr("placeholder", "Enter location");
			$('#state').prop("disabled", true).attr("style", "display:none;");
			if($(".tt-input").val() == "" || $(".tt-input").val() == null) {
				$('.submit').prop("disabled", true);
			}
		} else {
			$('#distance').prop("disabled", true);
			$(".tt-input").prop("disabled", true).attr("placeholder", "Location disabled");
			$('#state').prop("disabled", false).attr("style", "display:initial;");			}
			$('.submit').prop("disabled", false);
	}).keyup();
	
	$("#userName").keyup(function() {
		$value = $(this).val();
		if($value == null || $value == "") {
			$('#distance').prop("disabled", false);
			$(".tt-input").prop("disabled", false).attr("placeholder", "Enter location");
			$('#state').prop("disabled", true).attr("style", "display:none;");
		} else {
			$('#distance').prop("disabled", true);
			$(".tt-input").prop("disabled", true).attr("placeholder", "Location disabled");
			$('#state').prop("disabled", false).attr("style", "display:initial;");			}
	}).keyup();
		
	$("#geocomplete").change(function() {
		$("#state option[value=0]").prop('selected', true);
	});
	
	$("#distanceT").change(function() {
		var urls = "https://" + window.location.hostname + window.location.pathname;
		//var urls = "http://" + window.location.hostname + ":" + window.location.port + window.location.pathname;
		var param = window.location.href.replace(urls ,"");
		var paramPass = ParamSortOutput(param, "distance");
		urls += "?" + paramPass;
		var changed = $('#distanceT').val();
		window.location = urls + "distance=" + changed;
	});
	
	$("#treatmentT").change(function() {
		var urls = "https://" + window.location.hostname + window.location.pathname;
		//var urls = "http://" + window.location.hostname + ":" + window.location.port + window.location.pathname;
		var param = window.location.href.replace(urls ,"");
		var paramPass = ParamSortOutput(param, "treatment");
		urls += "?" + paramPass;
		var changed = $('#treatmentT').val();
		window.location = urls + "treatment=" + changed;
	});
	
	$("#languageT").change(function() {
		var urls = "https://" + window.location.hostname + window.location.pathname;
		//var urls = "http://" + window.location.hostname + ":" + window.location.port + window.location.pathname;
		var param = window.location.href.replace(urls ,"");
		var paramPass = ParamSortOutput(param, "language");
		urls += "?" + paramPass;
		var changed = $('#languageT').val();
		window.location = urls + "language=" + changed;
	});
	
	$('#currentLocation .currentLocation').click(function(){
		if($('#currentLocation .currentLocation').is(':checked')) { // using
			$('#currentLocation .LocationNo').removeClass("LocationNo").addClass("LocationUsing");
			$(".tt-input").attr("placeholder", "Using your current location");
			var latVal = $("#latCurrent").val();
			var lonVal = $("#lngCurrent").val();
			$('#lat').val(latVal);
			$('#lng').val(lonVal);
			$('.submit').prop("disabled", false);
		} else { // not using
			$('#currentLocation .LocationUsing').removeClass("LocationUsing").addClass("LocationNo");
			$(".tt-input").attr("placeholder", "Enter location");
			$('#lat').val("");
			$('#lng').val("");
			if($(".tt-input").val() == "" || $(".tt-input").val() == null) {
				$('.submit').prop("disabled", true);
			}
		}
	});

	$(".typeahead").keyup(function() {
		$value = $(this).val();
		if($value == null || $value == "") {
			$('#currentLocation .LocationNo').removeClass("LocationNo").addClass("LocationUsing");
			$('.currentLocation').prop('checked', true);
			var latVal = $("#latCurrent").val();
			var lonVal = $("#lngCurrent").val();
			$('#lat').val(latVal);
			$('#lng').val(lonVal);
			$('.submit').prop("disabled", false);
		} else {
			$('#currentLocation .LocationUsing').removeClass("LocationUsing").addClass("LocationNo");
			$('.currentLocation').prop('checked', false);
			$('#lat').val("");
			$('#lng').val("");
			$('.submit').prop("disabled", false);
		}
	});
})