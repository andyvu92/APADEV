<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="/sites/all/themes/evolve/assets/scripts/typeahead.js-master/dist/typeahead.bundle.min.js" type="text/javascript"></script>

	<!-- TOUCH SWIPE -->
	<script src="/sites/all/themes/evolve/assets/scripts/jquery.touchSwipe.min.js" type="text/javascript"></script>

	<!-- MOUSE WHEEL -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

	<!-- SLICK CAROUSEL -->
	<script src="/sites/all/themes/evolve/assets/scripts/slick.min.js" type="text/javascript"></script>

	<!-- SELECTIZE -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-32728465-9"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-32728465-9');
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WJFJNQX');</script>
	<!-- End Google Tag Manager -->

	<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		var jsonResult = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.whitespace,
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			prefetch: '/sites/all/themes/evolve/assets/results5.json'
		});
		
		$('#bloodhound .typeahead').typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		},
		{
			name: 'states',
			limit: 20,
			source: jsonResult
		});
		
		$('.submit').click( function() {
			var text = $("#bloodhound input[type=text].tt-input").val();
			if(text != "" || text != " " || text != null) {
				var rss = text.split(" ");
				var num = rss.length;
				var suburb = "";
				for(var i = 0; i < num-2; i++) {
					suburb += rss[i];
					if(i < num-3){
						suburb += " ";
					}
				}
				$('.stateComp').val(rss[num-2]+"");
				$('.suburbComp').val(suburb+"");
				$('.postcodeComp').val(rss[num-1]+"");
			}
		});
		
		$('a').each(function() {
			var allTxLinks = $(this).attr("href");
			if(allTxLinks != null) {
				if(allTxLinks.charAt(0) != '/') {
					$(this).attr("rel", "nofollow");
					if(allTxLinks.substr(0,21) == "https://choose.physio") {
						$(this).removeAttr("rel");
					}
				}
			}
		});
	<?php
		if(isset($_SESSION["UserId"])){ 
			echo '$(document).ready(function(){
					$("body").addClass("user-logged-in");
				});';
		} else {
			echo '$(document).ready(function(){
				$("body").addClass("user-log-out");
			});';
		}
	?>
	});
	</script>
	<link href="/sites/all/themes/evolve/assets/css/hamburgers-master/dist/hamburgers.css" rel="stylesheet">
		<?php print $head; ?>
		<title><?php print $head_title; ?></title>
		<?php print $styles; ?>
		<?php print $scripts; ?>
	<script type="text/javascript" src="/sites/all/themes/evolve/assets/scripts/Map.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-32728465-9"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-32728465-9');
		</script>

    
		<link rel="apple-touch-icon" sizes="180x180" href="/sites/default/files/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/sites/default/files/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/sites/default/files/favicon-16x16.png">
		<link rel="manifest" href="/sites/default/files/site.webmanifest">
		<link rel="mask-icon" href="/sites/default/files/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#ffffff">
	</head>
	<?php
	// variables changed TODO
	if(strpos($_SERVER['REQUEST_URI'], 'find-ph')) {
		echo '<body class="'.$classes.'" '.$attributes.' onload="initGeolocation()">';
	} else {
		echo '<body class="'.$classes.'" '.$attributes.'>';
	}
	/* <body class="<?php print $classes; ?>" <?php print $attributes;?>> */
	?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WJFJNQX"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

		<div id="skip-link">
		<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
		</div>
		<?php print $page_top; ?>
		<?php print $page; ?>
		<?php print $page_bottom; ?>
		
		<script>
		var urlhere = window.location.href.substring(0,33);
		// variables changed TODO
		if(urlhere == "http://localhost/practice-ressult" || urlhere =="http://localhost/practice-detail?") {
			console.log("in!");
			initialize();
			<?php /*if(isset($_SESSION["lat"]) || isset($_SESSION["lng"])): ?
				initGeolocation(?php echo $_SESSION["lat"].', '.$_SESSION["lng"]; ?>);
			?php endif; */?>
		}
		var currentLocation = window.location; 
		$('#useCurrent').click(function() {
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
		</script>
		
	</body>
</html>
