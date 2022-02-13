<?php

$conn = new mysqli("127.0.0.1", "root",'', "hoteldb");

$hostname = 'localhost';
$username= 'root';
$password = '';
$db = 'hoteldb';

try{
 $con = new PDO("mysql:host={$hostname};dbname={$db}",$username,$password);
 $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
 echo $e->getMessage();
}

 
if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
 {
  $id = $_GET['edit_id'];
  $stmt_edit = $con->prepare('SELECT fooditem, foodprice, foodImage, foodDescription FROM images WHERE id =:uid');
  $stmt_edit->execute(array(':uid'=>$id));
  $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
  extract($edit_row);
 }
 else
 {
  header("Location: displayImages.php");
 }
?>

 
 

<!DOCTYPE html>


<html>
<head>
	<title>Edit images</title>

	<link rel="stylesheet" type="text/css" href="../css/upload_images.css">
</head>
<body background="../Images/defood.gif">
	<div class="logo">
          <img src="../Images/food.png">
       </div>
       <h1>Image upload</h1><br>
<div class="form">
<h1>Image upload</h1><br>
<form method='post' action="" enctype="multipart/form-data">
		

<input type="hidden" name="edit_id" value="<?php echo $id; ?>">
		<label for="fooditem">Food Name:</label><br>
				<input type="text" name="edit_name"  placeholder="food item name" value="<?php echo $fooditem; ?>"><br/>

		<label for="foodImage">Image:</label><br/><br/>
		        <input type="file" name="foodImage" value=""  /><img src="../assets/>" width="150px" height="100px">
				

		<br/><br/>

		<label for="foodprice">Price</label><br/>	
		<input type="number" name="edit_price" id="edit_price" value="<?php echo $foodprice; ?>" >
		<br/><br/>

                <label for="food Description">Food Description</label><br/>
		<input type="text" name="edit_description" value="<?php echo $foodDescription; ?>">

<br/><br/>
	<button class="btn" type="submit" name="save_update" >save</button>
<br/><br/>


		
	
	
		
			 
	</form>
	</div>
        <?php
        if(isset($_POST['save_update'])){
                $edit_id=$_POST['edit_id'];
                $edit_name=$_POST['edit_name'];
                $edit_price=$_POST['edit_price'];
                $edit_image=$_FILES['foodImage']['name'];
                $edit_description=$_POST['edit_description'];
                $query="UPDATE images SET fooditem='$edit_name',foodImage='$edit_image', foodprice='$edit_price', foodDescription='$edit_description' WHERE id='$edit_id'";
                $query_run=mysqli_query($conn, $query);
                if($query_run){
                  move_uploaded_file($_FILES["foodImage"]["tmp_name"], "../assets/".$_FILES["foodImage"]["name"]);
                  $_SESSION['success']='successfully updated';
                  header("Location:displayImages.php");
              }
              else{
                $_SESSION['status']="Faculty not updated";
                header("Location:displayImages.php");
              }
               }

        ?>
