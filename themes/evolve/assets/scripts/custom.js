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
	$('[class^=join-details-button]').click(function(){
		
        var i = Number($(this).attr("class").replace('join-details-button', ''));
		var x = Number(i + 1);
		//var validateFun = function(){
			//if($("#Prefix").val() ==''){alert("please fill out all required fields *"); return false;} 
			
		//};
	    
		//if(validateFun()==false){return false;}
		if(x==3){ $('#dashboard-right-content').addClass("autoscroll");}
	    $('[class^=down]:not(.down'+x+')').slideUp(400);
	    $('.down' + x).slideToggle(450);
		$('[class^=tabtitle]:not(.tabtitle'+x+') span').removeClass("text-underline");
		var eventtitle = "eventtitle"+x;
		$("span." + eventtitle).addClass("text-underline");
          		
	});
	
	$('[class^=your-details-prevbutton]').click(function(){
		
        var i = Number($(this).attr("class").replace('your-details-prevbutton', ''));
		var x = Number(i - 1);
		if(x==3){ $('#dashboard-right-content').addClass("autoscroll");}
	    $('[class^=down]:not(.down'+x+')').slideUp(400);
	    $('.down' + x).slideToggle(450);
		$('[class^=tabtitle]:not(.tabtitle'+x+') span').removeClass("text-underline");
		var eventtitle = "eventtitle"+x;
		$("span." + eventtitle).addClass("text-underline");
          		
	});
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
	
	$('input[type="radio"]').click(function(){
         if($(this).is(":checked")){
            $(this).attr('checked', true);
          }
         else{
            $(this).removeAttr('checked');
            }
		    if($('#Claim1').is(":checked") || $('#Facts1').is(":checked") || $('#Disciplinary1').is(":checked") || $('#Decline1').is(":checked") || $('#Oneclaim1').is(":checked") || $('#Oneclaim1').is(":checked"))
		 {
			 $('#insuranceMore').removeClass("display-none");
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
		  $('#Billing-BuildingName').removeClass('shipping');
		  $('#dashboard-right-content').addClass("autoscroll");
          $('#Shipping-unitno').val('');
		  $('#Billing-Address_Line_1').val('');
          $('#Billing-Address_Line_2').val('');
		  $('#Billing-PObox').val('');
         $('#Billing-Suburb').val('');
     
         $('#Billing-Postcode').val('');
         $('#Billing-State').val('');
         $('#Billing-Country').val('');
         
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
        var number = Number($('#addtionalNumber').val());
        $('div[id="additional-qualifications-block"]').append('<input type="text" class="form-control" name="Additional-qualifications'+ number +'" id="Additional-qualifications'+ number +'">');
     	var i = Number(number +1);
		$('input[name=addtionalNumber]').val(i);
    });
	$( "#datepicker" ).datepicker({dateFormat: 'yy'});
    $('#Paymentcard').change(function(){
	    $('#Paymentcardvalue').val($('#Paymentcard').val());
	}); 
	 
});

