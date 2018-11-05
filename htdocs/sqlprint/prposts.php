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
                 <div id ="usr">
                   <p>Epix0r</p>
                 </div>
                 <div id="text">
                   Wow this is kinda shit my man                       Wow this is kinda shit my man                       Wow this is kinda shit my man                       Wow this is kinda shit my man
                 </div>
             </div>
             <br>
             <div class="comment">
                 <div id ="usr">
                   <p>Epix0r</p>
                 </div>
                 <div id="text">
                   Wow this is kinda shit my man                       Wow this is kinda shit my man                       Wow this is kinda shit my man                       Wow this is kinda shit my man
                 </div>
             </div>
             <br>
             <div class="comment">
                 <div id ="usr">
                   <p>Epix0r</p>
                 </div>
                 <div id="text">
                   Wow this is kinda shit my man                       Wow this is kinda shit my man                       Wow this is kinda shit my man                       Wow this is kinda shit my man
                 </div>
             </div>
             <br>
             <div class="comment">
                 <div id ="usr">
                   <p>Epix0r</p>
                 </div>
                 <div id="text">
                   Wow this is kinda shit my man                       Wow this is kinda shit my man                       Wow this is kinda shit my man                       Wow this is kinda shit my man
                 </div>
             </div>
           </div>
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
