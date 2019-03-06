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
			//if($("input[name=Birth]").val() ==''){$("input[name=Birth]").addClass("focuscss");}else{$("input[name=Birth]").removeClass("focuscss");}
			//if($("select[name=Gender]").val() ==''){$("select[name=Gender]").addClass("focuscss");}else{$("select[name=Gender]").removeClass("focuscss");}
			if($("select[name=birthdate]").val() ==''){$("select[name=birthdate]").addClass("focuscss");}else{$("select[name=birthdate]").removeClass("focuscss");}
			if($("select[name=birthmonth]").val() ==''){$("select[name=birthmonth]").addClass("focuscss");}else{$("select[name=birthmonth]").removeClass("focuscss");}
			if($("select[name=birthyear]").val() ==''){$("select[name=birthyear]").addClass("focuscss");}else{$("select[name=birthyear]").removeClass("focuscss");}
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
			if($("select[name=Country]").val()=="Australia"){if($("select[name=State]").val() ==''){$("select[name=State]").addClass("focuscss");}else{$("select[name=State]").removeClass("focuscss");}}
			if($("input[name=Country]").val() ==''){$("input[name=Country]").addClass("focuscss");}else{$("input[name=Country]").removeClass("focuscss");}
			if(!$("#Shipping-address-join").is(":checked")){
				if($("input[name=Billing-Pobox]").val() ==''){
						if($("input[name=Billing-Address_Line_1]").val() ==''){$("input[name=Billing-Address_Line_1]").addClass("focuscss");}else{$("input[name=Billing-Address_Line_1]").removeClass("focuscss");}
				}
				//if($("input[name=Billing-Address_Line_1]").val() ==''){$("input[name=Billing-Address_Line_1]").addClass("focuscss");}else{$("input[name=Billing-Address_Line_1]").removeClass("focuscss");}
				//if($("input[name=Billing-Address_Line_2]").val() ==''){$("input[name=Billing-Address_Line_2]").addClass("focuscss");}else{$("input[name=Billing-Address_Line_2]").removeClass("focuscss");}
				if($("input[name=Billing-Suburb]").val() ==''){$("input[name=Billing-Suburb]").addClass("focuscss");}else{$("input[name=Billing-Suburb]").removeClass("focuscss");}
				if($("input[name=Billing-Postcode]").val() ==''){$("input[name=Billing-Postcode]").addClass("focuscss");}else{$("input[name=Billing-Postcode]").removeClass("focuscss");}
				//if($("select[name=Billing-State]").val() ==''){$("select[name=Billing-State]").addClass("focuscss");}else{$("select[name=Billing-State]").removeClass("focuscss");}
				if($("input[name=Billing-Country]").val() ==''){$("input[name=Billing-Country]").addClass("focuscss");}else{$("input[name=Billing-Country]").removeClass("focuscss");}
			}
			if($("input[name=Firstname]").val() ==''||$("input[name=Lastname]").val() ==''){
				return false;
			}
			if($("select[name=birthdate]").val() ==''||$("select[name=birthmonth]").val() ==''||$("select[name=birthyear]").val() ==''||$("select[name=Aboriginal]").val() ==''){
				return false;
			}
			if($("input[name=phone-number]").val() =='' && $("input[name=Mobile-number]").val() ==''){ return false; }
			if($("input[name=Pobox]").val() ==''){
				if($("input[name=Address_Line_1]").val() ==''){
					return false;	
				}
			}
			if($("select[name=Country]").val()=="Australia"){	
				if($("select[name=State]").val() ==''){
					return false;
				}
			}
			if($("input[name=Country]").val() ==''||$("input[name=Postcode]").val() ==''||$("input[name=Suburb]").val() ==''){
				return false;
			}
			if(!$("#Shipping-address-join").is(":checked")){
				if($("input[name=Billing-Pobox]").val() ==''){
					if($("input[name=Billing-Address_Line_1]").val() ==''){
						return false;
					}
				}
				
				if($("input[name=Billing-Country").val() ==''||$("input[name=Billing-Postcode]").val() ==''||$("input[name=Billing-Suburb]").val() ==''){
					return false;
				}
			}
		}
		if($('.down2:visible').length !== 0){
			if($("input[name=Memberid]").val() ==''){$("input[name=Memberid]").addClass("focuscss");}else{$("input[name=Memberid]").removeClass("focuscss");}
			if($("input[name=CMemberid]").val() ==''){$("input[name=CMemberid]").addClass("focuscss");}else{$("input[name=CMemberid]").removeClass("focuscss");}
			if ($("input[name=Memberid]").val() !=='') {if(!isValidEmailAddress($("input[name=Memberid]").val())) {$("input[name=Memberid]").addClass("focuscss");$('#validateMessage').html("this email address is not valid");}else{$("input[name=Memberid]").removeClass("focuscss"); $('#validateMessage').html("");}}
			if ($("input[name=CMemberid]").val() !==''){if(!isValidEmailAddress($("input[name=CMemberid]").val())) {$("input[name=CMemberid]").addClass("focuscss");$('#confirmMessage').html("this email address is not valid");}else{$("input[name=CMemberid]").removeClass("focuscss"); $('#confirmMessage').html("");}}
			if($("input[name=Password]").length !==0){
				if($("input[name=Password]").val() ==''){$("input[name=Password]").addClass("focuscss");}else{$("input[name=Password]").removeClass("focuscss");}
			}
			if($("input[name=newPassword]").length !==0){
				if($("input[name=newPassword]").val() ==''){$("input[name=newPassword]").addClass("focuscss");}else{$("input[name=newPassword]").removeClass("focuscss");}
			}
			if($("select[name=MemberType]").val() ===''){$("select[name=MemberType]").addClass("focuscss");}else{$("select[name=MemberType]").removeClass("focuscss");}
			//if($("select[name=Branch]").val() ===''){$("select[name=Branch]").addClass("focuscss");}else{$("select[name=Branch]").removeClass("focuscss");}
		    if($("input[name=Memberid]").val() =='' || !isValidEmailAddress($("input[name=Memberid]").val()) || $("input[name=CMemberid]").val() =='' ||$("select[name=MemberType]").val() ===''){
				return false;
		    }
			if($("input[name=Password]").length !==0) {
				if($("input[name=Password]").val() =='') { return false;}
			}
			if($("input[name=newPassword]").length !==0) {
				if($("input[name=newPassword]").val() =='') { return false;}
			}
		}
		if($('select[name=MemberType]').val()!=="9964" && $('select[name=MemberType]').val()!=="9965" && $('select[name=MemberType]').val()!=="10004"&& $('select[name=MemberType]').val()!=="9966"&& $('select[name=MemberType]').val()!=="9967"&& $('select[name=MemberType]').val()!=="9968"&& $('select[name=MemberType]').val()!=="9997"&& $('select[name=MemberType]').val()!=="9967"){
			if($('.down3:visible').length !== 0){
				var i = $("input[name=wpnumber]").val();
				var n = $("input[name=maxumnumber]").val();
				if(i!=0){
				for (x = 0; x<=n;x++){
					if($("#workplace"+x).length !== 0){
						if($("input[name=Name-of-workplace"+x+"]").val() ==''){$("input[name=Name-of-workplace"+x+"]").addClass("focuscss");}else{$("input[name=Name-of-workplace"+x+"]").removeClass("focuscss");}
						if($("select[name=Workplace-setting"+x+"]").val() ==''){$("select[name=Workplace-setting"+x+"]").addClass("focuscss");}else{$("select[name=Workplace-setting"+x+"]").removeClass("focuscss");}
						if($("input[name=WAddress_Line_1"+x+"]").val() ==''){$("input[name=WAddress_Line_1"+x+"]").addClass("focuscss");}else{$("input[name=WAddress_Line_1"+x+"]").removeClass("focuscss");}
						if($("input[name=Wcity"+x+"]").val() ==''){$("input[name=Wcity"+x+"]").addClass("focuscss");}else{$("input[name=Wcity"+x+"]").removeClass("focuscss");}
						if($("input[name=Wpostcode"+x+"]").val() ==''){$("input[name=Wpostcode"+x+"]").addClass("focuscss");}else{$("input[name=Wpostcode"+x+"]").removeClass("focuscss");}
						if($("input[name=Wphone"+x+"]").val() ==''){$("input[name=Wphone"+x+"]").addClass("focuscss");}else{$("input[name=Wphone"+x+"]").removeClass("focuscss");}
						if($("input[name=Wcountry"+x+"]").val() ==''){$("input[name=Wcountry"+x+"]").addClass("focuscss");}else{$("input[name=Wcountry"+x+"]").removeClass("focuscss");}
						//if($("input[name=Wemail"+x+"]").val() ==''){$("input[name=Wemail"+x+"]").addClass("focuscss");}else{$("input[name=Wemail"+x+"]").removeClass("focuscss");}
						if($("input[name=Wemail"+x+"]").val()!="") {if (!isValidEmailAddress($("input[name=Wemail"+x+"]").val())) {$("input[name=Wemail"+x+"]").addClass("focuscss");$("#EmailMessage"+x).html("this email address is not valid");}else{$("input[name=Wemail"+x+"]").removeClass("focuscss"); $("#EmailMessage"+x).html("");}}
						//if($("input[name=Wwebaddress"+x+"]").val() ==''){$("input[name=Wwebaddress"+x+"]").addClass("focuscss");}else{$("input[name=Wwebaddress"+x+"]").removeClass("focuscss");}
						if($("select[name=Number-worked-hours"+x+"]").val() ==''){$("select[name=Number-worked-hours"+x+"]").addClass("focuscss");}else{$("select[name=Number-worked-hours"+x+"]").removeClass("focuscss");}
					}
				}
							
				for (x = 0; x<=n;x++){
				if($("#workplace"+x).length !== 0){	
					if($("input[name=Name-of-workplace"+x+"]").val() =='' || $("select[name=Workplace-setting"+x+"]").val() =='' ){
						
						return false;
					}
					if($("input[name=Wcity"+x+"]").val() ==''||$("input[name=Wpostcode"+x+"]").val() =='' ||$("input[name=WAddress_Line_1"+x+"]").val() =='' ||$("input[name=Wphone"+x+"]").val() ==''){
						
						return false;
					}
					if($("input[name=Wemail"+x+"]").val()!="") {if (!isValidEmailAddress($("input[name=Wemail"+x+"]").val())) { return false; }}
					if($("input[name=Wcountry"+x+"]").val() ==''||$("select[name=Number-worked-hours"+x+"]").val() ==''){
						return false;
					}
				}
				}
			}	
			}
		}
		
		if($('.down4:visible').length !== 0){
			var num = $("input[name=addtionalNumber]").val();
			if(num!=0){
				for (t = 0; t<num;t++){
					if($("select[name=Udegree"+t+"]").val() ==''){$("select[name=Udegree"+t+"]").addClass("focuscss");}else{$("select[name=Udegree]").removeClass("focuscss");}
					if($("select[name=Undergraduate-university-name"+t+"]").val() ==''){$("select[name=Undergraduate-university-name"+t+"]").addClass("focuscss");}else{$("select[name=Undergraduate-university-name"+t+"]").removeClass("focuscss");}
					if($("input[name=Undergraduate-university-name-other"+t+"]").length!== 0){
						if($("input[name=Undergraduate-university-name-other"+t+"]").val() ==''){$("input[name=Undergraduate-university-name-other"+t+"]").addClass("focuscss");}else{$("input[name=Undergraduate-university-name-other"+t+"]").removeClass("focuscss");}
					}
					if($("input[name=Ugraduate-country"+t+"]").val() ==''){$("input[name=Ugraduate-country"+t+"").addClass("focuscss");}else{$("input[name=Ugraduate-country"+t+"").removeClass("focuscss");}
					if($("select[name=Ugraduate-yearattained"+t+"]").val() ==''){$("select[name=Ugraduate-yearattained"+t+"]").addClass("focuscss");}else{$("select[name=Ugraduate-year-attained"+t+"]").removeClass("focuscss");}
					if($("select[name=Udegree"+t+"]").val() ==''||$("select[name=Undergraduate-university-name"+t+"]").val() ==''||$("input[name=Ugraduate-country"+t+"]").val() ==''||$("select[name=Ugraduate-yearattained"+t+"]").val() ==''){
						return false;
					}
					if(!$("input[name=Undergraduate-university-name-other"+t+"]").hasClass("display-none")){
						if($("input[name=Undergraduate-university-name-other"+t+"]").val() =='') { return false;}
					}
				}
			}
		}
		if($('.down5:visible').length !== 0){
		   	if(!$("#insuranceMore").hasClass("display-none")){
				if($("input[name=Yearclaim]").val() =='') {$("input[name=Yearclaim]").addClass("focuscss");}else{$("input[name=Yearclaim]").removeClass("focuscss");}
				if($("input[name=Nameclaim]").val() =='') {$("input[name=Nameclaim]").addClass("focuscss");}else{$("input[name=Nameclaim]").removeClass("focuscss");}
				if($("input[name=Fulldescription]").val() =='') {$("input[name=Fulldescription]").addClass("focuscss");}else{$("input[name=Fulldescription]").removeClass("focuscss");}
				if($("input[name=Amountpaid]").val() =='') {$("input[name=Amountpaid]").addClass("focuscss");}else{$("input[name=Amountpaid]").removeClass("focuscss");}
				if($("input[name=Finalisedclaim]").val() =='') {$("input[name=Finalisedclaim]").addClass("focuscss");}else{$("input[name=Finalisedclaim]").removeClass("focuscss");}
				//if($("input[name=Businiessname]").val() =='') {$("input[name=Businiessname]").addClass("focuscss");}else{$("input[name=Businiessname]").removeClass("focuscss");}
			}
			if($("input[name=conditions]").val() !=='1'){$("label[for=conditions]").addClass("focuscss");return false;}else{$("label[for=conditions]").removeClass("focuscss");}
			if(!$("#insuranceMore").hasClass("display-none")){
				if($("input[name=Yearclaim]").val() =='') { return false;}
				if($("input[name=Nameclaim]").val() =='') { return false;}
				if($("input[name=Fulldescription]").val() =='') { return false;}
				if($("input[name=Amountpaid]").val() =='') { return false;}
				if($("input[name=Finalisedclaim]").val() =='') { return false;}
				//if($("input[name=Businiessname]").val() =='') { return false;}
				
			}
		}
		if($('.down6:visible').length !== 0){
			if($("#jprivacy-policy").val() !=='1'){$("label[for=jprivacy-policy]").addClass("focuscss");return false;}else{$("label[for=jprivacy-policy]").removeClass("focuscss");}
			//if(!$("#rolloverblock").hasClass("display-none")){
			//	if($("#instalmentpolicy").val() !=='1'){$("label[for=instalmentpolicy]").addClass("focuscss");return false;}else{$("label[for=instalmentpolicy]").removeClass("focuscss");}
		   	//}
			if($("#anothercardBlock").is(":visible")){
				if($("select[name=Cardtype]").val() =='') {$("select[name=Cardtype]").addClass("focuscss");}else{$("select[name=Cardtype]").removeClass("focuscss");}
				if($("input[name=Cardname]").val() =='') {$("input[name=Cardname").addClass("focuscss");}else{$("input[name=Cardname").removeClass("focuscss");}
				if($("input[name=Cardnumber]").val() =='') {$("input[name=Cardnumber").addClass("focuscss");}else{$("input[name=Cardnumber").removeClass("focuscss");}
				if($("input[name=Expirydate]").val() =='') {$("input[name=Expirydate").addClass("focuscss");}else{$("input[name=Expirydate").removeClass("focuscss");}
				if($("input[name=CCV]").val() =='') {$("input[name=CCV").addClass("focuscss");}else{$("input[name=CCV").removeClass("focuscss");}
			}
			if($("#anothercardBlock").is(":visible")){
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
			//if($("select[name=Shipping-State]").val() ==''){$("select[name=Shipping-State]").addClass("focuscss");}else{$("select[name=Shipping-State]").removeClass("focuscss");}
			if($("input[name=Shipping-country]").val() ==''){$("input[name=Shipping-country]").addClass("focuscss");}else{$("input[name=Shipping-country]").removeClass("focuscss");}
			if($("input[name=Shipping-PObox]").val() ==''){
				if($("input[name=Shipping-Address_Line_1]").val() ==''){
					return false;	
				}
			}
			//if($("select[name=Shipping-State]").val() ==''){
				//return false;
			//}
			if($("input[name=Shipping-country]").val() ==''||$("input[name=Shipping-postcode]").val() ==''||$("input[name=Shipping-city-town]").val() ==''){
				return false;
			}
			if($("input[name=Mailing-PObox]").val() ==''){
				if($("input[name=Mailing-Address_Line_1]").val() ==''){$("input[name=Mailing-Address_Line_1]").addClass("focuscss");}else{$("input[name=Mailing-Address_Line_1]").removeClass("focuscss");}
			}
			if($("input[name=Mailing-city-town]").val() ==''){$("input[name=Mailing-city-town]").addClass("focuscss");}else{$("input[name=Mailing-city-town]").removeClass("focuscss");}
			if($("input[name=Mailing-postcode]").val() ==''){$("input[name=Mailing-postcode]").addClass("focuscss");}else{$("input[name=Mailing-postcode]").removeClass("focuscss");}
			//if($("select[name=Mailing-State]").val() ==''){$("select[name=Mailing-State]").addClass("focuscss");}else{$("select[name=Mailing-State]").removeClass("focuscss");}
			if($("input[name=Mailing-country]").val() ==''){$("input[name=Mailing-country]").addClass("focuscss");}else{$("input[name=Mailing-country]").removeClass("focuscss");}
			if($("input[name=Mailing-PObox]").val() ==''){
				if($("input[name=Mailing-Address_Line_1]").val() ==''){
					return false;	
				}
			}
			//if($("select[name=Mailing-State]").val() ==''){
				//return false;
			//}
			if($("input[name=Mailing-country]").val() ==''||$("input[name=Mailing-postcode]").val() ==''||$("input[name=Mailing-city-town]").val() ==''){
				return false;
			}
		}
		
		if($('.down20:visible').length !== 0){
			if($(".down20 input[name=Firstname]").val() ==''){
				$(".down20 input[name=Firstname]").addClass("focuscss");
			} else{
				$(".down20 input[name=Firstname]").removeClass("focuscss");
			}
			if($(".down20 input[name=Lastname]").val() ==''){$(".down20 input[name=Lastname]").addClass("focuscss");} else{$(".down20 input[name=Lastname]").removeClass("focuscss");}
			
			if($(".down20 select[name=State]").val() ==''){$(".down20 select[name=State]").addClass("focuscss");}else{$(".down20 select[name=State]").removeClass("focuscss");}
			if($(".down20 input[name=Pobox]").val() ==''){
				if($(".down20 input[name=Address_Line_1]").val() ==''){$(".down20 input[name=Address_Line_1]").addClass("focuscss");}else{$(".down20 input[name=Address_Line_1]").removeClass("focuscss");}
			}
			if($(".down20 input[name=Suburb]").val() ==''){$(".down20 input[name=Suburb]").addClass("focuscss");}else{$(".down20 input[name=Suburb]").removeClass("focuscss");}
			if($(".down20 input[name=Postcode]").val() ==''){$(".down20 input[name=Postcode]").addClass("focuscss");}else{$(".down20 input[name=Postcode]").removeClass("focuscss");}
			if($(".down20 input[name=Country]").val() ==''){$(".down20 input[name=Country]").addClass("focuscss");}else{$(".down20 input[name=Country]").removeClass("focuscss");}
			if(!$("#Shipping-address-join").is(":checked")){
				if($(".down20 input[name=Billing-Pobox]").val() ==''){
						if($(".down20 input[name=Billing-Address_Line_1]").val() ==''){$(".down20 input[name=Billing-Address_Line_1]").addClass("focuscss");}else{$(".down20 input[name=Billing-Address_Line_1]").removeClass("focuscss");}
				}
				if($(".down20 input[name=Billing-Suburb]").val() ==''){$(".down20 input[name=Billing-Suburb]").addClass("focuscss");}else{$(".down20 input[name=Billing-Suburb]").removeClass("focuscss");}
				if($(".down20 input[name=Billing-Postcode]").val() ==''){$(".down20 input[name=Billing-Postcode]").addClass("focuscss");}else{$(".down20 input[name=Billing-Postcode]").removeClass("focuscss");}
				if($(".down20 select[name=Billing-State]").val() ==''){$(".down20 select[name=Billing-State]").addClass("focuscss");}else{$(".down20 select[name=Billing-State]").removeClass("focuscss");}
				if($(".down20 input[name=Billing-Country]").val() ==''){$(".down20 input[name=Billing-Country]").addClass("focuscss");}else{$(".down20 input[name=Billing-Country]").removeClass("focuscss");}
			}
			if($(".down20 input[name=Firstname]").val() ==''||$(".down20 input[name=Lastname]").val() ==''){
				return false;
			}
			if($(".down20 input[name=Pobox]").val() ==''){
				if($(".down20 input[name=Address_Line_1]").val() ==''){
					return false;	
				}
			}
			if($(".down20 input[name=Country]").val() ==''||$(".down20 input[name=Postcode]").val() ==''||$(".down20 input[name=Suburb]").val() ==''){
				return false;
			}
			if(!$(".down20 #Shipping-address-join").is(":checked")){
				if($(".down20 input[name=Billing-Pobox]").val() ==''){
					if($(".down20 input[name=Billing-Address_Line_1]").val() ==''){
						return false;
					}
				}
				
				if($(".down20 input[name=Billing-Country").val() ==''||$(".down20 input[name=Billing-Postcode]").val() ==''||$(".down20 input[name=Billing-Suburb]").val() ==''){
					return false;
				}
			}
		}
		if($('.down22:visible').length !== 0){
			if($("input[name=phone-number]").val() ==''){ $("input[name=phone-number]").addClass("focuscss"); }else{ $("input[name=phone-number]").removeClass("focuscss");}
			if($(".down22 #Registrationboard").val() !=='1'){$(".down22 label[for=Registrationboard]").addClass("focuscss");}else{$(".down22 label[for=Registrationboard]").removeClass("focuscss");}
			if($('.down22 #Professional-insurance').length!=0) {if($(".down22 #Professional-insurance").val() !=='1'){$(".down22 label[for=Professional-insurance]").addClass("focuscss");}else{$(".down22 label[for=Professional-insurance]").removeClass("focuscss");}}
			if($(".down22 #Professionalbody").val() !=='1'){$(".down22 label[for=Professionalbody]").addClass("focuscss");}else{$(".down22 label[for=Professionalbody]").removeClass("focuscss");}
			if($(".down22 #jprivacy-policy").val() !=='1'){$(".down22 label[for=jprivacy-policy]").addClass("focuscss");}else{$(".down22 label[for=jprivacy-policy]").removeClass("focuscss");}
		}
	};

	function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
	}
	var checkInsurance = function (memberType){
    if(memberType=="9960"||memberType=="9961"||memberType=="9968"||memberType=="9997"||memberType=="9965"||memberType=="9964"||memberType=="10006"||memberType=="10005"||memberType=="9966"||memberType=="9967"){
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
		
		if(validateFun()==false){
			$('.overlay').fadeOut();
			$('#insurancePopUp').fadeOut();
			alert("please fill out all required fields *");return false;} 
        var i = Number($(this).attr("class").replace('join-details-button', ''));
		var x = Number(i + 1);
		
	    //if(x==3){ $('#dashboard-right-content').addClass("autoscroll");}
		$('[class^=down]:not(.down'+x+')').slideUp(0);
		if(x==3){
			if($('select[name=MemberType]').val()=="9964" || $('select[name=MemberType]').val()=="9965"){
				$('.down3').slideUp(200);
				$('.down4').slideToggle(200);
				$("span.eventtitle4").addClass("text-underline");
				$("span:not(.eventtitle4)").removeClass("text-underline");
				return;
			}
		}
	    if((x==5) && ($('#insuranceTag').val()=="0")){ $('.down6').slideToggle(200); }
		else{$('.down' + x).slideToggle(200);}
		
		$('[class^=tabtitle]:not(.tabtitle'+x+') span').removeClass("text-underline");
		$('[class^=event]:not(.event'+x+') span').removeClass("text-underline");
		if((x==5) && ($('#insuranceTag').val()=="0")){var eventtitle = "eventtitle6";}
		else{var eventtitle = "eventtitle"+x;}
		$("span." + eventtitle).addClass("text-underline");
	});
    $(document).on("click", ".skip",function(){
		var n = Number($('#wpnumber').val());
		var t = Number(n -1);
	    $('input[name=wpnumber]').val(t);
		$('.down3').slideUp(200);
		$('.down4').slideToggle(200);
		$('.tabtitle3 span').removeClass("text-underline");
		$('.tabtitle4 span').addClass("text-underline");
		
	});
	$('.your-details-prevbutton4').click(function(){
		if($('input[name=wpnumber]').val() == "0"){
			$('input[name=wpnumber]').val("1"); 
		}
	});
	$('#PDPlaceOrder').click(function(){
		if($('#checkTerm').val() == "1"){
			if($('#accept1').val()!="1")  {$('#pd_terms_open').addClass("focuscss");alert("please fill out all required fields *");return false;}
			if($('#accept2').length!=0) {if($('#accept2').val()!="1")  {$('#accept2label').addClass("focuscss");alert("please fill out all required fields *");return false;}}
			if($('#accept3').val()!="1")  {$('#accept3label').addClass("focuscss");alert("please fill out all required fields *");return false;}
		}
	});
	$('.pd-register-submit').click(function(){
		if(validateFun()==false){alert("please fill out all required fields *");return false;}
		if ( $('.down22').find('.focuscss').length > 0 ){alert("please fill out all required fields *");return false;}
	});
	
	$('[class^=your-details-prevbutton]').click(function(){
		
        var i = Number($(this).attr("class").replace('your-details-prevbutton', ''));
		var x = Number(i - 1);
		//if(x==3){ $('#dashboard-right-content').addClass("autoscroll");}
		if(x==3){
			if($('select[name=MemberType]').val()=="9964" || $('select[name=MemberType]').val()=="9965"){
				$('.down4').slideUp(200);
				$('.down2').slideToggle(200);
				$("span.eventtitle2").addClass("text-underline");
				$("span:not(.eventtitle2)").removeClass("text-underline");
				return;
			}
		}
		//if(x==5){ $('#insuranceBlock').load("sites/all/themes/evolve/inc/jointheAPA/jointheAPA-insurance.inc.php", {"goI":"1"});
		        //$('#insuranceBlockRN').load("sites/all/themes/evolve/inc/renewMyMembership/renew-insurance.inc.php", {"goI":"1"});
		//}
        //if(x==5){ $.post(window.location, {goI:"1"},function(data){console.log('successfully posted data! response body: ' + data);});}
		if(x==5){ $('#tempform').submit();}
		if(x==7){ $('#pform').submit();}
	    $('[class^=down]:not(.down'+x+')').slideUp(200);
	    $('.down' + x).slideToggle(200);
		$('[class^=tabtitle]:not(.tabtitle'+x+') span').removeClass("text-underline");
		$('[class^=event]:not(.event'+x+') span').removeClass("text-underline");
		var eventtitle = "eventtitle"+x;
		$("span." + eventtitle).addClass("text-underline");
        		
	});
	
	
});