<!DOCTYPE html>

<?php
    session_start();
 ?>

<html lang="en" dir="ltr">
	<head>

		<meta charset="utf-8">
		<title>ServerPojkarna</title>
		<link rel="stylesheet" type="text/css" href="./css/master.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>

	<body>

		<div class="IndexContent">

			<div class="header">
				<h2>Header</h2>
        <a href="../postview.php">postview</a>
      </div>

			<div class="intro">
				<h1>Hello</h1>
				<h3>Put link to interactive checklist here</h3>
				<br>
				<h3>This div can change content without changing page and let you put in tags</h3>
			</div>

			<div class="main">
      <?php
        if (isset($_SESSION['u_id'])) {
      ?>
				<form action="sql/sqpost.php"  id="loginForm" method="post">
					<input type="text" id="formfields" name="title" value="Title">
					<input type="text" id="formfields" name="description" value="Description">
					<input id="formfields" type="text" name="tags" value="Tags, separate with ','">
					<input type="submit" id="submitbutton" value="Submit">
				</form>

  	  <?php
        }
      ?>
			</div>

			<div class="aside">
				<p>Aside</p>
			</div>

			<div class = "login">

        <?php
          if (isset($_SESSION['u_id'])) {
        ?>
             <form action="sql/sqlogout.php" method="post">
                <button type="submit" name="submit">Log out</button>
             </form>
    	  <?php
          }
          else {
        ?>
    				<div class="logForm">
    					<form id="loginForm" action="sql/sqlogin.php" method="post">
    						<input id="formfields" type="text" name="username" value="Username">
    						<input id="formfields" type="text" name="password" value="Password">
    						<input id="submitbutton" type="submit" value="Submit">
    					</form>
    				</div>

    				<div class="linkRegister">
    					<a id="noAcc" href="register.php">No account?</a>
    				</div>
        <?php
          }
         ?>

			</div>

		</div>

		<div class="footer">
			Footer
		</div>

	</body>

</html>
