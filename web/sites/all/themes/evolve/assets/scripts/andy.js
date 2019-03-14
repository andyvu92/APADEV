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

  // AUTO SORT APA MEMBER IN ALPHABETICAL ORDER---------------------------------------------------
  $('#apateammember-block-2').each(function(){
    var $divs = $(".node-apateam", this);
    var alphabeticallyOrderedDivs = $divs.sort(function (a, b) {
      return $(a).find("h5 a .field-item").text() > $(b).find("h5 a .field-item").text();
    });
    $(this).html(alphabeticallyOrderedDivs);
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
        console.log('<993');
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
  
          //assign step number
          $('li', this).each(function(id){
            id++;
            $('a span', this).after('<span class="step-order">'+id+'</span>');
          });
  
          //get current step number and label
          var currentStep = $(this).find('.text-underline').text();
          var stepNumber = $('.text-underline', this).parent().find('.step-order').text();
  
          //append customised elemen to show step order
          $(this).after('<span class="current-step">Step <span class="step-number">'+stepNumber+'</span> of 7: <span class="step-label">'+currentStep+'</span></span>');    
        }
      });
      
      //update step number and label on Prev/Next click
      $(document).on('click', 'a[class^="join-details-button"], a[class^="your-details-prevbutton"]', function(){
        var currentStep = $('.numberized').find('.text-underline').text();
        var stepNumber = $('.numberized .text-underline').parent().find('.step-order').text();
        $('.number-menu-active .current-step .step-number').text(stepNumber);
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
});




