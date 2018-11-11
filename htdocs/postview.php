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


    $('.postViewer').click(function(event) {

        var log = $('#log');

        if($(event.target).parent().parent().is('.post') && $(event.target).is('#commButton')) {

          var commfield = $(event.target).parent().siblings('#comments').children();
          console.log(commfield);
          var commButton = $(event.target);
          console.log(commButton);
          var divCommButtom = $(event.target).parent('.commentbutton');


          $(commfield).addClass('animatable--now');
          $(commButton).addClass('animatable--now');
          $(divCommButtom).addClass('animatable--now');

          if (!$(commfield).hasClass('commShow')) {

            $(commfield).addClass('commShow');
            $(commButton).addClass('buttonClicked');
            $(divCommButtom).addClass('commClicked');

          }
          else {

            $(commfield).removeClass('commShow');
            $(commButton).removeClass('buttonClicked');
            $(divCommButtom).removeClass('commClicked');

            $(commfield).on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function(event) {
              $(commfield).removeClass('animatable--now');
              $(commButton).removeClass('animatable--now');
              $(divCommButtom).removeClass('animatable--now');
            });

          }

        }
        else {

           console.log('someting was clicked.');

        }
    });


</script>


</html>
