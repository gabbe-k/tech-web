<?php
require_once('./sql/sqconnect.php');
require_once('./sqlprint/prcomments.php');

function PrintPosts() {

$conn = Connect();

$postIdArr = $_SESSION['postIdSELECT'];

$sql = "SELECT accounts.username, posts.id, posts.titleText, posts.postText, posts.postId FROM accounts, posts WHERE posts.postId IN ($postIdArr) AND posts.id = accounts.id";

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
                    PrintComments($conn, $row['postId']);
                  ?>
                </div>
            </div>
           <form class="" action="../../sql/sqcomment.php" method="post">
             <input type="text" name="commText" value="sope">
             <input type="submit" name="" value="comment">
             <input type="hidden" name="postId" value="<?php echo $row['postId'] ?>" />
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
