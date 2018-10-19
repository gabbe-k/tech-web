<?php
  require_once('sqconnect.php');

  $conn = Connect();

  session_start();

  $usr = "sopesope3";

  $idArr = $conn->query("SELECT id FROM accounts WHERE username='$usr'");

  $id = mysqli_fetch_all($idArr)[0][0];
  $postId = rand(0, 9999);
  $description = $_POST['description'];
  $title = $_POST['title'];

  $conn->query("INSERT INTO posts (id, titleText, postText, postid) VALUES ('$id', '$title', '$description', '$postId')")


 ?>
