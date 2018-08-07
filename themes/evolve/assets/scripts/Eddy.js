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
	
	
});