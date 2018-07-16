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
jQuery(document).ready(function(){
  $('.readmore-content').each(function(){
var trimLength = 200;
var trimMargin = 1.2; // don't trim just a couple of words
if($(this).text().length > (trimLength * trimMargin)) {
var text = $(this).text();
var trimPoint = $(this).text().indexOf(" ", trimLength);
var newContent = text.substring(0, trimPoint)+'<span class="read-more">'+text.substring(trimPoint)+'</span><span class="toggle">... <a href="#">Read more</a></span>';
$(this).html(newContent);
}
});
$('.toggle a').click(function(e){
e.preventDefault();
var para = $(this).closest('.readmore-content');
var initialHeight = $(this).closest('.readmore-content').innerHeight();
para.find('.read-more').show();
para.find('.toggle').hide();
var newHeight = para.innerHeight();
para.css('max-height', initialHeight+'px');
para.animate({ maxHeight: newHeight }, 300, function(){
para.css('max-height', 'none');
});
});
});