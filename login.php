<?php include('backend/Registration.php')?>

<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body background="Images/defood.gif">
	<div class="logo">
					<img src="Images/food.png">
				</div>

	<div class="form">
		
		<img src="Images/avatar.png" class="image">
	
	<h1>Kitchen Jungle login</h1><br>


		<form method="POST" action="login.php">
			
          <?php echo display_error(); ?>
			<label>User Name: </label>
				<br>
				<input type="text" name="username" id="name"placeholder="Name">
				<br><br>

			<label>password: </label>
				<br>
				<input type="password" name="password" id="password"placeholder=".............................">

				<br><br>
		<button type="submit" class="btn" name="login_btn">Login</button>
		<br><br>

		<a href="#">Forgot Password? Click here to reset</a><br>
		<p>
			Not yet a member? <a href="Registration.php">Sign up</a>
		</p>
	</form>
		</div>
	
</body>
</html>
