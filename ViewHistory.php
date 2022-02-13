
<?php include('backend/Registration.php');
if(!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'hoteldb';

try{
 $con = new PDO("mysql:host={$hostname};dbname={$db}",$username,$password);
 $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
 echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>View Food Orders history</title>
		
		<link rel="stylesheet" href="css/ShoppingCart.css" />
		
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
                </body>
                </html>
    <?php

$id=$_SESSION['user'];

$query="SELECT  order_table.*, users.username
    FROM order_table LEFT JOIN users
    ON order_table.id=users.id
    WHERE order_table.id=:id
 ORDER BY id";
$stmt=$con->prepare($query);

$row=$stmt->fetch(PDO::FETCH_ASSOC);

if($stmt->rowCount()>0)
{

$stmt2->execute(array(":order_id"=>$order_id));
$stmt2->execute();
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
$no=1;
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{?>
    <tr>
      
      <td><?php echo $fetch['id']?></td>
   
      <td><?php echo $fetch['username']?></td>
      <td><?php echo $fetch['order_id']?></td>
      <td><?php echo $fetch['fooditem']?></td>
      <td><?php echo $fetch['foodprice']?></td>
      <td><?php echo $fetch['foodquantity']?></td>
  </tr>
  <br>
    <?php   
}
} else { ?>
    <p>Order history is empty</p>
<?php }?>
</tbody>