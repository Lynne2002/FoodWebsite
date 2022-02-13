<?php include('../backend/Registration.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create user</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	
</head>
<body background="../Images/defood.gif">
	<div class="logo">
					<img src="../Images/food.png">
				</div>


	<div class="form">
		
	<form method="post" action="create_user.php">
		<img src="../Images/avatar.png" class="image">
		
			<h1>Create User</h1><br>
		

		<form method="post" action="create_user.php">


		<?php echo display_error(); ?>

		
			<label>Username:</label><br><br>
			<input type="text" name="username" value="<?php echo $username; ?>"><br>
		
		
			<label>Email: </label>
				<br>
				<input type="email" name="email" id="Email"placeholder="Email address"  value="<?php echo $email; ?>"><br>
				
		
		
			<label>User type:</label><br>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		<br><br>

		<label>Password:</label>

			<input type="password" name="password" value="<?php echo $password; ?>">
		
			
		<button type="submit" class="btn" name="save"> + Create user</button>
		</div>
	</form>
</body>
</html>