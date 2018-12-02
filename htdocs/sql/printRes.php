<?php
  require_once('sqconnect.php');
  require_once('data_valid.php');
  session_start();

  $conn = Connect();

  $tag = ClearTags($conn, $_POST['tagSearch']);

  $_SESSION['tagText'][] = $tag;

  print_r(array_values($_SESSION['tagText']));

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

  $sqlTagId = "SELECT tagId FROM `tags` WHERE tagText LIKE($tagsPicked)";

  $sqlPostId = "SELECT postId FROM `posttag` WHERE tagId IN ($sqlTagId)";

  $_SESSION['postIdSELECT'] = $sqlPostId;

  echo $_SESSION['postIdSELECT'];

  Disconnect($conn);

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
