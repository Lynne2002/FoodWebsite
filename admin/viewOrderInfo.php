<?php 
session_start();
$_SESSION['shopping_cart'];

$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'hoteldb';

try{
    $conn = new PDO("mysql:host={$hostname};dbname={$db}",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
   catch(PDOException $e){
    echo $e->getMessage();
   }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>View Food Orders history</title>
		
		<link rel="stylesheet" href="../css/viewFood.css" />
		
	</head>
	<body background ="../Images/defood.gif">
<div style="
    text-align: center;
    font-weight: bold;
    font-size: 24px;
    border: solid transparent 10px;
  background: rgba(0, 0, 0, 0.8);
  color: white;">

    <h1=>View Food Orders history</h1>
</div>
        <table>
    <thead class="alert-info">
		<tr>
			<th>User ID</th>
			<th>User name</th>
      <th>Order ID</th>
		 <th>food item</th>
     <th>food price</th>
    <th>food quantity</th>

		</tr>
	</thead>
    <br>
	<tbody>
		<?php
			$stmt = $conn->prepare("SELECT users.id, users.username, order_table.order_id, order_table.fooditem, order_table.foodprice, order_table.foodquantity
      FROM users
      INNER JOIN order_table ON users.id= order_table.id;");


             $stmt->execute();
    while($fetch=$stmt->fetch(PDO::FETCH_ASSOC)){
		?>
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
		?>
	</tbody>
</table>
	
                </body>
                </html>
    <?php


?>
