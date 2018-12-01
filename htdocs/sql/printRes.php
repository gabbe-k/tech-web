<?php
  require_once('sqconnect.php');
  require_once('data_valid.php');

  $conn = Connect();

  $tags = $_POST['tags'];

  $tagSql = "SELECT tagId FROM `tags` WHERE tags.tagText IN ( 'hello' )";

  $result = mysqli_query($conn, $tagSql);

  $row = mysqli_fetch_assoc($result);

  echo $row['tagId'];

  $sql = "SELECT titleText, postText FROM `posts, posttag, tags` WHERE posts.tagId LIKE '$row[tagId]'";

  $result2 = mysqli_query($conn, $sql);

  $resultLen = mysqli_num_rows($result2);

  echo $resultLen;

  Disconnect($conn);

 ?>
