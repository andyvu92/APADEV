/*

 * * * ANDY CUSTOM JS CODE * * *

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
jQuery(document).ready(function(){
  // Get current path and find target link
  var path = window.location.pathname.split("/").pop();
  
  // Account for home page with empty path
  if ( path == '' ) {
    path = 'index.php';
  }

  // Add active class to target link
  var target = $('.nav a[href="/'+path+'"]');
  target.parent().addClass('active');

  var target = $('.nav a[href="'+path+'"]');
  target.parent().addClass('active');

  var target1 = $('.side-nav li a[href="/'+path+'"]');
  target1.parent().addClass('active');

  var target1 = $('.side-nav li a[href="'+path+'"]');
  target1.parent().addClass('active');

});

jQuery(document).ready(function(){
  // Get current path and find target link
  currentPath = window.location.pathname;

  // Add active class to target link
  var target = $('.side-nav li a[href="'+currentPath+'"]');
  target.parent().addClass('active');

  var target = $('.nav li a[href="'+currentPath+'"]');
  target.parent().addClass('active');
});

//ACORDION 
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
jQuery(document).ready(function($) {
  $('.pd-description-mobile .readmore').readmore({
    speed: 800,
    collapsedHeight: 207,
    lessLink: '<a class="readless-link" href="#" onclick="topFunction()">Read less</a>',
    afterToggle: function(trigger, element, expanded) {
      if(! expanded) { // The "Close" link was clicked
        $('html, body').animate( { scrollTop: element.offset().top }, {duration: 100 } );
      }
    }
  });
});

//SCROLL TOP AUTO

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    jQuery(document).ready(function(){
      $("html, body").animate({ scrollTop: "280" }, 600);
    });
}

function topFunction215() {
  jQuery(document).ready(function(){
    $("html, body").animate({ scrollTop: "215" }, 600);
  });
}

//-------------------------------------
jQuery(document).ready(function() {

  /*************************************
    LEFT MENU SMOOTH SCROLL ANIMATION
   *************************************/
  // declare variable
  var h1 = $("#dashboard-right-content").offset();
  var h2 = $("#h2").position();
  var h3 = $("#h3").position();

  $("[class^='join-details-button']").click(function() {
    $('html, body').animate({
			scrollTop: $('#dashboard-right-content').offset().top
		}, 600);
  }); 

  $("[class^='your-details-prevbutton']").click(function() {
    $('html, body').animate({
			scrollTop: $(".nav-tabs").offset().top
		}, 600);
  }); 

}); // ready() END

//CHANGE "JOIN BUTTON" FOR NATIONAL GROUP ON DASHBOARD
jQuery(document).ready(function ($) {
  if ($("#national-groups").find(".ng-title").length == 0){ 
    $("#ng-join-btn").html('<span>Join now</span>');
  }
});

//AUTO SCROLL ON SEARCH
jQuery(document).ready(function() {
  var is_mobile = true;
  if( $('#mobile-detector').is(':visible')) {
    is_mobile = false;       
  }
	if(window.location.href.indexOf("?page") > -1||window.location.href.indexOf("?pagesize") > -1 || window.location.href.indexOf("?search-result") > -1){
    var window_width = $(window).width();
    var target = $('#section-content-top');

    if (window_width >= 993) {
      $('html, body').stop().animate({
        scrollTop: target.offset().top - $('#section-header').height()
      }, 1000, function(){
        window.location.href = alt_target;
        $('html, body').stop().animate({
          scrollTop: target.offset().top - $('#section-header').height()
        }, 0);
      });
    } else {
      $('html, body').stop().animate({
        scrollTop: target.offset().top
      }, 1000, function(){
        window.location.hash = alt_target;
        $('html, body').stop().animate({
          scrollTop: target.offset().top
        }, 0);
      });
    }
  }
  
});

//SET BACKGROUND FOR EACH HOME PAGE ARTICLE CONTENT
jQuery(function ($) {
  var someId = $(".dexp-grid-items .portfolio-image .content");
  someId.css('background', function () {
      return 'url(' + $(this).find('img').attr('src') + ') no-repeat'
  })
}) 

//SET BACKGROUND FOR EACH MEDIA ARTICLE CONTENT SIDEBAR
jQuery(function ($) {
  var someId = $(".node-inmotion .file-image .content, .node-home-news-tiles .file-image .content");
  someId.css('background', function () {
      return 'url(' + $(this).find('img').attr('src') + ') no-repeat'
  })
}) 

//SET BACKGROUND FOR EACH MEDIA ARTICLE CONTENT SIDEBAR
jQuery(function ($) {
  var someId = $(".node-media .post-img, ");
  someId.css('background', function () {
      return 'url(' + $(this).find('img').attr('src') + ') no-repeat'
  })
}) 

//REMOVE RED BORDER ON FIELD VALIDATION
jQuery(document).ready(function() {
  $(document).on("keyup","input", function(){
    $(this).removeClass("focuscss");
  });

  $(document).on("change","input", function(){
    $(this).removeClass("focuscss");
  });

  $(document).on('click','input[type="date"]', function(){
    $(this).removeClass("focuscss");
  });

  $(document).on("click","select", function(){
    $(this).removeClass("focuscss");
  });

  $(document).on("click","label", function(){
    $(this).removeClass("focuscss");
  });

  // REMOVE WARNING CLASS ON CLICK
  $(document).on("click","#tabmenu li", function(){
    $(this).removeClass("warning");
  });

  $(document).on("click",".nav-tabs > li", function(){
    $(this).removeClass("warning");
  });
});

//ADD LOCKER ICON ON DISABLED FORM FIELDS
jQuery(document).ready(function() {
  $('input[readonly]').parent().addClass('locked');
  $('input[disabled]').parent().addClass('locked');
  $('select[disabled]').parent().addClass('locked');
  $('[class^="down"]').removeClass('locked');
});

//ADD WARNING ICON FOR MISSING INFO ON WORKPLACE TABS
jQuery(document).ready(function() {
  $(".join-details-button3").on("click",function() {
    $( "#workplaceblocks > div" ).each(function() {
      if ($(this).find(".focuscss").length > 0){ 
        x = $(this).attr('id').replace('workplace', '');
        $('#tabmenu li#workplaceli' + x).addClass("warning");
      }
    });
  });
});

//TRIGGER DELETE WORKPLACE(S) POPUPS
jQuery(document).ready(function() {
  $(document).on("click","#tabmenu li [class^=calldeletewp]", function(){
    var x = $(this).attr("class").replace("calldeletewp", "");
    $("#deleteWorkplaceWindow [value=yes]").attr("class", "");
    $("#deleteWorkplaceWindow [value=yes]").addClass("deletewp"+x);
    $( ".overlay" ).fadeIn();
    $('#deleteWorkplaceWindow').fadeIn();
  });

  $(document).on("click","#deleteWorkplaceWindow [value=yes]", function(){
    $('#deleteWorkplaceWindow').hide();
    $( ".overlay" ).hide();
  });

  $(document).on("click","#deleteWorkplaceWindow .cancelDeleteButton", function(){
    $('#deleteWorkplaceWindow').fadeOut();
    $( ".overlay" ).fadeOut();
  });
});

jQuery(document).ready(function() {
  $(document).on( "click", "[class^=deletewp]",function(){
    var t = $('#wpnumber').val();
    $('[id^="workplaceli"]').removeClass('active');
    $('[id^="workplaceli"]:nth-child(' + t + ')').addClass('active');
    $('#workplaceblocks [id^="workplace"]:nth-child(' + t + ')').addClass('active in');
  });

  $(document).on( "click", "[id^='workplaceli']",function(){
    var x = $(this).attr("id").replace('workplaceli', '');
    $('#workplaceblocks [id^="workplace"]').removeClass('active in').addClass('fade');
    $('#workplaceblocks [id^="workplace' + x +'"]').addClass('active in');
  });
});

//TRIGGER DELETE QUALIFICATION(SS) POPUPS
jQuery(document).ready(function() {
  $(document).on("click",".callDeleteEdu", function(){
    $('.overlay').fadeIn();
    $('div[aria-describedby=confirmDelete]').fadeIn();
  });

  $(document).on("click","#confirmDelete .cancelDeleteButton", function(){
    $('div[aria-describedby=confirmDelete]').fadeOut();
    $('.overlay').fadeOut();
  });

  $(document).on("click","#confirmDelete a[value='yes']", function(){
    $('.overlay').hide();
  });

});

// IF THE DEVICE IS TOUCH SCREEN
function isTouchDevice() {
  return 'ontouchstart' in document.documentElement;
}

// MULTISELECTIONS SELECTIZE
jQuery(document).ready(function() {
  var prevSetup = Selectize.prototype.setup;

  Selectize.prototype.setup = function () {
      prevSetup.call(this);
  
      // This property is set in native setup
      // Unless the source code changes, it should
      // work with any version
      this.$control_input.prop('readonly', true);
  };

    $('#pd-search-form select, select[multiple=""]').not('#PRF, #Paymentcard, #pagesize').selectize({
      plugins: ['remove_button'],
      delimiter: ',',
      persist: false,
      onItemAdd: function() {
        this.blur();
      },
      create: function(input) {
          return {
              value: input,
              text: input
          }
      }
    });

});


// PREVENT BODY SCROLL ON POPUP
jQuery(document).ready(function(){
$('.modal-body').on('mouseenter', function(){
  $('body').addClass('trapScroll-enabled');
});
$('.modal-body').on('mouseleave', function(){
  $('body').removeClass('trapScroll-enabled');
});

  var trapScroll;

  (function($){  
    
    trapScroll = function(opt){
      
      var trapElement;
      var scrollableDist;
      var trapClassName = 'trapScroll-enabled';
      var trapSelector = '.modal-body, #signupWebUser';
      
      var trapWheel = function(e){
        
        if (!$('body').hasClass(trapClassName)) {
          
          return;
          
        } else {  
          
          var curScrollPos = trapElement.scrollTop();
          var wheelEvent = e.originalEvent;
          var dY = wheelEvent.deltaY;
  
          // only trap events once we've scrolled to the end
          // or beginning
          if ((dY>0 && curScrollPos >= scrollableDist) ||
              (dY<0 && curScrollPos <= 0)) {
  
            opt.onScrollEnd();
            return false;
            
          }
          
        }
        
      }
      
      $(document)
        .on('wheel', trapWheel)
        .on('mouseleave', trapSelector, function(){
          
          $('body').removeClass(trapClassName);
        
        })
        .on('mouseenter', trapSelector, function(){   
        
          trapElement = $(this);
          var containerHeight = trapElement.outerHeight();
          var contentHeight = trapElement[0].scrollHeight; // height of scrollable content
          scrollableDist = contentHeight - containerHeight;
          
          if (contentHeight>containerHeight)
            $('body').addClass(trapClassName); 
        
        });       
    } 
    
  })($);
  
  var preventedCount = 0;
  var showEventPreventedMsg = function(){  
    $('#mousewheel-prevented').stop().animate({opacity: 1}, 'fast');
  }
  var hideEventPreventedMsg = function(){
    $('#mousewheel-prevented').stop().animate({opacity: 0}, 'fast');
  }
  var addPreventedCount = function(){
    $('#prevented-count').html('prevented <small>x</small>' + preventedCount++);
  }
  
  trapScroll({ onScrollEnd: addPreventedCount });
  $('.trapScroll')
    .on('mouseenter', showEventPreventedMsg)
    .on('mouseleave', hideEventPreventedMsg);      
  $('[id*="parent"]').scrollTop(100);
});


// NATIONAL GROUP MULTI-SELECT ON CHANGE
jQuery(document).ready(function(){

   var $nationalSelectize = $('#Nationalgp').selectize({
    plugins: ['click2deselect'],
  });

  $(document).on('change', $nationalSelectize, function(){
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
});

// INMOTION BLOG: BRING PREV BUTTON ABOVE ADS
jQuery(document).ready(function(){
  $('#prev-btn .prev').replaceWith( $('.go-back-button') );
});

// REMOVE UNDERLINE ON WORKPLACE ON SKIP HOVER
jQuery(document).ready(function(){
  $(document).on('mouseover', '#tabmenu li .skip',function(){
    $('#tabmenu li.active a').css('text-decoration', 'none');
    $(this).css('text-decoration', 'underline');
  });
  $(document).on('mouseout', '#tabmenu li .skip',function(){
    $('#tabmenu li.active a').css('text-decoration', '');
    $(this).css('text-decoration', '');
  });
});

// BUSINESS RESTRICT POPUP HIDE LOGIN LINKS FOR LOGGED IN
jQuery(document).ready(function(){
  $(document).on('click', '.business-restrict .restrict-overlay', function(){
    if( $('#block-block-2').find('#logoutButton').length > 0 ){
      $('#businessrestrictWindow .login-logic').remove();
    }
    else{ return; }
  });

  $(document).on('click', '#businessrestrictWindow .login-logic .login', function(){
    $('#businessrestrictWindow').fadeOut();
    $('.overlay').fadeOut();
  });
});

//NATIONAL GROUP LINKS HOVER FADING EFFECT
jQuery(document).ready(function(){
  $('.national-group-grid .flex-col-6 a').on('mouseenter', function(){
    $('.national-group-grid .flex-col-6 a').fadeTo(0, 0.6);
    $(this).fadeTo(0, 1);
  });
  $('.national-group-grid .flex-col-6 a').on('mouseleave', function(){
    $('.national-group-grid .flex-col-6 a').fadeTo(0, 1);
  });
});


// ABOUT - ANUAL REPORT HOVER FADING EFFECT
jQuery(document).ready(function(){
  $('.page-node-138 .brochure-grid .item').on('mouseenter', function(){
    $(this).siblings().addClass('faded');
    
  });
  $('.page-node-138 .brochure-grid .item').on('mouseleave', function(){
    $('.page-node-138 .brochure-grid .item').removeClass('faded');
  });
});

// HOVER FADING EFFECT
jQuery(document).ready(function(){
  $('.faded-on-hover > div').on('mouseenter', function(){
    $(this).siblings().addClass('faded');
    
  });
  $('.faded-on-hover > div').on('mouseleave', function(){
    $('.faded-on-hover > div').removeClass('faded');
  });
});

// DISALLOW TYPING IN YOUTUBE EMBED INPUT
jQuery(document).ready(function(){
  $('.link-type input').on('keydown', function(e){
    e.preventDefault();
  });
});

// CHOOSE PHYSIO - AUDIO CONTROLER
jQuery(document).ready(function(){
  $('.radio-btn').click(function(){
    if ( $(this).html() == 'Pause' ) {
      $('#choose-physio-radio').trigger("pause");
      $(this).removeClass('pause');
      $(this).html('Play');
    } else {
      $('#choose-physio-radio').trigger("play");
        $(this).addClass('pause');
        $(this).html('Pause');
    }
  });

  $('#choose-physio-radio').on('ended', function(){
    $('.radio-btn').removeClass('pause');
    $('.radio-btn').html('Play');
  });

// ALERT WINDOWS FOR IE/EGDE
  $( window ).load(function() {
    if( /msie|trident|edge/g.test(navigator.userAgent.toLowerCase()) && !sessionStorage.getItem('firstVisit') ) { 
        //show the Popup
      $("body").css('overflow', 'hidden');
      $(".html").append( "<div class='msie-alert'><div class='alert-container'><div class=''alert-header><h3 class='light-lead-heading cairo'>It looks like you may be using a web browser that we don’t support.</h3></div> <div class='alert-body'>We recommend using Google Chrome to get the best experience on the APA website. Click the image below to download Google Chrome.</span></div> <div class='alert-footer'><a href='https://www.google.com/chrome/' target='_blank'><span class='chrome-icon'></span></a></div><span class='close-ie-alert'>x</span></div> </div>" ); 
        //Set the key
      sessionStorage.setItem('firstVisit', '1');
    } 
  });

  $(document).on('click', '.close-ie-alert', function(){
    //Fade popup out
    $("body").css('overflow', 'scroll');
    $('.msie-alert').fadeOut();
  });

  $( window ).unload(function() {
    //Destroy the key
    localStorage.removeItem("firstVisit");
  });


  //PD MOBILE BANNER
  
});

// PARALLAX

jQuery(document).ready(function(){

  (function() {
    // Tutorial: https://medium.com/@PatrykZabielski/how-to-make-multi-layered-parallax-illustration-with-css-javascript-2b56883c3f27
    window.addEventListener('scroll', function(event) {
      var depth, i, layer, layers, len, movement, topDistance, translate3d;
      topDistance = this.pageYOffset;
      layers = document.querySelectorAll(".parallaxie .parallax-img");
      for (i = 0, len = layers.length; i < len; i++) {
        layer = layers[i];
        depth = layer.getAttribute('data-depth');
        movement = -(topDistance * 0.4);
        translate3d = 'translate3d(0, ' + movement + 'px, 0)';
        layer.style['-webkit-transform'] = translate3d;
        layer.style['-moz-transform'] = translate3d;
        layer.style['-ms-transform'] = translate3d;
        layer.style['-o-transform'] = translate3d;
        layer.style.transform = translate3d;
      }
    });
  
  }).call(this);

});

jQuery(document).ready(function(){

  // FOOTER NAVIGATION DROPDOWN ON MOBILE

  var window_width = $(window).width();
  if (window_width < 570) {
    $('#section-bottom .footer-block div[id*="content-footer-block"]').slideUp();
  }

  $(document).on('click', '.footer-block .footer-block-header', function(){
    target = $(this).attr('id');
    if ( $(this).hasClass('active') ){
      $(this).removeClass('active');
      $(this).next().slideUp();
      //$('#content-' + target).slideUp();
    }
    else{
      $(this).addClass('active');
      $(this).next().slideDown();
      //$('#content-' + target).slideDown();
    }
  });


  // REMOVE EDUCATION INSTRUCTION IF EDUCATION BLOCK IS PRESENT
    if ( $('#additional-qualifications-block').find('div').length > 0 ){
      $('.instruction').hide();
    }

    if ( $('#additional-qualifications-block').find('.callDeleteEdu').length == 0 ){
      $('.instruction').show();
    }

    $(document).on('click', '.add-additional-qualification', function(){
      $('.instruction').hide();
    });


    // TOP NAV MOBILE
    $(document).on('click', '#custom-nav-toggle', function(){
      $(this).toggleClass('active');
      $('.html').toggleClass('menu-open');

      if( $('.html').hasClass('menu-open') ){
        $('.html').delay(300).queue(function (next) { 
            $(this).css('overflow', 'hidden'); 
            next();
        });
      }
      else{
        $('.html').css('overflow', 'auto');
      }
    });

    // SEARCH FUNCTION MOBILE
    $(document).on('keyup', '#edit-search-block-form--2-mobile', function(){
      value = $(this).val();
      $('#search-block-form-mobile').attr('action', '/search/node/' + value)
    });

    // MINIMIZE ACCORDION ON PARTNERS POPUP
    $(document).on('click', '.node-partners .portfolio-image > a', function() {
      target = $(this).attr('popup-target');
      $('#'+ target + ' dt').removeClass('active');
      $('#'+ target + ' dd').hide();
    });

    // MOVE ERROR MESSAGES TO TOP
    $( ".dashboard_detail" ).prepend( $('#messages') );

    // STYLED CHECKBOX FOR SEARCH RESULT PAGE
    if ( $('.html').find('.form-checkboxes').length > 0 ){
      $('.form-checkboxes input').addClass('styled-checkbox');
    }

    // RESET SEARCH FILTERS
    $('#reset-search').on('click', function(){
      $('#pd-search-form input:visible').val('');
      //$('#pd-search-form input[type="date"]').val('');
      $("#pd-search-form select").prop("selectedIndex", 0);
      $("#Nationalgp")[0].selectize.clear();
      $("#State")[0].selectize.clear();
      $(".selectized")[0].selectize.clear();
    });

    // RENAME PD PURCHASE BUTTON BASED ON PRICE
    if ( $('.html, body').find('#Amount').length > 0 ){
      if ( $('.paymentsiderbar #Amount').text() == '0' ) {
        $('.paymentsiderbar .shopCartButton').html('Place your order');
      }
      else{
        $('.paymentsiderbar .shopCartButton').html('Confirm payment');
      }

      $(document).bind('click', '#prftagAgree', function(){
        if ( $('.paymentsiderbar #Amount').text() == '0' ) {
          $('.paymentsiderbar .shopCartButton').html('Place your order');
        }
        else{
          $('.paymentsiderbar .shopCartButton').html('Confirm payment');
        }
      });

      $(document).bind('keyup', '.paymentsiderbar #PRFOther', function(){
        if( $(this).val() == '1' ){
          //console.log('0');
        }
        else{
          //console.log('others');
        }
      });
    }

    // REMOVE MESSAGE ON RESET PASSWORD FAIL PROCESS
    $('#NewPass input').one('keydown', function(){
      $('#NewPass #reset-pw-fail').hide();
    });

    $(document).ready(function(){
      // ADD LOADING SCREEN FOR CPD DIARY
      $('#block-block-291').append('<div class="overlay"><section class="loaders"><span class="loader loader-quart"></span></section></div>');
    
    });

    $(window).load(function(){
      $('#block-block-291 .overlay, #block-block-240 .overlay').fadeOut();
      $('.CPD_snapshot').fadeIn().addClass('visible');

    });

    // STANDARD CONTENT ACCORDION
    $('.content-block h6+div').hide();

    $('.content-block h6').on('click', function(){
      $('.content-block h6').not(this).removeClass('active');
      $(this).toggleClass('active');
      $('.content-block h6+div').slideUp();
      if ( $(this).next('div').is(':visible') ) {
        $(this).next('div').slideUp();
      }
      else{
        $(this).next('div').slideDown();
      }
    });

    // AUTO SORT APA MEMBER IN ALPHABETICAL ORDER
    $('#apateammember-block-2').each(function(){
      var $divs = $(".node-apateam", this);
      var alphabeticallyOrderedDivs = $divs.sort(function (a, b) {
        return $(a).find("h5 a .field-item").text() > $(b).find("h5 a .field-item").text();
      });
      $(this).html(alphabeticallyOrderedDivs);
    });

    // BACK TO TOP BUTTON
    $('.back-to-top span').click( function(e){
      e.preventDefault();
      $('html, body').stop().animate({
        scrollTop: 0
      }, 1000);
    });

    // MOVE BACK TO PREV BUTTON INTO GREY CONTAINER - AWARDS AND RECOGNITION
    $('.page-node-689 #prev-btn').appendTo( $('.page-node-689 .grey-background .content') );

    // HIGHLIGHT NAV URL - AWARDS AND RECOGNITION
    if ( window.location.href.indexOf('awards-and-recognition') > -1 ) {
      $('a[href="/aboutus/awards-and-recognition"]').parent().addClass('active');
    }

    // REMOVE EXCESSIVE URL PATH IN CAIPAIGN SIDEBAR 
    if ( window.location.href.indexOf('about-campaign') > -1 ) {
      $('a[href="/campaign/about-campaign#campaign-toolkit"]').attr('href', '#campaign-toolkit');
      $('a[href="/campaign/about-campaign#FAQ"]').attr('href', '#FAQ');
    }

});
