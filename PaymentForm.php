<?php include("backend/registration.php");



if(!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

 
 

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment PAGE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" type="text/css" href="css/PaymentForm.css">

	
		      </head>

<body background="Images/defood.gif">
<div class="profile_info"style="
			right: 0;
  margin-left: 1050px;
  background: rgba(0, 0, 0, 0.8);
  color: white;">
			<img src="Images/avatarsmall.png"  >

			
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="logoutSuccessful.php?logout='1'" style="color: red;">log out</a>
					</small>

				<?php endif ?>
			</div>



	<div class="wrapper">
		<h2>Payment form</h2>
		<form name="form1" action="PaymentForm.php" method="POST">
			<h4>Account</h4>
			<div class="input-group">
				<div class="input-box">
					<input type ="text" placeholder="Full Name" required class="name" name="name">
					
					

				</div>

				<div class="input-box">
					<input type ="text" placeholder=" UserName" required class="username" name="username">
					
				</div>
				
					<div class="input-box">
					<input type ="email" placeholder=" Email Address" required class="email" name="email">
					
				</div>


				
					<div class="input-box">
						<h4>Date of birth</h4>
					<input type ="text" placeholder="DD" required class="dob" name="dob">
					<input type ="text" placeholder="MM" required class="dob1" name="dob1">
					<input type ="text" placeholder="YYYY" required class="dob2" name="dob2">
					
				</div>

				<div class="input-box">
					<h4>Gender</h4>
					<input type="radio" id="b1"
					name="gender" checked class="radio">
					<label for="b1">Male</label>
					<input type="radio" id="b2"
					name="gender" class="radio">
					<label for="b2">Female</label>
				</div>

				<div class="input-box">
					<h4>Payment Details</h4>
					<input type="radio" name="pay"
					id="bc1" checked class="radio">
					<label for="bc1"><span>Credit Card </span></label>
					<input type="radio" name="pay"
					id="bc1" checked class="radio">
					<label for="bc2"><span>PayPal </span></label>
				</div>


			<div class="input-box">
						
					<input type ="tel" placeholder="Card CVC" required class="card" name="card">
					
				</div>

				<div class="input-box">
				<select>
					<option>01 jun</option>
					<option>02 jun</option>
					<option>03 jun</option>
				</select>
				<select>
					<option>2020</option>
					<option>2021</option>
					<option>2023</option>
				</select>
			</div>
		</div>


		<div class= "input-box">
		<a href="PaymentForm.php?checkout=true"><button type="Submit" name="Submit">PAY NOW</button></a>
	</div>
	

</div>

		</form>
	</div>
	<?php
	$name = "";
	$username    = "";
	$dob = "";
$email    = "";
$dob1 = "";
$dob2   = "";
$card = "";
$id    = 0;

if (isset($_POST['Submit'])){
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$id = $_SESSION['user']['id'];
		var_dump($_SESSION['user']["id"]);
		$link=mysqli_connect("localhost", "root", '');
		mysqli_select_db($link, "hoteldb");
		mysqli_query($link, "INSERT into order_table VALUES('',$id,'$values[fooditem]', '$values[foodprice]', '$values[foodquantity]')");
	}
 }


	if(isset($_POST["Submit"])){
		
		$link=mysqli_connect("localhost", "root", '');
		mysqli_select_db($link, "hoteldb");
		mysqli_query($link, "insert into checkout_table values('', '$_POST[name]', '$_POST[username]', '$_POST[email]', '$_POST[dob]', '$_POST[dob1]', '$_POST[dob2]', '$_POST[card]')");
	header('location: PaymentSuccessful.php');

	}
	?>
	<script type="text/javascript">
	alert("your details are saved successfully");
	
	</script>
</body>
