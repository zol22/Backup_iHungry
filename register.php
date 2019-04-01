<?php include ('LoginFiles/login_register_request.php'); ?>
<?php include ('Logs/logAccount.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>User registration system</title>
	<link rel="stylesheet" type="text/css" href="Website/style.css">
	<meta charset="UTF-8" />
</head>

<body>

	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php" >
		<?php include('Logs/logErrors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type=text name="user">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type=text name="pass">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type=text name="pass2">
		</div>
		<div class="input-group">
			<button type=submit name="register" class="btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>


</body>

</html>

