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
  }); // left menu link2 click() scroll END

  $("[class^='your-details-prevbutton']").click(function() {
    $('html, body').animate({
			scrollTop: $(".nav-tabs").offset().top
		}, 600);
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

  $(document).on("click","#tabmenu li", function(){
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

//ADD WARNING ICON FOR MISSING INFO ON WORKPALCE TABS
jQuery(document).ready(function() {
  $(".join-details-button3").on("click",function() {
    if ($('#workplaceblocks #workplace1').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli1').addClass("warning");
    }
    if ($('#workplaceblocks #workplace2').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli2').addClass("warning");
    }
    if ($('#workplaceblocks #workplace3').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli3').addClass("warning");
    }
    if ($('#workplaceblocks #workplace4').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli4').addClass("warning");
    }
    if ($('#workplaceblocks #workplace5').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli5').addClass("warning");
    }
    if ($('#workplaceblocks #workplace6').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli6').addClass("warning");
    }
    if ($('#workplaceblocks #workplace7').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli7').addClass("warning");
    }
    if ($('#workplaceblocks #workplace8').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli8').addClass("warning");
    }
    if ($('#workplaceblocks #workplace9').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli9').addClass("warning");
    }
    if ($('#workplaceblocks #workplace10').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli10').addClass("warning");
    }
    if ($('#workplaceblocks #workplace11').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli11').addClass("warning");
    }
    if ($('#workplaceblocks #workplace12').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli12').addClass("warning");
    }
    if ($('#workplaceblocks #workplace13').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli13').addClass("warning");
    }
    if ($('#workplaceblocks #workplace14').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli14').addClass("warning");
    }
    if ($('#workplaceblocks #workplace15').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli15').addClass("warning");
    }
    if ($('#workplaceblocks #workplace16').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli16').addClass("warning");
    }
    if ($('#workplaceblocks #workplace17').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli17').addClass("warning");
    }
    if ($('#workplaceblocks #workplace18').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli18').addClass("warning");
    }
    if ($('#workplaceblocks #workplace19').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli19').addClass("warning");
    }
    if ($('#workplaceblocks #workplace20').find(".focuscss").length > 0){ 
      $('#tabmenu li#workplaceli20').addClass("warning");
    }
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

//ONCLICK FUNCTION FOR DYNAMIC CONTENTS
$(document).on("click","#id .class", function(){
  console.log("Clicked.");
});

// IF THE DEVICE IS TOUCH SCREEN
function isTouchDevice() {
  return 'ontouchstart' in document.documentElement;
}

// MULTISELECTIONS SELECTIZE
jQuery(document).ready(function() {
  $('select[multiple=""]').selectize({
    plugins: ['remove_button'],
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
  });
});
