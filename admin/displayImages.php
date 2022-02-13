<?php include_once("../backend/process_upload.php");


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
$stmt = $con->prepare('SELECT id, fooditem, foodprice, foodImage, foodDescription FROM Images ORDER BY id DESC');
 $stmt->execute();
 
 if($stmt->rowCount() > 0)
 {
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {
   extract($row);
   ?>
   <div class="header">
    <p class="title"><?php echo $fooditem."&nbsp;/&nbsp;".$foodprice; ?></p>
    <img src="../assets/<?php echo $row['foodImage']; ?>" class="img-rounded" width="250px" height="250px" />
    <div style="border:3px solid transparent; color:white;" align="center;" >
    <?php echo $foodDescription?>
  </div>  
    
  
    <span>
    <a class="btn" href="EditFood.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
    <a class="btn" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
    </span>
    </p>
   </div>  
    
    
    </span>
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

 if(isset($_GET['delete_id']))
 {
  
  $stmt_select = $con->prepare('SELECT FoodImage FROM Images WHERE id =:uid');
  $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
  $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
  unlink("../assets/".$imgRow['FoodImage']);
  
  
  $stmt_delete = $con->prepare('DELETE FROM Images WHERE id =:uid');
  $stmt_delete->bindParam(':uid',$_GET['delete_id']);
  $stmt_delete->execute();
  
  header("Location: displayImages.php");
 }
 
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>DISPLAY IMAGES</title>
    <link rel="stylesheet" type="text/css" href="../css/displayImages.css">
          </head>
          <body background="../Images/defood.gif">
          <script type = "text/javascript" src="../scripts/displayImages.js"></script>
  
    <div class="logo">
          <img src="../Images/logo.png">
        </div>
</head>


</div>
</html>


    
      
  
  
 
 