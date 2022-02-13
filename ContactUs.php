<?php include('backend/Registration.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact Us form</title>
		<link rel="stylesheet" type="text/css" href="css/ContactUs.css">
		      </head>


	<body background="Images/defood.gif">
		<div class="logo">
					<img src="Images/food.png">
				</div>

	    <div class="profile_info">
			<img src="Images/avatar.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="logoutSuccessful.php?logout='1'" style="color: red;">log out</a>
					</small>

				<?php endif ?>
			</div>
		</div>

			<div class="wrapper">

				<div class="form">
					<div class="input-fields">
						<input type="text" class="input" placeholder="Name">
						<input type="text" class="input" placeholder="Email address">
						<input type="text" class="input" placeholder="Phone">
						<input type="text" class="input" placeholder="Subject">
						
					</div>
					<div class="message">
					<textarea placeholder="Message"></textarea>
				</div>
					<div class="btn">Send></div>
				</div>
			</div>

			
      
		
	</body>
	</html>
