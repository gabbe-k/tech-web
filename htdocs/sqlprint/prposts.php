<?php
require_once('./sql/sqconnect.php');

function PrintPosts() {

$conn = Connect();

$sql = "SELECT accounts.username, posts.id, posts.titleText, posts.postText, posts.postId FROM accounts, posts WHERE posts.id = accounts.id";
$result = mysqli_query($conn, $sql);
$resultLen = mysqli_num_rows($result);

if ($resultLen == 0) {
  echo "<p>No posts were found for these tags</p>";
}
else {

  for ($i=0; $i < $resultLen; $i++) {
    $row = mysqli_fetch_assoc($result);
    ?>
       <div class="post">
         <div class="title">
           <h1>
             <?php
                echo $row['username'] , ": " , $row['titleText'];
             ?>
           </h1>
         </div>
         <div class="content">
           <p>
             <?php
                echo $row['postText'];
              ?>
           </p>
         </div>
          <div id="comments">
            <div id="commfield">
              <div class="comment">
               <?php

                  $sqlComm = "SELECT posts.postId, accounts.username, comments.commText, comments.postId, comments.commId
                  FROM comments, accounts
                  WHERE comments.id = accounts.id
                  AND comments.postId = posts.postId";

                  $resultComm = mysqli_query($conn, $sql);
                  $resultLenComm = mysqli_num_rows($result);
                  $rowComm = mysqli_fetch_assoc($resultComm);

                  $_SESSION['postId'] = $row['postId'];

                   if (isset($_SESSION['u_id'])) {

                      for ($i=0; $i < $resultLenComm; $i++) {
                    ?>

                      <div id ="usr">
                        <?php
                          echo $rowComm['username'];
                         ?>
                      </div>
                      <div id="text">
                        <?php
                            echo $rowComm['commText'];
                         ?>
                      </div>

                    <?php
                      }

                   }
                   else {
                     ?>
                      <div id ="usr">
                      </div>
                      <div id="text">
                        <?php
                           echo "log in to view comments";
                         ?>
                      </div>
                   <?php
                   }

                ?>
                </div>
            </div>
           <form class="" action="../../sql/sqcomment.php" method="post">
             <input type="text" name="commText" value="sope">
             <input type="submit" name="" value="comment">
           </form>
         </div>

         <div class="commentbutton">
           <button type="button" name="button" id="commButton"></button>
         </div>

       </div>
    <?php
  }



}

Disconnect($conn);

}

?>
