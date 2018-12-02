<?php

  $tags = ClearTags($conn, $_POST['tagSearch']);

  $tagsArray = explode(',', $tags);

  $sessionTags = array();

  for ($i=0; $i < count($tagsArray); $i++) {

    $result = mysqli_query($conn, "SELECT tagText FROM tags WHERE tagText='$tagsArray[$i]'");
    $resultLen = mysqli_num_rows($result);

    if ($resultLen > 0) {
      $row = mysqli_fetch_assoc($result);
      $sessionTags[] = $row['tagText'];
    }
    else {
      echo "no tags have this name sir";
      exit();
    }

  }

  $_SESSION['tagTextArr'] = $sessionTags;

 ?>
