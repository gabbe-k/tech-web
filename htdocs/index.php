<!DOCTYPE html>

<html lang="en" dir="ltr">
	<head>

		<meta charset="utf-8">
		<title>ServerPojkarna</title>
		<link rel="stylesheet" href="master.css">

	</head>

	<body>

		<div class="IndexContent">

			<div class="header">
				<h2>Header</h2>
			</div>

			<div class="intro">
				<h1>Hello</h1>
			</div>

			<div class="main">
				<p>Main</p>
			</div>

			<div class="aside">
				<p>Aside</p>
			</div>

			<div class = "login">
				<form id="loginForm" action="sqlogin.php" method="post">
					<input type="text" name="username" value="Username">
					<input type="text" name="password" value="Password">
					<input type="submit">
				</form>
				<a href="register.php">No account?</a>
			</div>
		</div>

		<div class="footer">
			Footer
		</div>

	</body>

</html>
