(function($) {
    "use strict";
    $(document).ready(function() {
        //Tooltip
        $(".dtooltip").tooltip();
    });
})(this.jQuery);
jQuery(document).ready(function($) {
	var validateFun = function(){
		if($('.down1:visible').length !== 0){
			//if($("select[name=Prefix]").val() =='' ){$("select[name=Prefix]").addClass("focuscss");} else{$("select[name=Prefix]").removeClass("focuscss");}
			if($("input[name=Firstname]").val() ==''){$("input[name=Firstname]").addClass("focuscss");} else{$("input[name=Firstname]").removeClass("focuscss");}
			if($("input[name=Lastname]").val() ==''){$("input[name=Lastname]").addClass("focuscss");} else{$("input[name=Lastname]").removeClass("focuscss");}
			if($("input[name=Birth]").val() ==''){$("input[name=Birth]").addClass("focuscss");}else{$("input[name=Birth]").removeClass("focuscss");}
			if($("select[name=Gender]").val() ==''){$("select[name=Gender]").addClass("focuscss");}else{$("select[name=Gender]").removeClass("focuscss");}
			if($("input[name=phone-number]").val() =='' && $("input[name=Mobile-number]").val() ==''){ 
				$("input[name=phone-number]").addClass("focuscss");
				$("input[name=Mobile-number]").addClass("focuscss");
			} 
			else{
				$("input[name=phone-number]").removeClass("focuscss");
				$("input[name=Mobile-number]").removeClass("focuscss");
			}				
			
			if($("select[name=Aboriginal]").val() ==''){$("select[name=Aboriginal]").addClass("focuscss");}else{$("select[name=Aboriginal]").removeClass("focuscss");}
			if($("input[name=Pobox]").val() ==''){
				if($("input[name=Address_Line_1]").val() ==''){$("input[name=Address_Line_1]").addClass("focuscss");}else{$("input[name=Address_Line_1]").removeClass("focuscss");}
				//if($("input[name=Address_Line_2]").val() ==''){$("input[name=Address_Line_2]").addClass("focuscss");}else{$("input[name=Address_Line_2]").removeClass("focuscss");}
			}
			if($("input[name=Suburb]").val() ==''){$("input[name=Suburb]").addClass("focuscss");}else{$("input[name=Suburb]").removeClass("focuscss");}
			if($("input[name=Postcode]").val() ==''){$("input[name=Postcode]").addClass("focuscss");}else{$("input[name=Postcode]").removeClass("focuscss");}
			if($("select[name=State]").val() ==''){$("select[name=State]").addClass("focuscss");}else{$("select[name=State]").removeClass("focuscss");}
			if($("input[name=Country]").val() ==''){$("input[name=Country]").addClass("focuscss");}else{$("input[name=Country]").removeClass("focuscss");}
			if(!$("#Shipping-address-join").is(":checked")){
				if($("input[name=Billing-Address_Line_1]").val() ==''){$("input[name=Billing-Address_Line_1]").addClass("focuscss");}else{$("input[name=Billing-Address_Line_1]").removeClass("focuscss");}
				//if($("input[name=Billing-Address_Line_2]").val() ==''){$("input[name=Billing-Address_Line_2]").addClass("focuscss");}else{$("input[name=Billing-Address_Line_2]").removeClass("focuscss");}
				if($("input[name=Billing-Suburb]").val() ==''){$("input[name=Billing-Suburb]").addClass("focuscss");}else{$("input[name=Billing-Suburb]").removeClass("focuscss");}
				if($("input[name=Billing-Postcode]").val() ==''){$("input[name=Billing-Postcode]").addClass("focuscss");}else{$("input[name=Billing-Postcode]").removeClass("focuscss");}
				if($("select[name=Billing-State]").val() ==''){$("select[name=Billing-State]").addClass("focuscss");}else{$("select[name=Billing-State]").removeClass("focuscss");}
				if($("input[name=Billing-Country]").val() ==''){$("input[name=Billing-Country]").addClass("focuscss");}else{$("input[name=Billing-Country]").removeClass("focuscss");}
			}
			if($("input[name=Firstname]").val() ==''||$("input[name=Lastname]").val() ==''){
				return false;
			}
			if($("input[name=Birth]").val() ==''||$("select[name=Gender]").val() ==''||$("select[name=Aboriginal]").val() ==''){
				return false;
			}
			if($("input[name=phone-number]").val() =='' && $("input[name=Mobile-number]").val() ==''){ return false; }
			if($("input[name=Pobox]").val() ==''){
				if($("input[name=Address_Line_1]").val() ==''){
					return false;	
				}
			}
			if($("select[name=State]").val() ==''){
				return false;
			}
			if($("input[name=Country]").val() ==''||$("input[name=Postcode]").val() ==''||$("input[name=Suburb]").val() ==''){
				return false;
			}
			if(!$("#Shipping-address-join").is(":checked")){
				if($("input[name=Billing-Address_Line_1]").val() ==''||$("select[name=Billing-State]").val() ==''){
					return false;
				}
				if($("input[name=Billing-Country").val() ==''||$("input[name=Billing-Postcode]").val() ==''||$("input[name=Billing-Suburb]").val() ==''){
					return false;
				}
			}
		}
		if($('.down2:visible').length !== 0){
			if($("input[name=Memberid]").val() ==''){$("input[name=Memberid]").addClass("focuscss");}else{$("input[name=Memberid]").removeClass("focuscss");}
			if($("input[name=Password]").length !==0){
				if($("input[name=Password]").val() ==''){$("input[name=Password]").addClass("focuscss");}else{$("input[name=Password]").removeClass("focuscss");}
			}
			if($("select[name=MemberType]").val() ==''){$("select[name=MemberType]").addClass("focuscss");}else{$("select[name=MemberType]").removeClass("focuscss");}
			if($("select[name=Branch]").val() ==''){$("select[name=Branch]").addClass("focuscss");}else{$("select[name=Branch]").removeClass("focuscss");}
		    if($("input[name=Memberid]").val() ==''||$("input[name=MemberType]").val() ==''||$("input[name=Branch]").val() ==''){
				return false;
		    }
			if($("input[name=Password]").length !==0) {
				if($("input[name=Password]").val() =='') { return false;}
			}
		}
		if($('select[name=MemberType]').val()!=="9964" && $('select[name=MemberType]').val()!=="9965" && $('select[name=MemberType]').val()!=="10004"&& $('select[name=MemberType]').val()!=="9966"&& $('select[name=MemberType]').val()!=="9967"&& $('select[name=MemberType]').val()!=="9968"&& $('select[name=MemberType]').val()!=="9997"&& $('select[name=MemberType]').val()!=="9967"){
			if($('.down3:visible').length !== 0){
				var i = $("input[name=wpnumber]").val();
				for (x = 0; x<i;x++){
					if($("input[name=Name-of-workplace"+x+"]").val() ==''){$("input[name=Name-of-workplace"+x+"]").addClass("focuscss");}else{$("input[name=Name-of-workplace"+x+"]").removeClass("focuscss");}
					if($("select[name=Workplace-setting"+x+"]").val() ==''){$("select[name=Workplace-setting"+x+"]").addClass("focuscss");}else{$("select[name=Workplace-setting"+x+"]").removeClass("focuscss");}
					if($("input[name=WAddress_Line_1"+x+"]").val() ==''){$("input[name=WAddress_Line_1"+x+"]").addClass("focuscss");}else{$("input[name=WAddress_Line_1"+x+"]").removeClass("focuscss");}
					if($("input[name=Wcity"+x+"]").val() ==''){$("input[name=Wcity"+x+"]").addClass("focuscss");}else{$("input[name=Wcity"+x+"]").removeClass("focuscss");}
					if($("input[name=Wpostcode"+x+"]").val() ==''){$("input[name=Wpostcode"+x+"]").addClass("focuscss");}else{$("input[name=Wpostcode"+x+"]").removeClass("focuscss");}
					if($("input[name=Wstate"+x+"]").val() ==''){$("input[name=Wstate"+x+"]").addClass("focuscss");}else{$("input[name=Wstate"+x+"]").removeClass("focuscss");}
					if($("input[name=Wcountry"+x+"]").val() ==''){$("input[name=Wcountry"+x+"]").addClass("focuscss");}else{$("input[name=Wcountry"+x+"]").removeClass("focuscss");}
					if($("input[name=Wemail"+x+"]").val() ==''){$("input[name=Wemail"+x+"]").addClass("focuscss");}else{$("input[name=Wemail"+x+"]").removeClass("focuscss");}
					if($("input[name=Wwebaddress"+x+"]").val() ==''){$("input[name=Wwebaddress"+x+"]").addClass("focuscss");}else{$("input[name=Wwebaddress"+x+"]").removeClass("focuscss");}
					if($("input[name=Number-worked-hours"+x+"]").val() ==''){$("input[name=Number-worked-hours"+x+"]").addClass("focuscss");}else{$("input[name=Number-worked-hours"+x+"]").removeClass("focuscss");}
				}
							
				for (x = 0; x<i;x++){
					if($("input[name=Name-of-workplace"+x+"]").val() ==''||$("select[name=Workplace-setting"+x+"]").val() ==''||$("input[name=WAddress_Line_1"+x+"]").val() ==''){
						return false;
					}
					if($("input[name=Wcity"+x+"]").val() ==''||$("input[name=Wpostcode"+x+"]").val() ==''||$("input[name=Wstate"+x+"]").val() ==''){
						return false;
					}
					if($("input[name=Wcountry"+x+"]").val() ==''||$("input[name=Wemail"+x+"]").val() ==''||$("input[name=Wwebaddress"+x+"]").val() ==''||$("input[name=Number-worked-hours"+x+"]").val() ==''){
						return false;
					}
				}
				
			}
		}else { return true;}
		
		if($('.down4:visible').length !== 0){
			if($("select[name=Udegree]").val() ==''){$("select[name=Udegree]").addClass("focuscss");}else{$("select[name=Udegree]").removeClass("focuscss");}
			if($("select[name=Undergraduate-university-name]").val() ==''){$("select[name=Undergraduate-university-name]").addClass("focuscss");}else{$("select[name=Undergraduate-university-name]").removeClass("focuscss");}
			if($("input[name=Undergraduate-university-name-other]").length!== 0){
				if($("input[name=Undergraduate-university-name-other]").val() ==''){$("input[name=Undergraduate-university-name-other]").addClass("focuscss");}else{$("input[name=Undergraduate-university-name-other]").removeClass("focuscss");}
			}
			if($("input[name=Ugraduate-country]").val() ==''){$("input[name=Ugraduate-country").addClass("focuscss");}else{$("input[name=Ugraduate-country").removeClass("focuscss");}
			if($("select[name=Ugraduate-year-attained]").val() ==''){$("select[name=Ugraduate-year-attained]").addClass("focuscss");}else{$("select[name=Ugraduate-year-attained]").removeClass("focuscss");}
		    if($("select[name=Udegree]").val() ==''||$("select[name=Undergraduate-university-name]").val() ==''||$("input[name=Ugraduate-country]").val() ==''||$("select[name=Ugraduate-year-attained]").val() ==''){
				return false;
		    }
			if(!$("input[name=Undergraduate-university-name-other]").hasClass("display-none")){
				if($("input[name=Undergraduate-university-name-other]").val() =='') { return false;}
			}
		}
		if($('.down5:visible').length !== 0){
		   	if(!$("#insuranceMore").hasClass("display-none")){
				if($("input[name=Yearclaim]").val() =='') {$("input[name=Yearclaim]").addClass("focuscss");}else{$("input[name=Yearclaim]").removeClass("focuscss");}
				if($("input[name=Nameclaim]").val() =='') {$("input[name=Nameclaim]").addClass("focuscss");}else{$("input[name=Nameclaim]").removeClass("focuscss");}
				if($("input[name=Fulldescription]").val() =='') {$("input[name=Fulldescription]").addClass("focuscss");}else{$("input[name=Fulldescription]").removeClass("focuscss");}
				if($("input[name=Amountpaid]").val() =='') {$("input[name=Amountpaid]").addClass("focuscss");}else{$("input[name=Amountpaid]").removeClass("focuscss");}
				if($("input[name=Finalisedclaim]").val() =='') {$("input[name=Finalisedclaim]").addClass("focuscss");}else{$("input[name=Finalisedclaim]").removeClass("focuscss");}
				if($("input[name=Businiessname]").val() =='') {$("input[name=Businiessname]").addClass("focuscss");}else{$("input[name=Businiessname]").removeClass("focuscss");}
			}
			if($("input[name=conditions]").val() !=='1'){$("label[for=conditions]").addClass("focuscss");return false;}else{$("label[for=conditions]").removeClass("focuscss");}
			if(!$("#insuranceMore").hasClass("display-none")){
				if($("input[name=Yearclaim]").val() =='') { return false;}
				if($("input[name=Nameclaim]").val() =='') { return false;}
				if($("input[name=Fulldescription]").val() =='') { return false;}
				if($("input[name=Amountpaid]").val() =='') { return false;}
				if($("input[name=Finalisedclaim]").val() =='') { return false;}
				if($("input[name=Businiessname]").val() =='') { return false;}
				
			}
		}
		if($('.down7:visible').length !== 0){
		   	if(!$("#anothercardBlock").hasClass("display-none")){
				if($("select[name=Cardtype]").val() =='') {$("select[name=Cardtype]").addClass("focuscss");}else{$("select[name=Cardtype]").removeClass("focuscss");}
				if($("input[name=Cardname]").val() =='') {$("input[name=Cardname").addClass("focuscss");}else{$("input[name=Cardname").removeClass("focuscss");}
				if($("input[name=Cardnumber]").val() =='') {$("input[name=Cardnumber").addClass("focuscss");}else{$("input[name=Cardnumber").removeClass("focuscss");}
				if($("input[name=Expirydate]").val() =='') {$("input[name=Expirydate").addClass("focuscss");}else{$("input[name=Expirydate").removeClass("focuscss");}
				if($("input[name=CCV]").val() =='') {$("input[name=CCV").addClass("focuscss");}else{$("input[name=CCV").removeClass("focuscss");}
			}
			if(!$("#anothercardBlock").hasClass("display-none")){
				if($("select[name=Cardtype]").val() =='') { return false;}
				if($("input[name=Cardname]").val() =='') { return false;}
				if($("input[name=Cardnumber]").val() =='') { return false;}
				if($("input[name=Expirydate]").val() =='') { return false;}
				if($("input[name=CCV]").val() =='') { return false;}
			}
		}
		if($('.down13:visible').length !== 0){
		   	if($("input[name=Shipping-PObox]").val() ==''){
				if($("input[name=Shipping-Address_Line_1]").val() ==''){$("input[name=Shipping-Address_Line_1]").addClass("focuscss");}else{$("input[name=Shipping-Address_Line_1]").removeClass("focuscss");}
			}
			if($("input[name=Shipping-city-town]").val() ==''){$("input[name=Shipping-city-town]").addClass("focuscss");}else{$("input[name=Shipping-city-town]").removeClass("focuscss");}
			if($("input[name=Shipping-postcode]").val() ==''){$("input[name=Shipping-postcode]").addClass("focuscss");}else{$("input[name=Shipping-postcode]").removeClass("focuscss");}
			if($("select[name=Shipping-State]").val() ==''){$("select[name=Shipping-State]").addClass("focuscss");}else{$("select[name=Shipping-State]").removeClass("focuscss");}
			if($("input[name=Shipping-country]").val() ==''){$("input[name=Shipping-country]").addClass("focuscss");}else{$("input[name=Shipping-country]").removeClass("focuscss");}
			if($("input[name=Shipping-PObox]").val() ==''){
				if($("input[name=Shipping-Address_Line_1]").val() ==''){
					return false;	
				}
			}
			if($("select[name=Shipping-State]").val() ==''){
				return false;
			}
			if($("input[name=Shipping-country]").val() ==''||$("input[name=Shipping-postcode]").val() ==''||$("input[name=Shipping-city-town]").val() ==''){
				return false;
			}
			if($("input[name=Mailing-PObox]").val() ==''){
				if($("input[name=Mailing-Address_Line_1]").val() ==''){$("input[name=Mailing-Address_Line_1]").addClass("focuscss");}else{$("input[name=Mailing-Address_Line_1]").removeClass("focuscss");}
			}
			if($("input[name=Mailing-city-town]").val() ==''){$("input[name=Mailing-city-town]").addClass("focuscss");}else{$("input[name=Mailing-city-town]").removeClass("focuscss");}
			if($("input[name=Mailing-postcode]").val() ==''){$("input[name=Mailing-postcode]").addClass("focuscss");}else{$("input[name=Mailing-postcode]").removeClass("focuscss");}
			if($("select[name=Mailing-State]").val() ==''){$("select[name=Mailing-State]").addClass("focuscss");}else{$("select[name=Mailing-State]").removeClass("focuscss");}
			if($("input[name=Mailing-country]").val() ==''){$("input[name=Mailing-country]").addClass("focuscss");}else{$("input[name=Mailing-country]").removeClass("focuscss");}
			if($("input[name=Mailing-PObox]").val() ==''){
				if($("input[name=Mailing-Address_Line_1]").val() ==''){
					return false;	
				}
			}
			if($("select[name=Mailing-State]").val() ==''){
				return false;
			}
			if($("input[name=Mailing-country]").val() ==''||$("input[name=Mailing-postcode]").val() ==''||$("input[name=Mailing-city-town]").val() ==''){
				return false;
			}
		}
				
	};
	var checkInsurance = function (memberType){
    if(memberType=="9960"||memberType=="9961"||memberType=="9991"||memberType=="9992"||memberType=="9968"||memberType=="9997"||memberType=="10005"||memberType=="9967"||memberType=="10006"){
		return false;
	}
	else{return true;}
	};
	if(checkInsurance($('#MemberType').val())==false){
			$('#insuranceTag').val("0");	
		}
		else{ $('#insuranceTag').val("1");}
	$('#MemberType').change(function(){
		if(checkInsurance($('#MemberType').val())==false){
			$('#insuranceTag').val("0");	
		}
		else{ $('#insuranceTag').val("1");}
		
	});
	$('[class^=join-details-button]').click(function(){
		if(validateFun()==false){alert("please fill out all required fields *");return false;} 
        var i = Number($(this).attr("class").replace('join-details-button', ''));
		var x = Number(i + 1);
	    if(x==3){ $('#dashboard-right-content').addClass("autoscroll");}
	    $('[class^=down]:not(.down'+x+')').slideUp(400);
	    if((x==5) && ($('#insuranceTag').val()=="0")){ $('.down6').slideToggle(450); }
		else{$('.down' + x).slideToggle(450);}
		$('[class^=tabtitle]:not(.tabtitle'+x+') span').removeClass("text-underline");
		$('[class^=event]:not(.event'+x+') span').removeClass("text-underline");
		if((x==5) && ($('#insuranceTag').val()=="0")){var eventtitle = "eventtitle6";}
		else{var eventtitle = "eventtitle"+x;}
		$("span." + eventtitle).addClass("text-underline");
	});
	
	$('[class^=your-details-prevbutton]').click(function(){
		
        var i = Number($(this).attr("class").replace('your-details-prevbutton', ''));
		var x = Number(i - 1);
		if(x==3){ $('#dashboard-right-content').addClass("autoscroll");}
		//if(x==5){ $('#insuranceBlock').load("sites/all/themes/evolve/inc/jointheAPA/jointheAPA-insurance.inc.php", {"goI":"1"});
		        //$('#insuranceBlockRN').load("sites/all/themes/evolve/inc/renewMyMembership/renew-insurance.inc.php", {"goI":"1"});
		//}
        //if(x==5){ $.post(window.location, {goI:"1"},function(data){console.log('successfully posted data! response body: ' + data);});}
		if(x==5){ $('#tempform').submit();}
		if(x==7){ $('#pform').submit();}
	    $('[class^=down]:not(.down'+x+')').slideUp(400);
	    $('.down' + x).slideToggle(450);
		$('[class^=tabtitle]:not(.tabtitle'+x+') span').removeClass("text-underline");
		$('[class^=event]:not(.event'+x+') span').removeClass("text-underline");
		var eventtitle = "eventtitle"+x;
		$("span." + eventtitle).addClass("text-underline");
        		
	});
	
	
});