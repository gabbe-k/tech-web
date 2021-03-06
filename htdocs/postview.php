<!DOCTYPE html>

<?php
    session_start();
    require_once('sqlprint/prposts.php');
    require_once('sqlprint/prtags.php');
 ?>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/my.js"></script>
    <title>Tags härhhhhh</title>

  </head>

  <body>

    <div class="postGrid">

      <div class="info">

        <div class="infoContent">
          <?php
              include("view/forms/addtags.php");
           ?>
        </div>

      </div>

      <div class="sorting">
        <div class="search">
          <form class="searchField" action="" method="post">
            <input type="text" name="tags"></input>
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

    $('#addTags').click(function(event) {

      $('#addTags').addClass('animatable--now');
      $('#addTagForm').addClass('animatable--now');

      $('#addTags').fadeOut(150, function() {
          $(this).hide();
          $('#addTagForm').addClass('isShown');
          $('#addTagForm').fadeIn(300);
      });

      $('#addTagForm').on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function(event) {
        $('#addTagForm').removeClass('animatable--now');
        $('#addTags').removeClass('animatable--now');
      });


    });

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

            $(commfield).animate({ scrollTop: "0" });

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
