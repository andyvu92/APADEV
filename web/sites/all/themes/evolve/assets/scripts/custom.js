(function($) {
    "use strict";
    $(document).ready(function() {
        //Tooltip
        $(".dtooltip").tooltip();
    });
})(this.jQuery);
jQuery(document).ready(function($) {
	$('.bx-prev').html("<i class='fa fa-angle-left'></i>");
    $('.bx-next').html("<i class='fa fa-angle-right'></i>");
    $('[class^=event]').click(function(){
		var x = $(this).attr("class").replace('event', '');
        $('[class^=down]:not(.down'+x+')').hide();
	    $('.down' + x).fadeIn();
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
	$('[class^=Tabs]').click(function(){
		var x = $(this).attr("class").replace('Tabs', '');
		if ( $(this).hasClass('active') ){
			$(this).removeClass('active');
			$('[class^=TabContents]').slideUp(400);
		}
		else{
			$(this).siblings().removeClass('active');
			$('[class^=Tabs]').removeClass('active');
			$(this).addClass('active');
			$('[class^=TabContents]:not(.TabContents'+x+')').slideUp(400);
			$('.TabContents' + x).slideToggle(450);
			$('[class^=Tabs]:not(.Tabs'+x+') span').removeClass("text-underline");
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

	$("#block-block-283 .media_filter ul li").click(function(){
		$('li').siblings().removeClass('active');
		$(this).addClass('active');
	});

	$('.media_filter ul li').click(function(){
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
	});

	// ANIMATED SECTION ON CAMPAIGN/ABOUT-CAMPAIGN
	$('.media_filter ul li[id^="section"]').click(function(){
		getid = $(this).attr('id');
		$('.media_contents_filtered [id^="section"]').hide();
		$('.media_contents_filtered #' + getid + '-content').fadeIn();
	});

	$("#homeShowAll").click(function() {
		$('#downHomeT1').show(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);	
		$('#downHomeT6').hide(500);	
		$('#downHomeT7').hide(500);
		$('#downHomeT8').hide(500);	
		$('#downHomeT9').hide(500);	
		$('#downHomeT10').hide(500);
		$('#downHomeT11').hide(500);	

	});

	$("#homeEvents").click(function() {
		$('#downHomeT1').hide(500);
		$('#downHomeT2').show(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);
		$('#downHomeT6').hide(500);	
		$('#downHomeT7').hide(500);
		$('#downHomeT8').hide(500);	
		$('#downHomeT9').hide(500);	
		$('#downHomeT10').hide(500);
		$('#downHomeT11').hide(500);	
	});

	$("#homePublication").click(function() {
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').show(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);
		$('#downHomeT6').hide(500);	
		$('#downHomeT7').hide(500);
		$('#downHomeT8').hide(500);	
		$('#downHomeT9').hide(500);	
		$('#downHomeT10').hide(500);
		$('#downHomeT11').hide(500);	
	});

	$("#homeStateNews").click(function() {
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').show(500);
		$('#downHomeT5').hide(500);
		$('#downHomeT6').hide(500);	
		$('#downHomeT10').hide(500);
		$('#downHomeT11').hide(500);	
	});

	$("#homeTheLatest").click(function() {
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').show(500);
		$('#downHomeT6').hide(500);	
		$('#downHomeT7').hide(500);
		$('#downHomeT8').hide(500);	
		$('#downHomeT9').hide(500);
		$('#downHomeT10').hide(500);
		$('#downHomeT11').hide(500);		
	});

	$("#homeHighlights").click(function() {
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);
		$('#downHomeT6').show(500);	
		$('#downHomeT7').hide(500);
		$('#downHomeT8').hide(500);	
		$('#downHomeT9').hide(500);	
		$('#downHomeT10').hide(500);
		$('#downHomeT11').hide(500);	
	});
	$("#homeBIP").click(function() {
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);
		$('#downHomeT6').hide(500);	
		$('#downHomeT7').show(500);
		$('#downHomeT8').hide(500);	
		$('#downHomeT9').hide(500);	
		$('#downHomeT10').hide(500);
		$('#downHomeT11').hide(500);	
	});
	$("#homeIn").click(function() {
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);
		$('#downHomeT6').hide(500);	
		$('#downHomeT7').hide(500);
		$('#downHomeT8').show(500);	
		$('#downHomeT9').hide(500);	
		$('#downHomeT10').hide(500);
		$('#downHomeT11').hide(500);	
	});
	$("#homeS").click(function() {
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);
		$('#downHomeT6').hide(500);	
		$('#downHomeT7').hide(500);
		$('#downHomeT8').hide(500);	
		$('#downHomeT9').show(500);	
		$('#downHomeT10').hide(500);
		$('#downHomeT11').hide(500);	
	});
	$("#homeF").click(function() {
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);
		$('#downHomeT6').hide(500);	
		$('#downHomeT7').hide(500);
		$('#downHomeT8').hide(500);	
		$('#downHomeT9').hide(500);
		$('#downHomeT10').show(500);
		$('#downHomeT11').hide(500);			
	});
	$("#homeC").click(function() {
		$('#downHomeT1').hide(500);
		$('#downHomeT2').hide(500);
		$('#downHomeT3').hide(500);
		$('#downHomeT4').hide(500);
		$('#downHomeT5').hide(500);
		$('#downHomeT6').hide(500);	
		$('#downHomeT7').hide(500);
		$('#downHomeT8').hide(500);	
		$('#downHomeT9').hide(500);	
		$('#downHomeT10').hide(500);
		$('#downHomeT11').show(500);	

	});

	$("#showall").click(function() {
		$(this).addClass('active');
		$(this).siblings().removeClass('active');

		$('#downT1').show(500);
		$('#downT2').hide(500);
		$('#downT3').hide(500);
	});
	$("#InTheNews").click(function() {
		$(this).addClass('active');
		$(this).siblings().removeClass('active');

		$('#downT1').hide(500);
		$('#downT2').show(500);
		$('#downT3').hide(500);
	});
	$("#mediaRelease").click(function() {
		$(this).addClass('active');
		$(this).siblings().removeClass('active');

		$('#downT1').hide(500);
		$('#downT2').hide(500);
		$('#downT3').show(500);
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
	$('input[name="Paymentoption"]').click(function(){
			if($("#p1-2").is(":checked")){
				$(this).val('1');
				$('.schedule').css('display','inline-flex');
				$('.full').css('display','none');
				if($('#addcardtag').is(":visible")){
					$('#addcardtag').attr('checked', true);
					$('#addcardtag').attr('disabled', true);
				}

			}
      else{
				$(this).val('0');
				$('.full').css('display','inline-flex');
				$('.schedule').css('display','none');
				if($('#addcardtag').is(":visible")){
					$('#addcardtag').attr('checked', false);
					$('#addcardtag').attr('disabled', false);
				}
		}
		if($("#p1-2").is(":checked"))
		{
			$('#rolloverblock').removeClass("display-none");
			$('#Installpayment-frequency').val("Monthly");
			//var tempTotal = Number($('#totalPayment').html().replace(',',''));
			//var Total = Number(tempTotal +12).toFixed(2);
			//$('#totalPayment').html(Total);
			$("#installmentafter").after('<div class="flex-cell flex-flow-row" id="installmentline"><div class="flex-col-7">Admin fee</div><div class="flex-col-5">$12.00</div></div>');
		}
		else{
			$('#rolloverblock').addClass("display-none");
			var tempTotal = Number($('#totalPayment').html());
			var Total = Number(tempTotal -12).toFixed(2);
			$('#totalPayment').html(Total);
			$("#installmentline").remove();
			$('#Installpayment-frequency').val("");
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
	$('#State1').change(function(){
		var state = $('#State1').val();
		$('#homebranch').html(state);
		
	});
	/*$('body').on('change', '[type="checkbox"]', function() {
		$('#workplaceblocks input[type="checkbox"]').click(function(){
			alert("testcoming");
			if($(this).is(":checked")){
			$(this).attr('checked', true);
			   $(this).val('True');
			
			  }
			 else{
			 
			  $(this).removeAttr('checked');
			  $(this).val('False');
			  
			 }
			
		});
		
	});*/
	$('body').on('click', '#workplaceblocks input[type="checkbox"]', function() {
		
		if($(this).is(":checked")){
			$(this).attr('checked', true);
			   $(this).val('True');
			
			  }
			 else{
			 
			  $(this).removeAttr('checked');
			  $(this).val('False');
			  
			 }
			
	});
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
	$("#CardUsed").val($("#Paymentcard").val());
	$("input[value='PLACE YOUR ORDER']").click(function(){
		var CardID = $("#Paymentcard").val();
		$("#CardUsed").val(CardID);
	});		
	$('body').on('change', 'select', function() {
		if($('.down4:visible').length !== 0){
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
		}
		
		
	});
	$(document).on("click", "[id^=deleteEducation]", function(){
			var x = $(this).attr("id");
			$("#deleteQButton").addClass(x);
			$( "#confirmDelete" ).dialog();
	});
	var PRF = $("#PRF").val();
	//this is merged steps start
	$( "#PRFFinal").val(PRF);
	$('#todayFullAmount').html(Number(Number($('#fullHiddenAmount').val())+Number($('#PRFFinal').val())).toFixed(2));
	$('#todayScheduleAmount').html(Number(Number($('#scheduleHiddenAmount').val())+Number($('#PRFFinal').val())).toFixed(2));
	if($('#todayFullAmount').html()=="0"){
		$('#hiddenPayment').addClass('display-none');
		$("#anothercardBlock").removeClass('show');
	
	}
	else{
		$('#hiddenPayment').removeClass('display-none');
	  if($('#Paymentcard:visible').length === 0){ $('#anothercardBlock').addClass('show');}
	}
	//this is end merged steps
	$( "#POSTPRF").val(PRF);
	$('#Amount').html(Number($( "#POSTPRF").val()) + Number($( "#totalhidden").val()));
	$('#prf-donation').html(Number($( "#POSTPRF").val()) );
	if(Number($( "#POSTPRF").val()) + Number($( "#totalhidden").val())=="0") {
		$('#addPaymentCardForm').addClass('display-none');
		$('#PDPlaceOrder').removeClass('stop');
		$('#hiddenPayment').addClass('display-none');
	}
	else{
		$('#addPaymentCardForm').removeClass('display-none');
		$('#hiddenPayment').removeClass('display-none');
		if($('#Paymentcard:visible').length === 0){ $('#PDPlaceOrder').addClass('stop');}
	}
	$( "#PRF" ).change(function() {
		if(($('#PRF').val()=="Other")){
			$( "#PRFOther").removeClass('display-none');
		}
		else{
			$( "#PRFOther").addClass('display-none');
			$( "#PRFOther").val('');
			var PRF = $("#PRF").val();
			//this is merged steps part
			$('#PRFFinal').val('');
			$("#PRFFinal").val(PRF);
			$('#PRFshow').html(Number($("#PRFFinal").val()));
			$('#todayFullAmount').html(Number(Number($('#fullHiddenAmount').val())+Number($('#PRFFinal').val())).toFixed(2));
			$('#todayScheduleAmount').html(Number(Number($('#scheduleHiddenAmount').val())+Number($('#PRFFinal').val())).toFixed(2));
			if($('#todayFullAmount').html()=="0"){
				$('#hiddenPayment').addClass('display-none');
				$("#anothercardBlock").removeClass('show');
			}
			else{
				$('#hiddenPayment').removeClass('display-none');
				if($('#Paymentcard:visible').length === 0){ $('#anothercardBlock').addClass('show');}
			}
			//this is end merge steps part
			$( "#POSTPRF").val(PRF);
			$('#Amount').html(Number($( "#POSTPRF").val()) + Number($( "#totalhidden").val()));
			$('#prf-donation').html(Number($( "#POSTPRF").val()) );
			if(Number($( "#POSTPRF").val()) + Number($( "#totalhidden").val())=="0") {
				$('#addPaymentCardForm').addClass('display-none');
				$('#PDPlaceOrder').removeClass('stop');
				$('#hiddenPayment').addClass('display-none');
			}
			else{
				$('#addPaymentCardForm').removeClass('display-none');
				$('#hiddenPayment').removeClass('display-none');
				if($('#Paymentcard:visible').length === 0){$('#PDPlaceOrder').addClass('stop');}
			}
		}
		//var tempTotal = Number($('#totalPayment').html());
		//var prf = Number($('#PRF').val());
		//var Total = Number(tempTotal + prf);
		//$('#totalPayment').html(Total);
		
	});
	if(($('#PRF').val()=="Other")){
			$( "#PRFOther").removeClass('display-none');
	}
	$( "#PRFOther" ).blur(function() {
		var PRF = $("#PRFOther").val();
		$( "#POSTPRF").val(PRF);
		//this is merged steps part
		$('#PRFFinal').val('');
		$("#PRFFinal").val(PRF);
		$('#PRFshow').html(Number($("#PRFFinal").val()));
		$('#todayFullAmount').html(Number(Number($('#fullHiddenAmount').val())+Number($('#PRFFinal').val())).toFixed(2));
		$('#todayScheduleAmount').html(Number(Number($('#scheduleHiddenAmount').val())+Number($('#PRFFinal').val())).toFixed(2));
		if($('#todayFullAmount').html()=="0"){
			$('#hiddenPayment').addClass('display-none');
			$("#anothercardBlock").removeClass('show');
		}
		else{
			$('#hiddenPayment').removeClass('display-none');
			if($('#Paymentcard:visible').length === 0){ $('#anothercardBlock').addClass('show');}
		}
		//this is end merge steps part
		$('#Amount').html(Number($( "#POSTPRF").val()) + Number($( "#totalhidden").val()));
		$('#prf-donation').html(Number($( "#POSTPRF").val()) );
		if(Number($( "#POSTPRF").val()) + Number($( "#totalhidden").val())=="0") {
			$('#addPaymentCardForm').addClass('display-none');
			$('#PDPlaceOrder').removeClass('stop');
			$('#hiddenPayment').addClass('display-none');
		}
		else{
			$('#addPaymentCardForm').removeClass('display-none');
			$('#hiddenPayment').removeClass('display-none');
			if($('#Paymentcard:visible').length === 0){$('#PDPlaceOrder').addClass('stop');}
		}
		/*if($('.down6:visible').length !== 0){
				if($('#PRFOther').val()=="0" && $( "#totalPayment").html()=="0.00" || $( "#todayFullAmount").html()=="0.00"){
					$("#anothercardBlock").removeClass('show');
					$("input[name='addCard']").val('0');
					$('#hiddenPayment').addClass('display-none');
				}
				else{ 
				   	$('#hiddenPayment').removeClass('display-none');
					if($('#Paymentcard:visible').length === 0)	{
						$("#anothercardBlock").addClass('show');$("input[name='addCard']").val('1'); 
					}
				}
				
				
		}*/
	});

	$('#prftag').click(function(){
		if($('#prftag').val()=="1"){
			//this is merged steps
			$('#PRFFinal').val('');
			$('#PRFdetail').addClass('display-none');
			$('#todayFullAmount').html(Number($('#fullHiddenAmount').val()));
			$('#todayScheduleAmount').html(Number($('#scheduleHiddenAmount').val()));
		  if($('#todayFullAmount').html()=="0"){
				$('#hiddenPayment').addClass('display-none');
				$("#anothercardBlock").removeClass('show');
			}
			else{
				$('#hiddenPayment').removeClass('display-none');
				if($('#Paymentcard:visible').length === 0){ $('#anothercardBlock').addClass('show');}
			}
			//this is end merged steps
			$('#prfselect').slideUp().css('overflow', 'hidden');
			$( "#POSTPRF").val("");
			$('#Amount').html(Number($( "#POSTPRF").val()) + Number($( "#totalhidden").val()));
			$('#prf-donation').html(Number($( "#POSTPRF").val()) );
			if(Number($( "#POSTPRF").val()) + Number($( "#totalhidden").val())=="0") {
				$('#addPaymentCardForm').addClass('display-none');
				$('#PDPlaceOrder').removeClass('stop');
				$('.sidebardis').addClass('display-none');
				$('#hiddenPayment').addClass('display-none');
			}
			else{
				$('#addPaymentCardForm').removeClass('display-none');
				if($('#Paymentcard:visible').length === 0){$('#PDPlaceOrder').addClass('stop');}
				$('.sidebardis').removeClass('display-none');
				$('#hiddenPayment').removeClass('display-none');
				
			}
			/*if($('.down6:visible').length !== 0){
				if($( "#totalPayment").html()=="0.00" || $( "#todayFullAmount").html()=="0.00"){
					$("#anothercardBlock").removeClass('show');
					$("input[name='addCard']").val('0');
					$('#hiddenPayment').addClass('display-none');
				}
				else{ 
					$('#hiddenPayment').removeClass('display-none');
					if($('#Paymentcard:visible').length === 0)	{
						$("#anothercardBlock").addClass('show');$("input[name='addCard']").val('1'); 
					}
				}
				
				
			}*/
			
		}
		else{
			//this is merged steps
			$('#PRFdetail').removeClass('display-none');
			$("#PRFFinal").val( $("#PRF").val());
			$('#PRFshow').html(Number($("#PRFFinal").val()).toFixed(2));
			$('#todayFullAmount').html(Number(Number($('#fullHiddenAmount').val())+Number($('#PRFFinal').val())).toFixed(2));
			$('#todayScheduleAmount').html(Number(Number($('#scheduleHiddenAmount').val())+Number($('#PRFFinal').val())).toFixed(2));
			if($('#todayFullAmount').html()=="0"){
				$('#hiddenPayment').addClass('display-none');
				$("#anothercardBlock").removeClass('show');
			}
			else{
				$('#hiddenPayment').removeClass('display-none');
				if($('#Paymentcard:visible').length === 0){ $('#anothercardBlock').addClass('show');}
			}
			//this is end merged steps
			$('#prfselect').slideDown().css('overflow', 'unset');
			$( "#POSTPRF").val(Number($("#PRF").val()));
			$('#Amount').html(Number($( "#POSTPRF").val()) + Number($( "#totalhidden").val()));
			$('#prf-donation').html(Number($( "#POSTPRF").val()) );
			if(Number($( "#POSTPRF").val()) + Number($( "#totalhidden").val())=="0") {
				$('#addPaymentCardForm').addClass('display-none');
				$('#PDPlaceOrder').removeClass('stop');
				$('.sidebardis').addClass('display-none');
				$('#hiddenPayment').addClass('display-none');
			}
			else{
				$('#addPaymentCardForm').removeClass('display-none');
				$('#hiddenPayment').removeClass('display-none');
				if($('#Paymentcard:visible').length === 0){$('#PDPlaceOrder').addClass('stop');}
				$('.sidebardis').removeClass('display-none');
				
			}
			/*if($('.down6:visible').length !== 0){
				if($('#PRFOther').val()!="0" || $( "#totalPayment").html()!="0.00" || $( "#todayFullAmount").html()!="0.00"){
					$('#hiddenPayment').removeClass('display-none');
					if($('#Paymentcard:visible').length === 0)	{
						$("#anothercardBlock").addClass('show');$("input[name='addCard']").val('1');
					}
				}
				
			}*/
		}
		
	});
	if($('#prftag').val()=="1"){
		$('#prfselect').slideUp().css('overflow', 'hidden');
		if($('.down6:visible').length !== 0){
			if($( "#totalPayment").html()=="0.00" || $( "#todayFullAmount").html()=="0.00"){$("#anothercardBlock").removeClass('show');$("input[name='addCard']").val('0');$('#hiddenPayment').addClass('display-none');}
			else{ if($('#Paymentcard:visible').length === 0)	{$("#anothercardBlock").addClass('show');$("input[name='addCard']").val('1'); }}
				
		}
	}
	else{
		$('#prfselect').slideDown().css('overflow', 'unset').delay( 800 );
		/*if($('.down6:visible').length !== 0){
			
			if($('#PRFOther').val()!="0" || $( "#totalPayment").html()!="0.00" || $( "#todayFullAmount").html()!="0.00"){
				if($('#Paymentcard:visible').length === 0)	{
					$("#anothercardBlock").addClass('show');$("input[name='addCard']").val('1');}
			}
		}*/
	}
	// HIDE / SHOW PAYMENT CARD FORM 
	$('#anothercard').click(function(){
        if($(this).is(":checked")){
			$('#anothercardBlock').slideDown();
			$('input[name=addCard]').val('1');
		}
        else{
			$('#anothercardBlock').slideUp();
			$('input[name=addCard]').val('0');
        }
	});

	// HIDE / SHOW MAILING ADDRESS ON DASHBOARD > ACCOUNT
	$('#Mailing-address').click(function(){
		console.log('clicked');
        if($(this).is(":checked")){
			$('#mailing-address-block').slideUp();
			$('input[name=addCard]').val('1');
		}
        else{
            $('#mailing-address-block').slideDown();
			$('input[name=addCard]').val('0');
        }
	});

	//-----------------------------------------
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
			$('#shippingAddress').addClass('shipping').slideUp();  
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
		  $('#shippingAddress').removeClass('shipping').slideDown();
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
			$('#shippingaddressblock').slideUp();  
			$('#Shipping-BuildingName').val($('input[name="BuildingName"]').val());
            $('#Shipping-Address_Line_1').val($('input[name="Address_Line_1"]').val());
            $('#Shipping-Address_Line_2').val($('input[name="Address_Line_2"]').val());
			$('#Shipping-PObox').val($('input[name="Pobox"]').val());
            $('#Shipping-city-town').val($('input[name="Suburb"]').val());
            $('#Shipping-postcode').val($('input[name="Postcode"]').val());
            $('#Shipping-state').val($('select[name="State"]').val());
            $('#Shipping-country').val($('select[name="Country"]').val());
        }
		else{
			$('#shippingaddressblock').slideDown();  
			$('#Shipping-BuildingName').val('');
            $('#Shipping-Address_Line_1').val('');
            $('#Shipping-Address_Line_2').val('');
			$('#Shipping-PObox').val('');
            $('#Shipping-city-town').val('');
            $('#Shipping-postcode').val('');
            $('#Shipping-state').val('');
            $('#Shipping-country').val(''); 	
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
		if(($('select[name=Job]').val()=="other")){
			$( "#jobother" ).removeClass('display-none');
		}
		else{
			$( "#jobother" ).addClass('display-none');
		}
	});
	
	$('#uploadImageButton').click(function(){
		if ( $('.html').find('.overlay').length == 0 ){
            $('.html').append('<div class="overlay"><section class="loaders"><span class="loader loader-quart"></span></section></div>');
        }
		$( "#uploadImage-container" ).fadeIn();
		$('.overlay').fadeIn();
	});

	$(document).on('click', 'div[aria-describedby="uploadImage"].ui-dialog .ui-dialog-titlebar-close', function(){
		$('div[aria-describedby="uploadImage"].ui-dialog').show().fadeOut();
		$('.overlay').fadeOut();
	});

	$('#addPaymentCard').click(function(){
		$('.overlay').fadeIn();
		$( "#addPaymentCardForm-container").fadeIn();
	});
	 
	$('[aria-describedby="addPaymentCardForm"] .ui-dialog-titlebar-close').click(function(){
		$( '[aria-describedby="addPaymentCardForm"]' ).show().fadeOut();
	});
	
	$('#setCardButton').click(function(){
		$( ".overlay" ).fadeIn()
		$( "#setCardWindow" ).fadeIn();
	});
	$('#setCardWindow .no').click(function(){
		$( "#setCardWindow" ).fadeOut();
		$( ".overlay" ).fadeOut()
	});
	$('#setCardWindow .yes').click(function(){
		$( "#setCardWindow" ).fadeOut();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	});

	$('#rolloverButton').click(function(){
		$( "#rollOverWindow" ).dialog();
    });
    $('#updatecard').click(function(){
		$( "#updateCardForm" ).dialog();
	});	
	
	$(document).on('click', '.deletecardbutton', function(){
		$( ".overlay" ).fadeIn()
		$( "#deleteCardWindow" ).fadeIn();
	});
	$('#deleteCardWindow .no').click(function(){
		$( "#deleteCardWindow" ).fadeOut();
		$( ".overlay" ).fadeOut()
	});
	$('#deleteCardWindow .yes').click(function(){
		$( "#deleteCardWindow" ).fadeOut();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	});

	$('.cancelDeleteButton').click(function() {
        $('#deleteCardWindow').dialog('close');
    });	
	$('#registerPDUserButton').click(function(){
		$( "#registerPDUser" ).dialog();
    });

	$(document).on('click', '.ui-dialog-titlebar-close', function(){
		$('.overlay').fadeOut();
	});

	$('#instalmentpolicyl').click(function(){
		$( "#installmentpolicyWindow" ).dialog();
	});

	

	/*$('[id=Nationalgp]').change(function(){
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
	});*/
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
	
    $("input[name=Pobox]").on("change paste keyup", function() {
		if($(this).val()!==""){
			$("input[name=Address_Line_1]").prop('disabled', true);
			$("input[name=Address_Line_2]").prop('disabled', true);
			$("input[name=BuildingName]").prop('disabled', true);
			$("input[name=Address_Line_1]").val('');
			$("input[name=Address_Line_2]").val('');
			$("input[name=BuildingName]").val('');
			$("input[name=Address_Line_1]").parent().addClass('locked');
			$("input[name=Address_Line_2]").parent().addClass('locked');
			$("input[name=BuildingName]").parent().addClass('locked');
			$('.pobox-stat').hide();
		}
        else{
			$("input[name=Address_Line_1]").prop('disabled', false);
			$("input[name=Address_Line_2]").prop('disabled', false);
			$("input[name=BuildingName]").prop('disabled', false);
			$("input[name=Address_Line_1]").parent().removeClass('locked');
			$("input[name=Address_Line_2]").parent().removeClass('locked');
			$("input[name=BuildingName]").parent().removeClass('locked');
			$('.pobox-stat').show();
		}		
    });	
	if($("input[name=Pobox]").val()!=""){
		$("input[name=Address_Line_1]").prop('disabled', true);
		$("input[name=Address_Line_2]").prop('disabled', true);
		$("input[name=BuildingName]").prop('disabled', true);
	}
	else{
		$("input[name=Address_Line_1]").prop('disabled', false);
		$("input[name=Address_Line_2]").prop('disabled', false);
		$("input[name=BuildingName]").prop('disabled', false);
	}
	$("input[name=Billing-Pobox]").on("change paste keyup", function() {
		if($(this).val()!==""){
			$("input[name=Billing-Address_Line_1]").prop('disabled', true);
			$("input[name=Billing-Address_Line_2]").prop('disabled', true);
			$("input[name=Billing-BuildingName]").prop('disabled', true);
			$("input[name=Billing-Address_Line_1]").val('');
			$("input[name=Billing-Address_Line_2]").val('');
			$("input[name=Billing-BuildingName]").val('');
			$("input[name=Billing-Address_Line_1]").parent().addClass('locked');
			$("input[name=Billing-Address_Line_2]").parent().addClass('locked');
			$("input[name=Billing-BuildingName]").parent().addClass('locked');
			$('.billing-pobox-stat').hide();
		}
        else{
			$("input[name=Billing-Address_Line_1]").prop('disabled', false);
			$("input[name=Billing-Address_Line_2]").prop('disabled', false);
			$("input[name=Billing-BuildingName]").prop('disabled', false);
			$("input[name=Billing-Address_Line_1]").parent().removeClass('locked');
			$("input[name=Billing-Address_Line_2]").parent().removeClass('locked');
			$("input[name=Billing-BuildingName]").parent().removeClass('locked');
			$('.billing-pobox-stat').show();
		}
    });
	if($("input[name=Billing-Pobox]").val()!=""){
		$("input[name=Billing-Address_Line_1]").prop('disabled', true);
		$("input[name=Billing-Address_Line_2]").prop('disabled', true);
		$("input[name=Billing-BuildingName]").prop('disabled', true);
	} else{
		$("input[name=Billing-Address_Line_1]").prop('disabled', false);
		$("input[name=Billing-Address_Line_2]").prop('disabled', false);
		$("input[name=Billing-BuildingName]").prop('disabled', false);
	}
	$("input[name=Shipping-PObox]").on("change paste keyup", function() {
		if($(this).val()!==""){
			$("input[name=Shipping-Address_Line_1]").prop('disabled', true);
			$("input[name=Shipping-Address_Line_2]").prop('disabled', true);
			$("input[name=Shipping-BuildingName]").prop('disabled', true);
			$("input[name=Shipping-Address_Line_1]").val('');
			$("input[name=Shipping-Address_Line_2]").val('');
			$("input[name=Shipping-BuildingName]").val('');
			$("input[name=Shipping-Address_Line_1]").parent().addClass('locked');
			$("input[name=Shipping-Address_Line_2]").parent().addClass('locked');
			$("input[name=Shipping-BuildingName]").parent().addClass('locked');
			$('.shipping-pobox-stat').hide();
		}
        else{
			$("input[name=Shipping-Address_Line_1]").prop('disabled', false);
			$("input[name=Shipping-Address_Line_2]").prop('disabled', false);
			$("input[name=Shipping-BuildingName]").prop('disabled', false);
			$("input[name=Shipping-Address_Line_1]").parent().removeClass('locked');
			$("input[name=Shipping-Address_Line_2]").parent().removeClass('locked');
			$("input[name=Shipping-BuildingName]").parent().removeClass('locked');
			$('.shippng-pobox-stat').show();
		}		
    });
	if($("input[name=Shipping-PObox]").val()!=""){
		$("input[name=Shipping-Address_Line_1]").prop('disabled', true);
		$("input[name=Shipping-Address_Line_2]").prop('disabled', true);
		$("input[name=Shipping-BuildingName]").prop('disabled', true);
	}
	else{
		$("input[name=Shipping-Address_Line_1]").prop('disabled', false);
		$("input[name=Shipping-Address_Line_2]").prop('disabled', false);
		$("input[name=Shipping-BuildingName]").prop('disabled', false);
	}	
	$("input[name=Mailing-PObox]").on("change paste keyup", function() {
		if($(this).val()!==""){
			$("input[name=Mailing-Address_Line_1]").prop('disabled', true);
			$("input[name=Mailing-Address_Line_2]").prop('disabled', true);
			$("input[name=Mailing-BuildingName]").prop('disabled', true);
			$("input[name=Mailing-Address_Line_1]").val('');
			$("input[name=Mailing-Address_Line_2]").val('');
			$("input[name=Mailing-BuildingName]").val('');
			$("input[name=Mailing-Address_Line_1]").parent().addClass('locked');
			$("input[name=Mailing-Address_Line_2]").parent().addClass('locked');
			$("input[name=Mailing-BuildingName]").parent().addClass('locked');
			
		}
        else{
			$("input[name=Mailing-Address_Line_1]").prop('disabled', false);
			$("input[name=Mailing-Address_Line_2]").prop('disabled', false);
			$("input[name=Mailing-BuildingName]").prop('disabled', false);
			$("input[name=Mailing-Address_Line_1]").parent().removeClass('locked');
			$("input[name=Mailing-Address_Line_2]").parent().removeClass('locked');
			$("input[name=Mailing-BuildingName]").parent().removeClass('locked');
		}		
    });	
	if($("input[name=Mailing-PObox]").val()!=""){
		$("input[name=Mailing-Address_Line_1]").prop('disabled', true);
		$("input[name=Mailing-Address_Line_2]").prop('disabled', true);
		$("input[name=Mailing-BuildingName]").prop('disabled', true);
	}
	else{
		$("input[name=Mailing-Address_Line_1]").prop('disabled', false);
		$("input[name=Mailing-Address_Line_2]").prop('disabled', false);
		$("input[name=Mailing-BuildingName]").prop('disabled', false);
	}
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
		
			if($('select[name=MemberType]').val()=="9966" || $('select[name=MemberType]').val()=="9993" || $('select[name=MemberType]').val()=="9994" || $('select[name=MemberType]').val()=="9968"|| $('select[name=MemberType]').val()=="9997"|| $('select[name=MemberType]').val()=="10004" || $('select[name=MemberType]').val()=="10005"){
				$( ".FapTagC" ).addClass('display-none');
				$( ".FapTagA" ).addClass('display-none');
					
			}
			else{
				$( ".FapTagC" ).removeClass('display-none');
				$( ".FapTagA" ).removeClass('display-none');
			}
		
		
	});
	if($('select[name=MemberType]').val()=="9966" || $('select[name=MemberType]').val()=="9993" || $('select[name=MemberType]').val()=="9994" || $('select[name=MemberType]').val()=="9968"|| $('select[name=MemberType]').val()=="9997" || $('select[name=MemberType]').val()=="10004" || $('select[name=MemberType]').val()=="10005"){
			$( ".FapTagC" ).addClass('display-none');
			$( ".FapTagA" ).addClass('display-none');
				
		}
	else{
		$( ".FapTagC" ).removeClass('display-none');
		$( ".FapTagA" ).removeClass('display-none');
	}

	/*   Membership Types questions start  */	
	$(".next").click(function() {
		var x = $(".MainQuestionHolder .activated").attr('id').replace('Sections','');
		var type = $("#chosenType").text();
		var title = $("."+type+" .MTtitle").text();
		var typeID = $('.'+type+' .MTid').text();
		$("#chosenTypeName").text(title);
		$("#chosenTid").text(typeID);
		console.log(type);
		if(x != '5') { // if it is not the last section
		  $(".MainQuestionHolder #Sections"+x).removeClass("activated");
		  $(".ProgressHolder #Section"+x).removeClass("activated");
		  x = parseInt(x) + 1;
		  $(".MainQuestionHolder #Sections"+x).addClass("activated passed");
		  $(".ProgressHolder #Section"+x).addClass("activated passed");
		   $(".MainQuestionHolder #Sections"+x).show();
		   $('.MainQuestionHolder [id^=Sections]:not(.MainQuestionHolder #Sections'+x+')').hide(400);
		  ProgressMove(x);
		}
		
		if(x == 5) { // if it is the last section
			convertAndCalculate(type);
			$('.TidPAss').val($("#chosenTid").text());
			$('.NGidPAss').val($("#chosenNGid").text());
			console.log($("#chosenTid").text());
			console.log($("#chosenNGid").text());
			//$('.Join').html("<a href='/jointheapa?MT="+MembershipType+"&NG="+NationalGroups+"' style='color: white;'>Join now</a>");
		}
		BringSurveyBack();
		if(x == 3) {
			$("."+type).show();
		}
		
		$('html, body').animate({
			scrollTop: $('#section-main-content').offset().top
		}, 500, 'linear');
	});
	
  $(".prev").click(function() {
    var x = $(".MainQuestionHolder .activated").attr('id').replace('Sections','');
    if(x != '1') {
		$(".MainQuestionHolder #Sections"+x).removeClass("passed activated");
		$(".ProgressHolder #Section"+x).removeClass("passed activated");
		x = parseInt(x) - 1;
		$(".MainQuestionHolder #Sections"+x).show();
		$(".MainQuestionHolder #Sections"+x).addClass("activated");
		$(".ProgressHolder #Section"+x).addClass("activated");
		$('.MainQuestionHolder [id^=Sections]:not(.MainQuestionHolder #Sections'+x+')').hide(400);
		ProgressMove(x);
    } else { // when this button is clicked on first page.
		window.history.back();
	}
    BringSurveyBack();
    if(x == 1 || x == 2) {
      $(".node-membership-type").hide();
      $('[id^=question]').hide();
      $('[id^=question]').addClass("function");
      $('#question65').fadeIn();
      $('#question65').removeClass("function");
    }
	$('html, body').animate({
		scrollTop: $('#section-main-content').offset().top
	}, 500, 'linear');
  });
  $("#resetQuestion").click(function() {
	  $('[id^=question]').hide();
      $('[id^=question]').addClass("function");
      $('#question65').fadeIn();
      $('#question65').removeClass("function");
  })
  $("[class^=NGname]").change(function() {
	var id = $(this).attr('id');
    if($('#'+id).is(':checked')) {
      var ins = $(this).attr('class').replace('NGname','');
	  var ins = ins.replace(' styled-checkbox','');
      var NGtext = $(".NGnameText"+ins).text();
      var NGtotalText = $('#chosenNGName').text();
      var NGpriceT = $('.NGprice'+ ins).text();
      var NGPrice = NGpriceT.replace(/^\D+|\D+$/g, "");
      var totalNG = $(".NGpriceT").text();
      var totalPrice = totalNG.replace(/^\D+|\D+$/g, "");
      if(totalPrice == '') totalPrice = 0;
      var Sum = parseInt(NGPrice) + parseInt(totalPrice);
      //console.log("ins: "+ins+" /Text: "+NGtext+" / NGpriceT: "+NGpriceT+" / NGprice: "+NGPrice+" / totalNG: "+totalNG+" / totalPrice: "+totalPrice+" / Sum: "+Sum);
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
	  var ins = ins.replace(' styled-checkbox','');
      var NGtext = $(".NGnameText"+ins).text();
      var NGtotalText = $('#chosenNGName').text();
      var NGpriceT = $('.NGprice'+ ins).text();
      var NGPrice = NGpriceT.replace(/^\D+|\D+$/g, "");
      var totalNG = $(".NGpriceT").text();
      var totalPrice = totalNG.replace(/^\D+|\D+$/g, "");
      if(totalPrice == '') totalPrice = 0;
	  var Sum = parseInt(totalPrice) - parseInt(NGPrice);
	  // get original ids
	  console.log("ins: "+ins+" / NGpriceT: "+NGpriceT+" / NGprice: "+NGPrice+" / totalNG: "+totalNG+" / totalPrice: "+totalPrice+" / Sum: "+Sum);
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
  });
  
  $('.restart').click(function() {
    $('#Section1').click();
  });
  function ProgressMove(input) {
    var left = -931.0 + (parseFloat(input) * 184.55);
    if(input == 5) {left = 0;}
    $(".ProgressHolder .ProgressBar .ProgressBarBar").css('margin-left',left);
  }
  function BringSurveyBack() {
	var x = $(".activated").attr('id').replace('Sections','');
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
	 
	$(document).on('click', '[id^=labelmQ]', function() {
		var i = $(this).attr("id").replace('labelmQ', '');
		if(i!=="0"){
			$('[id^=question]:not(.function)').hide();
			$('[id^=question]:not(.function)').addClass("function");
			$('#question'+ i).fadeIn();
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
	$('.ProgressHolder [id^=Section]').click(function() {
		var x = $(this).attr("id").replace('Section', '');
		var i = $(".ProgressHolder .activated").attr('id').replace('Section','');
		if(x < i) { // when clicked section is previous one.
			var i = parseInt(i);
			var x = parseInt(x)
			var gap = i - x;
			console.log("i:"+i+" x:"+x+" gap:"+gap);
			for(y = x + 1; y <= (i); y++) {
				console.log("in " +y);
				$(".MainQuestionHolder #Sections"+y).removeClass("passed activated");
				$(".MainQuestionHolder #Sections"+y).removeClass("activated passed");
				$(".ProgressHolder #Section"+y).removeClass("passed activated");
				$(".ProgressHolder #Section"+y).removeClass("activated passed");
			}
			$(".MainQuestionHolder #Sections"+x).show();
			$(".ProgressHolder #Section"+x).addClass("activated");
			$(".MainQuestionHolder #Sections"+x).addClass("activated");
			$('.MainQuestionHolder [id^=Sections]:not(.MainQuestionHolder #Sections'+x+')').hide(400);
			ProgressMove(x);
			BringSurveyBack();
			if(x == 2) {
				$(".node-membership-type").hide();
				$('[id^=question]').hide();
				$('[id^=question]').addClass("function");
				$('#question65').fadeIn();
				$('#question65').removeClass("function");
			}
		} 
	});
	 var widthCalVideo169 = $(".video169").width();
	$(".video169").attr('style','height: '+((parseInt(widthCalVideo169) * 9)/16)+"px; width: 100%;");
	 /*   Membership Types questions end   */

	/*insurance page for join a new member */
	$('#join-insurance-form2 input, #renew-insurance-form2 input').click(function() {
       if($('#Claim1').is(":checked") || $('#Facts1').is(":checked") || $('#Disciplinary1').is(":checked") || $('#Decline1').is(":checked") || $('#Oneclaim1').is(":checked"))
	   { 
			
            $( "#insuranceStatus" ).val('1');			
       }
	   else if($('#Claim2').is(":checked") && $('#Facts2').is(":checked") && $('#Disciplinary2').is(":checked") && $('#Decline2').is(":checked") && $('#Oneclaim2').is(":checked")){
			
           
            $( "#insuranceStatus" ).val('0');				
		}
    });
	if($('#Claim1').is(":checked") || $('#Facts1').is(":checked") || $('#Disciplinary1').is(":checked") || $('#Decline1').is(":checked") || $('#Oneclaim1').is(":checked"))
   { 
		
		$( "#insuranceStatus" ).val('1');			
   }
   else if($('#Claim2').is(":checked") && $('#Facts2').is(":checked") && $('#Disciplinary2').is(":checked") && $('#Decline2').is(":checked") && $('#Oneclaim2').is(":checked")){
		
	   
		$( "#insuranceStatus" ).val('0');				
	}
	$("#10021").click(function(){
		if($("#10021").val()=="1"){
			$("#9977").removeAttr('disabled');
		}
		else{
			$("#9977").attr('disabled', 'disabled');
			$("#9977" ).prop('checked', false);
		}
	});
	if($("#10021").val()=="1"){
			$("#9977").removeAttr('disabled');
		}
		else{
			$("#9977").attr('disabled', 'disabled');
			$("#9977" ).prop('checked', false);
		}
	$("#10015").click(function(){
		if($("#10015").val()=="1"){
			$("#9978").removeAttr('disabled');
		}
		else{
			$("#9978").attr('disabled', 'disabled');
			$("#9978" ).prop('checked', false);
		}
	});
	if($("#10015").val()=="1"){
			$("#9978").removeAttr('disabled');
		}
		else{
			$("#9978").attr('disabled', 'disabled');
			$("#9978" ).prop('checked', false);
	}
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
	/*delete NG Product from member shoppingcart  */
	$('[class^=deleteNGButton]').click(function(){
		var productID = $(this).attr("class").replace('deleteNGButton', '');
		$('input[name="step2-4"]').val(productID);
		//if(productID == "10021") { $('input[name="MG"]').val("9977");}
		//if(productID == "10015") { $('input[name="MG"]').val("9978");}
		$('#deleteNGForm').submit();
	});
	
	if($('#insuranceTerms').val()=="0"){
		$( "#disagreeDescription" ).removeClass('display-none');
		$('a.join-details-button5').addClass('disabled');
		//$("#conditions" ).removeAttr('checked');
	}
	else{
		$( "#disagreeDescription" ).addClass('display-none');
		$('a.join-details-button5').removeClass('disabled');
		//$("#conditions" ).attr('checked', true);
		
	}
    
	//INSURANCE CHECKBOX IN POPUP
	$('#insuranceTerms, #insurance_terms_button').click(function() {
		$("#conditions" ).prop('checked', true);
		$("#conditions" ).attr('value', '1');
	});

	$('label[for="conditions"]').click(function(){
		$('#conditions').removeAttr('checked');
		$("#conditions" ).attr('value', '0');
		$('#insuranceTermsandConditions .modal-body').animate({
			scrollTop: $(".note-text").position().top
		}, 1);
	});

	//PRIVACY POLICY CHECKBOX IN POPUP FOR NON-MEMBER PD PURCHASE
	$('#non-member-privacypolicy').click(function() {
		$('#privacypolicyWindow').fadeOut();
		$("#jprivacy-policy" ).prop('checked', true);
		$("#jprivacy-policy" ).attr('value', '1');
	});
	$('#non-member-disagreepd').click(function() {
		$('#privacypolicyWindow').fadeOut();
	});

	$('label[for="jprivacy-policy"]').click(function(){
		$('#privacypolicyWindow .modal-body').animate({
			scrollTop: $(".note-text").position().top
		}, 1);
	});

	//PRIVACY POLICY CHECKBOX IN POPUP
	$('#privacypolicyp').click(function() {
		$("#jprivacy-policy" ).prop('checked', true);
		$("#jprivacy-policy" ).attr('value', '1');
	});

	$('label[for="jprivacy-policy"]').click(function(){
		$('#jprivacy-policy').removeAttr('checked');
		$("#jprivacy-policy" ).attr('value', '0');
		$('#privacypolicyWindow .modal-body').animate({
			scrollTop: $(".note-text").position().top
		}, 1);
	});

	//-------------------------------------

	// TERMS & CONDITIONS CHECKBOX IN POPUP
	$('#installmentpolicyp').click(function() {
		$("input#accept1" ).prop('checked', true);
		$("input#accept1" ).attr('value', '1');
	});

	$('label[for="accept1"]').click(function(){
		$('input#accept1').removeAttr('checked');
		$("input#accept1" ).attr('value', '0');
		$('#PDTermsWindow .modal-body').animate({
			scrollTop: $(".note-text").offset().top
		}, 1);
	});

	//ADD WORKPLACE SCROLL TOP
	$(document).on('click', '.add-workplace-join', function(){
		$('html, body').animate({
			scrollTop: $('#dashboard-right-content').offset().top
		}, 600);
	});
	
	$("input[type=number]").keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
           // Allow: Ctrl+A, Command+A
          (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
           // Allow: home, end, left, right, down, up
          (e.keyCode >= 35 && e.keyCode <= 40)) {
               // let it happen, don't do anything
               return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
  });
  $("input[name='Cardnumber'], input[name='Expirydate'], input[name='CCV']").keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
           // Allow: Ctrl+A, Command+A
          (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
           // Allow: home, end, left, right, down, up
          (e.keyCode >= 35 && e.keyCode <= 40)) {
               // let it happen, don't do anything
               return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
  });
  $("input[name='area-code'], input[name='phone-number'],input[name='Mobile-number']").keydown(function (e) {
	// Allow: backspace, delete, tab, escape, enter and .
	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
		 // Allow: Ctrl+A, Command+A
		(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
		 // Allow: home, end, left, right, down, up
		(e.keyCode >= 35 && e.keyCode <= 40)) {
			 // let it happen, don't do anything
			 return;
	}
	// Ensure that it is a number and stop the keypress
	if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		e.preventDefault();
	}
});
$("input[type='text']").keydown(function (e) {
	// Ensure text field not allow the double quote
	if (e.keyCode == 222) {
		e.preventDefault();
	}
});
$(document).on('change', 'select[name="Country"]', function(){
	if($('select[name="Country"]').val()=="Australia"){
        $("input[name='Postcode']").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
				 // Allow: Ctrl+A, Command+A
				(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
				 // Allow: home, end, left, right, down, up
				(e.keyCode >= 35 && e.keyCode <= 40)) {
					 // let it happen, don't do anything
					 return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});   
	}
	else {
		$("input[name='Postcode']").val("");
		$("input[name='Postcode']").unbind("keydown");
		
	}
});
if($('select[name="Country"]').val()=="Australia"){
	$("input[name='Postcode']").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
			 // Allow: Ctrl+A, Command+A
			(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
			 // Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
				 // let it happen, don't do anything
				 return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});   
}
$(document).on('change', 'select[name="Billing-Country"]', function(){
	if($('select[name="Billing-Country"]').val()=="Australia"){
        $("input[name='Billing-Postcode']").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
				 // Allow: Ctrl+A, Command+A
				(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
				 // Allow: home, end, left, right, down, up
				(e.keyCode >= 35 && e.keyCode <= 40)) {
					 // let it happen, don't do anything
					 return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});   
	}
	else {
		$("input[name='Billing-Postcode']").val("");
		$("input[name='Billing-Postcode']").unbind("keydown");
		
	}
});
if($('select[name="Billing-Country"]').val()=="Australia"){
	$("input[name='Billing-Postcode']").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
			 // Allow: Ctrl+A, Command+A
			(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
			 // Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
				 // let it happen, don't do anything
				 return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});   
}
$(document).on('change', 'select[name="Shipping-Country"]', function(){
	if($('select[name="Shipping-Country"]').val()=="Australia"){
        $("input[name='Shipping-postcode']").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
				 // Allow: Ctrl+A, Command+A
				(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
				 // Allow: home, end, left, right, down, up
				(e.keyCode >= 35 && e.keyCode <= 40)) {
					 // let it happen, don't do anything
					 return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});   
	}
	else {
		$("input[name='Shipping-postcode']").val("");
		$("input[name='Shipping-postcode']").unbind("keydown");
		
	}
});
if($('select[name="Shipping-Country"]').val()=="Australia"){
	$("input[name='Shipping-postcode']").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
			 // Allow: Ctrl+A, Command+A
			(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
			 // Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
				 // let it happen, don't do anything
				 return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});   
}
$(document).on('change', 'select[name="Mailing-Country"]', function(){
	if($('select[name="Mailing-Country"]').val()=="Australia"){
        $("input[name='Mailing-postcode']").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
				 // Allow: Ctrl+A, Command+A
				(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
				 // Allow: home, end, left, right, down, up
				(e.keyCode >= 35 && e.keyCode <= 40)) {
					 // let it happen, don't do anything
					 return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});   
	}
	else {
		$("input[name='Mailing-postcode']").val("");
		$("input[name='Mailing-postcode']").unbind("keydown");
		
	}
});
if($('select[name="Mailing-Country"]').val()=="Australia"){
	$("input[name='Mailing-postcode']").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
			 // Allow: Ctrl+A, Command+A
			(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
			 // Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
				 // let it happen, don't do anything
				 return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});   
}
//======================== LOADING SCREEN BUTTONS =================================
	
//------------- JOIN THE APA / RENEW MEMBERSHIP-----------------------
	$(document).on('click', '.join-details-button4', function(){
		$('.down4').show();
		$('.down5').hide();
		if( $('body').find('form[action="jointheapa"]').length > 0 ) {
			$('.overlay .edu-step-note').show();
		} else {
			$('.overlay .edu-step-note-generic').show();
		}
		$('.overlay').fadeIn();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	});

	$(document).on('click', '.placeorder', function(){
		$('.overlay .edu-step-note').html("Your order is being processed <br>Please don't refresh this page or press the back button");
		$('.overlay .edu-step-note').show();
	});

	$(document).on('click', '.join-details-button5', function(){
		$('.down5').show();
		$('#insurancePopUp').fadeOut();
		$('.overlay').fadeIn();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	});

	$(document).on('click', '.join-details-button7', function(){
		$('.down6').show();
		$('.overlay').fadeIn();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	});

	$(document).on('click', '.placeorder', function(){
		$('.overlay').fadeIn();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	});

	$(document).on('click', '.your-details-prevbutton6', function(){
		$('.down6').stop();
		$('.down6').show();
		$('.overlay').fadeIn();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	});

	$(document).on('click', '.your-details-prevbutton8', function(){
		$('.down8').stop();
		$('.down8').show();
		$('.overlay').fadeIn();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	});

	$(document).on('click', '.join-apa-final a', function(){
		$('.overlay').fadeIn();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	});

	$(document).on('click', '#your-details-submit-button', function(){
		$('.overlay').fadeIn();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	});

	//---------------------------------------------------------------------------

//------------- PD PAGES -----------------------
$(document).on('click', '#go-to-cart', function(){
	if ( $('#Professional-insurance1').is(':checked') ) {
		$('[aria-describedby="registerPDUser"]').fadeOut();
		$('.overlay').fadeIn();
		$('.loaders').css('visibility','visible').hide().fadeIn();
	}
});

$(document).on('click', '#continue-shopping', function(){
		$('[aria-describedby="processWindow"]').fadeOut();
		$('.overlay').fadeIn();
		$('.loaders').css('visibility','visible').hide().fadeIn();
});

$(document).on('click', '#checkout', function(){
	$('[aria-describedby="processWindow"]').fadeOut();
	$('.overlay').fadeIn();
	$('.loaders').css('visibility','visible').hide().fadeIn();
});

$(document).on('click', '.pd-spcart-delete a', function(){
	$('.overlay').fadeIn();
	$('.loaders').css('visibility','visible').hide().fadeIn();
});
// PD skip go to cart pop up save product in shopping cart
$(document).on('click', '#skipDietary ', function(){
	$('#skipDietaryForm').submit();
});
//===============================================================================	
	$('#logoutButton').click(function() {
		document.getElementById("logoutAcButton").click();
	});
	$('#DashboardButton').click(function() {
		window.location = "/dashboard";
	});
	$(".OthersiteButton").click( function() {
		$(".OtherSitesList").addClass('expand');
	});
	$(".OthersiteButtonClose").click( function() {
		$(".OtherSitesList").removeClass('expand');
	});
	
});

// PREFIX "PHY" FOR AHPRA NUMBER AND INPUT RULES
jQuery(document).ready(function(){
	$("#ahpblock input").keydown(function(e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
			// Allow: Ctrl+A, Command+A
			(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
			// Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
				// let it happen, don't do anything
				return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
	});

	var max_chars = 13;

	$('#ahpblock input').keydown( function(e){
		if ($(this).val().length >= max_chars) { 
			$(this).val($(this).val().substr(0, max_chars));
		}
	});

	// PHONE NUMBER MAX 13
	var max_phone_chars = 12;
    $(document).on('keydown', 'input[name="phone-number"], input[name="Mobile-number"]', function(e){
		if ($(this).val().length >= max_phone_chars) { 
			$(this).val($(this).val().substr(0, max_phone_chars));
		}
	});
	
});

// NO NUMBER IN FORMS FIELS TOWN/CITY
jQuery(document).ready(function(){
	$("input[name='Suburb'], input[name='Billing-Suburb']").keydown(function(e) {

			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
			// Allow: Ctrl+A, Command+A
			(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
			// Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
				// let it happen, don't do anything
				return;
			}
			// Ensure that it is a letter and stop the keypress
			if (e.keyCode >= 48 && e.keyCode <= 57){
				e.preventDefault();
			}
	});
});

jQuery(document).ready(function(){
	$("#dashboard-right-content .styled-checkbox#15").parents('li').remove();

});
