var clicked = false;

$('#commButton').click(function() {

  if (clicked != true) {
    clicked = true;
    $('#commentbutton').addClass('commClicked');
    $('#comments').addClass('commClicked');
  }
  else {
    $('#commentbutton').removeClass('commClicked');
    $('#comments').removeClass('commClicked');
    clicked = false;
  }

});
