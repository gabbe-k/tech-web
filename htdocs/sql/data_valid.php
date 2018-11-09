<?php

  function validForm($form_vars) {
      foreach ($form_vars as $var) {
        if ( ($var == "Username" || $var == "Password" || $var == "username" || $var == "password") || !isset($var) || empty($var) ) {
          return false;
        }
      }

      return true;
    }

  //funkar ej
  function valid_email($email) {
    if (preg_match('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $email))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function ClearTags($conn, $string)
  {
      return mysqli_real_escape_string($conn, $string);
  }

  function DupeSearch($conn, $database, $item, $value) {

    $sqlComm = "SELECT '$item' FROM '$database' WHERE '$database'.'$item' = '$value'";
    $result = mysqli_query($conn, $sqlComm);

    var_dump($result);

    if (!$result) {
      return false;
    }
    else {
      return true;
    }

  }

?>
