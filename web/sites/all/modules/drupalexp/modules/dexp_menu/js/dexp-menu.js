(function ($) {
    var DEXP_MENU = DEXP_MENU || {};
    DEXP_MENU.ww = $(window).width();
    DEXP_MENU.is_mobile = DEXP_MENU.ww < 992;
    DEXP_MENU.submenu = null;
    $(window).resize(function(){
        DEXP_MENU.ww = $(window).width();
        DEXP_MENU.is_mobile = DEXP_MENU.ww < 992;
    });
    Drupal.behaviors.dexp_menu = {
        attach: function (context, settings) {
            $('.dexp-dropdown ul.menu > li.expanded').once('hover', function () {
                $(this).hover(function () {
                    DEXP_MENU.submenu = $(this).find('>ul, >.dexp-menu-mega');
                    DEXP_MENU.submenu.addClass('menu-visible');
                    if(!DEXP_MENU.is_mobile){
                        /*Mega menu fullwidth*/
                        if(DEXP_MENU.submenu.hasClass('container')){
                            var transformX = (DEXP_MENU.ww - DEXP_MENU.submenu.outerWidth())/2 - DEXP_MENU.submenu.offset().left;
                            transformX = parseInt(transformX);
                            console.log(transformX);
                            DEXP_MENU.submenu.css('transform','translateX('+transformX+'px)');
                        }else{
                            /*Normal submenu*/
                            /*LTR direction*/
                            if($('body').hasClass('ltr')){
                                var offsetX = DEXP_MENU.submenu.offset().left + DEXP_MENU.submenu.outerWidth() - DEXP_MENU.ww + ($(window).width() - $('.container').width())/2;
                                if (offsetX > 0) {
                                    var transformX = 0 - offsetX + 'px';
                                    DEXP_MENU.submenu.css('transform', 'translateX('+transformX+')');
                                }
                            }else{
                                var offsetX =  DEXP_MENU.submenu.offset().left - ($(window).width() - $('.container').width())/2;
                                if (offsetX < 0){
                                    var transformX = parseInt(0 - offsetX);
                                    DEXP_MENU.submenu.css('transform', 'translateX('+transformX+'px)');
                                }
                            }
                        }
                    }
                }, function () {
                    $(this).find('>ul, >.dexp-menu-mega').removeClass('menu-visible').css('transform','translateX(0)');
                });
            });

            $('.dexp-menu-toggler').once('click', function(){
                $(this).click(function(){
                    var $menu = $($(this).data('target'));
                    $menu.toggleClass('open');
                    if($menu.offset().left != 0){
                        $menu.css('left',0);
                        var left = 0-$menu.offset().left;
                        $menu.css('left',left+'px');
                    }
                });
            });
            $('.dexp-menu span.menu-toggle').once('click', function(){
                $(this).click(function(){
                    $(this).toggleClass('fa-angle-right fa-angle-down').parent().find('>ul.menu, >div.dexp-menu-mega').toggleClass('menu-visible-mobile');
                });
            });
        }
    }
})(jQuery);
/*
jQuery(document).ready(function($) {
    $('.dexp-dropdown ul li a').data({click:true});
    $('.dexp-dropdown a.active').each(function() {
        $(this).parents('li.expanded').addClass('active');
    });
    $('.dexp-dropdown li.expanded').each(function() {
        var $this = $(this), $toggle = $('<span class="menu-toggler fa fa-angle-right"></span>');
        $toggle.click(function() {
            $(this).toggleClass('fa-angle-right fa-angle-down');
            $this.find('>ul,>.dexp-menu-mega').toggleClass('menu-open');
        });
        $this.append($toggle);
    });
    $('.dexp-dropdown .menu-attach-block-wrapper').parent('li').addClass('block-attach');
    $('.dexp-menu-toggler').click(function() {
        var $menu = $($(this).data('target'));
        if ($menu != null) {
            $menu.toggleClass('mobile-open');
        }
        return false;
    });
    $('.dexp-dropdown ul li a').on('touchstart',function() {
        var $this = $(this),$li = $(this).parent();
        if($li.find('ul,.dexp-menu-mega').length > 0){
            $this.data({
                click:  $this.data('click').toString() == 'true'?false:true
            });
        }
        $('.dexp-dropdown ul li a').not($this).data({click:true});
        //Mobile
        if($this.data('click') == false){
            $li.find('> .menu-toggler').trigger('click');
        }
        return $this.data('click');
    });
    $('.dexp-dropdown ul li').hover(function() {
        if($(window).width()<992) return true;
        var container_width = $(window).width();
        var $submenu = $(this).find('>ul,>.dexp-menu-mega').not('.container'), ww = $(window).width(), innerw = ww - (ww - container_width) / 2;
        if ($submenu.length === 0)
            return;
        //RTL
        if($('body').hasClass('rtl')){
            var limit = (ww - container_width)/2;
            var offsetX = limit-$submenu.offset().left;
            if(offsetX > 0){
                var transformX = offsetX + 'px';
                $submenu.css({
                    transform: 'translateX('+transformX+')'
                });
            }
        }else{
            //LTR
            var offsetX = $submenu.offset().left + $submenu.width() - innerw;
            if (offsetX > 0) {
                var transformX = 0 - offsetX + 'px';
                $submenu.css({
                   transform: 'translateX('+transformX+')'
                });
            }
        }
    }, function() {
        var $submenu = $(this).find('>ul,>.dexp-menu-mega');
        if ($submenu.length === 0)
            return;
        $submenu.css({
            transform: 'translateX(0)'
        });
    });

    $('.dexp-dropdown .container').each(function(){
       $(this).parent('li').addClass('dexp-static')
    });
});
*/
