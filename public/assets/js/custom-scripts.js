$(document).ready(function(){
  'use strict';

  //===== Anmiation =====// 
  var drop = $('.product-btns > a');
  $('.product-btns').each(function(){
    var delay = 0;
    $(this).find(drop).each(function(){
      $(this).css({transitionDelay: delay+'ms'});
      delay += 120;
    });
  });

  //===== Responsive Header =====//
  $('.res-menu-btn').on('click', function () {
    $('.res-menu').addClass('slidein');
    return false;
  });
  $('.res-menu-close').on('click', function () {
    $('.res-menu').removeClass('slidein');
    return false;
  });
  $('.res-menu li.menu-item-has-children > a').on('click', function () {
    $(this).parent().siblings().children('ul').slideUp();
    $(this).parent().siblings().removeClass('active');
    $(this).parent().children('ul').slideToggle();
    $(this).parent().toggleClass('active');
    return false;
  });

  //===== Scrollbar =====//
  if ($('.res-menu').length > 0) {
    var ps = new PerfectScrollbar('.res-menu');
  }

  //===== LightBox =====//
  if ($.isFunction($.fn.fancybox)) {
    $('[data-fancybox],[data-fancybox="gallery"]').fancybox({});
  }

  //===== Select =====//
  if ($('select').length > 0) {
    $('select').selectpicker();
  }

  //===== TouchSpin =====//
  if ($.isFunction($.fn.TouchSpin)) {
    $('.quantity > input').TouchSpin();
  }

  //===== Count Down =====//
  if ($.isFunction($.fn.downCount)) {
    $('.countdown').downCount({
      date: '12/12/2018 12:00:00',
      offset: +5
    });
  }

  //===== Owl Carousel =====//
  if ($.isFunction($.fn.owlCarousel)) {

    //=== Sponsors Carousel ===//
    $('.spnsr-car').owlCarousel({
      autoplay: true,
      smartSpeed: 3000,
      loop: true,
      items: 5,
      dots: false,
      slideSpeed: 2000,
      autoplayHoverPause: true,
      nav: true,
      margin: 30,
      navText: [
      "<i class='fa fa-arrow-left'></i>",
      "<i class='fa fa-arrow-right'></i>"
      ],
      responsive:{
        0:{items: 2},
        481:{items: 2,margin: 30},
        770:{items: 3,margin: 30},
        981:{items: 4,margin: 30},
        1025:{items: 5,margin: 30},
        1200:{items: 5}
      }
    });

    //=== Twitter Carousel ===//
    $('.tweet-car').owlCarousel({
      autoplay: true,
      smartSpeed: 5000,
      loop: true,
      items: 1,
      dots: false,
      slideSpeed: 1500,
      autoplayHoverPause: true,
      nav: true,
      margin: 30,
      animateIn: 'fadeIn',
      animateOut: 'fadeOut',
      navText: [
      "<i class='fa fa-arrow-left'></i>",
      "<i class='fa fa-arrow-right'></i>"
      ],
    });

    //=== Posts Carousel ===//
    $('.pst-car').owlCarousel({
      autoplay: true,
      smartSpeed: 3000,
      loop: true,
      items: 4,
      dots: false,
      slideSpeed: 2000,
      autoplayHoverPause: true,
      nav: true,
      margin: 30,
      navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>"
      ],
      responsive:{
        0:{items: 1,nav: false},
        481:{items: 2,margin: 30},
        770:{items: 3,margin: 30},
        981:{items: 3,margin: 30},
        1025:{items: 4,margin: 30},
        1200:{items: 4}
      }
    });

    //=== Twitter Carousel ===//
    $('.feat-img-car').owlCarousel({
      autoplay: true,
      smartSpeed: 3000,
      loop: true,
      items: 1,
      dots: false,
      slideSpeed: 2000,
      autoplayHoverPause: true,
      nav: false,
      margin: 0,
      animateIn: 'fadeIn',
      animateOut: 'fadeOut',
      navText: [
      "<i class='fa fa-arrow-left'></i>",
      "<i class='fa fa-arrow-right'></i>"
      ],
    });

  }

  //===== Slick Carousel =====//
  if ($.isFunction($.fn.slick)) {
    $('.testi-car-fr').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      slide: 'li',
      fade: true,
      asNavFor: '.testi-car-nav'
    });
    
    $('.testi-car-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.testi-car-fr',
      dots: false,
      arrows: true,
      slide: 'li',
      vertical: false,
      centerMode: true,
      centerPadding: '0',
      focusOnSelect: true,
      responsive: [
      {
        breakpoint: 770,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          vertical: false,
          centerMode: true,
          dots: false,
          arrows: true
        }
      },
      {
        breakpoint: 490,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          vertical: false,
          centerMode: true,
          dots: false,
          arrows: true
        }
      }
      ]
    });
  }

});//===== Document Ready Ends =====//


$(window).on('load',function(){
  'use strict';

  var menu_height = $('header').innerHeight();
  if ($('header').hasClass('stick')) {
    $('main').css({'padding-top': menu_height});
  }
});//===== Window onLoad Ends =====//

//===== Sticky Header =====//
$(window).on('scroll',function () {
  'use strict';

  var menu_height = $('header').innerHeight();
  var scroll = $(window).scrollTop();
  if (scroll >= menu_height) {
    $('.stick').addClass('sticky');
  } else {
    $('.stick').removeClass('sticky');
  }
});//===== Window onScroll Ends =====//
