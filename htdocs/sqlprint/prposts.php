<?php
require_once('./sql/sqconnect.php');
require_once('./sqlprint/prcomments.php');

function PrintPosts() {

$conn = Connect();

$tagsPicked = "";

for ($i=0; $i < count($_SESSION['tagText']); $i++) {

  if (isset($_SESSION['tagText'][$i])) {
    $tmp = $_SESSION['tagText'][$i];

    if (count($_SESSION['tagText']) == 1 || $i == count($_SESSION['tagText']) - 1) {
      $tagsPicked = $tagsPicked . "'" . $tmp . "'";
    }
    else {
      $tagsPicked = $tagsPicked . "'" . $tmp . "'" . ",";
    }
  }
  else {
    $i++;
  }
}

$sqlTag = "SELECT tagId FROM `tags` WHERE tagText IN($tagsPicked)";

$sqlPostId = "SELECT postId FROM `posttag` WHERE tagId IN ($sqlTag)";

$sql = "SELECT accounts.username, posts.id, posts.titleText, posts.postText, posts.postId FROM accounts, posts WHERE posts.postId IN ($sqlPostId) AND posts.id = accounts.id";

echo $sql;

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
