<?php 
 
 
include('../backend/Registration.php');

  ?>    


<!DOCTYPE html>
<html>
<head>
	<title>Add new Food</title>
	<link rel="stylesheet" type="text/css" href="../css/viewFood.css">
	
</head>
<body background="../Images/defood.gif">
	<div class="logo">
					<img src="../Images/food.png">
				</div>

        <div class="title"> 
          <h1>View Food Information</h1>

        </div><br>
	<div class="form">
		
	<form method="post" action="viewFoodTable.php">
		
		
			
		
			<div class="table">
<?php $results = mysqli_query($db, "SELECT * FROM images"); ?>
      <table id="Table" class="display" cellpadding="0" width="100%">
     <thead>
     <tr>
      <th>id</th>
      <th>Food Name</th>
      <th>Food Image</th>
      <th>Food Price</th>
      
      
    </tr>
   </thead>
   
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['fooditem']; ?></td>
      <td><?php echo $row['foodImage']; ?></td>
      <td><?php echo $row['foodprice']; ?></td>
       
    </tr>
  <?php } ?>

</table>
</div>


		
	
</body>
</html>