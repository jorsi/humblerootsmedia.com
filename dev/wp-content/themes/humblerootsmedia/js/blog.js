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
});
