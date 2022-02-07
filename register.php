<?php include('server.php');  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

	<div class="header">
			<a href='main.php'><img src="images/logo-png.png" alt="Favicloud" class="pagelogo"></a>
			<p class="Description">Register</p>
		</div>

	<form method="post" class="form-padding" action="register.php">
		
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password1">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="password2">
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
		<p class="space1">
			Already a member? <a href="login.php">Sign in</a>
		</p>

	</form>
</body>
</html>