jQuery(document).ready(function($) {
	var originM = $(".pd-description-nonmobile").html();
	var t = '';
	if(originM != null) {
		var texts = originM.split('\n');
		for(var i = 0;i < texts.length;i++){
			//code here using lines[i] which will give you each line
			//console.log('before: '+texts[i]);
			t += removeSpan(texts[i]);
			//console.log('after: '+t);
		}
	}
	$(".pd-description-nonmobile").html(t);
	
	
	var originN = $(".pd-description-nonmobile").html();
	var t = '';
	if(originN != null) {
		var texts = originN.split('\n');
		for(var i = 0;i < texts.length;i++){
			//code here using lines[i] which will give you each line
			//console.log('before: '+texts[i]);
			t += removeSpan(texts[i]);
			//console.log('after: '+t);
		}
	}
	$(".pd-description-nonmobile").html(t);
	
	var originN = $("#pd-search-results .flex-flow-row .excerpt").html();
	var t = '';
	if(originN != null) {
		var texts = originN.split('\n');
		for(var i = 0;i < texts.length;i++){
			//code here using lines[i] which will give you each line
			//console.log('before: '+texts[i]);
			t += removeSpan(texts[i]);
			//console.log('after: '+t);
		}
	}
	$("#pd-search-results .flex-flow-row .excerpt").html(t);
	
	function removeSpan(string) {
		var returnTxt = string;
		if(returnTxt.includes("span")) {
			var n = returnTxt.indexOf("span");
			var mx = returnTxt.length;
			if(returnTxt.charAt(n - 1) == '/') {
				// when it is end of span
				returnTxt = returnTxt.substring(0, n-2) + returnTxt.substring(n + 5, mx);
			} else {
				// when it is beginning of span
				var t = returnTxt.indexOf(">");
				if(n < t) {
					// if t is the index of closing span
					returnTxt = returnTxt.substring(0, n-1) + returnTxt.substring(t + 1, mx);
				} else {
					// remove and find next.
					var x = returnTxt.substring(n, mx);
					var f = x.indexOf(">");
					returnTxt = returnTxt.substring(0, n-1) + returnTxt.substring(f + n + 1, mx);
				}
			}
			return removeSpan(returnTxt);
		} else {
			return returnTxt;
		}
	}
	
	function removeStyle() {
		
	}
	
	function removeHeaders() {
		
	}
	
	function ChangeImages() {
		
	}
	
	$(".ShoppingCartBorder").click(function() {
		window.location = "/pd/pd-shopping-cart";		
	});
	
	/* Menu control */
	if(window.location.pathname.indexOf("/home/homeMain") == 0 || window.location.pathname.indexOf("aboutus/partners") == 0 || window.location.pathname.indexOf("advocacy/submission") == 0) {
		window.location.replace("/");
	}
	
	if(window.location.pathname.indexOf("/home") == 0) {
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.homenavicon').parent().addClass("active");
	}
	if(window.location.pathname.indexOf("/aboutus") == 0) {
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.aboutusnavicon').parent().addClass("active");
	}
	if(window.location.pathname.indexOf("/membership") == 0 || window.location.pathname.indexOf("/membership-question") == 0 || window.location.pathname.indexOf("/jointheapa") == 0 || window.location.pathname.indexOf("/renewmymembership") == 0 || window.location.pathname.indexOf("/dashboard") == 0 || window.location.pathname.indexOf("/your-details") == 0 || window.location.pathname.indexOf("/your-purchases") == 0 || window.location.pathname.indexOf("/subscriptions") == 0) {
		// this includes join, membership question, renew pages
		// and dashboard related pages
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.membershipnavicon').parent().addClass("active");
	}
	if(window.location.pathname.indexOf("/pd") == 0) {
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.pdnavicon').parent().addClass("active");
	}
	if(window.location.pathname.indexOf("/tools") == 0) {
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.toolsnavicon').parent().addClass("active");
	}
	if(window.location.pathname.indexOf("/research") == 0 || window.location.pathname.indexOf("/PRFdonation") == 0) {
		// PRF donation page is included here
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.researchnavicon').parent().addClass("active");
	}
	if(window.location.pathname.indexOf("/inmotion") == 0) {
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.inmotionnavicon').parent().addClass("active");
	}
	if(window.location.pathname.indexOf("/advocacy") == 0) {
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.advocacynavicon').parent().addClass("active");
	}
	if(window.location.pathname.indexOf("/media") == 0) {
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.medianavicon').parent().addClass("active");
	}
	if(window.location.pathname.indexOf("/campaign") == 0) {
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.campaignnavicon').parent().addClass("active");
	}
	if(window.location.pathname.indexOf("/contact-us") == 0) {
		$('#block-dexp-menu-dexp-menu-block-1 .menu li a i.contact-usnavicon').parent().addClass("active");
	}
});