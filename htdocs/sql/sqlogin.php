
<?php

  require_once('user_auth.php');
  require_once('data_valid.php');
  require_once('sqconnect.php');

  $conn = Connect();
  if(!isset($_SESSION)){ // if the session is not already set
      // we start the session engine
      session_start();
  }

  if(validForm($_POST))
  {

    $bigBool = false;
    //filter out code in username
    $user = htmlspecialchars($_POST['username']);

    $hashedpw = $conn->query("SELECT password FROM accounts WHERE username='$user'");

    if ($hashedpw -> num_rows > 0)
    {

        $dbPass = mysqli_fetch_all($hashedpw)[0][0];

        if (password_verify(htmlspecialchars($_POST['password']), $dbPass) && count(mysqli_fetch_all($hashedpw))[0] < 2)
        {

            $conn = Connect();

            $sql = $conn->query("SELECT id FROM accounts WHERE username='$user'");

            $idArr = mysqli_fetch_all($sql);

            $_SESSION['valid_user'] = $user;

            echo $idArr[0][0], $_SESSION['valid_user'];

            header("Location: ../index.php");

        }
        else
        {
          session_destroy();
          echo "Wrong username/password my man";
        }

    }

    else
    {
      session_destroy();
      echo "username not exist";
    }

  }

  else
  {
    session_destroy();
    echo "You did not fill the form out";
  }

  Disconnect($conn);
























?>
