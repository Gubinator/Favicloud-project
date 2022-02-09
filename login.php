
<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	

	<a href="javascript:history.back()" class="Back href-color"><img src="images/warrow.png" class="back-arrow"></a>

	<div class="header">
			<a href='main.php'><img src="images/logo-png.png" alt="Favicloud" class="pagelogo"></a>
			<p class="Description">Login</p>
	</div>

	<form method="post" class="form-padding" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p class="space1">
			Not a member? <a href="register.php">Sign up</a>
		</p>

	</form>
</body>
</html>