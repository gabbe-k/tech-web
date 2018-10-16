
<?php

  require_once('user_auth.php');
  require_once('data_valid.php');
  require_once('connect.php');

  $conn = Connect();

  session_start();

  if(filled_out($_POST) && $_POST['username'] != "Username" && $_POST['password'] != "Password")
  {

    $bigBool = false;
    //filter out code in username
    $user = htmlspecialchars($_POST['username']);

    $hashedpw = $conn->query("SELECT password FROM accounts WHERE username='$user'");

    $dbPass = mysqli_fetch_all($hashedpw)[0][0];

    var_dump($hashedpw);

    echo count(mysqli_fetch_all($hashedpw)[0]);

    if (password_verify(htmlspecialchars($_POST['password']), $dbPass) && count(mysqli_fetch_all($hashedpw)[0]) < 2)
    {
        $conn = Connect();

        $sql = $conn->query("SELECT id FROM accounts WHERE username='$user'");

        $idArr = mysqli_fetch_all($sql);

        $_SESSION['valid_user'] = $user;

        echo $idArr[0][0], $_SESSION['valid_user'];
    }
    else
    {
      echo "Wrong username/password my man";
    }

  }
  else {
    echo "You did not fill the form out";
  }

  Disconnect($conn);
























?>
