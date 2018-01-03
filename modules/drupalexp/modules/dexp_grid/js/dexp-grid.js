/* =========================================================
 * DexpGrid v1.0
 * =========================================================
 * Copyright 2013 drupalexp.com.
 * Author: nguyencongt3@gmail.com
 * ========================================================= */
!(function ($) {
  var dexpGridOptions = [];
  $.fn.dexpGrid = function (options) {
    var opt = null;
    if(options != null && typeof options == 'object'){
      var defaultVal = {
        cols: 3,
        colsmd:3,
        colssm:2,
        colsxs:1,
        item: '.dexp-grid-item',
        hiddenClass: 'dexp-grid-hidden',
        itemWidth: 250,
        itemHeight: 150,
        margin: 10,
        phoneWidth: 768
      };
      opt = $.extend(defaultVal, options);
      opt._cols = opt.cols;
    }
    return this.each(function () {
      var $this = $(this);
      if(opt==null){
        var optionIndex = $this.attr('data-grid-id');
        opt = dexpGridOptions[optionIndex];
      }else{
        $this.attr('data-grid-id',dexpGridOptions.length);
        dexpGridOptions[dexpGridOptions.length] = opt;
      }
      init($this, opt);
      $(window).resize(function () {
        init($this, opt);
      })

    })

    function init(obj, opt) {
      if ($(window).width() < 768) {
        opt.cols = opt.colsxs;
      } else if($(window).width() > 767 && $(window).width() < 992) {
        opt.cols = opt.colssm;
      } else if($(window).width() > 991){
        opt.cols = opt.colsmd;
      }
      var itemWidth = (obj.width() - opt.margin * (opt.cols - 1)) / opt.cols;
      var itemHeight = itemWidth * opt.itemHeight / opt.itemWidth;
      var $items = obj.find(opt.item).not('.' + opt.hiddenClass);
      var rows = Math.ceil($items.length/opt.cols);
      var wrapHeight = itemHeight * rows + (rows-1) * opt.margin;
      obj.height(wrapHeight).css({position:'relative'});
      $items.css({
        position: 'absolute'
      }).width(itemWidth).height(itemHeight);
      $items.each(function (index) {
        var $item = $(this);
        var col = index % opt.cols;
        var row = Math.floor(index / opt.cols);
        var top = row * (itemHeight + opt.margin);
        var left = col * itemWidth + col * opt.margin;
        $item.css({
          top: top,
          left: left
        });
      });
    }
  };
})(jQuery);
