$(document).ready(function(){
  // Start home page header animations
  $('.home header').css('background-color', 'transparent');
  $('.home header > .table-cell').css('opacity', '1');
  
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

  // Initialize FancyBox Modal
  $(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
        type: 'iframe',
        padding     : 0,
        margin      : [20, 60, 20, 60] // Increase left/right margin
    });

  //Initialize Instafeed
    // grab out load more button
    var loadButton = document.getElementById('load-more');
    var feed = new Instafeed({
      get: 'user',
      userId: '3006504832',
      accessToken: '3006504832.e9691b2.2aa96b63b31d4228bcbd9b9db7434db0',
      template: '<a class="instagram-item" href="{{link}}" target="_blank"><img src="{{image}}" width="{{width}}" height="{{height}}" alt="{{caption}}"/></a>',
      resolution: 'low_resolution',
      after: function() {
        if (!this.hasNext()) {
          loadButton.setAttribute('disabled', 'disabled');
        }
      }
    });

    // bind the load more button
    if ( loadButton != null ) {
      loadButton.addEventListener('click', function() {
        feed.next();
      });

      // run the feed
      feed.run();
    }
});
