//spaceship!
$("#space").mousemove(function(event) {
  $('spaceship').css('left',event.pageX-20);
  $('spaceship').css('top',event.pageY-20);
});