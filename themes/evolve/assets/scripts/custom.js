(function($) {
    "use strict";
    $(document).ready(function() {
        //Tooltip
        $(".dtooltip").tooltip();
    });
})(this.jQuery);
jQuery(document).ready(function($) {
	$(".chosen-select").chosen({width: "100%"});
	$('.bx-prev').html("<i class='fa fa-angle-left'></i>");
    $('.bx-next').html("<i class='fa fa-angle-right'></i>");
    $('[class^=event]').click(function(){
        var x = $(this).attr("class").replace('event', '');
        $('[class^=down]:not(.down'+x+')').slideUp(400);
	    $('.down' + x).slideToggle(450);
		$('[class^=event]:not(.event'+x+') span').removeClass("text-underline");
		var eventtitle = "eventtitle"+x;
		$("span." + eventtitle).addClass("text-underline");
        var faclass = "fa"+x;
        if($("i." + faclass).hasClass("fa-angle-down")) {
			$("i." + faclass).removeClass("fa-angle-down");
			$("i." + faclass).addClass("fa-angle-up");
        } else {
			$("i." + faclass).removeClass("fa-angle-up");
			$("i." + faclass).addClass("fa-angle-down");
        }
	});
	$('[class=cardevent]').click(function(){
      
	    $('.carddown').slideToggle(450);
		
		
		
	});
	// for Advocacy template
	var advocacyCount = $("[id^=sections]").length;
	var classesM = $("[id^=sections]").attr("class") + " advocacySize" + advocacyCount;
	var listNumIndex = [];
	var firstIndex = 0;
	var advocacyArray = [];
	//$("#testerviewadvocacy-block").find("section").each(function(){ advocacyArray.push(this.id); });
	$(".AdvocacyHeader").find(".advocacyTitle").each(function(){ advocacyArray.push(this.id); });
	var advocacyContentArray = [];
	//$("#testerviewadvocacy-block-1").find("section").each(function(){ advocacyContentArray.push(this.id); });
	$(".region-content").find(".advocacyContent").each(function(){ advocacyContentArray.push(this.id); });
	var advocacyBackgroundArray = [];
	//$("#testerviewadvocacy-block-2").find("section").each(function(){ advocacyBackgroundArray.push(this.id); });
	$(".AdvocacyBackground").find(".advocacyBackground").each(function(){ advocacyBackgroundArray.push(this.id); });
	var classMaster = $('.AdvocacyHeader').attr("class");
	$('.AdvocacyHeader').attr("class", classMaster+" container");
	var classMaster2 = $('.AdvocacyBody').attr("class");
	$('.AdvocacyBody').attr("class", classMaster2+" container");
	for(var i = 0; i < advocacyCount; i++) {
		listNumIndex.push($('#'+advocacyArray[i]).attr("id").replace('sections',''));
		var classes = $('#'+advocacyArray[i]).attr("class") + " advocacySize"+ advocacyCount;
		//console.log(advocacyCount);
		if(i == (advocacyCount -1)) {
			$('.Dots'+listNumIndex[i]).remove();
			//$('#'+advocacyArray[i]).after("<div clsss='sectionDots' style='color: white; width: 49px; float: left; padding: 80px 5px 35px 17px;'><span class='glyphicon'></span></div>");
		}
		if(i == 0) {
			firstIndex = listNumIndex[0];
			$('#'+advocacyArray[i]).attr('class', 'focusedAdv '+classes);
		} else {
			$('#'+advocacyArray[i]).attr('class', 'unfocusedAdv '+classes);
			$('#'+advocacyContentArray[i]).attr('style', 'width: 0px; padding: 0px; ');
			$('#'+advocacyBackgroundArray[i]).attr('style', 'opacity: 0;');
		}
	}
	var lastIndex = listNumIndex[(parseInt(advocacyCount) - 1)];
	$('#leftArrow').attr("id", "leftArrow"+listNumIndex[0]);
	$('#rightArrow').attr("id", "rightArrow"+listNumIndex[1]);
	// set width for top navigation
	var widthCal = $("#testerviewadvocacy-block").width();
	if(advocacyCount == 3 && $( document ).width() > 991) {
		$("#testerviewadvocacy-block").attr('style','padding-left: '+((parseInt(widthCal) - 591)/2)+"px");
	} else if(advocacyCount == 4) {
		$("#testerviewadvocacy-block").attr('style','padding-left: '+((parseInt(widthCal) - 799)/2)+"px");
	} else {
		$("#testerviewadvocacy-block").attr('style','padding-left: '+((parseInt(widthCal) - 1007)/2)+"px");
	}
	// set width for top navigation
	var functionCall = function($input) {
		$('#sections'+$input).attr("class",'focusedAdv '+classesM);
		$('[id^=sections]:not(#sections'+$input+')').attr("class",'unfocusedAdv '+classesM);
		$('[id^=sectionContent]:not(#sectionContent'+$input+')').animate({width: "0px", padding: "0px"}, 300);
		$("#sectionContent" + $input).animate({width: "100%", padding: "0 15px"}, 300);
		$('[id^=advocacyBackground]:not(#advocacyBackground'+$input+')').animate({opacity: 0}, 300);
		$("#advocacyBackground" + $input).animate({opacity: 0.8}, 300);
		var nth = parseInt(jQuery.inArray($input, listNumIndex));
		$(".leftArrow").attr("id","leftArrow"+(listNumIndex[nth-1]));
		$(".rightArrow").attr("id","rightArrow"+(listNumIndex[nth+1]));
	}
	$("[id^=sections]").click(function(){
		var x = $(this).attr("id").replace('sections', '');
		functionCall(x);
    });
	$("[class^=rightArrow]").click(function(){
		var x = $(this).attr("id").replace('rightArrow', '');
		if(x != "undefined") {functionCall(x);}
	});
	$("[class^=leftArrow]").click(function(){
		var x = $(this).attr("id").replace('leftArrow', '');
		if(x != "undefined") {functionCall(x);}
	});
	// advocacy section done
	
	$("[id^=event]").click(function(){
        var x = $(this).attr("id").replace('event', '');
        var y = $("#event"+x).html().replace('+','~');
        if($('#event'+x).attr("class") == 'open') {$('#event'+x).attr("class",'close');} else {$('#event'+x).attr("class",'open');}
		$("#down" + x).slideToggle(500);
    });
	
	$("#showall").click(function() {
		$("#showall").css('background', 'rgb(0,159,218)');
		$("#showall a").css('color', 'white');
		$("#InTheNews").css('background', 'white');
		$("#InTheNews a").css('color', '#007ac9');
		$("#mediaRelease").css('background', 'white');
		$("#mediaRelease a").css('color', '#007ac9');
		$('#downT1').show(500);
		$('#downT2').hide(500);
		$('#downT3').hide(500);
		/*
		$('#downt1').show(700);
		$('#downt2').hide(700);
		$('#downt3').hide(700);*/
	});
	$("#InTheNews").click(function() {
		$("#showall").css('background', 'white');
		$("#showall a").css('color', '#007ac9');
		$("#InTheNews").css('background', 'rgb(0,159,218)');
		$("#InTheNews a").css('color', 'white');
		$("#mediaRelease").css('background', 'white');
		$("#mediaRelease a").css('color', '#007ac9');
		$('#downT1').hide(500);
		$('#downT2').show(500);
		$('#downT3').hide(500);
		/*$('#downt1').hide(700);
		$('#downt2').show(700);
		$('#downt3').hide(700);*/
	});
	$("#mediaRelease").click(function() {
		$("#showall").css('background', 'white');
		$("#showall a").css('color', '#007ac9');
		$("#InTheNews").css('background', 'white');
		$("#InTheNews a").css('color', '#007ac9');
		$("#mediaRelease").css('background', 'rgb(0,159,218)');
		$("#mediaRelease a").css('color', 'white');
		$('#downT1').hide(500);
		$('#downT2').hide(500);
		$('#downT3').show(500);
		/*$('#downt1').hide(700);
		$('#downt2').hide(700);
		$('#downt3').show(700);*/
	});
								  
    $('#block-block-216 input[type="checkbox"]').click(function(){
         if($(this).is(":checked")){
            $(this).attr('checked', true);
           $(this).val('1');
         }
         else{
          
          $(this).removeAttr('checked');
          $(this).val('0');
         }

    });
	$('#p1-2').click(function(){
        if($(this).is(":checked")){
			$(this).attr('checked', true);
			$(this).val('1');
		
		}
        else{
            $(this).removeAttr('checked');
            $(this).val('0');
		}
		if($('#p1-2').is(":checked"))
		{
			$('#rolloverblock').removeClass("display-none");
			$('#Installpayment-frequency').val("monthly");
		}
				 
    });
	$('#p1-1').click(function(){
		if($(this).is(":checked")){
			$('#rolloverblock').addClass("display-none");
			$('#Installpayment-frequency').val("annualy");
		}
	});
	$('input[type="checkbox"]').click(function(){
        if($(this).is(":checked")){
        $(this).attr('checked', true);
           $(this).val('1');
		
		  }
         else{
         
          $(this).removeAttr('checked');
          $(this).val('0');
		  
         }
		
    });
	$('#anothercard').click(function(){
        if($(this).is(":checked")){
			$('#anothercardBlock').removeClass("display-none");
			$('input[name=addCard]').val('1');
		}
        else{
            $('#anothercardBlock').addClass("display-none");
			$('input[name=addCard]').val('0');
        }
	});
	$('input[type="radio"]').click(function(){
        if($(this).is(":checked")){
            $(this).attr('checked', true);
        }
        else{
            $(this).removeAttr('checked');
        }
		if($('#Claim1').is(":checked") || $('#Facts1').is(":checked") || $('#Disciplinary1').is(":checked") || $('#Decline1').is(":checked") || $('#Oneclaim1').is(":checked"))
		{
			$('#insuranceMore').removeClass("display-none");
			$('#Addtionalquestion').val("1");
		}
		else if($('#Claim2').is(":checked") && $('#Facts2').is(":checked") && $('#Disciplinary2').is(":checked") && $('#Decline2').is(":checked") && $('#Oneclaim2').is(":checked")){
			$('#insuranceMore').addClass("display-none");
			$('#Addtionalquestion').val("0");
		}
    });
	  $('#recent-purchases').click(function(){
		$('#all-purchases').removeClass("text-underline");
		$('#recent-purchases').addClass("text-underline");
		  
	});
      $('#all-purchases').click(function(){
		$('#recent-purchases').removeClass("text-underline");
		$('#all-purchases').addClass("text-underline");
	});
	  $('#change-password').click(function(){
		
		$('#your-details-button').addClass("display-none");
	});
	  $('#yourdetails-tab, #membership, #payment, #workplace, #education').click(function(){
		  
		$('#your-details-button').removeClass("display-none");
	});
	  $('#Creditcard').click(function(){
        $('#card_type_display').removeClass('display-none');
        $('#Name-on-card').removeClass('display-none');
        $('#Cardno').removeClass('display-none');
        $('#Card-details').removeClass('display-none');
        $('#Card-account').addClass('display-none');
   
    });
    $('#Debitcard').click(function(){
       $('#card_type_display').removeClass('display-none');
       $('#Name-on-card').removeClass('display-none');
	   $('#Cardno').removeClass('display-none');
	   $('#Card-account').removeClass('display-none');
	   $('#Card-details').addClass('display-none');
    }); 
	$('#Paypal').click(function(){
     $('#card_type_display').addClass('display-none');
     $('#Name-on-card').addClass('display-none');
     $('#Cardno').addClass('display-none');
     $('#Card-account').addClass('display-none');
     $('#Card-details').addClass('display-none');
    });  
    $('#Shipping-address').click(function(){
        if($(this).is(":checked")){
            $(this).attr('checked', true);
            $('#Shipping-unitno').val($('#Billing-unitno').val());
         $('#Shipping-streetname').val($('#Billing-streetname').val());
         $('#Shipping-city-town').val($('#Billing-city-town').val());
     
         $('#Shipping-postcode').val($('#Billing-streetname').val());
         $('#Shipping-state').val($('#Billing-state').val());
         $('#Shipping-country').val($('#Billing-country').val());

         }
         else{
          
          $(this).removeAttr('checked');
           $('#Shipping-unitno').val('');
         $('#Shipping-streetname').val('');
         $('#Shipping-city-town').val('');
     
         $('#Shipping-postcode').val('');
         $('#Shipping-state').val('');
         $('#Shipping-country').val('');
         
         }
    }); 
	$('#Shipping-address-join').click(function(){
           if($(this).is(":checked")){
			$('#shippingAddress').addClass('shipping');  
            $(this).attr('checked', true);
			$('#Billing-BuildingName').val($('#BuildingName').val());
            $('#Billing-Address_Line_1').val($('#Address_Line_1').val());
            $('#Billing-Address_Line_2').val($('#Address_Line_2').val());
			$('#Billing-PObox').val($('#Billing-PObox').val());
            $('#Billing-Suburb').val($('#Suburb').val());
            
            $('#Billing-Postcode').val($('#Postcode').val());
            $('#Billing-State').val($('#State').val());
            $('#Billing-Country').val($('#Country').val());
            
			
         }
         else{
          
          $(this).removeAttr('checked');
		  $(this).val('0');
		  $('#shippingAddress').removeClass('shipping');
		  $('#dashboard-right-content').addClass("autoscroll");
          $('#Billing-BuildingName').val('');
		  $('#Billing-Address_Line_1').val('');
          $('#Billing-Address_Line_2').val('');
		  $('#Billing-PObox').val('');
         $('#Billing-Suburb').val('');
     
         $('#Billing-Postcode').val('');
         $('#Billing-State').val('');
         $('#Billing-Country').val('');
         
         }
    }); 
	$('#Shipping-address-dup').click(function(){
		  
           if($(this).is(":checked")){
			$(this).attr('checked', true);
			$('#Shipping-BuildingName').val($('#BuildingName').val());
            $('#Shipping-Address_Line_1').val($('#Address_Line_1').val());
            $('#Shipping-Address_Line_2').val($('#Address_Line_2').val());
			$('#Shipping-PObox').val($('#Billing-PObox').val());
            $('#Shipping-city-town').val($('#Suburb').val());
            $('#Shipping-postcode').val($('#Postcode').val());
            $('#Shipping-state').val($('#State').val());
            $('#Shipping-country').val($('#Country').val());
        }
        
    }); 
	$('#Mailing-address').click(function(){
		if($(this).is(":checked")){
			$(this).attr('checked', true);
			$('#Mailing-BuildingName').val($('#BuildingName').val());
            $('#Mailing-Address_Line_1').val($('#Address_Line_1').val());
            $('#Mailing-Address_Line_2').val($('#Address_Line_2').val());
			$('#Mailing-PObox').val($('#Billing-PObox').val());
            $('#Mailing-city-town').val($('#Suburb').val());
            $('#Mailing-postcode').val($('#Postcode').val());
            $('#Mailing-state').val($('#State').val());
            $('#Mailing-country').val($('#Country').val());
        }
     
    }); 
	$('[id^=Job]').change(function(){
	    if(($('select[name=Job]').val()!="Physiotherapist")){
			$( "#jobnoticement" ).dialog();
		}
		   
	});
	$('#addPaymentCard').click(function(){
		$( "#addPaymentCardForm" ).dialog();
    }); 
	$('#setCardButton').click(function(){
		$( "#setCardWindow" ).dialog();
    }); 
	$('#rolloverButton').click(function(){
		$( "#rollOverWindow" ).dialog();
    });
    $('#updatecard').click(function(){
		$( "#updateCardForm" ).dialog();
    });	
	$('.deletecardbutton').click(function(){
		$( "#deleteCardWindow" ).dialog();
	}); 
	$('.cancelDeleteButton').click(function() {
        $('#deleteCardWindow').dialog('close');
    });
	$('#registerPDUserButton').click(function(){
		$( "#registerPDUser" ).dialog();
    });
	$('#createAccount').click(function(){
		$( "#registerMember" ).dialog();
    });
	$('#login').click(function(){
		$( "#loginPopWindow" ).dialog();
	});
	$('#viewMap').click(function(){
		$( "#myMap" ).dialog();
	});
	$('#privacypolicyl').click(function(){
		$( "#privacypolicyWindow" ).dialog();
	});
	$('#instalmentpolicyl').click(function(){
		$( "#installmentpolicyWindow" ).dialog();
	});
	$('[id=Nationalgp]').change(function(){
	    if(jQuery.inArray( "SPO", $('select[id=Nationalgp]').val())!==-1)
		{
			$( "#ngsports" ).removeClass('display-none');
		}
		else{
			$( "#ngsports" ).addClass('display-none');
		}
		if(jQuery.inArray( "MUS", $('select[id=Nationalgp]').val())!==-1)	
		{
			$( "#ngmusculo" ).removeClass('display-none');
	    }
		else{
			$( "#ngmusculo" ).addClass('display-none');
		}
	}); 
	$('[id=Undergraduate-university-name]').change(function(){
	    if(($('select[name=Undergraduate-university-name]').val()=="Other")){
			$( "#Undergraduate-university-name-other" ).removeClass('display-none');
		}
		else{
			$( "#Undergraduate-university-name-other" ).addClass('display-none');
		}
	}); 
	$('[id=Postgraduate-university-name]').change(function(){
	    if(($('select[name=Postgraduate-university-name]').val()=="Other")){
			$( "#Postgraduate-university-name-other" ).removeClass('display-none');
		}
		else{
			$( "#Postgraduate-university-name-other" ).addClass('display-none');
		}
	}); 
	$('.add-additional-qualification').click(function(){
		$('#dashboard-right-content').addClass("autoscroll");
        var number = Number($('#addtionalNumber').val());
		$('div[id="additional-qualifications-block"]').append('<div id="additional'+ number +'"></div>');
		$("#additional"+ number ).load("sites/all/themes/evolve/commonFile/education.php", {"count":number});
        var i = Number(number +1);
		$('input[name=addtionalNumber]').val(i);
    });
	//$( "#datepicker" ).datepicker({dateFormat: 'yy'});
    $('#Paymentcard').change(function(){
	    $('#Paymentcardvalue').val($('#Paymentcard').val());
	});
    $("input[name=Pobox]").on("change paste keyup", function() {
		if($(this).val()!==""){
			$("input[name=Address_Line_1]").prop('disabled', true);
			$("input[name=Address_Line_2]").prop('disabled', true);
		}
        else{
			$("input[name=Address_Line_1]").prop('disabled', false);
			$("input[name=Address_Line_2]").prop('disabled', false);
		}		
    });	
	$('#MemberType').change(function(){
	    if($('select[name=MemberType]').val()=="AMO" || $('select[name=MemberType]').val()=="AM" || $('select[name=MemberType]').val()=="AS"|| $('select[name=MemberType]').val()=="SY"|| $('select[name=MemberType]').val()=="PA"|| $('select[name=MemberType]').val()=="Other"){
			$( "#ahpblock" ).addClass('display-none');
			$( "input[name=Ahpranumber]" ).val('');
			
		}
		else{
			$( "#ahpblock" ).removeClass('display-none');
		}
	}); 
	 
});

