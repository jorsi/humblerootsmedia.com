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

  // Smooth Scrolling
  $('.smooth-scroll').smoothScroll();

  // Navigation - Mobile
  var menu = $('.menu');
  var links = $('.nav-mobile .links');
  menu.on('click', function(ev) {
    links.slideToggle();
  });

  // Navigation - Desktop
  var nav = $('.nav-desktop');
  function navHide(ev) {
    if(user.isScrollingDown && user.isPastSplash && !user.isAtBottom) {
      !nav.hasClass('nav-up') ? nav.toggleClass('nav-up') : null;
    } else {
      nav.hasClass('nav-up') ? nav.toggleClass('nav-up') : null;
    }
  }
  function navShrinke(ev) {
    if (user.scrollY < 100) {
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

  // Initialize the video slider
  var slider = $('.bxslider').bxSlider({
    pager: false,
    controls: false,
    keyboardEnabled: true,
    infiniteLoop: true
  });

  var prev = $('#productions-control .prev');
  prev.on('click', function(ev) {
    slider.goToPrevSlide();
  });
  var next = $('#productions-control .next');
  next.on('click', function(ev) {
    slider.goToNextSlide();
  });

  //Initialize Instafeed
    // grab out load more button
    var loadButton = document.getElementById('load-more');
    var feed = new Instafeed({
      get: 'user',
      userId: '3031133615',
      accessToken: '3031133615.e9691b2.c7d82787da9e4081b58d5a4e19cd59d6',
      template: '<a class="instagram-item" href="{{link}}" target="_blank"><img src="{{image}}" width="{{width}}" height="{{height}}" alt="{{caption}}"/></a>',
      resolution: 'low_resolution',
      after: function() {
        if (!this.hasNext()) {
          loadButton.setAttribute('disabled', 'disabled');
        }
      }
    });

    // bind the load more button
    loadButton.addEventListener('click', function() {
      feed.next();
    });

    // run the feed
    feed.run();
});
