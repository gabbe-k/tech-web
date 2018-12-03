<?php
    session_start();

    $tag = $_GET['tag'];

    $tagsArray = $_SESSION['tagText'];

    if (($key = array_search($tag, $tagsArray)) !== false) {
        unset($tagsArray[$key]);
    }

    $_SESSION['tagText'] = $tagsArray;

    header("Location: ../postview.php");


 ?>
