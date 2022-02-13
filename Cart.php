<?php 
include('backend/Registration.php');
if(!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}


$connect = mysqli_connect("localhost", "root", "", "hoteldb");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{	
		$item_array_id = array_column($_SESSION["shopping_cart"], "id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'id'			=>	$_GET["id"],
				'fooditem'			=>	$_POST["fooditem"],
				'foodprice'		=>	$_POST["foodprice"],
				'foodquantity'		=>	$_POST["foodquantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'id'		=>	$_GET["id"],
			'fooditem'			=>	$_POST["fooditem"],
			'foodprice'		=>	$_POST["foodprice"],
			'foodquantity'		=>	$_POST["foodquantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="Cart.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart</title>
		
		<link rel="stylesheet" href="css/Shoppingcart.css" />
		
	</head>
	<body>
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
		</div>
		<br />
		<div class="container">
			<br />
			<br />
			<br />
			<h3 align="center">Shopping Cart</h3><br />
			<br /><br />
			<?php
				$query = "SELECT * FROM images ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="Cart.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:3px solid transparent; color:white" align="center">
						<img src="assets/<?php echo $row["foodImage"]; ?>" class="img" /><br />

						<h4 class="text-info"><?php echo $row["fooditem"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["foodprice"]; ?></h4>

						<input type="text" name="foodquantity" value="1" class="form-control" />

						<input type="hidden" name="fooditem" value="<?php echo $row["fooditem"]; ?>" />

						<input type="hidden" name="foodprice" value="<?php echo $row["foodprice"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Food Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					
					{
						
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
							
					?>
					
					<tr>
					
						<td><?php echo $values["fooditem"]; ?></td>
						<td><?php echo $values["foodquantity"]; ?></td>
						<td>$ <?php echo $values["foodprice"]; ?></td>
						<td>$ <?php echo number_format($values["foodquantity"] * $values["foodprice"], 2);?></td>
						<td><a href="Cart.php?action=delete&id=<?php echo $values["id"]; ?>"><span class="text-danger">Remove</span></a></td>
						
					</tr>
					<?php
							$total = $total + ($values["foodquantity"] * $values["foodprice"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					
					<?php
					}
					?>
					<a href="PaymentForm.php"><input type="button" value="checkout"></a>	
				</table>

			</div>
		</div>
	</div>
	<br />
	
	</body>
</html>