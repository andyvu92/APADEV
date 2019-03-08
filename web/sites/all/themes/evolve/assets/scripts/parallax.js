/*

 * * *DEFINE PARALLAX IMAGES HERE * * *

*/

jQuery(document).ready(function(){
  //====================PARALLAX IMAGE LOCATION=======================
  
    // CAMPAIGN LANDING PAGE: /campaign/choosephysio 
    if( $('.html').find('.jarallax').length > 0 ){

      $('.jarallax').each(function(){
        img = $(this).css('background-image');
        img = img.replace('url(','').replace(')','').replace(/\"/gi, "");
        $(this).append("<img data-speed='1' class='img-parallax' src=' " + img + "'>");
      })
    }
  
    // SLOW PARALLAX
    if( $('.html').find('.jarallax-slow').length > 0 ){

      $('.jarallax-slow').each(function(){
        img = $(this).css('background-image');
        img = img.replace('url(','').replace(')','').replace(/\"/gi, "");
        $(this).append("<img data-speed='0.4' class='img-parallax' src=' " + img + "'>");
      })
    }

    //ABOUT CAMPAIGN MIDDLE IMAGE: /campaign/about-campaign
    if( $('.html').find('.jarallax01').length > 0 ){
      img = $('.jarallax01').css('background-image');
      img = img.replace('url(','').replace(')','').replace(/\"/gi, "");
      $('.jarallax01').append("<img data-speed='1' class='img-parallax' src=' " + img + "'>");
    }
  
    //CHOOSE NATIONAL GROUP: /membership/national-groups
    if( $('.html').find('.national-group-jarallax').length > 0 ){
      img = $('.national-group-jarallax').css('background-image');
      img = img.replace('url(','').replace(')','').replace(/\"/gi, "");
      $('.national-group-jarallax').append("<img data-speed='1' class='img-parallax' src=' " + img + "'>");
    }

    //CHOOSE NATIONAL GROUP: /membership/national-groups
    if( $('.html').find('.pd-jarallax').length > 0 ){
      img = $('.pd-jarallax').css('background-image');
      img = img.replace('url(','').replace(')','').replace(/\"/gi, "");
      $('.pd-jarallax').append("<img data-speed='1.2' class='img-parallax' src=' " + img + "'>");
    }


      // MAIN IMAGE PARALLAX WORKS FOR MOBILE - THIS MUST BE ALWAYS AT THE BOTTOM
  $('.img-parallax').each(function(){
    var img = $(this);
    var imgParent = $(this).parent();
    function parallaxImg () {
      var speed = img.data('speed');
      var imgY = imgParent.offset().top;
      var winY = $(this).scrollTop();
      var winH = $(this).height();
      var parentH = imgParent.innerHeight();


      // The next pixel to show on screen      
      var winBottom = winY + winH;

      // If block is shown on screen
      if (winBottom > imgY && winY < imgY + parentH) {
        // Number of pixels shown after block appear
        var imgBottom = ((winBottom - imgY) * speed);
        // Max number of pixels until block disappear
        var imgTop = winH + parentH;
        // Porcentage between start showing until disappearing
        var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
      }
      img.css({
        top: imgPercent + '%',
        transform: 'translate(-50%, -' + imgPercent + '%)'
      });
    }
    $(document).on({
      scroll: function () {
        parallaxImg();
      }, ready: function () {
        parallaxImg();
      }
    });
  });
});