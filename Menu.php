<?php 
include('backend/Registration.php');
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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>DISPLAY IMAGES</title>
    <link rel="stylesheet" type="text/css" href="css/displayImages.css">
          </head>
          <body background="../Images/defood.gif">
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
         
  
    <div class="logo">
          <img src="Images/logo.png">
        </div>

        
</head>



	
<?php 


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




 
 $stmt = $con->prepare('SELECT id, fooditem, foodprice,  foodImage, foodDescription FROM Images ORDER BY id DESC');
 $stmt->execute();
 
 if($stmt->rowCount() > 0)
 {
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {
   extract($row);
   ?>
   <div class="header">
    <p class="title"><?php echo $fooditem."&nbsp;/&nbsp;".$foodprice; ?></p>
     <img src="assets/<?php echo $row['foodImage']; ?>" class="img-rounded" width="250px" height="250px" />
     <div style="border:3px solid transparent; color:white;" align="center;" >
    <?php echo $foodDescription?>
  </div>  
   
    
    </p>
   </div>  
      
   <?php
  }
 }
 else
 {
  ?>
        <div class="header">
         <div class="warning">
             <span class="data"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
 }

?>


</body>

</div>
<span>
    
    <a class="btn" href="Cart.php" title="click to order" onclick="return confirm('Are you sure you want to order ?')"><span class="Order"></span> Order</a>
    </span>  

</html>





