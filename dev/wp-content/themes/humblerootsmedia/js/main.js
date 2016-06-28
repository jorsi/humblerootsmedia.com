$(document).ready(function(){
  var $window = $(window);

  // User Status
  var prevScroll = window.scrollY;
  var user = {
    isScrollingDown: false,
    isAtBottom: false,
    isAtTop: true,
    isPastSplash: false,
    scrollY: window.scrollY,
    isMobile: /Mobi/.test(navigator.userAgent)
  }
  $window.on('scroll', function(ev) {
    user.scrollY = window.scrollY;
    user.isScrollingDown = (prevScroll < user.scrollY);
    prevScroll = user.scrollY;
    user.isAtBottom = (window.innerHeight + document.body.scrollTop >= document.body.offsetHeight);
    user.isAtTop = (user.scrollY < 100);
    user.isPastSplash = (user.scrollY > $('.splash').outerHeight());
  });

  // Add mobile class if on mobile
  if (user.isMobile) {
    $('body').addClass('mobile');
  }

  // Navigation - Mobile
  var menu = $('.menu');
  var links = $('.nav-mobile .links');
  menu.on('click', function(ev) {
    links.slideToggle();
  });

  // Navigation - Desktop
  var nav = $('.nav-desktop');
  function navHide(ev) {
    if(user.isScrollingDown && user.scrollY > 100 && !user.isAtBottom) {
      !nav.hasClass('nav-up') ? nav.toggleClass('nav-up') : null;
    } else {
      nav.hasClass('nav-up') ? nav.toggleClass('nav-up') : null;
    }
  }
  function navShrinke(ev) {
    if (user.scrollY < 1) {
      nav.hasClass('nav-fixed') ? nav.toggleClass('nav-fixed') : null;
    } else {
      !nav.hasClass('nav-fixed') ? nav.toggleClass('nav-fixed') : null;
    }
  }
  $window.on('scroll', function(ev) {
    if(!user.isMobile) {
      navHide(ev);
      navShrinke(ev);
    }
  });

  // Initialize Smooth Scrolling
  $('.smooth-scroll').smoothScroll();
});
