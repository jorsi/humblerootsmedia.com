$(document).ready(function() {
  var s = $('#s');
  var submit = $('#searchsubmit');

  submit.on('click', function(e) {
    if(!s.hasClass('open')) {
      e.preventDefault();
      s.attr('placeholder', 'search...');
      s.toggleClass('open');
      s.focus();
    }
  });

  $('.post-content').find('img').each(function(index) {
    $(this).wrap('<a class="fancybox" href=' + $(this).attr('src') + '></a>');
  });

  // Initialize FancyBox Modal
  $(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
        padding     : 0,
        margin      : [20, 60, 20, 60] // Increase left/right margin
    });
});
