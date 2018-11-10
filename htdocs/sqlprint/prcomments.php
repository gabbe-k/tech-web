<?php

  function PrintComments($conn, $postId) {

  $sql = "SELECT accounts.username, comments.commText FROM accounts, comments WHERE comments.id = accounts.id";
  $result = mysqli_query($conn, $sql);
  $resultLen = mysqli_num_rows($result);

  if (isset($resultLen)) {



        for ($i=0; $i < $resultLen; $i++) {

          $row = mysqli_fetch_assoc($result);
?>
          <div id ="usr">
            <?php
                echo $row['username'];
             ?>
          </div>
          <div id="text">
            <?php
                echo $row['commText'];
             ?>
          </div>
<?php
        }
    }
    else {
      echo "no comments sir";
    }


  }

 ?>
