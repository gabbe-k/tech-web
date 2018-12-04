<?php
  require_once('sqconnect.php');
  require_once('data_valid.php');
  session_start();

  $conn = Connect();

  $tag = ClearTags($conn, $_POST['tagSearch']);

  $tag = preg_replace('/[^a-zA-Z0-9_]/', '', $tag);

  if (isset($_SESSION['tagText']) && ($key = array_search($tag, $_SESSION['tagText'])) !== false) {
      echo "already have";
      Disconnect($conn);
      exit();
  }
  else {
  //här ska vi inte visa en ofärdig tagg
  $_SESSION['tagText'][] = $tag;

      $tagsPicked = "";

      for ($i=0; $i < count($_SESSION['tagText']); $i++) {

        $tmp = $_SESSION['tagText'][$i];

        if (count($_SESSION['tagText']) == 1 || $i == count($_SESSION['tagText']) - 1) {
          $tagsPicked = $tagsPicked . "'%" . $tmp . "%'";
        }
        else {
          $tagsPicked = $tagsPicked . "'%" . $tmp . "%'" . " OR ";
        }
      }

      $sqlTag = "SELECT * FROM `tags` WHERE tagText LIKE($tagsPicked)";

      $sqlPostId = "SELECT postId FROM `posttag` WHERE tagId IN ($sqlTag)";

      $_SESSION['postIdSELECT'] = $sqlPostId;

      $result = mysqli_query($conn, $sqlTag);

      $resultLen = mysqli_num_rows($result);

      for ($i=0; $i <  $resultLen; $i++) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['tagText'] = $row['tagText'];
      }

      Disconnect($conn);
      exit();
  }



  /*
  not work atm
    for ($i=0; $i < count($_SESSION['tagText']); $i++) {

      $tmp = $_SESSION['tagText'][$i];

      if (count($_SESSION['tagText']) == 1 || $i == count($_SESSION['tagText']) - 1) {
        $tagsPicked = $tagsPicked . "\"" . $tmp . "\"";
      }
      else {
        $tagsPicked = $tagsPicked . "\"" . $tmp . "\"" . " OR ";
      }
    }

    echo $tagsPicked;

    $sqlTagId = "SELECT tagId FROM `tags` WHERE CONTAINS(tagText, '$tagsPicked')
    GROUP BY tagId
    HAVING COUNT(DISTINCT tagText) = (SELECT COUNT(tagText) FROM tags)";
  */


 ?>
