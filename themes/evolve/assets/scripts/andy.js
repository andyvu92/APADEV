/*
 * jQuery appear plugin
 *
 * Copyright (c) 2012 Andrey Sidorov
 * licensed under MIT license.
 *
 * https://github.com/morr/jquery.appear/
 *
 * Version: 0.3.3
 */

//ADD BACKGROUND IMAGE TO CONTAINER
jQuery(document).ready(function() {
  jQuery('#section-content-top').addClass( jQuery('#dashboard-right-content').attr('class'));
});
jQuery(document).ready(function() {
  jQuery('#section-content-top').removeClass('col-xs-12 col-sm-12 col-md-10 col-lg-10');
});

jQuery(document).ready(function() {
  jQuery('.page-node-257 #section-banner').addClass( jQuery('#CPD-diary-main').attr('class'));
});


//REMOVE AUTO SCROLL CLASS
jQuery(document).ready(function() {
  jQuery('#dashboard-right-content').removeClass('autoscroll');
});
jQuery(document).ready(function() {
  jQuery('#section-content-top').removeClass('autoscroll');
});

//PAGER TO BOTTOM ON PD PAGE
jQuery(document).ready(function(){
  jQuery("#section-content-top .container .row #block-block-241 .content .pager").clone().appendTo("#section-content-top .container .row #block-block-241 .content .pager-bottom");
});

//ADD ACTIVE CLASS
jQuery(document).ready(function($){
  // Get current path and find target link
  var path = window.location.pathname.split("/").pop();
  
  // Account for home page with empty path
  if ( path == '' ) {
    path = 'index.php';
  }

  // Add active class to target link
  var target = jQuery('.nav a[href="/'+path+'"]');
  target.parent().addClass('active');

  var target = jQuery('.nav a[href="'+path+'"]');
  target.parent().addClass('active');
});

//ACORDIAN 
jQuery(document).ready(function($){
var list = $(".accordian-container");

  list.find(".accordian-content").hide();

  list.find(".acordian-label").on("click", function(){
    if (jQuery(this).hasClass('active')) {
      $(this).removeClass('active');
      $(this).next().slideToggle("fast", "swing").slideUp();
    }
    else
    {
      $(".acordian-label").removeClass('active');
      $(this).addClass('active');
      $(this).next().slideToggle("fast", "swing").siblings(".accordian-content").slideUp();
    }
  });
});

//READMORE
jQuery(document).ready(function ($) {
  var lineHeight = 20;
  var numLines = 10;
  $('.readmore').readmore({
    collapsedHeight: lineHeight * numLines,
    heightMargin: lineHeight * 1
  });
});

//SCROLL TOP AUTO

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    //document.body.scrollTop = 0; // For Safari
    //document.documentElement.scrollTop = 50; // For Chrome, Firefox, IE and Opera
    jQuery(document).ready(function(){
      $("html, body").animate({ scrollTop: "280" }, 600);
    });
}

//-------------------------------------
jQuery(document).ready(function() {
  /******************************
      BOTTOM SCROLL TOP BUTTON
   ******************************/

  // declare variable
  var scrollTop = $(".scrollTop");

  $(window).scroll(function() {
    // declare variable
    var topPos = $(this).scrollTop();

    // if user scrolls down - show scroll to top button
    if (topPos > $(document).height()*0.8) {
      $(scrollTop).css("opacity", "1");

    } else {
      $(scrollTop).css("opacity", "0");
    }

  }); // scroll END

  //Click event to scroll to top
  $(scrollTop).click(function() {
    $('html, body').animate({
      scrollTop: 400
    }, 600);
    return false;

  }); // click() scroll top EMD

  /*************************************
    LEFT MENU SMOOTH SCROLL ANIMATION
   *************************************/
  // declare variable
  var h1 = $("#dashboard-right-content").offset();
  var h2 = $("#h2").position();
  var h3 = $("#h3").position();

  $("[class^='join-details-button'").click(function() {
    $('html, body').animate({
      scrollTop: h1.top
    }, 500);
    //return false;

  }); // left menu link2 click() scroll END

  $("[class^='your-details-prevbutton'").click(function() {
    $('html, body').animate({
      scrollTop: h1.top
    }, 500);
    //return false;

  }); // left menu link2 click() scroll END

}); // ready() END

//CHANGE "JOIN BUTTON" FOR NATIONAL GROUP ON DASHBOARD
jQuery(document).ready(function ($) {
  if ($("#national-groups").find(".carousel").length == 0){ 
    $("#ng-join-btn").html('<span>Join now</span>');
  }
});

//AUTO SCROLL ON SEARCH
jQuery(document).ready(function() {
	if(window.location.href.indexOf("?page") > -1||window.location.href.indexOf("?pagesize") > -1 || window.location.href.indexOf("?search-result") > -1){
		$('html, body').animate({ scrollTop: $('#section-content-top').offset().top  - $('#section-header').height() }, 1000);
	}
});

//SET BACKGROUND FOR EACH HOME PAGE ARTICLE CONTENT
jQuery(function ($) {
  var someId = $(".dexp-grid-items .portfolio-image .content");
  someId.css('background', function () {
      console.log('x')
      return 'url(' + $(this).find('img').attr('src') + ') no-repeat'
  })
}) 

//REMOVE RED BORDER ON FIELD VALIDATION
jQuery(document).ready(function() {
  $('input.form-control').on('keyup',function() {
    $(this).removeClass('focuscss');
  });

	$(".join-details-button3").on("click",function() {

		if ($('[id^=#workplace]').find(".focuscss").length > 0){ 
      var num = $(this).attr('id').match(/\d+$/)[0];
			$('#tabmenu li#workplaceli'+num).addClass("test");
    }
    if ($('#workplaceblocks #workplace2').find(".focuscss").length > 0){ 
			$('#tabmenu li#workplaceli2').addClass("test");
	  }
	});

  $('input').on('change',function() {
    $(this).removeClass('focuscss');
  });

  $('input[name="Pobox"]').on('keyup',function() {
    $(this).removeClass('focuscss');
  });

  $('input[type="date"]').on('click',function() {
    $(this).removeClass('focuscss');
  });
  $('select').on('click',function() {
    $(this).removeClass('focuscss');
  });
});

jQuery(document).ready(function() {
  $('input[readonly]').parent().addClass('locked');
  $('input[disabled]').parent().addClass('locked');
  $('select[disabled]').parent().addClass('locked');
  $('[class^="down"]').removeClass('locked');
});
