<?php 
include('backend/Registration.php');
if(!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>HOTEL WEBSITE</title>
		<link rel="stylesheet" type="text/css" href="css/homePageStyle.css">
		      </head>


	<body background="images/defood.gif">
	<div style="right: 0;
margin-left: 1050px;
background: rgba(0, 0, 0, 0.8);
color: white;" class="profile_info">
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
		<header>

				<div class="main">
				<div class="logo">
					<img src="images/food.png">
				</div>
				<ul>
					
					<li class="one"><a href="#">Home</a></li>
					<li><a href="Menu.php">Menu</a></li>
				    <li><a href="ContactUs.php">Contact Us</a></li>
					
					

					
					</ul>
</div>
			
			<div class="title">
			<br><br><br><br>
			      <h1>KITCHEN JUNGLE </h1>
			      <h2><i>We prepare and serve high quality, simple food, at a great value, in a home-like environment</i></h2>
		    </div>
<div class="buttons" style="text-align:center;">
    <a href="login.html">
    	<button class="btn1">LOGIN </button>
    </a>
    <a href="registration.html"><button class="btn2">REGISTER</button>
    </a>
</div>
<div class="benefitslist">
	<h1 class="b1">Why choose us?</h1>
	<p class="b2">We offer a variety of delicious dishes made by the best chefs in the world. We are fast,reliable and efficient. You can place an order at any time and we will deliver your food in a split of a second.</p>

</div>
<div class="FeaturesHighlights">
	<h2> Features Highlights </h2>
	
	<table border="3" width="100%">
		<tr>
			<td width="25%" align="center" class="zoom"><img src="Images/image1.jpg" width="85%">
				<td width="25%" align="center" class="zoom"><img src="Images/image7.jpg" width="85%">
					<td width="25%" align="center" class="zoom"><img src="Images/image3.jpg" width="85%">
						<td width="25%" align="center" class="zoom"><img src="Images/image6.jpg" width="85%">
							</td>
						
		</tr>
		<tr>
			<td align="center"><b><font size="4">Tastiest food</font></b></td>
			<td align="center"><b><font size="4">Affordable prices</font></b></td>
			<td align="center"><b><font size="4">Healthiest food</font></b></td>
			<td align="center"><b><font size="4">fast delivery</font></b></td>

		</tr>

</table>
						
</div>

<div class="TrustIndicators1">
	<h1><b>Customer Testimonials</b></h1>
     <div class="no1">
       <p>"<b>This is the best food website ever! I got my delivery in time, and the food was just amazing."</b></p>
<p><strong><i>Damian Jones</i></strong></p>

  </div>
  <div class="no2">
    <p>"<b>I haven't seen a website that is as reliable as this. I ordered my food, and in just 15 minutes, the food was at my doorstep. And yes, the food was very delicious:)"</b></p>
<p><strong><i>Phoebe Thunderman</i></strong></p>
</div>
  
  <div class="no3">
  	<p><b>"The best food website of all times!"</b></p>
  	<p><strong><i>Alice Brown</i></strong></p>
  </div>
  <div class="no4">
  	<p><b>"Best services ever!"</b></p>
  	<p><strong><i>Eunice M</i></strong></p>
  </div>
</div>

<div class="TrustIndicators2">
	<h3><b><i>Social media handles</b></i></h3>
	<table border="3" width="100%">
		<tr>
			<td width="16%" align="center" class="zoom"><img src="Images/ig.jpg" width="25%">
				<td width="16%" align="center" class="zoom"><img src="Images/fb.png" width="25%">
					<td width="16%" align="center" class="zoom"><img src="Images/in.png" width="25%">
						<td width="16%" align="center" class="zoom"><img src="Images/yb.png" width="25%">
							<td width="16%" align="center" class="zoom"><img src="Images/twi.png" width="25%">
									<td width="16%" align="center" class="zoom"><img src="Images/pin.png" width="25%">

							</td>
						
		</tr>
	</table>
	
</div>
<div class="Partnerships">
	<h1>Partnerships</h1>
	
	
	<table border="3" width="100%">
		<tr>
			<td width="16%" align="center" ><img src="Images/p1.jpg" width="25%">
				<td width="16%" align="center"><img src="Images/p5.png" width="25%">
					<td width="16%" align="center"><img src="Images/p3.jpg" width="25%">
						<td width="16%" align="center"><img src="Images/p4.jpg" width="25%">
							<td width="16%" align="center"><img src="Images/p7.jpg" width="25%">
								<td width="16%" align="center"><img src="Images/p6.jpg" width="25%">
							

							</td>
							
						
		</tr>
	</table>
</div>
</header>
<footer class="footer">

			
				<h3>About <span>Kitchen Jungle</span></h3>

				<p class="fl">
					<a href="#">Blog Articles</a>
					|
					<a href="#">Recommendations</a>
					|
					<a href="#">Tools&Tips</a>
					|
					<a href="#">Announcements</a>
					|
					<a href="#">Coupons</a>
					|
					<a href="#">Free stuff</a>
					
				</p>

				<p class="name">© 2021 Kitchen Jungle</p>
			</div>

			<div class="f2">
				<div>
					<i class="address"></i>
					  <p><span>12483-20200 - Jogoo Road,
						 Kencom Building</span>
						Nairobi, Kenya</p>
				</div>

				<div>
					<i class="phone"></i>
					<p>+254 222 778 218</p>
				</div>
				<div>
					<i class="email"></i>
					<p><a href="KitchenJungle@gmail.com">KitchenJungle@gmail.com</a></p>
				</div>
			</div>
			<div class="f3">
				<p class="fa">
					<span>© All rights preserved</span>
					Kitchen Jungle</p>
			<?php
			if (isset($_GET['logout'])) {
				session_destroy();
				unset($_SESSION['user']);
				unset($_SESSION['shopping_cart']);
				header("location: login.php");
			  }
			?>
				
			</div>
		</footer>
	</body>
</html>	