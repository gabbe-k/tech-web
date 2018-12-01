<?php
  require_once('sqconnect.php');
  require_once('data_valid.php');

  $conn = Connect();

  $tags = $_POST['tags'];

  $tagSql = "SELECT tagId FROM `tags` WHERE tagText LIKE '%$tags%'";

  $result = mysqli_query($conn, $tagSql);

  $resultLen = mysqli_num_rows($result);

  var_dump($result);

  for ($i=0; $i < $resultLen; $i++) {
      $row = mysqli_fetch_assoc($result);
      $tagId = $row['tagId'];
  }

$sql = "SELECT posts.titleText, posts.postText FROM `posts, posttag, tags` WHERE posttag.tagId = '$tagId' AND posts.postId = posttag.postId";
$result2 = mysqli_query($conn, $sql);
$result2Len = mysqli_num_rows($result2);
  for ($i=0; $i < $result2Len; $i++) {
  $rowpost = mysqli_fetch_assoc($result);
  }

  Disconnect($conn);

 ?>
