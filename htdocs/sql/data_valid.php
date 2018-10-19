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

  function SafeStrip($string)
  {

      $string = strip_tags($string);
      return $string;

  }

?>
