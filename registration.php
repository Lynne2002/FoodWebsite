<?php
include('backend/Registration.php');

 if (isset($_GET['edit'])) {
	
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

		if ($record->num_rows == 1) {
			$n = mysqli_fetch_array($record);
			global $db, $errors, $username, $email;


$username = $n['username'];
$email = $n['email'];
$user_type = $n['user_type'];
$password = $n['password'];



   }
}
			
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/Registration.css">

  
		      </head>
</head>
<body background="Images/defood.gif">

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
	
		<div class="logo">
					<img src="Images/food.png">
				</div>
		<div class="Registration">
			<h2>Kitchen Jungle Registration</h2><br> 


		



			<form method="post" action="backend/Registration.php">
			<?php echo display_error(); ?>
			<?php $results = mysqli_query($db, "SELECT * FROM users"); ?>
			    <input type="hidden" name="id" value="<?php echo $id; ?>">
				<label>User Name: </label>
				<br>
				<input type="text" name="username" id="name"placeholder="Name" value="<?php echo $username;?>">
				<br><br>

				<label>Email address: </label>
				<br>
				<input type="email" name="email" id="Email"placeholder="Email address"value="<?php echo $email;?>">
				<br><br>

				<label>Create password: </label>
				<br>
				<input type="password" name="password" id="password"placeholder="............................."value="<?php echo $password;?>">
				<br><br>
				
				
				<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update">update</button><br>
<?php else: ?>
	<button class="btn" type="submit" name="save" >save</button><br><br>
<?php endif ?>
				
		Already a member? <a href="login.php">Sign in</a>
	<br><br><br><br>
			</form>
	
</table>
		</div>
		
	
	</body>
</html>

