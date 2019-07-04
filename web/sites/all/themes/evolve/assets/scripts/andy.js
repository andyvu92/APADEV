/*

 * * * ANDY CUSTOM JS CODE * * *

*/
function topFunction215() {
  jQuery(document).ready(function(){
    $("html, body").animate({ scrollTop: "215" }, 600);
  });
}

// IF THE DEVICE IS TOUCH SCREEN
function isTouchDevice() {
  return 'ontouchstart' in document.documentElement;
}

jQuery(document).ready(function() {
  //ADD BACKGROUND IMAGE TO CONTAINER-----------------------------------
  $('#section-content-top').addClass( $('#dashboard-right-content').attr('class'));

  $('#section-content-top').removeClass('col-xs-12 col-sm-12 col-md-10 col-lg-10');

  $('.page-node-257 #section-banner').addClass( $('#CPD-diary-main').attr('class'));

  //REMOVE AUTO SCROLL CLASS--------------------------------------
  $('#dashboard-right-content').removeClass('autoscroll');
  $('#section-content-top').removeClass('autoscroll');

  //PAGER TO BOTTOM ON PD PAGE------------------------------------
  $("#section-content-top .container .row #block-block-241 .content .pager").clone().appendTo("#section-content-top .container .row #block-block-241 .content .pager-bottom");

  //ADD ACTIVE CLASS TO CURRENT URL--------------------------------
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

  // Get current path and find target link
  currentPath = window.location.pathname;

  // Add active class to target link
  var target = $('.side-nav li a[href="'+currentPath+'"]');
  target.parent().addClass('active');

  var target = $('.nav li a[href="'+currentPath+'"]');
  target.parent().addClass('active');

  //ACORDION -----------------------------------------
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

  //auto scroll top on Next/Prev in Join/Renew----------------------------------------------------
  $("[class^='join-details-button'], [class^='your-details-prevbutton']").click(function() {
    if ( $('body').find('#dashboard-right-content').length > 0 ){
      $('html, body').animate({
        scrollTop: $('#dashboard-right-content').offset().top
      }, 600);
    }
  }); 

  //CHANGE "JOIN BUTTON" FOR NATIONAL GROUP ON DASHBOARD---------------------------------------------
  if ($("#national-groups").find(".ng-title").length == 0){ 
    $("#ng-join-btn").html('<span>Join now</span>');
  }

  //AUTO SCROLL ON SEARCH-----------------------------------------------------------------
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
        $('html, body').stop().animate({
          scrollTop: target.offset().top - $('#section-header').height()
        }, 0);
      });
    } else {
      $('html, body').stop().animate({
        scrollTop: target.offset().top
      }, 1000, function(){
        $('html, body').stop().animate({
          scrollTop: target.offset().top
        }, 0);
      });
    }
  }

  //SET BACKGROUND FOR EACH HOME PAGE ARTICLE CONTENT-----------------------------------------------
  $('.dexp-grid-items .node').each(function(){
    var grid_target = $(this).find('.portfolio-image .content');

    grid_target.css('background', function () {
      return 'url(' + $(this).find('img').attr('src') + ') no-repeat'
    });
  });

  //REMOVE RED BORDER ON FIELD VALIDATION---------------------------------------
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

  // REMOVE WARNING CLASS ON CLICK-------------------------------------------
  $(document).on("click","#tabmenu li", function(){
    $(this).removeClass("warning");
  });

  $(document).on("click",".nav-tabs > li", function(){
    $(this).removeClass("warning");
  });

  //ADD LOCKER ICON ON DISABLED FORM FIELDS--------------------------------------------
  var target_for_locker_icon = [];
  target_for_locker_icon = [
    'input[readonly]',
    'input[disabled]',
    'select[disabled]',
  ];
  $.each(target_for_locker_icon, function (index, value) {
    $(value).parent().addClass('locked');
  });

  //remove locker
  $('[class^="down"]').removeClass('locked');

  //ADD WARNING ICON FOR MISSING INFO ON WORKPLACE TABS------------------------------------------
  $(".join-details-button3").on("click", function() {
    $( "#workplaceblocks > div" ).each(function() {
      if ($(this).find(".focuscss").length > 0){ 
        x = $(this).attr('id').replace('workplace', '');
        $('#tabmenu li#workplaceli' + x).addClass("warning");
      }
    });
  });

  //TRIGGER DELETE WORKPLACE(S) POPUPS-------------------------------------------------------
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

  //TRIGGER DELETE QUALIFICATION(SS) POPUPS----------------------------------------------------
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

  // MULTISELECTIONS SELECTIZE------------------------------------------------------
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

  // PREVENT BODY SCROLL ON POPUP-----------------------------------------------------
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
          if ((dY>0 && curScrollPos >= scrollableDist) || (dY<0 && curScrollPos <= 0)) {
            opt.onScrollEnd();
            return false;
          }
        } 
      }
        
      $(document).on('wheel', trapWheel).on('mouseleave', trapSelector, function(){
        $('body').removeClass(trapClassName);
      }).on('mouseenter', trapSelector, function(){   
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
  $('.trapScroll').on('mouseenter', showEventPreventedMsg).on('mouseleave', hideEventPreventedMsg);      
  $('[id*="parent"]').scrollTop(100);

  // NATIONAL GROUP MULTI-SELECT ON CHANGE--------------------------------------------------
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
      $( "#ngsportsbox" ).val('0');
			$("#ngsportsbox").attr('checked', false);
		}
		if(jQuery.inArray( "10015", $('select[id=Nationalgp]').val())!==-1)	
		{
			$( "#ngmusculo" ).removeClass('display-none');
	    }
		else{
      $( "#ngmusculo" ).addClass('display-none');
      $( "#ngmusculobox" ).val('0');
			$("#ngmusculobox").attr('checked', false);
		}
  });

  // INMOTION BLOG: BRING PREV BUTTON ABOVE ADS------------------------------
  $('#prev-btn .prev').replaceWith( $('.go-back-button') );

  // REMOVE UNDERLINE ON WORKPLACE ON SKIP HOVER------------------------------------------------
  $(document).on('mouseover', '#tabmenu li .skip',function(){
    $('#tabmenu li.active a').css('text-decoration', 'none');
    $(this).css('text-decoration', 'underline');
  });
  $(document).on('mouseout', '#tabmenu li .skip',function(){
    $('#tabmenu li.active a').css('text-decoration', '');
    $(this).css('text-decoration', '');
  });

  // BUSINESS RESTRICT POPUP HIDE LOGIN LINKS FOR LOGGED IN---------------------------------------
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

  //NATIONAL GROUP LINKS HOVER FADING EFFECT--------------------------------------------------
  $('.national-group-grid .flex-col-6 a').on('mouseenter', function(){
    $('.national-group-grid .flex-col-6 a').fadeTo(0, 0.6);
    $(this).fadeTo(0, 1);
  });

  $('.national-group-grid .flex-col-6 a').on('mouseleave', function(){
    $('.national-group-grid .flex-col-6 a').fadeTo(0, 1);
  });

  // ABOUT - ANUAL REPORT HOVER FADING EFFECT--------------------------------------------------
  $('.page-node-138 .brochure-grid .item').on('mouseenter', function(){
    $(this).siblings().addClass('faded');
  });

  $('.page-node-138 .brochure-grid .item').on('mouseleave', function(){
    $('.page-node-138 .brochure-grid .item').removeClass('faded');
  });

  // HOVER FADING EFFECT--------------------------------------------------------
  $('.faded-on-hover > div').on('mouseenter', function(){
    $(this).siblings().addClass('faded');
  });

  $('.faded-on-hover > div').on('mouseleave', function(){
    $('.faded-on-hover > div').removeClass('faded');
  });

  // DISALLOW TYPING IN YOUTUBE EMBED INPUT-------------------------------------------------------
  $('.link-type input').on('keydown', function(e){
    e.preventDefault();
  });

  // CHOOSE PHYSIO - AUDIO CONTROLER--------------------------------
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

  // ALERT WINDOWS FOR IE/EGDE------------------------------------------------------------------
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

  // FOOTER NAVIGATION DROPDOWN ON MOBILE------------------------------------------------------
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

  // REMOVE EDUCATION INSTRUCTION IF EDUCATION BLOCK IS PRESENT------------------------------------
  if ( $('#additional-qualifications-block').find('div').length > 0 ){
    $('.instruction').hide();
  }

  if ( $('#additional-qualifications-block').find('.callDeleteEdu').length == 0 ){
    $('.instruction').show();
  }

  $(document).on('click', '.add-additional-qualification', function(){
    $('.instruction').hide();
  });

  // TOP NAV MOBILE-------------------------------------------------------------------
  $(document).on('click', '#custom-nav-toggle', function(){
    $(this).toggleClass('active');
    $('body, .html').toggleClass('menu-open');

    if( $('body, .html').hasClass('menu-open') ){
      $('body, .html').delay(300).queue(function (next) { 
          $(this).css('overflow', 'hidden'); 
          next();
      });
    }
    else{
      $('body, .html').css('overflow', 'auto');
    }
  });

  $('.menu_overlay').on('click', function () {
    $('#custom-nav-toggle').click();
  });

  // SEARCH FUNCTION MOBILE------------------------------------------------------------------
  $(document).on('keyup', '#edit-search-block-form--2-mobile', function(){
    value = $(this).val();
    $('#search-block-form-mobile').attr('action', '/search/node/' + value)
  });

  // MINIMIZE ACCORDION ON PARTNERS POPUP------------------------------------------------------------------
  $(document).on('click', '.node-partners .portfolio-image > a', function() {
    target = $(this).attr('popup-target');
    $('#'+ target + ' dt').removeClass('active');
    $('#'+ target + ' dd').hide();
  });

  // MOVE ERROR MESSAGES TO TOP------------------------------------------------------------------
  $( ".dashboard_detail" ).prepend( $('#messages') );

  // STYLED CHECKBOX FOR SEARCH RESULT PAGE------------------------------------------------------------------
  if ( $('.html').find('.form-checkboxes').length > 0 ){
    $('.form-checkboxes input').addClass('styled-checkbox');
  }

  // RESET SEARCH FILTERS------------------------------------------------------------------
  $('#reset-search').on('click', function(){
    $('#pd-search-form input:visible').val('');
    //$('#pd-search-form input[type="date"]').val('');
    $("#pd-search-form select").prop("selectedIndex", 0);
    $("#Nationalgp")[0].selectize.clear();
    $("#State")[0].selectize.clear();
    $(".selectized")[0].selectize.clear();
  });

  // RENAME PD PURCHASE BUTTON BASED ON PRICE------------------------------------------------------------------
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
  }

  // REMOVE MESSAGE ON RESET PASSWORD FAIL PROCESS------------------------------------------------------------------
  $('#NewPass input').one('keydown', function(){
    $('#NewPass #reset-pw-fail').hide();
  });

  // ADD LOADING SCREEN FOR CPD DIARY----------------------------------------------------------
  $('#block-block-291').append('<div class="overlay"><section class="loaders"><span class="loader loader-quart"></span></section></div>');

  $(window).load(function(){
    $('#block-block-291 .overlay, #block-block-240 .overlay').fadeOut();
    $('.CPD_snapshot').fadeIn().addClass('visible');
  });

  // STANDARD CONTENT ACCORDION------------------------------------------------------------------
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

  // AUTO SORT APA NAC MEMBER IN ALPHABETICAL ORDER---------------------------------------------------
  $('#apateammember-block-1').each(function(){
    var items = $(".node-apateam", this);
    $(items).sort(function(a, b) {
      if ($(a).find('.member-name .field-item').text() < $(b).find('.member-name .field-item').text()) {
        return -1;
      } else {
        return 1;
      }
    }).appendTo(this);
  });

  // BACK TO TOP BUTTON----------------------------------------------------------------------------
  $('.back-to-top span').click( function(e){
    e.preventDefault();
    $('html, body').stop().animate({
      scrollTop: 0
    }, 1000);
  });

  // MOVE BACK TO PREV BUTTON INTO GREY CONTAINER - AWARDS AND RECOGNITION-------------------------
  $('.page-node-689 #prev-btn').appendTo( $('.page-node-689 .grey-background .content') );

  // HIGHLIGHT NAV URL - AWARDS AND RECOGNITION----------------------------------------------------
  if ( window.location.href.indexOf('awards-and-recognition') > -1 ) {
    $('a[href="/aboutus/awards-and-recognition"]').parent().addClass('active');
  }

  // REMOVE EXCESSIVE URL PATH IN CAIPAIGN SIDEBAR--------------------------------------------------
  if ( window.location.href.indexOf('about-campaign') > -1 ) {
    $('a[href="/campaign/about-campaign#campaign-toolkit"]').attr('href', '#campaign-toolkit');
    $('a[href="/campaign/about-campaign#FAQ"]').attr('href', '#FAQ');
  }

  // REPLACE URL FOR ADVOCACY PAGE--------------------------------------------------------------------
  $('.page-node-157 .node a[href="/advocacy/reconciliation"], .node-type-policy .node a[href="/advocacy/reconciliation"]').attr('href', '/aboutus/reconciliation');
  $('.page-node-157 .node a[href="/advocacy/we-want-hear-yousubmit-your-feedback-here"], .node-type-policy .node a[href="/advocacy/we-want-hear-you-submit-your-feedback-here"]').attr('href', 'mailto:policy@australian.physio?subject=Have%20your%20say');

  // ADD AUTO LINE BREAK FOR ADVOCACY MAIN BLOCKS-----------------------------------------------------
  $('.view .node-policy h2').each(function(){
    var addBr = $(this).text().replace('_', '<br>');
    $(this).html(addBr);
  });

  // ADD SPACING FOR ADVOCACY MAIN BLOCKS------------------------------------------------------
  $('.node-type-policy .right-sidebar a').each(function(){
    var addSpace = $(this).text().replace('_', ' ');
    $(this).html(addSpace);
  });

  // REMOVE SUBMIT FEEDBACK FROM ADVOCACY SIDEBAR------------------------------------------------------
  $('.node-type-policy .right-sidebar a:contains("We want to hear")').parent().parent().remove();

  // MEMBERSHIP/CATEGORIES-FEES/* -> MOVE RIGHT SIDEBAR TO CONTENT CONTAINER------------------------------------------------------
  $('.node-type-membership .region-right-sidebar').appendTo( $('#section-main-content > .container > .row') );

  // LIMIT WORD COUNT TO 40 IN MEDIA------------------------------------------------------------------------------------------------------------
  $('.mediaSection .node-media').each(function(){
    var text = $(this).find(".post-content .field-item p").text();
    var wordCount = text.trim().split(' ').length;
    var splittext = text.split(/\s+/).slice(0,41).join(" ");

    if ( wordCount > 42 ) {
      $(this).find(".post-content .field-item p").text( splittext + '...');
    }
  });

  //TEXT RESTRICTIONS------------------------------------------------------------------------------------------------
  var checkTextCondition = function(){
    // SPECIAL ATTR FOR MAX CHAR DISPLAY RESTRICTION------------------------------------------------
    $('[maxChar]').each(function(){
      var maxChar = $(this).attr('maxChar');
      var text = $(this).text();
      var charCount = text.trim().length;
      var splittext = text.split('').slice(0,maxChar).join('');

      if ( charCount > maxChar ){
        $(this).text( splittext + '...');
      }
    });

    // SPECIAL ATTR FOR MAX CHAR ALLOW RESTRICTION------------------------------------------------
    $('[maxChar_allow]').each(function(e){
      var maxChar_allow = $(this).attr('maxChar_allow');
      $(this).on('keypress keyup',function (event){
        var currentLength = $(this).val().length;
        if ( currentLength >= maxChar_allow ){
          event.preventDefault();
        }
      });
    });

    // SPECIAL ATTR FOR MAX WORD ALLOW RESTRICTION------------------------------------------------
    $('[maxWord_allow]').each(function(e){
      var maxWord_allow = $(this).attr('maxWord_allow');
      $(this).on('keypress keyup',function (event){
        var countSpace = $(this).val().split(' ').length;
        if ( countSpace > maxWord_allow ){
          event.preventDefault();
        }
      });
    });

    // SPECIAL ATTR FOR MAX WORD DISPLAY RESTRICTION------------------------------------------------
    $('[maxWord]').each(function(){
      var maxWord = $(this).attr('maxWord');
      var text = $(this).text();
      var wordCount = text.trim().split(' ').length;
      var splittext = text.split(' ').slice(0,maxWord).join(' ');

      if ( wordCount > maxWord ){
        $(this).text( splittext + '...');
      }
    });

    // NUMERIC ONLY WITH DECIMAL FOR INPUT------------------------------------------------
    $('.decimal_numeric').on('keypress keyup blur',function (event) {
      $(this).val($(this).val().replace(/[^0-9\.]/g,''));
      if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
      }
    });

    // NUMERIC ONLY WITHOUT DECIMAL FOR INPUT------------------------------------------------
    $('.non_decimal_numeric').on('keypress keyup blur',function (event) {    
      $(this).val($(this).val().replace(/[^\d].+/, ''));
      if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
      }
    });

    // TEXT ONLY WITHOUT NUMERIC & SYMBOLS FOR INPUT------------------------------------------------
    $('.alphabet_only').on('keypress keyup blur',function (event) {    
      if ( (event.which >= 48 && event.which <= 57) ) {
        event.preventDefault();
      }
    });  
  }
  checkTextCondition();

  // HIDE DASHBOARD PAYMENT CARD OPTIONS IF CARD OPTION IS EMPTY----------------------------------------
  $('select#Paymentcard').each(function(){
    if ( $(this).find('option').length == 0 ){
      $('a.deletecardbutton').remove();
      $('#setCardButton').remove();
      $('#addPaymentCard').text('Add a card');
    }
  });

  // BUTTONS ON FORM SUBMISSION-------------------------------------------------------------------
  $('#nonAPAhour form').submit(function(){
    $("#saveNA", this).remove();
    $(".modal-footer", this).prepend('<div class="add-cpd-spinning-btn"><i class="fa fa-spinner fa-spin fa-fw"></i></div>');
    return true;
  });

  $('[id^="apa-create-log-in-form"]').submit(function(){
    if( $(this).find('.blue-spinning-btn').length > 0 ){
      return;
    } else{
      $(".login-btn input", this).attr('disabled', 'disabled').hide();
      $(".login-btn", this).append('<div class="blue-spinning-btn"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></div>');
      return true;
    }
  });

  $('#apa-get-cm-login-form').submit(function(){
    $(".submit-container input", this).hide();
    $(".submit-container", this).append('<div class="blue-spinning-btn"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></div>');
    return true;
  });

  // SSO LOGIN ERROR MESSAGES-------------------------------------------------------------------
  $('.page-apa-cm-login').find('#messages').each(function(){
    $('form .password-field').after($('#messages').show());
  });

  // SAVE MEDIA TYPE STATUS---------------------------------------------------------------------
  $(document).on('click', '.page-node-102 .mediaSection .media_filter li', function(){
    currentStatus = $(this).attr('id');
    sessionStorage.setItem('currentStatus', currentStatus);
  });

  if( window.location.href.indexOf("media?page") > -1 ){
    currentStatus = sessionStorage.getItem('currentStatus');
    $('.mediaSection .media_filter li#' + currentStatus).click();
  }

  // AUTO  REDIRECT ON RENEW PAGE-----------------------------------------------------------------
  if( window.location.href.indexOf("renew") > -1 ){
    // SET SESSION
    $(document).on('click', '#renewItem', function(){
      sessionStorage.setItem('userStatus', 'current');
    });
    $(document).on('click', '.previous-member .item-action', function(){
      sessionStorage.setItem('userStatus', 'previous');
    });
    $(document).on('click', '.new-member .item-action', function(){
      sessionStorage.setItem('userStatus', 'new');
    });

    // RETRIEVE SESSION & APPLY CONDITION
    if( ($('body, .html').find('.nameHello').length > 0) && sessionStorage.getItem('userStatus') == 'current' ) { 
      sessionStorage.setItem('userStatus', 'lodgedIn');
      $('#apa-renew-landingpage-form').submit();
    }
    else if( ($('body, .html').find('.nameHello').length > 0) && sessionStorage.getItem('userStatus') == 'previous' ){
      sessionStorage.setItem('userStatus', 'lodgedIn');
      window.location = "/membership-question";
    }
    else if( ($('body, .html').find('.nameHello').length > 0) && sessionStorage.getItem('userStatus') == 'new' ){
      sessionStorage.setItem('userStatus', 'lodgedIn');
      window.location = "/membership-question";
    }
    else if( !($('body, .html').find('.nameHello').length > 0) && sessionStorage.getItem('userStatus') ){
      $('.white-overlay').hide();
    }
    else{
      $('.white-overlay').hide();
    }
  }
  $( window ).unload(function() {
    //Destroy the key
    localStorage.removeItem("userStatus");
  });

  // CONSTRUCT RIGHT SIDEBAR ON MOBILE----------------------------------------------------------
  var transformSidebar = function(){
    $('.region-right-sidebar, .node .right-sidebar').each(function(){
      var window_width = $(window).width();
      var title = $('.underline-heading' ,this).first().text();

      if ( (window_width < 993) && !(window.location.href.indexOf("pd-product") > -1) ){
        if ( $(this).parent().find('.sidebar-toggle').length == 0 ) {
          $(this).wrap('<div class="sidebar-overlay"></div>');
          $(this).before('<span class="sidebar-toggle">' + title.toLowerCase() + '</span>');
          $(this).fadeIn();
        }

        // SET POST IMAGES FOR INMOTION
        if ( $(this).find('.post-img').length > 0 ) {
          $('.post-img').each(function(){
            targetImg = $('img' ,this).attr('src');
            $(this).css('background-image', 'url(' + targetImg + ')');
          });
        }

        // IF SIDEBAR TOGGLE WIDTH IS MORE THAN 150PX, REPLACE TEXT WITH "QUICK LINKS"
        var buttonWidth = $('.sidebar-toggle').outerWidth();
        if( buttonWidth > 150 ){
          $('.sidebar-toggle').text('Quick links');
        }

        // if sidebar doesn't have class 'underline-heading'
        if (window.location.href.indexOf("campaign") > -1) {
          $('.sidebar-toggle').text('Quick links');
        }

        if ( $(this).find('.underline-heading').length < 1 ) {
          $('.sidebar-toggle').text('Quick links');
        }
        // HIDE SIDEBAR ON SWIPE RIGHT
        $('.sidebar-overlay').swipe( {
          //Generic swipe handler for all directions
          swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
            $('body, .html').removeClass('no-scroll');
            $(this).removeClass('active');
          },
          //Default is 75px
           threshold:150
        });
      } else{
        $(this).insertAfter($('body').find('.left-content'));
        $('body').find('.sidebar-overlay').remove();
      }

      if ( (window_width < 570) && !(window.location.href.indexOf("pd-product") > -1) ) {
        // HIDE SIDEBAR ON SWIPE RIGHT
        $('.sidebar-overlay').swipe( {
          //Generic swipe handler for all directions
          swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
            $('body, .html').removeClass('no-scroll');
            $('#section-header, #section-socials').css({
              visibility: "visible"
            });
            overlayClose();
            $(this).delay(50).queue(function(next){
              $(this).removeClass('active');
              next();
            });
          },
          //Default is 75px
          threshold:150
        });
      }
    });
  }

  // trigger sidebar function
  transformSidebar();

  // trigger sidebar function on window resizing
  $(window).on('resize', function(){
    transformSidebar();
  });


  var $docEl = $('.html, body'),
  $wrap = $('.dexp-body-inner'),
  scrollTop;

  var overlayClose = function() {
    $.unlockBody();
  }
  var overlayOpen = function() {
    $.lockBody();
  }

  $.lockBody = function() {
    if(window.pageYOffset) {
      scrollTop = window.pageYOffset;
      
      //$wrap.css({
      //  top: - (scrollTop)
      //});
    }

    $docEl.css({
      height: "100vh",
      overflow: "hidden",
      position: "fixed"
    });
  };

  $.unlockBody = function() {
    $docEl.css({
      height: "",
      overflow: "",
      position: ""
    });

    $wrap.css({
      top: ''
    });

    window.scrollTo(0, scrollTop);
    window.setTimeout(function () {
      scrollTop = null;
    }, 0);
  };

  // SHOW/HIDE SIDEBAR ON TOGGLE CLICK------------------------------------------------------------
  $(document).on('click', '.sidebar-toggle', function(e){
    var window_width = $(window).width();

    if( $(this).parent().hasClass('active') ){
      // mobile behaviour
      if (window_width < 570){
        $('body, .html').removeClass('no-scroll');
        $('#section-header, #section-socials').css({
          visibility: "visible"
        });
        overlayClose();
        $(this).delay(50).queue(function(next){
          $(this).parent().removeClass('active');
          next();
        });
      }
      // tablet behaviour
      else{
        $('body, .html').removeClass('no-scroll');
        $(this).parent().removeClass('active');
      }
      e.preventDefault();
    }
    else{
      // mobile behaviour
      if (window_width < 570){
        $(this).parent().addClass('active');
        $('#section-header, #section-socials').css({
          visibility: "hidden"
        });
        setTimeout(overlayOpen, 500);
        $('body, .html').delay(600).queue(function(next){
          $(this).addClass('no-scroll');
          next();
        });
      }
      // tablet behaviour
      else{
        $('body, .html').addClass('no-scroll');
        $(this).parent().addClass('active');
      }
      e.preventDefault();
    }
  });

  // HIDE/SHOW SIDEBAR TOGGLE ON SCROLL-----------------------------------------------------------
  $(document).scroll(function() {
    if ( (!($('#section-clients').isInViewport())) && (!($('#section-header').isInViewport())) ) {
      $('.sidebar-toggle').addClass('off-right');
    } 
    else if ( ( (($('#section-clients').isInViewport())) || (($('#section-header').isInViewport())) ) && ( $('.sidebar-overlay').is('.active') ) ) {
      $('.sidebar-toggle').addClass('off-right');
    }
    else {
      $('.sidebar-toggle').removeClass('off-right');
    }
  });

  // SHOW SIDEBAR TOGGLE ON LOAD----------------------------------------------------------------
  $(window).on('load', function(){
    if ( (!($('#section-clients').isInViewport())) && (!($('#section-header').isInViewport())) ) {
      $('.sidebar-toggle').addClass('off-right');
    }
  });

  // DETECT IF AN ELEMENT IS IN VIEWPORT----------------------------------------------------------
  $.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();
    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();
    return elementBottom > viewportTop && elementTop < viewportBottom;
  };

  // ------ AUTO MENU-STYLE FOR MEDIA FILTER---------------------------------------------------------
  var autoMediaChevron = function(){
    $('.media_filter').each(function(id){
      restrictWidth = $('.container').width();
      elemWidth = $(this).outerWidth();
      selected = $(this).find('ul li.active').text();
      // apply if object width larger than container width
      if ( (elemWidth > restrictWidth) && ( $(this).find('.media-chevron').length == 0 ) ) {
        id++;
        $('ul', this).addClass('minimize').hide();
        $('ul .active', this).hide();
        $(this).addClass('chevron-active');
        $(this).prepend('<input class="media-chevron" id="media-chevron-'+id+'" type="checkbox"><div class="media-chevron-menu"><span class="selected">'+selected+'</span><label class="media-chevron-toggle" for="media-chevron-'+id+'"><span class="bar-1"></span><span class="bar-2"></span></label></div>');
        // toggle behaviour
        $('.media-chevron-toggle', this).on('click', function(){
          if ( $(this).parent().parent().find('ul').is('.minimize') ){
            $(this).parent().parent().find('ul').removeClass('minimize');
            $(this).parent().parent().find('ul').stop().slideDown(600).animate({opacity: 1}, { queue: false, duration: 600 });
          }
          else{
            $(this).parent().parent().find('ul').addClass('minimize');
            $(this).parent().parent().find('ul').stop().slideUp(600).animate({opacity: 0}, { queue: false, duration: 600 });
          }
        });
      }
      // remove if object width smaller than container width
      else if (elemWidth < restrictWidth) {
        $('ul', this).removeClass('minimize').css('opacity', '1').show();
        $('ul .active', this).show();
        $(this).find('.media-chevron, .media-chevron-menu').remove();
        $(this).removeClass('chevron-active');
      }
    });
  }
  autoMediaChevron();

  // trigger function on window resizing
  $(window).on('resize', function(){
    autoMediaChevron();
  });

  //COLLAPSE USER DETAILS MENU IF OVERFLOW CONTAINER WIDTH--------------------------------------------------------
  var autoAccountMenu = function(){
    $('.account-nav').find('.text-underline').parent().parent().addClass('active');

    $('.account-nav').each(function(id){
      var window_width = $(window).width();

      selected = $(this).find('ul li.active').text();
      // apply if object width larger than container width
      if ( (window_width < 769) && ( $(this).find('.account-chevron').length == 0 ) ) {
        id++;
        $('ul', this).addClass('minimize').hide();
        $('ul .active', this).hide();
        $(this).addClass('chevron-active');
        $(this).prepend('<input class="account-chevron" id="account-chevron-'+id+'" type="checkbox"><div class="account-chevron-menu"><span class="selected">'+selected+'</span><label class="account-chevron-toggle" for="account-chevron-'+id+'"><span class="bar-1"></span><span class="bar-2"></span></label></div>');
        // toggle behaviour
        $('.account-chevron-toggle', this).on('click', function(){
          if ( $(this).parent().parent().find('ul').is('.minimize') ){
            $(this).parent().parent().find('ul').removeClass('minimize');
            $(this).parent().parent().find('ul').stop().slideDown(600).animate({opacity: 1}, { queue: false, duration: 600 });
          }
          else{
            $(this).parent().parent().find('ul').addClass('minimize');
            $(this).parent().parent().find('ul').stop().slideUp(600).animate({opacity: 0}, { queue: false, duration: 600 });
          }
        });
      }
    });
  }
  autoAccountMenu();

  // trigger menu expand on placeholder click
  $(document).on('click', '.chevron-active .media-chevron-menu .selected', function(){
    $(this).parent().find('.media-chevron-toggle').click();
  });

  $(document).on('click', '.chevron-active .account-chevron-menu .selected', function(){
    $(this).parent().find('.account-chevron-toggle').click();
  });

  // assign placeholder for selected option
  $(document).on('click', '.chevron-active ul li', function(){
    var section = $(this).text();
    $(this).parent().parent().find('.selected').text(section);
    $(this).parent().parent().find('.media-chevron').prop('checked', false);
    $(this).parent().addClass('minimize');
    $(this).parent().stop().slideUp(600).animate({opacity: 0}, { queue: false, duration: 600, complete: function(){
        $('li', this).show();
        $('.active', this).hide();
      } 
    });
  });
  $(document).on('click', '.account-nav.chevron-active ul li', function(){
    var section = $(this).text();
    $(this).siblings().removeClass('active');
    $(this).addClass('active');
    $(this).parent().parent().find('.selected').text(section).hide().fadeIn();
    $(this).parent().parent().find('.account-chevron').prop('checked', false);
    $(this).parent().addClass('minimize');
    $(this).parent().stop().slideUp(600).animate({opacity: 0}, { queue: false, duration: 600, complete: function(){
        $('li', this).show();
        $('.active', this).hide();
      } 
    });
  });

  //ADD STEP PROGRESS FOR RENEW/JOIN-------------------------------------------------------------
  var autoNumberRenewMenu = function(){
    $('.renew-membership-nav, .join-membership-nav').each(function(){
      
      $('ul.nav', this).each(function(){
        if ( $(this).find('li[id^="workplaceli"]').length > 0 || $(this).find('.inactiveLink').length == 0 ) {
          $(this).show();
        } else{
          $(this).addClass('numberized').hide();
          $(this).parent().addClass('number-menu-active');
  
          // get total step number
          var totalStep = $('li', this).length;

          //assign step number
          $('li', this).each(function(id){
            id++;
            $('a span', this).after('<span class="step-order">'+id+'</span>');
          });
  
          //get current step number and label
          var currentStep = $(this).find('.text-underline').text();
          var stepNumber = $('.text-underline', this).parent().find('.step-order').text();
  
          //append customised elemen to show step order
          $(this).after('<span class="current-step">Step <span class="step-number">'+stepNumber+'</span> of '+totalStep+': <span class="step-label">'+currentStep+'</span></span>');    
        }
      });
      
      //update step number and label on Prev/Next click
      $(document).on('click', 'a[class^="join-details-button"], a[class^="your-details-prevbutton"], #tabmenu .skip', function(){
        var currentStep = $('.numberized').find('.text-underline').text();
        var stepNumber = $('.numberized .text-underline').parent().find('.step-order').text();
        $('.number-menu-active .current-step .step-number').text(stepNumber);
        if ( currentStep == 'Education4' ) {
          currentStep = 'Education';
        }
        $('.number-menu-active .current-step .step-label').text(currentStep);
      });
    });
  }
  autoNumberRenewMenu();

  // DEFAULT MINIMIZE ACCORDION------------------------------------------------------------------
  $('.ckeditor-accordion-container').each(function(){
    if ( $('dt' ,this).is('.active') ){
      $('dt.active' ,this).removeClass('active');
      $('dd.active' ,this).removeClass('active').slideUp();
    }
  });

  // HIDE DESCRIPTION IF INPUT IS NOT EMPTY-------------------------------------------------------
  $('.page-user #user-login, .page-user #user-pass').each(function(){
    if( $('input', this).val() != '' ){
      $('input', this).addClass('filled');

      $('input', this).filter(function() {
        return !this.value;
    }).removeClass('filled');
    }

    $('input', this).on('keyup change', function(){
      if ( $(this).val() == '' ) {
        $(this).removeClass('filled');
      }
      else{
        $(this).removeClass('error');
        $(this).addClass('filled');
      }
    });
    $('ul.nav li:first-child').addClass('new-account');
    $('ul.nav li:nth-child(2)').addClass('login');
    $('ul.nav li:nth-child(3)').addClass('new-password');
    $(this).submit(function(){
      if( $(this).parent().find('.blue-spinning-btn').length > 0 ){
        return;
      } else{
        $('.form-actions input', this).attr('disabled', 'disabled').hide();
        $('.form-actions', this).append('<div class="blue-spinning-btn"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></div>');  
      }
    });
  });

  //REPLACE BUTTONS WITH SPINNING ICONS TO DISABLE DOUBLE CLICK------------------------------------------------
  $(document).on('click', '.page-user .user-info-from-cookie .form-actions input', function(){
    if( $(this).parent().find('.blue-spinning-btn').length > 0 ){
    } else {
      $(this).hide();
      $(this).parent().append('<div class="blue-spinning-btn"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></div>');  
    }
  });

  //CUSTOM FONT STYLE WITH SPECIFIC CLASSES ADDED-----------------------------------------------------------------*/
  var custom_font_style = function(){
    $('h2, h3, h4, h5, h6, p, ul, ol').each(function(){
      var prev = $(this).prev();
      if ( prev.is('h2') ){
        $(this).addClass('font_style--after_h2');
      }
      else if ( prev.is('h3') ){
        $(this).addClass('font_style--after_h3');
      }
      else if ( prev.is('h4') ){
        $(this).addClass('font_style--after_h4');
      }
      else if ( prev.is('h5') ){
        $(this).addClass('font_style--after_h5');
      }
      else if ( prev.is('h6') ){
        $(this).addClass('font_style--after_h6');
      }
      else if ( prev.is('p') ){
        $(this).addClass('font_style--after_p');
      }
      else if ( prev.is('ul') ){
        $(this).addClass('font_style--after_ul');
      }
      else if ( prev.is('ol') ){
        $(this).addClass('font_style--after_ol');
      }
      else {
        return;
      }
    });
  }
  custom_font_style();

  // INMOTION READMORE-----------------------------------------------------------------------------
  $('.inmotion-readmore-content').each(function(){
    if ( $(this).find('.featured-caption').length == 1 ){
      $('.region.left-content .post-img').append( $('.featured-caption') );
    }

    // define min height
    let minHeight = 380;
    // get window width
    let window_width = $(window).width() + 10;

    // re-define min-height based on window width
    if (window_width >= 1200){
      minHeight = 380;
    }
    else if (window_width < 1200 && window_width >= 993){
      minHeight = minHeight + 70;
    } else if (window_width < 993 && window_width >= 769){
      minHeight = minHeight + 45;
    } else if (window_width < 769 && window_width >= 571){
      minHeight = minHeight + 40;
    } else if (window_width < 571 && window_width >= 481){
      minHeight = minHeight + 160;
    } else {
      minHeight = minHeight + 220;
    }

    // hide loading & show content
    var inmotion_show_content = function(){
      $(window).load(function(){
        $('.content-loading').hide();
        $('.inmotion-readmore-content, .readmore-toggle').fadeIn(1000);
        $('.readmore-toggle').css('display', 'block');
      });
    }
    // get content full height
    let fullHeight = $(this).show().height();
    // re-set content height
    $(this).hide();
    // apply readmore with height conditions
    if (fullHeight > minHeight + 100 ){
      // set min height
      $(this).css('height', minHeight);
      $(this).addClass('minimized');

      // construct wrapper and toggle
      $(this).wrap('<div class="readmore-container"></div>');
      $(this).after('<a class="readmore-toggle">Read more</a>');

      inmotion_show_content();
    } else {
      inmotion_show_content();
    }

    // READMORE BUTTON FOR INMOTION - toogle behaviour on click
    $(document).on('click', '.inmotion-content .readmore-toggle', function(){
      if ( $(this).text() == 'Read more' ) { // expanding
        // get full height
        var fullHeight = $(this).parent().find('.inmotion-readmore-content').css('height', 'auto').height();
        // re-set min height
        $(this).parent().find('.inmotion-readmore-content').css('height', minHeight);

        //set full height
        $(this).parent().find('.inmotion-readmore-content').animate({height: fullHeight}, 800, function(){
          $(this).css('height', 'auto');
        });
        $(this).parent().find('.inmotion-readmore-content').removeClass('minimized');
        $(this).text('Read less');
      }
      else{ //minimizing
          // auto scroll back to top
          var window_width = $(window).width();
          if (window_width >= 993){
            $('html, body').stop().animate({
              scrollTop: $('.SectionHeader').offset().top - $('#section-header').height()
            });
          }
          else{
            $('html, body').stop().animate({ scrollTop: $('.SectionHeader').offset().top - 25 }, 1000);
          }
        // set min height
        $(this).parent().find('.inmotion-readmore-content').animate({height: minHeight}, 800);
        $(this).parent().find('.inmotion-readmore-content').addClass('minimized');
        $(this).text('Read more');
      }
    });
  });

  // PD DESCRIPTION READMORE-------------------------------------------------------------------------
  $('.pd-readmore-content').each(function(){
    // define min height
    let minHeight = 190;
    // get window width
    let window_width = $(window).width() + 10;

    // re-define min-height based on window width
    if (window_width >= 1200){
      minHeight = 190;
    } else if (window_width < 1200 && window_width >= 993){
      minHeight = 260;
    } else if (window_width < 993 && window_width >= 769){
      minHeight = 225;
    } else if (window_width < 769 && window_width >= 571){
      minHeight = 230;
    } else if (window_width < 571 && window_width >= 481){
      minHeight = 350;
    } else {
      minHeight = 410;
    }

    // hide loading & show content
    var pd_show_content = function(){
      $(window).load(function(){
        $('.content-loading').hide();
        $('.pd-description-container, .readmore-toggle').fadeIn(1000);
        $('.readmore-toggle').css('display', 'block');
      });
    }
    // get content full height
    let fullHeight = $('.pd-description-container').show().height();
    // re-set content height
    $('.pd-description-container').hide();
    // apply readmore with height conditions
    if (fullHeight> minHeight + 100 ){
      // set min height
      $(this).css('height', minHeight);
      $(this).addClass('minimized');

      // construct wrapper and toggle
      $(this).wrap('<div class="readmore-container"></div>');
      $(this).after('<a class="readmore-toggle">Read more</a>');

      pd_show_content();
    } else {
      pd_show_content();
    }

    // READMORE BUTTON FOR PD DESCRIPTION - toogle behaviour on click
    $(document).on('click', '.left-side-content .pd-description-container .readmore-toggle', function(){
      if ( $(this).text() == 'Read more' ) { // expanding
        // get full height
        fullHeight = $(this).parent().find('.pd-readmore-content').css('height', 'auto').height();
        // re-set min height
        $(this).parent().find('.pd-readmore-content').css('height', minHeight);

        //set full height
        $(this).parent().find('.pd-readmore-content').animate({height: fullHeight}, 800, function(){
          $(this).css('height', 'auto');
        });
        $(this).parent().find('.pd-readmore-content').removeClass('minimized');
        $(this).text('Read less');
      }
      else{ //minimizing
          // auto scroll back to top
          var window_width = $(window).width();
          if (window_width >= 993){
            $('html, body').stop().animate({
              scrollTop: $('#block-system-main').offset().top - $('#section-header').height()
            });
          }
          else{
            $('html, body').stop().animate({ scrollTop: $('#block-system-main').offset().top - 25 }, 1000);
          }
        // set min height
        $(this).parent().find('.pd-readmore-content').animate({height: minHeight}, 800);
        $(this).parent().find('.pd-readmore-content').addClass('minimized');
        $(this).text('Read more');
      }
    });
  });

  // PD PRESENTER READMORE------------------------------------------------------------------------
  $('.presenters-readmore-content').each(function(){
    // define min height
    let minHeight = 190;
    // get window width
    let window_width = $(window).width() + 10;

    // re-define min-height based on window width
    if (window_width >= 1200){
      minHeight = 190;
    } else if ( window_width < 1200 && window_width >= 993 ){
      minHeight = 260;
    } else if ( window_width < 993 && window_width >= 769 ){
      minHeight = 225;
    } else if ( window_width < 769 && window_width >= 571 ){
      minHeight = 230;
    } else if ( window_width < 571 && window_width >= 481 ){
      minHeight = 350;
    } else {
      minHeight = 410;
    }

    // hide loading & show content
    var presenters_show_content = function(){
      $(window).load(function(){
        $('.content-loading').hide();
        $('.presenters-readmore-content').fadeIn(1000);
        $('.readmore-toggle').fadeIn(1000);
        $('.readmore-toggle').css('display', 'block');
      });
    }
    // get content full height
    let fullHeight = $(this).show().height();
    // re-set content height
    $(this).hide();
    // apply readmore with height conditions
    if (fullHeight> minHeight + 100 ){
      // set min height
      $(this).css('height', minHeight);
      $(this).addClass('minimized');

      // construct wrapper and toggle
      $(this).wrap('<div class="readmore-container"></div>');
      $(this).after('<a class="readmore-toggle">Read more</a>');

      presenters_show_content();
    } else {
      presenters_show_content();
    }

    // READMORE BUTTON FOR PD DESCRIPTION - toogle behaviour on click
    $(document).on('click', '.left-side-content .presenters-bio .readmore-toggle', function(){
      if ( $(this).text() == 'Read more' ) { // expanding
        // get full height
        fullHeight = $(this).parent().find('.presenters-readmore-content').css('height', 'auto').height();
        // re-set min height
        $(this).parent().find('.presenters-readmore-content').css('height', minHeight);

        //set full height
        $(this).parent().find('.presenters-readmore-content').animate({height: fullHeight}, 800);
        $(this).parent().find('.presenters-readmore-content').removeClass('minimized');
        $(this).text('Read less');
      }
      else{ //minimizing
          // auto scroll back to top
          var window_width = $(window).width();
          if (window_width >= 993){
            $('html, body').stop().animate({
              scrollTop: $('#presenters-bio').offset().top - $('#section-header').height()
            });
          }
          else{
            $('html, body').stop().animate({ scrollTop: $('#presenters-bio').offset().top - 25 }, 1000);
          }
        // set min height
        $(this).parent().find('.presenters-readmore-content').animate({height: minHeight}, 800);
        $(this).parent().find('.presenters-readmore-content').addClass('minimized');
        $(this).text('Read more');
      }
    });
  });

  // GENERAL READMORE-------------------------------------------------------------------------------
  $('.a_readmore').each(function(){
    let minHeight = $(this).data('height');
    let readmore_text = $(this).attr('showmore-text');
    let readless_text = $(this).attr('showless-text');

    // define default value for attributes
    if (minHeight == undefined || minHeight == null){
      minHeight = 200;
    }
    if (readmore_text == undefined || readmore_text == null){
      readmore_text = 'Read more';
    }
    if (readless_text == undefined || readless_text == null){
      readless_text = 'Read less';
    }

    // get window width
    let window_width = $(window).width() + 10;

    // re-define min-height based on window width
    if (window_width >= 1200){
      minHeight = minHeight;
    } else if ( window_width < 1200 && window_width >= 993 ){
      minHeight = minHeight + 70;
    } else if ( window_width < 993 && window_width >= 769 ){
      minHeight = minHeight + 35;
    } else if ( window_width < 769 && window_width >= 571 ){
      minHeight = minHeight + 40;
    } else if ( window_width < 571 && window_width >= 481 ){
      minHeight = minHeight + 160;
    } else {
      minHeight = minHeight + 220;
    }

    // get content full height
    let fullHeight = $(this).height();

    // apply readmore with height conditions

    if ( fullHeight > minHeight + 100 ){
      // set min height
      $(this).css('height', minHeight);
      $(this).addClass('minimized');
      // construct wrapper and toggle
      $(this).wrap('<div class="a_readmore_container"></div>');
      $(this).after('<a class="a_readmore_toggle">'+ readmore_text +'</a>');
    } else {
      return;
    }
  });

  // GENERAL READMORE TOGGLE
  $(document).on('click', '.a_readmore_toggle', function(){
    let minHeight = $(this).parent().find('.a_readmore').data('height');
    let readmore_text = $(this).parent().find('.a_readmore').attr('showmore-text');
    let readless_text = $(this).parent().find('.a_readmore').attr('showless-text');

    // define default value for attributes
    if (minHeight == undefined || minHeight == null){
      minHeight = 200;
    }
    if (readmore_text == undefined || readmore_text == null){
      readmore_text = 'Read more';
    }
    if (readless_text == undefined || readless_text == null){
      readless_text = 'Read less';
    }

    if ( $(this).text() == readmore_text ) { // expanding
      // get full height
      fullHeight = $(this).parent().find('.a_readmore').css('height', 'auto').height();
      // re-set min height
      $(this).parent().find('.a_readmore').css('height', minHeight);

      //set full height
      $(this).parent().find('.a_readmore').animate({height: fullHeight}, 800, function(){
        $(this).css('height', 'auto');
      });
      $(this).parent().find('.a_readmore').removeClass('minimized');
      $(this).text(readless_text);
    }
    else if ($(this).text() == readless_text){ //minimizing
      // set min height
      $(this).parent().find('.a_readmore').animate({height: minHeight}, 800);
      $(this).parent().find('.a_readmore').addClass('minimized');
      $(this).text(readmore_text);
    }
  });

  //SET BACKGROUND FOR EACH MEDIA ARTICLE CONTENT SIDEBAR------------------------------------------------------------
  var setImgBckgr = function(){
    $(".node-inmotion .file-image .content, .node-home-news-tiles .file-image .content").each(function(){
      var target_img = $(this).find('img').attr('src');
      $(this).css('background', 'url(' + target_img + ') no-repeat');
    });
  }
  setImgBckgr();

  // HIDE INMOTION SIDEBAR TITLE TAG IF BLOG CONTENT IS EMPTY----------------------------------------------------------
  $('.CampaignSidebar .content').each(function(){
    if( $(this).find('.views-row').length == 0 && $(this).find('.inmotion_archive').length == 0 ){
      $(this).prev().hide();
      $(this).prev().prev().hide();
    }
  });

  // ARCHIVE CATEGORY EXPAND/MINIMIZE ON CLICK FOR MOBILE------------------------------------------
  var autoMinimizedArchive = function(){
    $('.archive_year').each(function(){
      var window_width = $(window).width();

      $('p > .archive_toggle' ,this).unwrap();
      
      if ( window_width < 571 ){
        if ( !$('.inmotion-archive-grid', this).parent().is('.archive_minimize') ) {
          $('.inmotion-archive-grid', this).wrap('<div class="archive_minimize minimized"></div>');
        }
      } else {
        $('.archive_minimize .inmotion-archive-grid', this).unwrap();
        $('.archive_toggle', this).removeClass('active')
      }
    });
  }
  autoMinimizedArchive();

  // trigger function on window resizing
  $(window).on('resize', function(){
    autoMinimizedArchive();
  });

  // EXPAND/MINIMIZE ARCHIVES ON CLICK--------------------------------------------------------------
  $(document).on('click', '.archive_year .archive_category', function(){
    var window_width = $(window).width();
    if ( window_width < 571 ){
      if ( $(this).next().is('.minimized') ) {
        $('.archive_toggle', this).addClass('active');
        $(this).next().removeClass('minimized').slideDown('slow');
      } else {
        $('.archive_toggle', this).removeClass('active');
        $(this).next().addClass('minimized').slideUp();
      }
    }
  });
  
  // REORDER APA ELT TEAM BY SPECIFIC ORDER-------------------------------------------------------
  $('.view-apateammember #apateammember-block-2 .node-apateam').each(function(){
    if ( $('.member-name .even', this).text() == 'Cris Massis' ) {
      $(this).css('order', '1');
    }
    else if ( $('.member-name .even', this).text() == 'Anja Nikolic' ) {
      $(this).css('order', '2');
    }
    else if ( $('.member-name .even', this).text() == 'Craig Maltman' ) {
      $(this).css('order', '3');
    }
    else if ( $('.member-name .even', this).text() == 'Elles Vanderkley' ) {
      $(this).css('order', '4');
    }
    else if ( $('.member-name .even', this).text() == 'James Fitzpatrick' ) {
      $(this).css('order', '5');
    }
    else if ( $('.member-name .even', this).text() == 'Steve Gosbell' ) {
      $(this).css('order', '6');
    }
    else{
      $(this).css('order', '99');
    }
  });

  // ADD ARROW TOGGLE TO HIDE DASHBOARD MENU FOR MOBILE----------------------------------------------------------------------
  window_width = $(window).width();
  var toggle_arrow_dashboard = function(){
    $('.dashboard-left-nav').each(function(){
      if (window_width < 570){
        $(this).prepend('<span class="nav_toggle blur"></span>');
        $(this).append('<div class="nav_notification"><span>Tap down arrow to hide</span></div>');
        $('.navbar-collapse', this).addClass('blur');
      
        setTimeout( function(){
          $('.dashboard-left-nav').find('.nav_toggle, .navbar-collapse').removeClass('blur');
          $('.dashboard-left-nav').find('.nav_notification').fadeOut(500);
        }, 5000);
      }
    });
  }
  toggle_arrow_dashboard();

  // SHOW/HIDE DASHBOARD NAV TOGGLE
  $(document).on('click', '.dashboard-left-nav .nav_toggle', function(){
    if( $(this).is('.minimized') ){
      $('.dashboard-left-nav').find('.nav_toggle').removeClass('minimized');
      window.setTimeout(function () {
        $('.dashboard-left-nav').removeClass('minimized');
      }, 600);
    } else{
      $(this).parent().addClass('minimized');
      window.setTimeout(function () {
        $('.dashboard-left-nav').find('.nav_toggle').addClass('minimized');
      }, 600);
    }
  });

  // ADD BUTTONS TO SHOW EMAIL ADDRESSES ON CONTACT PAGE--------------------------------------------
  $(window).load(function(){
    if ( window.location.pathname == '/contact-us' ){
      $('.location_grid .location_item').each(function(){
        $('.item_wrapper', this).prepend('<a class="show_email">Show email</a>');
      });
    }
  });

  $(document).on('click', '.location_item .item_wrapper .show_email', function(){
    $(this).parent().find('a').each(function(){
      $(this).fadeOut('fast', function(){
        // get email address
        var email = $(this).attr('href');
        $(this).text(email);
        // remove 'mailto:'
        var txt = $(this).text().replace('mailto:', '')
        $(this).text(txt);
        $(this).fadeIn();
      });
    });
    // break line for 2 emails
    $(this).parent().find('.combine').addClass('break_line');
    // hide the button
    $(this).fadeOut(function(){
      $(this).remove();
    });
  });

  // CLEAR ALL PASSWORD ON INPUT CLICK/FOCUS------------------------------------------------------
  $(document).one('click focus', 'input[type="password"]', function(){
    $(this).val('');
  });

  // SET COOKIES----------------------------------------------------------------------------------
  var setCookie = function(cname, cvalue, exdays){
    let d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    //document.cookie = cname + "=" + cvalue;
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  // GET COOKIES--------------------------------------------------------------------------------
  var getCookie = function(cname){
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  // ADD SITE NOTIFICATIONS--------------------------------------------------------------------
  var add_help_bar = function(){
    var path = window.location.pathname.split("/").pop();
    $('.dexp-body-inner').each(function(){
      // Set cookie
      //setCookie('add_help_bar_disable', 'false', '1');

      // set conditions for help_bar
      // disable for renew/join and if disable is true
      if ( path == "renewmymembership" || path == "jointheapa" || getCookie("add_help_bar_disable") == "true" ){
        setCookie('add_help_bar_disable', 'true', '1');
        return;
      } else {
        // append element
        $(this).append('<div id="users_help_bar" class="minimized modal_disabled"><span class="close"></span><div class="modal_header"><span>Technical difficulties are currently preventing some website functions. We apologise for any inconvenience.</span></div><div class="modal_content"></div></div>');
        // get content from a file
        /*
        $.ajax({
          url : "/sites/default/files/test/test.txt",
          dataType: "text",
          success : function (data) {
              $('.dexp-body-inner').find('#users_help_bar .modal_content').append(data);
          }
        });
        */
      }

      window.setTimeout(function(){
        $('#users_help_bar').removeClass('modal_disabled');
      }, 1000);

      // hide/show modal
      /*
      $(document).on('click', '#users_help_bar .modal_header', function(){
        $(this).parent().toggleClass('minimized');
      });
      */
      // disable modal
      $(document).on('click', '#users_help_bar .close', function(){
        $(this).parent().addClass('modal_disabled');
      });
    }) 
  }
  //add_help_bar();

  // ADD HIDDEN HEADING FOR RESPONSIVE TABLE-------------------------------------------------------
  var responsive_heading_table = function(){
    for (x = 1; x <= 12; x++) {
      $('.table_wrapper .table_header .table_col_' + x).each(function(){
        let title = $('span', this).text();
        $(this).parent().parent().find('.table_row').each(function(){
          if ( !$(this).hasClass('table_header') ){
            $('.table_col_' + x, this).prepend('<span class="title">'+ title +'</span>');
          }
        });
      });
    }
  }
  responsive_heading_table();
  
  //ADD SHOW PASSWORD TOGGLE---------------------------------------------------------------------
  $(document).on('click', '.show_password', function(){
    let target_input = $(this).parent().find('input');
    if ( $(this).is('.active') ){
      $(this).removeClass('active');
      $(target_input).attr('type', 'password');
    } else {
      $(this).addClass('active');
      $(target_input).attr('type', 'text');
    }
  });

  //REDIRECTION FOR UNSECURED URLs
  $('a[redirect]').each(function(){
    var target = $(this).attr('redirect');
    $(this).click(function(e){
      e.preventDefault();
      window.open(target, '_blank');
    });
  });

	//DETECT DEVICES AND ADD CLASS ACCORDINGLY-----------------------------------------------------
  //ipad
  if ( navigator.userAgent.match(/iPad/) ){
		$('.html').addClass('ipad');
	}

  //ios
	if ( navigator.userAgent.match(/iPhone|iPad|iPod/i) ){
		$('.html').addClass('ios');
	}

  //ie/edge
	if ( navigator.userAgent.toLowerCase().match(/msie|trident/) ){
		$('.html').addClass('ie_browser');
	}

  //firefox
	if ( navigator.userAgent.toLowerCase().match(/firefox/) ){
		$('.html').addClass('firefox_browser');
	}

  //mac devices
	if ( navigator.userAgent.toLowerCase().match(/macintosh/) ){
		$('.html').addClass('safari_browser');
  }
  
  // GET BROWSER DETAILS--------------------------------------------------------------------------
	var browser_details = "";
	browser_details += "<p>Browser CodeName: " + navigator.appCodeName + "</p>";
	browser_details += "<p>Browser Name: " + navigator.appName + "</p>";
	browser_details += "<p>Browser Version: " + navigator.appVersion + "</p>";
	browser_details += "<p>Cookies Enabled: " + navigator.cookieEnabled + "</p>";
	browser_details += "<p>Browser Language: " + navigator.language + "</p>";
	browser_details += "<p>Browser Online: " + navigator.onLine + "</p>";
	browser_details += "<p>Platform: " + navigator.platform + "</p>";
  browser_details += "<p>User-agent header: " + navigator.userAgent + "</p>";
  
  // PAYMENT PROGRESS PIE CHART------------------------------------------------------------------
  var payment_progress_chart = function(prop){
     
    var build_progress_chart = '<div class="progress-pie-chart" data-percent="0"><div class="ppc-progress"><div class="ppc-progress-fill">&nbsp;</div></div><div class="ppc-percents"><div class="pcc-percents-wrapper"><span>0%</span></div></div></div><input id="value" type="text" val="0" />';
    // build progress chart
    $('body').find('#progress_chart').html(build_progress_chart);

    // calculate progress
    var calculate_progress = function(percent){
      var $ppc = $('.progress-pie-chart'),
        deg = 360*percent/100;
      if (percent > 50) {
        $ppc.addClass('gt-50');
      } else {
        $ppc.removeClass('gt-50');
      }
      $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
      $('.ppc-percents span').html(percent+'%');
    }
    calculate_progress(0);

    // run progress with conditions
    var progressCal = function(status){
      if (status == 'active'){
        var up = true;
        var value = 0;
        var increment = 1;
        var ceiling = 100;
        var timer;
    
        function PerformCalc() {
          if (up == true && value <= ceiling) {
            value += increment;
            // assign value and add trigger
            $('#value').val(value).trigger('change');
            // stop when percentage hit 100
            if (value == ceiling) {
              up = false;
            }
          } else {
              return;
          }
          calculate_progress(value);
        }
        // progress speed
        timer = setInterval(PerformCalc, 500);
      }
      
      var state_completed = false;

      $('#value').on('change', function(){
        if (state_completed == false){
          var progress = $(this).val();
          if (progress < 30){
            clearInterval(timer);
            timer = setInterval(PerformCalc, 500);
          } else if (30 < progress < 70){
            clearInterval(timer);
            timer = setInterval(PerformCalc, 1000);
          } 
          if ( progress > 70){
            clearInterval(timer);
            timer = setInterval(PerformCalc, 1500);
          }
        }
      });

      $(window).on('beforeunload', function(){
        // complete the progress if page get redirected
        state_completed = true;
        clearInterval(timer);
        timer = setInterval(PerformCalc, 10);
      });
    }
    progressCal('active');  
  }

  $('#PDPlaceOrder button').on('click', function(e){
    $('body').find('.overlay .loader').hide();
    setTimeout(function(){
      if( $('body').find('.overlay').is(':visible') ){
        if( $('.overlay .loaders').find('#progress_chart').length == 0 ) {
          $('body').find('.overlay .loader').after('<div id="progress_chart"></div>');
          payment_progress_chart();
        }
      }
    }, 300);
  });

  $('#join-insurance-form .join-details-button7, #renew-insurance-form .join-details-button7').on('click', function(e){
    $('body').find('.overlay .loader').hide();
    setTimeout(function(){
      if( $('body').find('.overlay').is(':visible') ){
        if( $('.overlay .loaders').find('#progress_chart').length == 0 ) {
          $('body').find('.overlay .loader').after('<div id="progress_chart"></div>');
          payment_progress_chart();
        }
      }
    }, 300);
  });

  // inmotion archives carousel
  $('.archive_carousel_wrapper .archive').each(function(){
    var archive_number = $(this).find('.item').length;
    
    if(archive_number > 9) {
      $(this).slick({
        dots: true,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 9,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        swipeToSlide: true,
        arrows: false,
        responsive: [
          {
            breakpoint: 769,
            settings: {
              slidesToShow: 5
            }
          },
          {
            breakpoint: 570,
            settings: {
              centerPadding: '40px',
              slidesToShow: 3
            }
          }
        ]
      }).mousewheel(function(e) {
          e.preventDefault();
      
          if (e.deltaY < 0) {
            $(this).slick('slickNext');
          }
          else {
            $(this).slick('slickPrev');
          }
      });
    } else {
      $(this).addClass('archive_grid');
      if( $(this).find('.item').length > 5 ) {
        $(this).slick({
          centerPadding: '0px',
          slidesToShow: 9,
          slidesToScroll: 1,
          arrows: false,
          responsive: [
            {
              breakpoint: 5000,
              settings: {
                unslick: true
              }
            },
            {
              breakpoint: 769,
              settings: {
                dots: true,
                centerMode: true,
                autoplay: true,
                infinite: true,
                swipeToSlide: true,
                slidesToShow: 5
              }
            },
            {
              breakpoint: 570,
              settings: {
                dots: true,
                centerMode: true,
                autoplay: true,
                infinite: true,
                swipeToSlide: true,
                centerPadding: '40px',
                slidesToShow: 3
              }
            }
          ]
        });
      } 
      else if( $(this).find('.item').length == 4 || $(this).find('.item').length == 5 ) {
        $(this).slick({
          centerPadding: '0px',
          slidesToShow: 9,
          slidesToScroll: 1,
          arrows: false,
          responsive: [
            {
              breakpoint: 5000,
              settings: {
                unslick: true
              }
            },
            {
              breakpoint: 570,
              settings: {
                dots: true,
                centerMode: true,
                autoplay: true,
                infinite: true,
                swipeToSlide: true,
                centerPadding: '40px',
                slidesToShow: 3
              }
            }
          ]
        });
      }
    }
  });

  $('.archive_wrapper .archive_year .item').on('click', function(e){
    e.preventDefault();
    var target = $(this).attr('href').replace('#', '');
    $(this).siblings().removeClass('active');
    $(this).addClass('active');
    $('.archive_carousel_wrapper .archive').removeClass('active');
    $('.'+target).addClass('active');
  });

  $.fn.loadContent = function(url, targetContainer) {
    var container = $(this);
    $(container).hide();
    $.get(url, function(result){
      var data = $(result).find(targetContainer).html();
      $(container).html(data);
    }).done(function(){
      $(container).fadeIn();
    });
  };

  // AJAXIFY APP LOADING & FETCH DATA TO POPUP MODEL
  $(document).on('click', '.initiate_data', function(e){
    e.preventDefault();
    var current = $(this);

    var appTitle = $(this).parent().find('.app_title').text();
    var appCreator = $(this).parent().find('.app_provider').text();
    var ios = $(this).parent().find('.download_urls .ios').attr('href');
    var android = $(this).parent().find('.download_urls .android').attr('href');
    var webApp = $(this).parent().find('.download_urls .webApp').attr('href');
    var checkPlatform = function(){
      if( $(current).parent().find('.app_platforms .field-item:contains("Tablet")').length > 0 ) {
        return 'true';
      } else {
        return 'false';
      }
    }
    var checkLogoSize = function(){
      if( $(current).parent().find('.app_heading').is('.logo_alt') ) {
        return 'true';
      } else {
        return 'false';
      }
    }
    var appImg = $(this).parent().find('.app_images').html();
    var appLogo = $(this).parent().find('.app_logo').html();
    var appCost = $(this).parent().find('.hidden_content .app_cost').html();
    var appDescription = $(this).parent().find('.hidden_content .app_description').html();
    var appContact = $(this).parent().find('.hidden_content .app_contact').html();
    var appTermsConditions = $(this).parent().find('.hidden_content .app_terms_conditions').text();

    // load logo
    if( checkLogoSize() == 'true' ) {
      $('#app_view_popup .app_heading').addClass('logo_alt');
    } else {
      $('#app_view_popup .app_heading').removeClass('logo_alt');
    }
    $('#app_view_popup .app_heading .app_logo').html(appLogo);
    // load title
    $('#app_view_popup .app_heading .main_heading').text(appTitle);
    // load creator
    $('#app_view_popup .app_heading .app_creator').text(appCreator);
    // load cost
    $('#app_view_popup .app_heading .app_cost .cost').html(appCost);
    // load description
    $('#app_view_popup .app_content .app_description').html(appDescription);
    // load contact
    $('#app_view_popup .app_contact .content').html(appContact);
    // load terms & conditions
    $('#app_view_popup .app_content .app_terms_conditions .content').html('<p>'+ appTermsConditions + '</p>');
    // load app download
    $('#app_view_popup .app_content .app_download .ios').attr('href', ios);
    $('#app_view_popup .app_content .app_download .android').attr('href', android);
    $('#app_view_popup .app_content .app_download .webApp').attr('href', webApp);

    // determine app platforms
    if( checkPlatform() === 'true' ) {
      $('#app_view_popup .app_screen').addClass('non_mobile');
      $('#app_view_popup .app_content .app_download .android').hide();
      $('#app_view_popup .app_content .app_download .ios').hide();
      $('#app_view_popup .app_content .app_download .webApp').show();
    } else {
      $('#app_view_popup .app_screen').removeClass('non_mobile');
      $('#app_view_popup .app_content .app_download .android').show();
      $('#app_view_popup .app_content .app_download .ios').show();
      $('#app_view_popup .app_content .app_download .webApp').hide();
    }

    // load app screens
    $('#app_view_popup .app_screen .screen_grid > div').html('');

    function loadAppImg(){
      $('#app_view_popup .app_screen .screen_grid').html(appImg);
    }

    function setLightBox(){
      var chevron = '<svg xmlns="http://www.w3.org/2000/svg" width="39.688" height="68" viewBox="0 0 39.688 68"><g id="CHEVRON_FORWARD-G_108px" data-name="CHEVRON FORWARD-G 108px" transform="translate(-944.121 -188.467)"><g id="Group_455" data-name="Group 455" transform="translate(948.121 192.467)"><path id="Path_220" data-name="Path 220" d="M-5.372,0,24.656,30.045-5.372,60" transform="translate(5.372)" fill="none" stroke="#a6a8ab" stroke-linecap="round" stroke-width="8"/></g></g></svg>';
      var $gallery = $('#app_view_popup .app_screen .screen_grid img')
      .simpleLightbox({
        sourceAttr: 'src',
        navText: ['<span class="sl_arrow_left">'+ chevron +'</span>','<span class="sl_arrow_right">'+ chevron +'</span>']});
    }

    $.when( loadAppImg() ).done(function() {
      setLightBox();
    });

    $('#app_featured, #app_grid').hide();

    $('#app_view_popup').fadeIn(1000, function () {
      setTimeout(function () {
        $('#app_view_popup .loading_overlay').fadeOut();
      }, 500);
    });

    $('html, body').animate({
      scrollTop: $('#featured_app_scroll_point').offset().top
    }, 500);
    
  });

  // close app popup
  $('#app_view_popup .close-popup').on('click', function (e) {
    var target = $(this).parent();
    e.preventDefault();
    $('#app_featured, #app_grid').show();
    $(target).addClass('fadingOut').fadeOut(500, function () {
      $('#app_view_popup .loading_overlay').show();
      $(target).removeClass('fadingOut');
    });
  });

  // style the featured app logo if it's not icon
  $('.app_inner_wrapper .app_content .app_logo img').each(function(){
    var img_width = $(this).width();
    var img_height = $(this).height();
    var current = $(this);
    if( img_width != img_height ) {
      $(current).parent().addClass('logo');
      $(current).parent().parent().addClass('logo_alt');
    }
  });

  // apply styles for cta link
  $('.cta_light').each(function () {  
    var chevron = '<svg xmlns="http://www.w3.org/2000/svg" width="39.688" height="68" viewBox="0 0 39.688 68"><g id="CHEVRON_FORWARD-G_108px" data-name="CHEVRON FORWARD-G 108px" transform="translate(-944.121 -188.467)"><g id="Group_455" data-name="Group 455" transform="translate(948.121 192.467)"><path id="Path_220" data-name="Path 220" d="M-5.372,0,24.656,30.045-5.372,60" transform="translate(5.372)" fill="none" stroke="#a6a8ab" stroke-linecap="round" stroke-width="8"/></g></g></svg>';
    $(this).append(chevron);
  });

  // auto fetch social icons
  $('.facebook_icon').each(function () {
    var icon = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="70.002" height="150" viewBox="0 0 70.002 150"><defs><clipPath id="a"><path d="M0,111.018H70v-150H0Z" transform="translate(0 38.982)" fill="#a6a8ab"/></clipPath></defs><g transform="translate(-0.001 0)"><g transform="translate(0 0)" clip-path="url(#a)"><g transform="translate(0 0)"><path d="M11.2,21.5V42.154H-3.932V67.408H11.2V142.45h31.08V67.408H63.134s1.955-12.109,2.9-25.35H42.4V24.792c0-2.578,3.386-6.053,6.738-6.053H66.069V-7.55H43.044C10.428-7.55,11.2,17.727,11.2,21.5" transform="translate(3.932 7.55)" fill="#a6a8ab"/></g></g></g></svg>';
    $(this).html(icon);
  });

  $('.twitter_icon').each(function () {
    var icon = '<svg xmlns="http://www.w3.org/2000/svg" width="150" height="103.308" viewBox="0 0 150 103.308"><g transform="translate(0.001 0)"><path d="M119.583,41.292c8.423-.693,14.14-4.527,16.34-9.719-3.042,1.862-12.475,3.9-17.687,1.962-.258-1.228-.535-2.388-.813-3.438C113.45,15.524,99.855,3.785,85.616,5.2c1.149-.466,2.319-.892,3.488-1.288,1.566-.555,10.761-2.061,9.314-5.3C97.2-4.24,85.963.773,83.842,1.427c2.794-1.05,7.412-2.853,7.907-6.063A22.279,22.279,0,0,0,80.027.912a8.052,8.052,0,0,0,2.249-4.448C70.862,3.745,64.193,18.447,58.8,32.7c-4.241-4.111-8-7.341-11.365-9.134C37.994,18.5,26.688,13.216,8.951,6.628,8.416,12.5,11.854,20.3,21.783,25.491c-2.15-.287-6.084.357-9.225,1.11,1.278,6.717,5.46,12.255,16.8,14.93-5.172.347-7.848,1.526-10.275,4.062,2.358,4.676,8.105,10.174,18.46,9.045-11.5,4.963-4.687,14.147,4.677,12.78A39.789,39.789,0,0,1-13.423,68.9c37.772,51.456,119.867,30.424,132.1-19.13,9.166.079,14.556-3.18,17.9-6.766a36.527,36.527,0,0,1-16.994-1.714" transform="translate(13.423 4.636)" fill="#a6a8ab"/></g></svg>';
    $(this).html(icon);
  });

  $('.instagram_icon').each(function () {
    var icon = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="169.063px" height="169.063px" viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve"><g><path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752   c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407   c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752   c17.455,0,31.656,14.201,31.656,31.655V122.407z"/><path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561   C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561   c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z"/><path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78   c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78 C135.661,29.421,132.821,28.251,129.921,28.251z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
    $(this).html(icon);
  });

  $('.linkedin_icon').each(function () {
    var icon = '<svg xmlns="http://www.w3.org/2000/svg" width="150" height="143.351" viewBox="0 0 150 143.351"><g transform="translate(0 0)"><path d="M134.861,79.018v55.463H102.709V82.734c0-13-4.647-21.87-16.279-21.87-8.888,0-14.179,5.975-16.5,11.763a21.885,21.885,0,0,0-1.07,7.838v54.017H36.711s.426-87.649,0-96.726H68.863V51.47c-.059.1-.149.208-.208.307h.208V51.47c4.27-6.58,11.9-15.984,28.981-15.984,21.154,0,37.017,13.824,37.017,43.532M3.062-8.869c-11,0-18.2,7.214-18.2,16.707,0,9.285,7,16.717,17.775,16.717h.218c11.216,0,18.191-7.432,18.191-16.717C20.828-1.655,14.07-8.869,3.062-8.869m-16.289,143.35H18.925V37.755H-13.227Z" transform="translate(15.139 8.869)" fill="#a6a8ab"/></g></svg>';
    $(this).html(icon);
  });

  $('.youtube_icon').each(function () {
    var icon = '<svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m490.24 113.92c-13.888-24.704-28.96-29.248-59.648-30.976-30.656-2.08-107.74-2.944-174.53-2.944-66.912 0-144.03 0.864-174.66 2.912-30.624 1.76-45.728 6.272-59.744 31.008-14.304 24.672-21.664 67.168-21.664 141.98v0.096 0.096 0.064c0 74.496 7.36 117.31 21.664 141.73 14.016 24.704 29.088 29.184 59.712 31.264 30.656 1.792 107.78 2.848 174.69 2.848 66.784 0 143.87-1.056 174.56-2.816 30.688-2.08 45.76-6.56 59.648-31.264 14.432-24.416 21.728-67.232 21.728-141.73v-0.16-0.096c0-74.848-7.296-117.34-21.76-142.02zm-298.24 238.08v-192l160 96-160 96z"/></svg>';
    $(this).html(icon);
  });

  $('.transform_icon').each(function () {
    var icon = '<svg class="transform" xmlns="http://www.w3.org/2000/svg" width="364.896" height="157.728" viewBox="0 0 364.896 157.728"><g transform="translate(-207.572 -411.937)"><g transform="translate(207.572 535.053)"><path d="M214.252,484.269h-6.68v-7.732h21.537v7.732h-6.72v25.665h-8.137Z" transform="translate(-207.572 -475.93)" fill="#818386"/><path d="M234.508,509.912l-2.793-6.761a16.114,16.114,0,0,1-2.509.162h-1.378v6.639h-8.135V476.558h8.339c11.01,0,15.1,6.435,15.1,13.358a13.193,13.193,0,0,1-4.249,10.2l5.059,9.8Zm-5.059-14.533c3.764,0,5.706-2.347,5.706-5.464,0-3.157-1.983-5.423-5.706-5.423h-1.621v10.887Z" transform="translate(-195.165 -475.908)" fill="#818386"/><path d="M253.9,505.765H241.03l-1.378,4.128h-8.539l12.141-33.316h8.422l11.941,33.316h-8.339Zm-2.1-6.356-4.33-13.157-4.332,13.157Z" transform="translate(-183.477 -475.889)" fill="#818386"/><path d="M248.233,476.558h8.216l10.729,18.864V476.558h8.177v33.354h-8.1L256.41,490.887v19.026h-8.177Z" transform="translate(-165.952 -475.908)" fill="#818386"/><path d="M263.292,499.393h7.975a3.855,3.855,0,0,0,4.007,4.049c2.266,0,3.683-1.378,3.683-3.28,0-2.226-1.862-3.116-5.423-4.373-5.789-2.024-9.068-4.573-9.068-10.039,0-5.706,4.654-9.513,10.688-9.513,6.475,0,10.725,4.211,10.765,10.567l-7.449-.043c-.081-1.941-1.131-3.481-3.317-3.481a2.7,2.7,0,0,0-3,2.59c0,2.066,2.064,2.752,4.533,3.6,5.668,1.9,10.484,3.6,10.484,10.808,0,6.6-5.14,10.484-11.858,10.484C268.151,510.767,263.332,506.153,263.292,499.393Z" transform="translate(-150.539 -476.237)" fill="#818386"/><path d="M276.772,476.537h18.3v7.732H284.907v5.951h9.232v6.923h-9.232v12.791h-8.135Z" transform="translate(-136.741 -475.93)" fill="#818386"/><path d="M304.3,510.848a17.306,17.306,0,1,1,17.285-17.326A17.187,17.187,0,0,1,304.3,510.848Zm0-26.434a9.128,9.128,0,1,0,9.108,9.108A9,9,0,0,0,304.3,484.414Z" transform="translate(-126.299 -476.237)" fill="#818386"/><path d="M320.769,509.912l-2.792-6.761a16.114,16.114,0,0,1-2.509.162h-1.378v6.639h-8.137V476.558h8.339c11.012,0,15.1,6.435,15.1,13.358a13.191,13.191,0,0,1-4.247,10.2l5.059,9.8Zm-5.059-14.533c3.764,0,5.707-2.347,5.707-5.464,0-3.157-1.985-5.423-5.707-5.423h-1.621v10.887Z" transform="translate(-106.873 -475.908)" fill="#818386"/><path d="M319.372,476.577H330.18l8.5,22.63,8.38-22.63H357.79v33.316h-8.139V490.382l-7.406,19.511H335l-7.489-19.754v19.754h-8.137Z" transform="translate(-93.137 -475.889)" fill="#818386"/><path d="M340.411,506.776c14.533-10.444,19.471-13.115,19.471-19.347,0-4.695-3.076-7.934-8.1-7.934-5.1,0-8.258,3.642-8.258,8.622h-3.116c0-6.761,4.535-11.66,11.415-11.66,6.639,0,11.215,4.332,11.215,10.848,0,7.772-5.668,10.81-18.135,19.471h17.407l.038,3.2h-21.94Z" transform="translate(-71.602 -476.012)" fill="#818386"/><path d="M370.078,510.848a17.306,17.306,0,1,1,17.285-17.326A17.188,17.188,0,0,1,370.078,510.848Zm0-31.333a14.027,14.027,0,1,0,14.005,14.007A13.868,13.868,0,0,0,370.078,479.515Z" transform="translate(-58.97 -476.237)" fill="#818386"/><path d="M374.973,479.8l-5.182-.04,1.012-3.2,7.408.038v33.316h-3.238Z" transform="translate(-41.529 -475.908)" fill="#818386"/><path d="M396.417,498.642l-7.977,11.536h-3.683l7.327-10.525a12.526,12.526,0,0,1-4.049.769c-7.366,0-12.263-5.221-12.263-11.943a12.265,12.265,0,0,1,24.53.081C400.342,491.639,399.733,493.865,396.417,498.642Zm.645-10.081a9.027,9.027,0,1,0-9.027,8.989A8.812,8.812,0,0,0,397.062,488.561Z" transform="translate(-35.407 -476.175)" fill="#818386"/></g><g transform="translate(336.211 411.936)"><path d="M296.952,416.7H283.1a1.075,1.075,0,1,0,0,2.149h13.853a1.075,1.075,0,1,0,0-2.149Z" transform="translate(-260.006 -407.064)" fill="#b8c0c6"/><path d="M313.57,426.206a1.075,1.075,0,1,0,1.738-1.265l-8.143-11.209a1.075,1.075,0,0,0-1.5-.237,1.078,1.078,0,0,0-.239,1.5Z" transform="translate(-236.261 -410.551)" fill="#b8c0c6"/><path d="M320.24,445.33a1.043,1.043,0,0,0,.332.053,1.076,1.076,0,0,0,1.024-.743l4.28-13.175a1.076,1.076,0,0,0-.69-1.356,1.076,1.076,0,0,0-1.354.69l-4.282,13.177a1.075,1.075,0,0,0,.69,1.354Z" transform="translate(-221.648 -393.39)" fill="#b8c0c6"/><path d="M325.911,453.29a1.067,1.067,0,0,0-.82-.065l-13.177,4.282a1.074,1.074,0,0,0-.156,1.979,1.052,1.052,0,0,0,.822.065l13.178-4.282a1.054,1.054,0,0,0,.623-.532,1.071,1.071,0,0,0-.47-1.447Z" transform="translate(-230.169 -369.729)" fill="#b8c0c6"/><path d="M292.841,459.762a1.075,1.075,0,0,0-1.265,1.738l11.211,8.145a1.067,1.067,0,0,0,.629.2.954.954,0,0,0,.17-.014,1.073,1.073,0,0,0,.463-1.928Z" transform="translate(-250.679 -363.194)" fill="#b8c0c6"/><path d="M276.978,445.854a1.075,1.075,0,0,0-1.074,1.074v13.855a1.076,1.076,0,1,0,2.151,0V446.928A1.077,1.077,0,0,0,276.978,445.854Z" transform="translate(-266.27 -377.219)" fill="#b8c0c6"/><path d="M284.149,425.682l-11.211,8.145a1.075,1.075,0,0,0,.463,1.93,1.011,1.011,0,0,0,.172.014,1.077,1.077,0,0,0,.629-.2l11.209-8.145a1.079,1.079,0,0,0,.239-1.5A1.077,1.077,0,0,0,284.149,425.682Z" transform="translate(-269.757 -398.076)" fill="#b8c0c6"/><path d="M290,415.209l13.178,4.282a1.106,1.106,0,0,0,.332.053,1.076,1.076,0,0,0,.332-2.1l-13.177-4.282a1.069,1.069,0,0,0-.82.065,1.076,1.076,0,0,0,.156,1.981Z" transform="translate(-252.596 -410.735)" fill="#b8c0c6"/><path d="M281.533,452.711a1.074,1.074,0,0,0-1.979-.158,1.061,1.061,0,0,0-.065.819l4.28,13.18a1.08,1.08,0,0,0,1.022.743,1.085,1.085,0,0,0,.959-.589,1.069,1.069,0,0,0,.065-.82Z" transform="translate(-262.654 -370.963)" fill="#b8c0c6"/><path d="M280.994,432.134a1.077,1.077,0,0,0-1.5.237l-8.143,11.211a1.074,1.074,0,0,0,.868,1.706,1.189,1.189,0,0,0,.17-.012,1.079,1.079,0,0,0,.7-.431l8.143-11.209A1.076,1.076,0,0,0,280.994,432.134Z" transform="translate(-271.142 -391.473)" fill="#b8c0c6"/><path d="M328.612,438.255a1.071,1.071,0,0,0-1.5.239L318.967,449.7a1.075,1.075,0,0,0,1.738,1.265l8.145-11.211a1.074,1.074,0,0,0-.239-1.5Z" transform="translate(-222.399 -385.208)" fill="#b8c0c6"/><path d="M319.99,458.821H306.134a1.075,1.075,0,0,0,0,2.149H319.99a1.075,1.075,0,1,0,0-2.149Z" transform="translate(-236.425 -363.947)" fill="#b8c0c6"/><path d="M286.629,457.132a1.075,1.075,0,1,0-1.74,1.263l8.145,11.209a1.074,1.074,0,1,0,1.738-1.263Z" transform="translate(-257.282 -366.13)" fill="#b8c0c6"/><path d="M278.006,439a1.077,1.077,0,0,0-1.356.692l-4.282,13.176a1.079,1.079,0,0,0,.69,1.356,1.116,1.116,0,0,0,.334.053,1.1,1.1,0,0,0,.488-.117,1.074,1.074,0,0,0,.534-.625l4.282-13.178A1.079,1.079,0,0,0,278.006,439Z" transform="translate(-269.941 -384.287)" fill="#b8c0c6"/><path d="M290.165,420.281l-13.177,4.282a1.076,1.076,0,0,0-.156,1.981,1.1,1.1,0,0,0,.488.117,1.117,1.117,0,0,0,.334-.053l13.175-4.282a1.075,1.075,0,1,0-.664-2.046Z" transform="translate(-265.92 -403.448)" fill="#b8c0c6"/><path d="M308.908,422.025a1.075,1.075,0,0,0,1.265-1.738l-11.211-8.145a1.075,1.075,0,1,0-1.263,1.74Z" transform="translate(-244.413 -411.936)" fill="#b8c0c6"/><path d="M319.1,438.822a1.076,1.076,0,0,0,1.074-1.075V423.89a1.074,1.074,0,0,0-2.149,0v13.858A1.077,1.077,0,0,0,319.1,438.822Z" transform="translate(-223.153 -400.8)" fill="#b8c0c6"/><path d="M328.345,446.029a1.064,1.064,0,0,0-.8.19l-11.209,8.145a1.075,1.075,0,0,0,.633,1.945,1.059,1.059,0,0,0,.629-.206l11.209-8.143a1.062,1.062,0,0,0,.431-.7,1.073,1.073,0,0,0-.894-1.228Z" transform="translate(-225.336 -377.055)" fill="#b8c0c6"/><path d="M312.741,464.626l-13.177-4.282a1.075,1.075,0,1,0-.664,2.046l13.175,4.28a1.064,1.064,0,0,0,.334.053,1.074,1.074,0,0,0,.332-2.1Z" transform="translate(-243.493 -362.443)" fill="#b8c0c6"/><path d="M316.713,431.625a1.079,1.079,0,0,0,1.024.743,1.1,1.1,0,0,0,.33-.053,1.078,1.078,0,0,0,.69-1.356l-4.28-13.177a1.082,1.082,0,0,0-1.356-.69,1.075,1.075,0,0,0-.69,1.354Z" transform="translate(-228.935 -406.713)" fill="#b8c0c6"/></g><g transform="translate(344.634 420.359)"><path d="M310.965,428.259a1.011,1.011,0,0,0,.662.4,1.044,1.044,0,0,0,.16.012,1,1,0,0,0,.593-.194,1.015,1.015,0,0,0,.225-1.414l-6.842-9.414a.988.988,0,0,0-.3-.273.406.406,0,0,0-.1-.04.912.912,0,0,0-.263-.093,1.008,1.008,0,0,0-.308.008l-.083.006a1.013,1.013,0,0,0-.589,1.583Z" transform="translate(-246.004 -414.933)" fill="#a2a61f"/><path d="M316.621,444.365a1.071,1.071,0,0,0,.316.051,1.016,1.016,0,0,0,.961-.7l3.6-11.069a1.012,1.012,0,0,0-1.423-1.214,1.008,1.008,0,0,0-.5.589l-3.6,11.069a1.016,1.016,0,0,0,.65,1.277Z" transform="translate(-233.729 -400.52)" fill="#a2a61f"/><path d="M303.394,463.43a1.024,1.024,0,0,0-.271-.3l-9.416-6.842a1.013,1.013,0,1,0-1.192,1.637l9.418,6.844a1.012,1.012,0,0,0,1.412-.225,1.03,1.03,0,0,0,.168-.364.538.538,0,0,0,.008-.119l0-.069a.738.738,0,0,0,0-.2,1.012,1.012,0,0,0-.1-.279Z" transform="translate(-258.116 -375.156)" fill="#a2a61f"/><path d="M280.316,444.589A1.014,1.014,0,0,0,279.3,445.6V457.24a1.013,1.013,0,1,0,2.026,0V445.6A1.016,1.016,0,0,0,280.316,444.589Z" transform="translate(-271.211 -386.937)" fill="#a2a61f"/><path d="M324.318,445.634a.5.5,0,0,0-.01-.128,1.01,1.01,0,0,0-.824-.769,1.008,1.008,0,0,0-.757.18l-9.416,6.842a1.012,1.012,0,0,0,.6,1.831.991.991,0,0,0,.593-.194l9.414-6.838.04-.04a.965.965,0,0,0,.233-.255.5.5,0,0,0,.051-.121l.028-.075a.671.671,0,0,0,.055-.17.622.622,0,0,0,0-.194Z" transform="translate(-236.827 -386.798)" fill="#a2a61f"/><path d="M287.032,427.485a1,1,0,0,0-.757.182l-9.416,6.842a1.012,1.012,0,0,0-.223,1.414,1.074,1.074,0,0,0,.166.18,1.019,1.019,0,0,0,1.249.045l9.416-6.842a1.015,1.015,0,0,0-.435-1.821Z" transform="translate(-274.141 -404.457)" fill="#a2a61f"/><path d="M310.391,460.364l-11.069-3.6a1.006,1.006,0,0,0-.773.061,1.013,1.013,0,0,0-.443,1.362,1.007,1.007,0,0,0,.589.5l11.071,3.6a1.023,1.023,0,0,0,.312.049,1.009,1.009,0,0,0,.963-.7,1.011,1.011,0,0,0-.65-1.275Z" transform="translate(-252.079 -374.524)" fill="#a2a61f"/><path d="M291.225,419.06l11.069,3.6a1.031,1.031,0,0,0,.312.049,1.012,1.012,0,0,0,.314-1.975l-11.069-3.6a1.013,1.013,0,0,0-.625,1.926Z" transform="translate(-259.726 -415.09)" fill="#a2a61f"/><path d="M313.588,432.779a1.011,1.011,0,0,0,.965.7,1.01,1.01,0,0,0,.963-1.325l-3.6-11.067a.266.266,0,0,0-.041-.081,1.038,1.038,0,0,0-.156-.271.772.772,0,0,0-.142-.117l-.057-.045a.616.616,0,0,0-.109-.079,1.022,1.022,0,0,0-.3-.087l-.077-.018a1.029,1.029,0,0,0-.4.044,1.016,1.016,0,0,0-.65,1.277Z" transform="translate(-239.851 -411.711)" fill="#a2a61f"/><path d="M324.1,438.715l-.028-.073a.442.442,0,0,0-.051-.123,1,1,0,0,0-.633-.459.51.51,0,0,0-.152-.012l-.081,0a.571.571,0,0,0-.156,0,1,1,0,0,0-.281.1l-.085.034a1,1,0,0,0-.3.271l-6.842,9.416a1.01,1.01,0,0,0,.225,1.415.993.993,0,0,0,.595.194,1.016,1.016,0,0,0,.82-.417l6.785-9.339h.091v-.136a.991.991,0,0,0,.132-.31.541.541,0,0,0,.008-.121l.006-.071a.776.776,0,0,0,0-.194A.673.673,0,0,0,324.1,438.715Z" transform="translate(-234.362 -393.643)" fill="#a2a61f"/><path d="M288.512,454.106a1.012,1.012,0,0,0-1.819.437,1,1,0,0,0,.18.753l6.842,9.418a.816.816,0,0,0,.154.15l.15-.123-.105.164a.458.458,0,0,0,.091.077.571.571,0,0,0,.148.061l.081.03a.513.513,0,0,0,.14.044.893.893,0,0,0,.164.014,1.006,1.006,0,0,0,.591-.192,1.03,1.03,0,0,0,.322-.419.946.946,0,0,0,.085-.243,1.014,1.014,0,0,0-.18-.755Z" transform="translate(-263.662 -377.621)" fill="#a2a61f"/><path d="M281.214,438.839h0a1.021,1.021,0,0,0-.775.061,1.011,1.011,0,0,0-.5.589l-3.6,11.071a1.012,1.012,0,0,0-.044.4.552.552,0,0,0,.034.142l.022.077a.6.6,0,0,0,.049.154.3.3,0,0,0,.057.077,1,1,0,0,0,.186.231,1.02,1.02,0,0,0,.662.247,1.019,1.019,0,0,0,.459-.111,1,1,0,0,0,.5-.591l3.6-11.067a1.016,1.016,0,0,0-.65-1.277Z" transform="translate(-274.295 -392.873)" fill="#a2a61f"/><path d="M321.1,450.739h0a.91.91,0,0,0-.2.016l-.008.194h0l-.059-.184a.406.406,0,0,0-.127.018l-11.071,3.6a1.013,1.013,0,0,0,.314,1.977,1.046,1.046,0,0,0,.314-.049l11.069-3.6a1.012,1.012,0,0,0-.227-1.971Z" transform="translate(-240.888 -380.642)" fill="#a2a61f"/><path d="M292.131,423.175a1.011,1.011,0,0,0-.771-.061l-11.071,3.6a1.013,1.013,0,0,0,.316,1.975,1.023,1.023,0,0,0,.312-.049l11.071-3.6a1.012,1.012,0,0,0,.144-1.866Z" transform="translate(-270.917 -408.969)" fill="#a2a61f"/><path d="M307.075,424.772a1,1,0,0,0,.593.194.867.867,0,0,0,.16-.014,1,1,0,0,0,.66-.4,1.023,1.023,0,0,0,.182-.755,1,1,0,0,0-.407-.662l-9.414-6.842a1.013,1.013,0,1,0-1.192,1.639Z" transform="translate(-252.853 -416.099)" fill="#a2a61f"/><path d="M315.7,438.9a1.012,1.012,0,0,0,1.012-1.012V426.25a1.013,1.013,0,0,0-2.026,0v11.639A1.014,1.014,0,0,0,315.7,438.9Z" transform="translate(-234.994 -406.744)" fill="#a2a61f"/><path d="M284.246,450.425a1,1,0,0,0-.5-.591.992.992,0,0,0-.771-.061,1.015,1.015,0,0,0-.652,1.277l3.6,11.069a.879.879,0,0,0,.117.235l.03.053a.5.5,0,0,0,.079.081,1.006,1.006,0,0,0,1.7-.994Z" transform="translate(-268.175 -381.682)" fill="#a2a61f"/><path d="M284.158,433.746h0a1.013,1.013,0,0,0-1.819-.437l-6.842,9.416-.016.024a1.009,1.009,0,0,0-.164.728,1,1,0,0,0,.136.37.975.975,0,0,0,.269.291,1,1,0,0,0,.593.194,1.092,1.092,0,0,0,.162-.012,1.012,1.012,0,0,0,.66-.4l6.842-9.418A1.007,1.007,0,0,0,284.158,433.746Z" transform="translate(-275.305 -398.91)" fill="#a2a61f"/><path d="M316.447,455.481h-11.64a1.013,1.013,0,0,0,0,2.026h11.64a1.013,1.013,0,0,0,0-2.026Z" transform="translate(-246.142 -375.788)" fill="#a2a61f"/><path d="M297.1,420.1h-11.64a1.013,1.013,0,0,0,0,2.026H297.1a1.013,1.013,0,0,0,0-2.026Z" transform="translate(-265.95 -412.005)" fill="#a2a61f"/></g><g transform="translate(351.6 427.325)"><path d="M302.819,421.812a1.1,1.1,0,0,0,.174.384l5.747,7.908a1.069,1.069,0,0,0,.7.429,1.163,1.163,0,0,0,.166.012,1.068,1.068,0,0,0,1.056-.9,1.08,1.08,0,0,0-.19-.8l-5.747-7.908a1.062,1.062,0,0,0-.7-.427,1.043,1.043,0,0,0-.8.19,1.062,1.062,0,0,0-.283.31,1,1,0,0,0-.089.212.719.719,0,0,0-.055.178.841.841,0,0,0,0,.237Zm.362-.245Z" transform="translate(-254.133 -418.564)" fill="#00a1ed"/><path d="M313.6,443.714h0a1.069,1.069,0,0,0,1.348-.686l3.021-9.3a1.071,1.071,0,1,0-2.036-.664l-3.021,9.3A1.071,1.071,0,0,0,313.6,443.714Z" transform="translate(-243.825 -406.456)" fill="#00a1ed"/><path d="M305.523,427.222a1.057,1.057,0,0,0,.627.2,1.2,1.2,0,0,0,.17-.012,1.07,1.07,0,0,0,.461-1.922l-7.91-5.749a1.071,1.071,0,0,0-1.686,1.036,1.061,1.061,0,0,0,.427.7Z" transform="translate(-259.888 -419.541)" fill="#00a1ed"/><path d="M302.89,459.792a.94.94,0,0,0-.077-.235l-.065-.154a1.051,1.051,0,0,0-.285-.312l-7.908-5.745a1.07,1.07,0,1,0-1.261,1.73l7.91,5.749a1.072,1.072,0,0,0,1.493-.239,1.035,1.035,0,0,0,.176-.384l.018-.16,0-.051A.654.654,0,0,0,302.89,459.792Zm-.413-.049h0l0,0Zm-.028-.079Z" transform="translate(-264.309 -385.149)" fill="#00a1ed"/><path d="M283.176,443.472a1.073,1.073,0,0,0-1.07,1.073v9.776a1.07,1.07,0,0,0,2.141,0v-9.776A1.074,1.074,0,0,0,283.176,443.472Z" transform="translate(-275.31 -395.046)" fill="#00a1ed"/><path d="M289.549,429.535a1.076,1.076,0,0,0-1.5-.237l-7.908,5.747a1.072,1.072,0,0,0,.459,1.924,1.2,1.2,0,0,0,.17.012,1.057,1.057,0,0,0,.627-.2l7.91-5.747a1.055,1.055,0,0,0,.427-.7A1.069,1.069,0,0,0,289.549,429.535Z" transform="translate(-277.77 -409.761)" fill="#00a1ed"/><path d="M286.686,448.525a1.07,1.07,0,0,0-2.036.662l3.021,9.3a.982.982,0,0,0,.119.229,1.05,1.05,0,0,0,.415.4,1.1,1.1,0,0,0,.484.115,1.083,1.083,0,0,0,.332-.053,1.07,1.07,0,0,0,.623-.534,1.058,1.058,0,0,0,.063-.815Z" transform="translate(-272.759 -390.631)" fill="#00a1ed"/><path d="M310.915,433.84h0a1.072,1.072,0,0,0,2.038-.664l-3.021-9.3a1.077,1.077,0,0,0-1.35-.686,1.068,1.068,0,0,0-.686,1.35Z" transform="translate(-248.966 -415.855)" fill="#00a1ed"/><path d="M290.239,451.558a1.074,1.074,0,0,0-.7-.427,1.053,1.053,0,0,0-.8.19,1.073,1.073,0,0,0-.239,1.5l5.749,7.91a1.065,1.065,0,0,0,.7.427.951.951,0,0,0,.168.014,1.052,1.052,0,0,0,.627-.2,1.071,1.071,0,0,0,.237-1.5Z" transform="translate(-268.968 -387.221)" fill="#00a1ed"/><path d="M284.62,439.186a1.07,1.07,0,0,0-1.971.154l-3.021,9.3a1.07,1.07,0,0,0,2.036.662l3.021-9.3A1.063,1.063,0,0,0,284.62,439.186Z" transform="translate(-277.9 -400.033)" fill="#00a1ed"/><path d="M317.034,448.685l-9.3,3.025a1.072,1.072,0,0,0-.688,1.346,1.067,1.067,0,0,0,.536.627,1.094,1.094,0,0,0,.482.115,1.073,1.073,0,0,0,.332-.053l9.3-3.021a1.074,1.074,0,0,0,.688-1.35A1.081,1.081,0,0,0,317.034,448.685Z" transform="translate(-249.838 -389.759)" fill="#00a1ed"/><path d="M292.386,425.444l-9.3,3.021a.765.765,0,0,0-.178.091,1.047,1.047,0,0,0-.445.439,1.074,1.074,0,0,0,.953,1.56,1.048,1.048,0,0,0,.332-.055l9.3-3.021a1.07,1.07,0,0,0-.662-2.036Z" transform="translate(-275.063 -413.552)" fill="#00a1ed"/><path d="M312.9,439.136a1.071,1.071,0,0,0,1.07-1.07v-9.776a1.07,1.07,0,1,0-2.141,0v9.776A1.071,1.071,0,0,0,312.9,439.136Z" transform="translate(-244.887 -411.684)" fill="#00a1ed"/><path d="M319.858,443.739h0a.748.748,0,0,0-.273-.105l-.117-.036a.847.847,0,0,0-.227,0,.705.705,0,0,0-.18.016,1.034,1.034,0,0,0-.387.176l-7.908,5.745a1.071,1.071,0,0,0-.239,1.5,1.07,1.07,0,0,0,.7.429,1.2,1.2,0,0,0,.17.012,1.062,1.062,0,0,0,.627-.2l7.91-5.745a1.072,1.072,0,0,0-.075-1.783Z" transform="translate(-246.427 -394.926)" fill="#00a1ed"/><path d="M292.271,422.458l9.3,3.023a1.077,1.077,0,0,0,.33.051,1.055,1.055,0,0,0,.486-.117,1.07,1.07,0,0,0-.156-1.971l-9.3-3.021a1.07,1.07,0,0,0-.662,2.036Z" transform="translate(-265.662 -418.694)" fill="#00a1ed"/><path d="M308.505,456.734l-9.3-3.021a1.07,1.07,0,0,0-.66,2.036l9.3,3.021a1.1,1.1,0,0,0,.334.053,1.07,1.07,0,0,0,.328-2.088Z" transform="translate(-259.238 -384.618)" fill="#00a1ed"/><path d="M319.8,438.169a1.071,1.071,0,0,0-.387-.178.8.8,0,0,0-.194-.014.862.862,0,0,0-.219,0,.753.753,0,0,0-.275.093l-.107.046a1.048,1.048,0,0,0-.316.287l-5.745,7.91a1.07,1.07,0,1,0,1.73,1.259l5.745-7.908a1.071,1.071,0,0,0-.233-1.5Z" transform="translate(-244.355 -400.678)" fill="#00a1ed"/><path d="M280.683,443.256l5.745-7.91a1.058,1.058,0,0,0,.192-.8,1.069,1.069,0,0,0-.429-.7,1.08,1.08,0,0,0-1.5.239L278.951,442a1.074,1.074,0,0,0,.237,1.5,1.059,1.059,0,0,0,.627.2A1.08,1.08,0,0,0,280.683,443.256Z" transform="translate(-278.747 -405.102)" fill="#00a1ed"/><path d="M313.525,452.622h-9.776a1.07,1.07,0,1,0,0,2.141h9.776a1.07,1.07,0,0,0,0-2.141Z" transform="translate(-254.252 -385.68)" fill="#00a1ed"/><path d="M297.271,422.9h-9.778a1.07,1.07,0,0,0,0,2.141h9.778a1.07,1.07,0,0,0,0-2.141Z" transform="translate(-270.891 -416.103)" fill="#00a1ed"/></g><g transform="translate(357.874 433.599)"><path d="M301.9,424.605a.939.939,0,0,0,.156.342l4.786,6.587a.949.949,0,0,0,.619.383.963.963,0,0,0,.154.012.953.953,0,0,0,.937-.8.949.949,0,0,0-.17-.71l-4.788-6.589a.945.945,0,0,0-.617-.378.935.935,0,0,0-.71.168.92.92,0,0,0-.253.277.735.735,0,0,0-.079.186l-.049.16a.809.809,0,0,0,0,.21Zm.393-.409Z" transform="translate(-261.341 -421.828)" fill="#0069a8"/><path d="M310.929,442.894l0,0a1.019,1.019,0,0,0,.291.044.947.947,0,0,0,.9-.658l2.517-7.744a.936.936,0,0,0-.059-.726.95.95,0,0,0-1.75.138l-2.517,7.746A.953.953,0,0,0,310.929,442.894Z" transform="translate(-252.754 -411.741)" fill="#0069a8"/><path d="M304.178,429.148a.941.941,0,0,0,.559.182.951.951,0,0,0,.561-1.72l-6.591-4.79a.951.951,0,0,0-1.5.921.937.937,0,0,0,.38.619Z" transform="translate(-266.136 -422.641)" fill="#0069a8"/><path d="M302.011,456.022l-.059-.142a.93.93,0,0,0-.255-.277l-6.589-4.788a.937.937,0,0,0-.708-.17.95.95,0,0,0-.411,1.708l6.591,4.79a.952.952,0,0,0,1.327-.213.936.936,0,0,0,.158-.344.84.84,0,0,0,.014-.186l.006-.129-.008-.049A.729.729,0,0,0,302.011,456.022Zm-.308.378Z" transform="translate(-269.819 -393.991)" fill="#0069a8"/><path d="M285.6,442.578a.953.953,0,0,0-.951.953v8.143a.951.951,0,1,0,1.9,0v-8.143A.953.953,0,0,0,285.6,442.578Z" transform="translate(-278.984 -402.235)" fill="#0069a8"/><path d="M290.952,430.991a.956.956,0,0,0-1.327-.21l-6.589,4.788a.951.951,0,1,0,1.117,1.54l6.589-4.788a.934.934,0,0,0,.38-.619A.951.951,0,0,0,290.952,430.991Z" transform="translate(-281.034 -414.494)" fill="#0069a8"/><path d="M288.578,446.828a.948.948,0,0,0-.476-.555.936.936,0,0,0-.722-.055.95.95,0,0,0-.611,1.2l2.515,7.746a.862.862,0,0,0,.109.207.907.907,0,0,0,.366.346.939.939,0,0,0,.429.105.953.953,0,0,0,.907-1.247Z" transform="translate(-276.858 -398.557)" fill="#0069a8"/><path d="M308.649,434.632a.948.948,0,0,0,.9.656.931.931,0,0,0,.293-.046.948.948,0,0,0,.611-1.2l-2.517-7.746a.958.958,0,0,0-1.2-.611.944.944,0,0,0-.55.474.954.954,0,0,0-.059.727Z" transform="translate(-257.037 -419.571)" fill="#0069a8"/><path d="M291.527,449.34h0a.951.951,0,0,0-1.708.409.95.95,0,0,0,.168.708l4.788,6.589a.944.944,0,0,0,.621.38.965.965,0,0,0,.15.014.93.93,0,0,0,.559-.184.95.95,0,0,0,.21-1.327Z" transform="translate(-273.7 -395.716)" fill="#0069a8"/><path d="M286.853,439.039a.951.951,0,0,0-.552-.471h0a.95.95,0,0,0-1.2.609l-2.517,7.748a.907.907,0,0,0-.043.374.951.951,0,0,0,1.852.212l2.517-7.746A.963.963,0,0,0,286.853,439.039Z" transform="translate(-281.142 -406.39)" fill="#0069a8"/><path d="M313.785,446.924l-7.752,2.519a.951.951,0,0,0-.134,1.752.952.952,0,0,0,.429.105.941.941,0,0,0,.3-.049l7.746-2.517a.938.938,0,0,0,.552-.471.952.952,0,0,0-1.137-1.34Z" transform="translate(-257.764 -397.831)" fill="#0069a8"/><path d="M293.25,427.561l-7.744,2.517a.609.609,0,0,0-.156.079.931.931,0,0,0-.4.395.953.953,0,0,0,.848,1.384.914.914,0,0,0,.3-.049l7.746-2.515a.952.952,0,0,0-.589-1.811Z" transform="translate(-278.778 -417.653)" fill="#0069a8"/><path d="M310.359,439.083a.953.953,0,0,0,.951-.951v-8.145a.952.952,0,0,0-1.9,0v8.145A.954.954,0,0,0,310.359,439.083Z" transform="translate(-253.639 -416.096)" fill="#0069a8"/><path d="M316.187,442.807l0,0a.967.967,0,0,0-.267-.105l-.077-.018a.768.768,0,0,0-.192,0l-.172.014a.91.91,0,0,0-.342.156l-6.589,4.788a.952.952,0,0,0-.212,1.327.964.964,0,0,0,.625.382,1.209,1.209,0,0,0,.146.01.928.928,0,0,0,.559-.182l6.589-4.786a.952.952,0,0,0-.065-1.584Zm-.194.322Z" transform="translate(-254.922 -402.135)" fill="#0069a8"/><path d="M293.154,425.187,300.9,427.7a.955.955,0,0,0,.727-.057.952.952,0,0,0-.14-1.752l-7.746-2.517a.954.954,0,0,0-1.2.609.953.953,0,0,0,.609,1.2Z" transform="translate(-270.946 -421.936)" fill="#0069a8"/><path d="M306.715,453.627l-7.744-2.515a.951.951,0,1,0-.587,1.809l7.746,2.517a.927.927,0,0,0,.293.047.952.952,0,0,0,.291-1.858Z" transform="translate(-265.595 -393.548)" fill="#0069a8"/><path d="M316.138,438.171h0a.938.938,0,0,0-.344-.158.9.9,0,0,0-.174-.014.758.758,0,0,0-.192,0,.622.622,0,0,0-.231.079l-.109.045a.988.988,0,0,0-.279.255l-4.786,6.591a.951.951,0,0,0,1.538,1.119l4.788-6.589a.953.953,0,0,0-.208-1.329Z" transform="translate(-253.196 -406.928)" fill="#0069a8"/><path d="M283.569,442.491l4.786-6.589a.942.942,0,0,0,.17-.708h0a.951.951,0,0,0-1.71-.411l-4.786,6.591a.951.951,0,0,0,.21,1.327.939.939,0,0,0,.557.182A.96.96,0,0,0,283.569,442.491Z" transform="translate(-281.847 -410.613)" fill="#0069a8"/><path d="M310.879,450.2h-8.143a.952.952,0,0,0,0,1.9h8.143a.952.952,0,1,0,0-1.9Z" transform="translate(-261.44 -394.433)" fill="#0069a8"/><path d="M297.338,425.439h-8.145a.952.952,0,0,0,0,1.9h8.145a.952.952,0,0,0,0-1.9Z" transform="translate(-275.302 -419.778)" fill="#0069a8"/></g></g></svg>';
    $(this).html(icon);
    $(this).addClass('gray');
    var current = $(this);
    $(this).parent().on('mouseover', function () {  
      $(current).removeClass('gray');
    }).on('mouseleave', function () {  
      $(current).addClass('gray');
    });
  });

  // load svg for back to prev button
  $('.arrow_left').each(function () {
    var arrow_icon = '<svg enable-background="new 0 0 400.004 400.004" version="1.1" viewBox="0 0 400 400" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m382.69 182.69h-323.57l77.209-77.214c6.764-6.76 6.764-17.726 0-24.485-6.764-6.764-17.73-6.764-24.484 0l-106.77 106.77c-6.764 6.76-6.764 17.727 0 24.485l106.77 106.78c3.381 3.383 7.812 5.072 12.242 5.072s8.861-1.689 12.242-5.072c6.764-6.76 6.764-17.726 0-24.484l-77.209-77.218h323.57c9.562 0 17.316-7.753 17.316-17.315s-7.753-17.314-17.316-17.314z"/></svg>';
    $(this).html(arrow_icon);
  });

  // load svg for back to prev button
  $('.plus_circle').each(function () {
    var plus_circle = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 612 612" xml:space="preserve"><g xmlns="http://www.w3.org/2000/svg"><path d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-137.012,306-306S475.008,0,306,0z M306,573.75C158.125,573.75,38.25,453.875,38.25,306C38.25,158.125,158.125,38.25,306,38.25c147.875,0,267.75,119.875,267.75,267.75C573.75,453.875,453.875,573.75,306,573.75zM420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125c-10.557,0-19.125,8.568-19.125,19.125v95.625H191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125h95.625v95.625c0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625c10.557,0,19.125-8.568,19.125-19.125C439.875,295.443,431.307,286.875,420.75,286.875z"/></g></svg>';
    $(this).html(plus_circle);
  });

  // auto fetch top nav icons
  $('.user_icon').each(function () {
    var icon = '<svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m437.02 330.98c-27.883-27.882-61.071-48.523-97.281-61.018 38.782-26.711 64.261-71.414 64.261-121.96 0-81.607-66.393-148-148-148s-148 66.393-148 148c0 50.548 25.479 95.251 64.262 121.96-36.21 12.495-69.398 33.136-97.281 61.018-48.352 48.353-74.981 112.64-74.981 181.02h40c0-119.1 96.897-216 216-216s216 96.897 216 216h40c0-68.38-26.629-132.67-74.98-181.02zm-181.02-74.98c-59.551 0-108-48.448-108-108s48.449-108 108-108 108 48.448 108 108-48.449 108-108 108z"/></svg>';
    $(this).html(icon);
  });

  $('.logout_icon').each(function () {
    var icon = '<svg enable-background="new 0 0 489.9 489.9" version="1.1" viewBox="0 0 489.9 489.9" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m468.3 255.8 0.2-0.2c0.3-0.4 0.6-0.7 0.8-1.1 0.1-0.1 0.1-0.2 0.2-0.3 0.2-0.4 0.5-0.8 0.7-1.2 0-0.1 0.1-0.2 0.1-0.2 0.2-0.4 0.4-0.8 0.6-1.3 0-0.1 0-0.1 0.1-0.2 0.2-0.4 0.3-0.9 0.5-1.4 0-0.1 0-0.2 0.1-0.2 0.1-0.5 0.3-0.9 0.3-1.4 0-0.2 0-0.3 0.1-0.5 0.1-0.4 0.1-0.8 0.2-1.2 0.1-0.6 0.1-1.1 0.1-1.7s0-1.1-0.1-1.7c0-0.4-0.1-0.8-0.2-1.2 0-0.2 0-0.3-0.1-0.5-0.1-0.5-0.2-0.9-0.3-1.4 0-0.1 0-0.2-0.1-0.2-0.1-0.5-0.3-0.9-0.5-1.4 0-0.1 0-0.1-0.1-0.2-0.2-0.4-0.4-0.9-0.6-1.3 0-0.1-0.1-0.2-0.1-0.2-0.2-0.4-0.4-0.8-0.7-1.2-0.1-0.1-0.1-0.2-0.2-0.3-0.3-0.4-0.5-0.8-0.8-1.1l-0.2-0.2c-0.4-0.4-0.7-0.9-1.2-1.3l-98.9-98.8c-6.7-6.7-17.6-6.7-24.3 0s-6.7 17.6 0 24.3l69.6 69.6h-276.7c-9.5 0-17.2 7.7-17.2 17.1 0 9.5 7.7 17.2 17.2 17.2h276.8l-69.1 69.1c-6.7 6.7-6.7 17.6 0 24.3 3.3 3.3 7.7 5 12.1 5s8.8-1.7 12.1-5l98.3-98.3c0.5-0.6 0.9-1 1.3-1.4z"/><path d="m110.7 34.3h128c9.5 0 17.2-7.7 17.2-17.1 0-9.5-7.7-17.2-17.2-17.2h-128c-51.3 0-93.1 41.8-93.1 93.1v303.7c0 51.3 41.8 93.1 93.1 93.1h125.9c9.5 0 17.2-7.7 17.2-17.1 0-9.5-7.7-17.2-17.2-17.2h-125.9c-32.4 0-58.8-26.4-58.8-58.8v-303.7c0.1-32.5 26.4-58.8 58.8-58.8z"/></svg>';
    $(this).html(icon);
  });

  $('.laptop_icon').each(function () {
    var icon = '<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 440.001 440.001" version="1.1" viewBox="0 0 440 440" xml:space="preserve"><path d="m439.21 382.71-27.329-109.31c-0.425-1.705-1.093-3.297-1.94-4.76 1.562-4.334 2.42-9.004 2.42-13.869v-180.2c0-22.595-18.382-40.979-40.979-40.979h-302.78c-22.599 0-40.981 18.383-40.981 40.979v180.19c0 4.866 0.857 9.536 2.423 13.87-0.849 1.464-1.52 3.054-1.945 4.759l-27.55 110.2c-1.371 5.486-0.138 11.3 3.343 15.756 3.48 4.458 8.82 7.064 14.477 7.064h403.25 0.017c10.146 0 18.367-8.225 18.367-18.367-1e-3 -1.854-0.276-3.645-0.788-5.333zm-172.68-5.014c-4e-3 0-9e-3 2e-3 -0.016 0h-93.061c-1.074 0-2.094-0.477-2.781-1.301-0.689-0.822-0.978-1.91-0.787-2.969l7.252-40.245c0.311-1.728 1.814-2.982 3.568-2.982h78.559c1.754 0 3.257 1.256 3.566 2.982l7.192 39.923c0.085 0.309 0.131 0.632 0.131 0.966 3e-3 2.004-1.621 3.626-3.623 3.626zm110.03-122.93c0 2.094-1.25 3.897-3.04 4.717h-307.08c-1.792-0.818-3.043-2.623-3.043-4.717v-180.2c0-2.861 2.329-5.188 5.191-5.188h302.78c2.859 0 5.188 2.327 5.188 5.188l-1e-3 180.2z"/><path d="m229.97 157.08 11.472-3.129c2.271-0.619 3.889-2.631 4-4.984 0.114-2.353-1.302-4.511-3.502-5.346l-52.898-20.064c-2-0.758-4.26-0.273-5.773 1.239-1.514 1.513-1.998 3.772-1.24 5.773l20.064 52.898c0.836 2.202 2.994 3.617 5.346 3.503 2.354-0.113 4.365-1.728 4.984-4l3.129-11.472 26.766 26.763c2.123 2.124 5.564 2.124 7.688 0l6.729-6.728c2.123-2.124 2.123-5.566 0-7.69l-26.765-26.763z"/></svg>';
    $(this).html(icon);
  });

  $('.search_icon').each(function () {
    var icon = '<svg enable-background="new 0 0 56.966 56.966" version="1.1" viewBox="0 0 56.966 56.966" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m55.146 51.887-13.558-14.101c3.486-4.144 5.396-9.358 5.396-14.786 0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c0.571 0.593 1.339 0.92 2.162 0.92 0.779 0 1.518-0.297 2.079-0.837 1.192-1.147 1.23-3.049 0.083-4.242zm-31.162-45.887c9.374 0 17 7.626 17 17s-7.626 17-17 17-17-7.626-17-17 7.626-17 17-17z"/></svg>';
    $(this).html(icon);
  });

  $('.doashboard_icon').each(function () {
    var icon = '<svg enable-background="new 0 0 101.968 101.968" version="1.1" viewBox="0 0 101.97 101.97" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m24.715 47.432-16.747 17.428v29.406c0 0.828 0.671 1.5 1.5 1.5h20.334c0.828 0 1.5-0.672 1.5-1.5v-45.108l-4.69-1.726h-1.897z"/><path d="m66.135 61.1h-20.334c-0.828 0-1.5 0.672-1.5 1.5v31.666c0 0.828 0.672 1.5 1.5 1.5h20.334c0.829 0 1.5-0.672 1.5-1.5v-31.666c0-0.828-0.671-1.5-1.5-1.5z"/><path d="m101.72 29.49c-0.777 0.406-1.652 0.621-2.53 0.621-1.276 0-2.521-0.45-3.5-1.27l-3.694-3.088-13.365 14.58v53.934c0 0.828 0.672 1.5 1.5 1.5h20.334c0.829 0 1.5-0.672 1.5-1.5v-64.93c-0.084 0.05-0.159 0.108-0.245 0.153z"/><path d="m57.797 54.094c1.144 0.419 2.424 0.108 3.248-0.788l30.839-33.643 7.217 6.032c0.353 0.294 0.847 0.349 1.254 0.136 0.407-0.214 0.646-0.648 0.605-1.107l-1.564-17.489c-0.055-0.625-0.606-1.086-1.231-1.029l-17.49 1.563c-0.458 0.041-0.846 0.354-0.982 0.791-0.047 0.146-0.062 0.294-0.049 0.44 0.026 0.294 0.167 0.572 0.403 0.769l7.229 6.043-29.296 31.957-33.445-12.306c-1.118-0.41-2.373-0.121-3.198 0.735l-20.5 21.333c-1.148 1.195-1.11 3.095 0.084 4.242 0.583 0.561 1.332 0.837 2.079 0.837 0.788 0 1.574-0.309 2.164-0.921l19.141-19.92 33.492 12.325z"/></svg>';
    $(this).html(icon);
  });

  // redirect for shopping cart
	$('.cart_wrapper').click(function() {
    window.location.replace("/pd/pd-shopping-cart");
  });
  
  // hanle user menu
  $('.user_logged_in .user_name').on('click', function () {
    var menuTarget = $(this).parent().find('.user_menu');

    if( $(menuTarget).is('.active') ) {
      $(this).removeClass('active');
      $(menuTarget).removeClass('active');
    } else{
      $(this).addClass('active');
      $(menuTarget).addClass('active');
    }
  });

  // MENU ACCORDION
  $('.menu_accordion').each(function () {
    var toggle = $(this).find('.toggle');
    var content = $(this).find('.content');

    $(toggle).on('click', function () {
      if( $(this).is('.expand') ) {
        $(this).removeClass('expand');
        $(content).slideUp();
      } else {
        $(this).addClass('expand');
        $(content).slideDown();
      }
    });
  });

  /* MOBILE MENU LOGOUT BUTTON */
  $('.user_logout_mobile').on('click', function () {
    $('#logoutAcButton').parent().submit();
  });
});