$(document).ready(function(){
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
    if ( loadButton != null ) {
      loadButton.addEventListener('click', function() {
        feed.next();
      });

      // run the feed
      feed.run();
    }
});
