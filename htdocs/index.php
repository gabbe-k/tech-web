<!DOCTYPE html>

<html lang="en" dir="ltr">
	<head>

		<meta charset="utf-8">
		<title>ServerPojkarna</title>
		<link rel="stylesheet" href="css/master.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>

	<body>

		<div class="IndexContent">

			<div class="header">
				<h2>Header</h2>
			</div>

			<div class="intro">
				<h1>Hello</h1>
				<h3>Put link to interactive checklist here</h3>
				<br>
				<h3>This div can change content without changing page and let you put in tags</h3>
			</div>

			<div class="main">
				<form action="sql/sqpost.php" id="loginForm" method="post">
					<input type="text" id="formfields" name="title" value="Title">
					<input type="text" id="formfields" name="description" value="Description">
					<input type="submit" id="submitbutton" value="Submit">
				</form>

				<?php
					//PrintPosts();
				 ?>
			</div>

			<div class="aside">
				<p>Aside</p>
			</div>

			<div class = "login">

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

			</div>

		</div>

		<div class="footer">
			Footer
		</div>

	</body>

</html>
