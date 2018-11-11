<?php
require_once('data_valid.php');
require_once('sqconnect.php');

session_start();

$conn = Connect();

$id = $_SESSION['u_id'];
$commText = ClearTags($conn, $_POST['commText']);
$postId = $_POST['postId'];

$dupe = true;

while ($dupe) {

  $commId = rand(0, 9999);

  if (!DupeSearch($conn, "comments", "commId", $commId)) {
    $dupe = false;
  }

}

$conn->query("INSERT INTO comments (id, commText, commId, postId) VALUES ('$id', '$commText', '$commId', '$postId')");

Disconnect($conn);

header("Location: ../postview.php")
 ?>
