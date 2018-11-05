<!DOCTYPE html>

<?php
    session_start();
    require_once('sqlprint/prposts.php');
 ?>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/my.js"></script>
    <title>Tags här</title>

  </head>

  <body>

    <div class="postGrid">

      <div class="info">

        <div class="infoContent">
          <div class="title">
            <h1>Your current tags</h1>
          </div>
          <div id="tagviewer">
            <ul>
              <a href=""><li>Hello</li></a>
              <a href=""><li>Guys</li></a>
              <a href=""><li>toda</li></a>
              <a href=""><li>goto</li></a>
              <button type="button" name="button" id="addTags"></button>
              </ul>
          </div>
        </div>

      </div>

      <div class="sorting">
        <div class="search">
          <form class="searchField" action="index.html" method="post">
            <input type="text" name=""></input>
          </form>
        </div>
        <div class="dropDwn">
          <button type="button" name="button" id="dropBtn"><p>Sort By</p></button>
        </div>
      </div>

 <div class="postViewer">
    <?php
      PrintPosts();
     ?>
</div>


      <!--
      <div class="postFooter">
        postFooter
      </div>
-->
    </div>

  </body>

<script type="text/javascript">

  $('#commButton').click(function() {

      $('#commfield').addClass('animatable--now');
      $('#commButton').addClass('animatable--now');
      $('.commentbutton').addClass('animatable--now');

    if (!$('#commfield').hasClass('commShow')) {

      $('#commfield').addClass('commShow');
      $('#commButton').addClass('buttonClicked');
      $('.commentbutton').addClass('commClicked');

    }
    else {
      $('#commButton').removeClass('buttonClicked');
      $('#commfield').removeClass('commShow');
      $('.commentbutton').removeClass('commClicked');

      $('#commfield').on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function(event) {
        $('#commfield').removeClass('animatable--now');
        $('#commButton').removeClass('animatable--now');
        $('.commentbutton').removeClass('animatable--now');
      });
    }
  });

</script>


</html>
