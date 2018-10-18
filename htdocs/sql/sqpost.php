<?php
  require_once('sqconnect.php');

  $idArr = $conn->query("SELECT id FROM accounts WHERE username='$_SESSION['valid_user']'");
  $id = mysqli_fetch_all($idArr)[0][0];
  $postId = rand(0, 9999);
  $description = $_POST['description'];

  $conn = Connect();

  $sql = conn->query("INSERT INTO posts ('id', 'postid', 'text') VALUES ('$id' '$postId', '$description')")




  Disconnect($conn);

 ?>
