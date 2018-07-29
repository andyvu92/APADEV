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
	$('[id^=Country]').change(function(){
		var x = $(this).attr("id").replace('Country', '');
		//var y = $('select[id="Country'+x+'"] :selected').attr('class').replace('CountryOption', '');
		if($('select[id="Country'+x+'"]').val()!="Australia"){
            $('select[id="State'+x+'"]').attr('disabled', 'disabled');
		}
		else{
			$('select[id="State'+x+'"]').removeAttr('disabled');
		}
		
		//$('select[id="State'+x+'"] option:not(.StateOption'+y+'), select[id="State'+x+'"] li:not(.StateOption'+y+')').addClass("display-none");
		//$('select[id="State'+x+'"] option.StateOption'+y+', select[id="State'+x+'"] li:not(.StateOption'+y+')').removeClass("display-none");
		//$('select[id="State'+x+'"] option.StateOption'+y+', select[id="State'+x+'"] li:not(.StateOption'+y+')').addClass("display");
	});
	$('[id^=Wcountry]').change(function(){
		var x = $(this).attr("id").replace('Wcountry', '');
		//var y = $('select[id="Wcountry'+x+'"] :selected').attr('class').replace('CountryOption', '');
		//$('select[id="Wstate'+x+'"] option:not(.StateOption'+y+')').addClass("display-none");
		//$('select[id="Wstate'+x+'"] option.StateOption'+y+'').removeClass("display-none");
		//$('select[id="Wstate'+x+'"] option.StateOption'+y+'').addClass("display");
		if($('select[id="Wcountry'+x+'"]').val()!="Australia"){
            $('select[id="Wstate'+x+'"]').attr('disabled', 'disabled');
		}
		else{
			$('select[id="Wstate'+x+'"]').removeAttr('disabled');
		}
	});
	//$('select[id^=State] option.StateOption14, select[id^=State] li.StateOption14').removeClass("display-none");
	//$('select[id^=State] option.StateOption14, select[id^=State] li.StateOption14').addClass("display");
	//$('select[id^=State] option:not(.StateOption14), select[id^=State] li.StateOption14').addClass("display-none");
	//$('select[id^=State] option:not(.StateOption14), select[id^=State] li.StateOption14').removeClass("display");
	//$('select[id^=Wstate] option.StateOption14').removeClass("display-none");
	//$('select[id^=Wstate] option.StateOption14').addClass("display");
	//$('select[id^=Wstate] option:not(.StateOption14)').addClass("display-none");
	//$('select[id^=Wstate] option:not(.StateOption14)').removeClass("display");
	
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
	var widthCal = $(".AdvocacyHeader").width();
	if(advocacyCount == 3 && $( document ).width() > 991) {
		$(".AdvocacyHeader").attr('style','padding-left: '+((parseInt(widthCal) - 591)/2)+"px");
	} else if(advocacyCount == 4) {
		$(".AdvocacyHeader").attr('style','padding-left: '+((parseInt(widthCal) - 799)/2)+"px");
	} else {
		$(".AdvocacyHeader").attr('style','padding-left: '+((parseInt(widthCal) - 1007)/2)+"px");
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
	
	$("#block-block-271 .media_filter ul li").click(function(){
		$('li').siblings().removeClass('active');
		$(this).addClass('active');
	});

	$("#homeShowAll").click(function() {
		$('#downHomeT1').show(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);	
	});

	$("#homeEvents").click(function() {
		$('#downHomeT2').show(500);
		$('#downHomeT1').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);
	});

	$("#homePublication").click(function() {
		$('#downHomeT3').show(500);
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);
	});

	$("#homeStateNews").click(function() {
		$('#downHomeT4').show(500);
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT5').hide(500);
	});

	$("#homeTheLatest").click(function() {
		$('#downHomeT5').show(500);
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
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
			$('#Installpayment-frequency').val("Monthly");
		}
				 
    });
	$('#p1-1').click(function(){
		if($(this).is(":checked")){
			$('#rolloverblock').addClass("display-none");
			
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
	$('body').on('change', '[type="checkbox"]', function() {
		$('#workplaceblocks input[type="checkbox"]').click(function(){
			if($(this).is(":checked")){
			$(this).attr('checked', true);
			   $(this).val('True');
			
			  }
			 else{
			 
			  $(this).removeAttr('checked');
			  $(this).val('False');
			  
			 }
			
		});
		
	});
	$("#CardUsed").val($("#Paymentcard").val());
	$("input[value='PLACE YOUR ORDER']").click(function(){
		var CardID = $("#Paymentcard").val();
		$("#CardUsed").val(CardID);
	});		
	$('body').on('change', 'select', function() {
			var x = $(this).attr("id").replace('Udegree', '');
			if(($('#Udegree'+ x).val()=="0")){
				
				$( "#University-degree"+ x ).removeClass('display-none');
			}
			else{
				$( "#University-degree" + x).addClass('display-none');
				
			}
			var y = $(this).attr("id").replace('Undergraduate-university-name', '');
			if(($('#Undergraduate-university-name'+ y).val()=="0")){
				$( "#Undergraduate-university-name-other"+ y ).removeClass('display-none');
			}
			else{
				$( "#Undergraduate-university-name-other" + y).addClass('display-none');
			}
		    		
	});
	var PRF = $("#PRF").val();
	$( "#POSTPRF").val(PRF);
	$( "#PRF" ).change(function() {
		if(($('#PRF').val()=="Other")){
			$( "#PRFOther").removeClass('display-none');
			
		}
		else{
			$( "#PRFOther").addClass('display-none');
			var PRF = $("#PRF").val();
			$( "#POSTPRF").val(PRF);
		}
		
	});
	$( "#PRFOther" ).blur(function() {
		var PRF = $("#PRFOther").val();
		$( "#POSTPRF").val(PRF);
	});
	
	$('#anothercard').click(function(){
        if($(this).is(":checked")){
			$('#anothercardBlock').removeClass("display-none");
			$('input[name=addCard]').val('0');
		}
        else{
            $('#anothercardBlock').addClass("display-none");
			$('input[name=addCard]').val('1');
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
	if($('#Claim1').is(":checked") || $('#Facts1').is(":checked") || $('#Disciplinary1').is(":checked") || $('#Decline1').is(":checked") || $('#Oneclaim1').is(":checked"))
	{
		$('#insuranceMore').removeClass("display-none");
		$('#Addtionalquestion').val("1");
	}
	else if($('#Claim2').is(":checked") && $('#Facts2').is(":checked") && $('#Disciplinary2').is(":checked") && $('#Decline2').is(":checked") && $('#Oneclaim2').is(":checked")){
		$('#insuranceMore').addClass("display-none");
		$('#Addtionalquestion').val("0");
			
	}
	if($('#Addtionalquestion').val()=="1"){$('#insuranceMore').removeClass("display-none");} else{$('#insuranceMore').addClass("display-none");
		
	}
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
			$('#Billing-BuildingName').val($('input[name="BuildingName"]').val());
            $('#Billing-Address_Line_1').val($('input[name="Address_Line_1"]').val());
            $('#Billing-Address_Line_2').val($('input[name="Address_Line_2"]').val());
			$('#Billing-PObox').val($('input[name="Pobox"]').val());
            $('#Billing-Suburb').val($('input[name="Suburb"]').val());
            
            $('#Billing-Postcode').val($('input[name="Postcode"]').val());
            $('#Billing-State').val($('select[name="State"]').val());
            $('#Billing-Country').val($('select[name="Country"]').val());
            
			
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
			$('#Shipping-BuildingName').val($('input[name="BuildingName"]').val());
            $('#Shipping-Address_Line_1').val($('input[name="Address_Line_1"]').val());
            $('#Shipping-Address_Line_2').val($('input[name="Address_Line_2"]').val());
			$('#Shipping-PObox').val($('input[name="Pobox"]').val());
            $('#Shipping-city-town').val($('input[name="Suburb"]').val());
            $('#Shipping-postcode').val($('input[name="Postcode"]').val());
            $('#Shipping-state').val($('select[name="State"]').val());
            $('#Shipping-country').val($('select[name="Country"]').val());
        }
        
    }); 
	$('#Mailing-address').click(function(){
		if($(this).is(":checked")){
			$(this).attr('checked', true);
			$('#Mailing-BuildingName').val($('input[name="BuildingName"]').val());
            $('#Mailing-Address_Line_1').val($('input[name="Address_Line_1"]').val());
            $('#Mailing-Address_Line_2').val($('input[name="Address_Line_2"]').val());
			$('#Mailing-PObox').val($('input[name="Pobox"]').val());
            $('#Mailing-city-town').val($('input[name="Suburb"]').val());
            $('#Mailing-postcode').val($('input[name="Postcode"]').val());
            $('#Mailing-state').val($('select[name="State"]').val());
            $('#Mailing-country').val($('select[name="Country"]').val());
        }else{
		    $('#Mailing-BuildingName').val('');
            $('#Mailing-Address_Line_1').val('');
            $('#Mailing-Address_Line_2').val('');
			$('#Mailing-PObox').val('');
            $('#Mailing-city-town').val('');
            $('#Mailing-postcode').val('');
            $('#Mailing-state').val('');
            $('#Mailing-country').val(''); 	
		}
     
    }); 
	$('[id^=Job]').change(function(){
	    if(($('select[name=Job]').val()!="Physiotherapist")){
			$( "#jobnoticement" ).dialog();
		}
		   
	});
	$('#uploadImageButton').click(function(){
		$( "#uploadImage" ).dialog();
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
	$('#insuranceControl').click(function(){
		$("#insurancePopUp").dialog();
		
	});
    $('.cancelDeleteButton').click(function() {
        $('#deleteCardWindow').dialog('close');
    });	
	$('.cancelInsuranceButton').click(function() {
        $('#insurancePopUp').dialog('close');
    });
	$('#registerPDUserButton').click(function(){
		$( "#registerPDUser" ).dialog();
    });
	$('#registerNonMember').click(function(){
		$( "#registerMember" ).dialog();
    });
	$('#createAccount').click(function(){
		$( "#signupWebUser" ).dialog();
		$( "#loginPopWindow" ).dialog('close');
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
	$('#PRFDescription').click(function(){
		$( "#PRFDesPopUp" ).dialog();
	});
	$('#instalmentpolicyl').click(function(){
		$( "#installmentpolicyWindow" ).dialog();
	});
	$('[id=Nationalgp]').change(function(){
	    if(jQuery.inArray( "10021", $('select[id=Nationalgp]').val())!==-1)
		{
			$( "#ngsports" ).removeClass('display-none');
		}
		else{
			$( "#ngsports" ).addClass('display-none');
		}
		if(jQuery.inArray( "10015", $('select[id=Nationalgp]').val())!==-1)	
		{
			$( "#ngmusculo" ).removeClass('display-none');
	    }
		else{
			$( "#ngmusculo" ).addClass('display-none');
		}
	});
	if(jQuery.inArray( "10021", $('select[id=Nationalgp]').val())!==-1)
		{
			$( "#ngsports" ).removeClass('display-none');
			$( "#ngsportsbox" ).val('1');
			$("#ngsportsbox").attr('checked', true);
		}
		else{
			$( "#ngsports" ).addClass('display-none');
			$( "#ngsportsbox" ).val('0');
			$("#ngsportsbox").attr('checked', false);
		}
		if(jQuery.inArray( "10015", $('select[id=Nationalgp]').val())!==-1)	
		{
			$( "#ngmusculo" ).removeClass('display-none');
			$( "#ngmusculobox" ).val('1');
			$("#ngmusculobox").attr('checked', true);
	    }
		else{
			$( "#ngmusculo" ).addClass('display-none');
			$( "#ngmusculobox" ).val('0');
			$("#ngmusculobox").attr('checked', false);
		}	
	
	//  add additional education
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
	    if($('select[name=MemberType]').val()=="10005" || $('select[name=MemberType]').val()=="9966" || $('select[name=MemberType]').val()=="9967"|| $('select[name=MemberType]').val()=="10006"|| $('select[name=MemberType]').val()=="9965"|| $('select[name=MemberType]').val()=="9964"){
			$( "#ahpblock" ).addClass('display-none');
			$( "input[name=Ahpranumber]" ).val('');
			
		}
		else{
			$( "#ahpblock" ).removeClass('display-none');
		}
		
	});
	
	$('body').on('change', 'select', function() {
		
			if($('select[name=MemberType]').val()=="9993" || $('select[name=MemberType]').val()=="9994" || $('select[name=MemberType]').val()=="9968"|| $('select[name=MemberType]').val()=="9997"|| $('select[name=MemberType]').val()=="10004"){
				$( ".FapTagC" ).addClass('display-none');
				$( ".FapTagA" ).addClass('display-none');
					
			}
			else{
				$( ".FapTagC" ).removeClass('display-none');
				$( ".FapTagA" ).removeClass('display-none');
			}
		
		
	});
	if($('select[name=MemberType]').val()=="9993" || $('select[name=MemberType]').val()=="9994" || $('select[name=MemberType]').val()=="9968"|| $('select[name=MemberType]').val()=="9997" || $('select[name=MemberType]').val()=="10004"){
			$( ".FapTagC" ).addClass('display-none');
			$( ".FapTagA" ).addClass('display-none');
				
		}
	else{
		$( ".FapTagC" ).removeClass('display-none');
		$( ".FapTagA" ).removeClass('display-none');
	}

	/*   Membership Types questions start  */	
	$(".next").click(function() {
		var x = $(".active").attr('id').replace('Section','');
		if(x != '5') { // if it is not the last section
		  $("#Section"+x).removeClass("active");
		  x = parseInt(x) + 1;
		  $("#Section"+x).addClass("active passed");
		   $(".MainQuestionHolder #Sections"+x).show();
		   $('.MainQuestionHolder [id^=Sections]:not(.MainQuestionHolder #Sections'+x+')').hide(400);
		  ProgressMove(x);
		}
		BringSurveyBack();
		var type = $("#chosenType").text();
		var title = $("."+type+" .MTtitle").text();
		var typeID = $('.'+type+' .MTid').text();
		$("#chosenTypeName").text(title);
		$("#chosenTid").text(typeID);
		console.log(type);
		if(x == 5) {
			convertAndCalculate(type);
			var MembershipType = $("#chosenTid").text();
			var NationalGroups = $("#chosenNGid").text();
			$('.Join').html("<a href='/jointheapa?MT="+MembershipType+"&NG="+NationalGroups+"' style='color: white;'>Join now</a>");
		}
		$("."+type).show();
	});
  $(".prev").click(function() {
    var x = $(".active").attr('id').replace('Section','');
    if(x != '1') {
      $("#Section"+x).removeClass("passed active");
       x = parseInt(x) - 1;
       $(".MainQuestionHolder #Sections"+x).show();
      $("#Section"+x).addClass("active");
       $('.MainQuestionHolder [id^=Sections]:not(.MainQuestionHolder #Sections'+x+')').hide(400);
      ProgressMove(x);
    }
    BringSurveyBack();
    if(x == 2) {
      $(".node-membership-type").hide();
      $('[id^=question]').hide();
      $('[id^=question]').addClass("function");
      $('#question65').show();
      $('#question65').removeClass("function");
    }
  });
  $("[class^=NGname]").change(function() {
	var id = $(this).attr('id');
    if($('#'+id).is(':checked')) {
      var ins = $(this).attr('class').replace('NGname','');
      var NGtext = $(".NGnameText"+ins).text();
      var NGtotalText = $('#chosenNGName').text();
      var NGpriceT = $('.NGprice'+ ins).text();
      var NGPrice = NGpriceT.replace(/^\D+|\D+$/g, "");
      var totalNG = $(".NGpriceT").text();
      var totalPrice = totalNG.replace(/^\D+|\D+$/g, "");
      if(totalPrice == '') totalPrice = 0;
      var Sum = parseInt(NGPrice) + parseInt(totalPrice);
      console.log("ins: "+ins+" / NGpriceT: "+NGpriceT+" / NGprice: "+NGPrice+" / totalNG: "+totalNG+" / totalPrice: "+totalPrice+" / Sum: "+Sum);
      $(".NGpriceT").text(Sum);
      if(NGtotalText == "" || NGtotalText == "Not selected") {
        $('#chosenNGName').text(NGtext);
      } else {
        $('#chosenNGName').text(NGtotalText + " and "+NGtext);
	  }
	  var original = $("#chosenNGid").text();
	  if(original == " " || original == "&nbsp;" || original == "") {
		$("#chosenNGid").text(id);
	  } else  {
		$("#chosenNGid").text(original + "," + id);
	  }
    } else {
      var ins = $(this).attr('class').replace('NGname','');
      var NGtext = $(".NGnameText"+ins).text();
      var NGtotalText = $('#chosenNGName').text();
      var NGpriceT = $('.NGprice'+ ins).text();
      var NGPrice = NGpriceT.replace(/^\D+|\D+$/g, "");
      var totalNG = $(".NGpriceT").text();
      var totalPrice = totalNG.replace(/^\D+|\D+$/g, "");
      if(totalPrice == '') totalPrice = 0;
	  var Sum = parseInt(totalPrice) - parseInt(NGPrice);
	  // get original ids
	  var original = $("#chosenNGid").text();
      
      $(".NGpriceT").text(Sum);
      var index = NGtotalText.indexOf(NGtext);
      var subs = index + NGtext.length + 5;
	  var firstString = NGtotalText.substring(0, index);
	  // Find index of first string of NG id chosen
	  // and cut from first string to the first string
	  var output = original.indexOf(id);
      var subsID = output + id.length + 1;
	  var firstStringID = original.substring(0, output);
      
      if(index == (NGtotalText.length - NGtext.length)) {
		var firstString = NGtotalText.substring(0, index - 5);
		// its same. If first string's location is at the end
		var firstStringID = original.substring(0, output - 1);
      }
	  var finalString = NGtotalText.substring(subs, 9999);
	  var finalStringID = original.substring(subsID, 9999);
	  $('#chosenNGName').text(firstString + finalString);
	  $("#chosenNGid").text(firstStringID + finalStringID);
    }
  })
  $('.restart').click(function() {
    location.reload();
  });
  function ProgressMove(input) {
    var left = -931.0 + (parseFloat(input) * 184.55);
    if(input == 5) {left = 0;}
    $(".ProgressHolder .ProgressBar .ProgressBarBar").css('margin-left',left);
  }
  function BringSurveyBack() {
	var x = $(".active").attr('id').replace('Section','');
    if(x == '1') {
        $(".firstSection").show();
        $(".secondSection").hide();
		$(".thirdSection").hide();
    } else if(x == '3') {
        $(".firstSection").hide();
        $(".secondSection").hide();
		$(".thirdSection").show();
    } else {
		$(".firstSection").hide();
        $(".secondSection").show();
		$(".thirdSection").hide();
    }
  }
	function convertAndCalculate(MtypeSelected) {
		// things I need to calculate - member price and National Group price -------------
		// Member price source - section 3
		var MemberPriceText = $("."+MtypeSelected+" .MTprice").text();
		if(MemberPriceText == "" || MemberPriceText == "$Free") {
			var MemberPrice = 0;
		} else {
			var MemberPrice = MemberPriceText.replace(/^\D+|\D+$/g, "");
		}
		// National group price source - section 4
		var NGpriceText = $(".NGpriceT").text();
		if(NGpriceText == "" || NGpriceText == "&nbsp;") {
			var NGprice = 0;
		} else {
			var NGprice = NGpriceText.replace(/^\D+|\D+$/g, "");
		}
		// List of actions that I need to perform -----------------
		// Remove any non-digits from price
		// Sum all price
		var Sum = parseInt(MemberPrice) + parseInt(NGprice);
		// Combine all price from National Group
		// Need hidden field to get prices --------------------
		// Place I need to get - from Section 4 to Section 5.
		$("#chosenNG").text(NGprice);
		$("#totalCost").text('$'+Sum);
	}
	 
	$('[id^=label]').click(function() {
		var i = $(this).attr("id").replace('label', '');
		if(i!=="0"){
			$('[id^=question]:not(.function)').hide();
			$('[id^=question]:not(.function)').addClass("function");
			$('#question'+ i).show();
			$('#question'+ i).removeClass("function");
		} else if(i === "0") { 
			n = $(this).attr("class").replace('optionLabel', '');
			var anstr = "Answer" + n;
			var choseType = $("#"+anstr).val();
			//$('#memberTypeBlock').html(choseType);
			$('#Sections5 #chosenType').html(choseType);
			$('#Sections2 .next').click();
		}
	});
	if ( $('[type="date"]').prop('type') != 'date' ) {
		$('[type="date"]').datepicker();
	}
	$('[id^=Section]').click(function() {
		var x = $(this).attr("id").replace('Section', '');
		var i = $(".ProgressHolder .active").attr('id').replace('Section','');
		if(x < i) { // when clicked section is previous one.
			var i = parseInt(i);
			var x = parseInt(x)
			var gap = i - x;
			console.log("i:"+i+" x:"+x+" gap:"+gap);
			for(y = x + 1; y <= (i); y++) {
				console.log("in " +y);
				$("#Section"+y).removeClass("passed active");
				$("#Section"+y).removeClass("active passed");
			}
			$(".MainQuestionHolder #Sections"+x).show();
			$("#Section"+x).addClass("active");
			$('.MainQuestionHolder [id^=Sections]:not(.MainQuestionHolder #Sections'+x+')').hide(400);
			ProgressMove(x);
			BringSurveyBack();
			if(x == 2) {
				$(".node-membership-type").hide();
				$('[id^=question]').hide();
				$('[id^=question]').addClass("function");
				$('#question65').show();
				$('#question65').removeClass("function");
			}
		} 
	});
	 var widthCalVideo169 = $(".video169").width();
	$(".video169").attr('style','height: '+((parseInt(widthCalVideo169) * 9)/16)+"px; width: 100%;");
	 /*   Membership Types questions end   */

	/*insurance page for join a new member */
	$('#join-insurance-form2 input').click(function() {
       if($('#Claim1').is(":checked") || $('#Facts1').is(":checked") || $('#Disciplinary1').is(":checked") || $('#Decline1').is(":checked") || $('#Oneclaim1').is(":checked"))
	   { 
			
            $( "#insuranceStatus" ).val('1');			
       }
	   else if($('#Claim2').is(":checked") && $('#Facts2').is(":checked") && $('#Disciplinary2').is(":checked") && $('#Decline2').is(":checked") && $('#Oneclaim2').is(":checked")){
			
           
            $( "#insuranceStatus" ).val('0');				
		}
    });
	/*delete PRF from member shoppingcart  */
	$(".deletePRFButton").click(function(){
		$('#deletePRFForm').submit();
	});
	/*delete MG Product from member shoppingcart  */
	$('[class^=deleteMGButton]').click(function(){
		var productID = $(this).attr("class").replace('deleteMGButton', '');
		$('input[name="step2-3"]').val(productID);
		$('#deleteMGForm').submit();
	});
	
	if($('#insuranceTerms').val()=="0"){
		$( "#disagreeDescription" ).removeClass('display-none');
		$('a.join-details-button5').addClass('disabled');
		
	}
	else{
		$( "#disagreeDescription" ).addClass('display-none');
		$('a.join-details-button5').removeClass('disabled');
	}
	$('#insuranceTerms').click(function() {
		if($('#insuranceTerms').val()=="0"){
		$( "#disagreeDescription" ).removeClass('display-none');
		$('a.join-details-button5').addClass('disabled');
	}
	else{
		
		$( "#disagreeDescription" ).addClass('display-none');
		$('a.join-details-button5').removeClass('disabled');
	}
	});
	
});
/*
$( window ).on( "load", function() {
	console.log( "window loaded" );
	$('#workplaceblocks [id^=workplace] input[type="checkbox"]').click(function(){
        if($(this).is(":checked")){
        $(this).attr('checked', true);
           $(this).val('True');
		
		  }
         else{
         
          $(this).removeAttr('checked');
          $(this).val('False');
		  
         }
		
    });
});
*/