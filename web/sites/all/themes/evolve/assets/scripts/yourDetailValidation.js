(function($) {
    "use strict";
    $(document).ready(function() {
        //Tooltip
        $(".dtooltip").tooltip();
    });
})(this.jQuery);
jQuery(document).ready(function($) {
	var validateYourDetailFun = function(){
			//if($("select[name=Prefix]").val() =='' ){$("select[name=Prefix]").addClass("focuscss");} else{$("select[name=Prefix]").removeClass("focuscss");}
			if($("input[name=Firstname]").val() ==''){$("input[name=Firstname]").addClass("focuscss");} else{$("input[name=Firstname]").removeClass("focuscss");}
			if($("input[name=Lastname]").val() ==''){$("input[name=Lastname]").addClass("focuscss");} else{$("input[name=Lastname]").removeClass("focuscss");}
			if($("input[name=Birth]").val() ==''){$("input[name=Birth]").addClass("focuscss");}else{$("input[name=Birth]").removeClass("focuscss");}
			//if($("select[name=Gender]").val() ==''){$("select[name=Gender]").addClass("focuscss");}else{$("select[name=Gender]").removeClass("focuscss");}
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
			}
			if($("input[name=Suburb]").val() ==''){$("input[name=Suburb]").addClass("focuscss");}else{$("input[name=Suburb]").removeClass("focuscss");}
			if($("input[name=Postcode]").val() ==''){$("input[name=Postcode]").addClass("focuscss");}else{$("input[name=Postcode]").removeClass("focuscss");}
			if($("input[name=Country]").val() ==''){$("input[name=Country]").addClass("focuscss");}else{$("input[name=Country]").removeClass("focuscss");}
			if(!$("#Mailing-address").is(":checked")){
				if($("input[name=Mailing-PObox]").val() ==''){
						if($("input[name=Mailing-Address_Line_1]").val() ==''){$("input[name=Mailing-Address_Line_1]").addClass("focuscss");}else{$("input[name=Mailing-Address_Line_1]").removeClass("focuscss");}
				}
				if($("input[name=Mailing-city-town]").val() ==''){$("input[name=Mailing-city-town]").addClass("focuscss");}else{$("input[name=Mailing-city-town]").removeClass("focuscss");}
				if($("input[name=Mailing-postcode]").val() ==''){$("input[name=Mailing-postcode]").addClass("focuscss");}else{$("input[name=Mailing-postcode]").removeClass("focuscss");}
				if($("input[name=Mailing-Country]").val() ==''){$("input[name=Mailing-Country]").addClass("focuscss");}else{$("input[name=Mailing-Country]").removeClass("focuscss");}
			}
				   
			var i = $("input[name=wpnumber]").val();
			var n = $("input[name=maxumnumber]").val();
		if($('select[name=MemberType]').val()!=="31" && $('select[name=MemberType]').val()!=="32" && $('select[name=MemberType]').val()!=="33"&& $('select[name=MemberType]').val()!=="35"&& $('select[name=MemberType]').val()!=="36"&& $('select[name=MemberType]').val()!=="21"&& $('select[name=MemberType]').val()!=="22"&& $('select[name=MemberType]').val()!=="36"){
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
							
				
			}	
			
		}
		
		
		
			var num = $("input[name=addtionalNumber]").val();
			if(num!=0){
				for (t = 0; t<num;t++){
					if($("select[name=Udegree"+t+"]").val() ==''){$("select[name=Udegree"+t+"]").addClass("focuscss");}else{$("select[name=Udegree]").removeClass("focuscss");}
					if($("select[name=Undergraduate-university-name"+t+"]").val() ==''){$("select[name=Undergraduate-university-name"+t+"]").addClass("focuscss");}else{$("select[name=Undergraduate-university-name"+t+"]").removeClass("focuscss");}
					if($("input[name=Undergraduate-university-name-other"+t+"]").length!== 0){
						if($("input[name=Undergraduate-university-name-other"+t+"]").val() ==''){$("input[name=Undergraduate-university-name-other"+t+"]").addClass("focuscss");}else{$("input[name=Undergraduate-university-name-other"+t+"]").removeClass("focuscss");}
					}
					if($("input[name=Ugraduate-country"+t+"]").val() ==''){$("input[name=Ugraduate-country"+t+"").addClass("focuscss");}else{$("select[name=Ugraduate-country"+t+"").removeClass("focuscss");}
					if($("select[name=Ugraduate-yearattained"+t+"]").val() ==''){$("select[name=Ugraduate-yearattained"+t+"]").addClass("focuscss");}else{$("select[name=Ugraduate-year-attained"+t+"]").removeClass("focuscss");}
					
				}
			}
	
			if($("input[name=Firstname]").val() ==''||$("input[name=Lastname]").val() ==''){
				return false;
			}
			if($("input[name=Birth]").val() ==''||$("select[name=Aboriginal]").val() ==''){
				return false;
			}
			if($("input[name=phone-number]").val() =='' && $("input[name=Mobile-number]").val() ==''){ return false; }
			if($("input[name=Pobox]").val() ==''){
				if($("input[name=Address_Line_1]").val() ==''){
					return false;	
				}
			}
			//if($("select[name=State]").val() ==''){
				//return false;
			//}
			if($("input[name=Country]").val() ==''||$("input[name=Postcode]").val() ==''||$("input[name=Suburb]").val() ==''){
				return false;
			}
			if(!$("#Mailing-address").is(":checked")){
				if($("input[name=Mailing-PObox]").val() ==''){
					if($("input[name=Mailing-Address_Line_1]").val() ==''){
						return false;
					}
				}
				
				if($("input[name=Mailing-Country").val() ==''||$("input[name=Mailing-postcode]").val() ==''||$("input[name=Mailing-city-town]").val() ==''){
					return false;
				}
			}
			if($('select[name=MemberType]').val()!=="31" && $('select[name=MemberType]').val()!=="32" && $('select[name=MemberType]').val()!=="33"&& $('select[name=MemberType]').val()!=="35"&& $('select[name=MemberType]').val()!=="36"&& $('select[name=MemberType]').val()!=="21"&& $('select[name=MemberType]').val()!=="22"&& $('select[name=MemberType]').val()!=="36"){
				if(i!=0){
					for (x = 0; x<=n;x++){
						if($("#workplace"+x).length !== 0){	
							if($("input[name=Name-of-workplace"+x+"]").val() =='' || $("select[name=Workplace-setting"+x+"]").val() =='' ){
								
								return false;
							}
							if($("input[name=Wemail"+x+"]").val()!="") {if (!isValidEmailAddress($("input[name=Wemail"+x+"]").val())) { return false; }}
							if($("input[name=Wcity"+x+"]").val() ==''||$("input[name=Wpostcode"+x+"]").val() =='' ||$("input[name=WAddress_Line_1"+x+"]").val() =='' ||$("input[name=Wphone"+x+"]").val() ==''){
								
								return false;
							}
							
							if($("input[name=Wcountry"+x+"]").val() ==''||$("select[name=Number-worked-hours"+x+"]").val() ==''){
								return false;
							}
						}
					}
				}
			}
			
			if(num!=0){
				for (t = 0; t<num;t++){
					if($("select[name=Udegree"+t+"]").val() ==''||$("select[name=Undergraduate-university-name"+t+"]").val() ==''||$("select[name=Ugraduate-country"+t+"]").val() ==''||$("select[name=Ugraduate-year-attained"+t+"]").val() ==''){
						return false;
					}
					if(!$("input[name=Undergraduate-university-name-other"+t+"]").hasClass("display-none")){
						if($("input[name=Undergraduate-university-name-other"+t+"]").val() =='') { return false;}
					}
				}
			} else {
				// for students, education record is mandatory
				if($('select[name=MemberType]').val()=="31" || $('select[name=MemberType]').val()=="32") {
					return false;
				}
			}
	
	};

	function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
	}
    $('#your-details-submit-button').click(function(){
		if(validateYourDetailFun()==false){
			alert("please fill out all required fields *");
			$('html, body').animate({
				scrollTop: $('#dashboard-right-content').offset().top
			}, 600);
		
		var num = $("input[name=addtionalNumber]").val();
		// for students, education record is mandatory
		if($('select[name=MemberType]').val()=="31" || $('select[name=MemberType]').val()=="32") {
			if(num==0){
				$('.dashboard_detail .down4').addClass(".focuscss");
				$('.dashboard_detail li#yourdetail5').addClass("warning");
			}
		}
			
		if ($('.dashboard_detail .down1').find(".focuscss").length > 0){ 
			$('.dashboard_detail li#yourdetail1').addClass("warning");
		}
		if ($('.dashboard_detail .down2').find(".focuscss").length > 0){ 
			$('.dashboard_detail li#yourdetail2').addClass("warning");
		}
		if ($('.dashboard_detail .down13').find(".focuscss").length > 0){ 
			$('.dashboard_detail li#yourdetail3').addClass("warning");
		}
		if ($('.dashboard_detail .down3').find(".focuscss").length > 0){ 
			$('.dashboard_detail li#yourdetail4').addClass("warning");
		}
		if ($('.dashboard_detail .down4').find(".focuscss").length > 0){
			$('.dashboard_detail li#yourdetail5').addClass("warning");
		}

		$( "#workplaceblocks > div" ).each(function() {
			if ($(this).find(".focuscss").length > 0){ 
				x = $(this).attr('id').replace('workplace', '');
				$('#tabmenu li#workplaceli' + x).addClass("warning");
			}
   		 });
		return false;
		}
	});
	
});