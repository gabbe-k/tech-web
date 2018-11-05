<?php
require_once('./sql/sqconnect.php');

function PrintPosts() {

$conn = Connect();

$sql = "SELECT * FROM posts WHERE 1";
$result = mysqli_query($conn, $sql);
$resultLen = mysqli_num_rows($result);

if ($resultLen == 0) {
  echo "<p>No posts were found for these tags</p>";
}
else {
  $row = mysqli_fetch_assoc($result);

  ?>
    <div class="post">
      <div class="post">
        <h1>
          <?php
            $row['postId'];
           ?>
        </h1>
      </div>
      <div class="content">
        <p>
          <?php
            $row['postText'];
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

Disconnect($conn);

}

?>
