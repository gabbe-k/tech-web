<?php
    require_once('sqconnect.php');

    function Register($username, $email, $password)
    {
        $conn = Connect();

        $result = $conn->query("SELECT * FROM accounts WHERE username='$username'");


        if (!$result)
        {
            throw new Exception('Could not execute query');
        }

        if ($result -> num_rows >  0)
        {
            throw new Exception('Username is taken.');
        }


        $id = rand(0,9999);

        //if ok, put in db
        $result = $conn->query("INSERT INTO accounts(id, username, email, password) VALUES('$id', '$username', '$email', '$password')");

        if(!$result)
        {
            throw new Exception('Could not register.');
        }

        return true;
    }

?>
