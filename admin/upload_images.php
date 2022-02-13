<?php include ("../backend/process_upload.php");


?>


<!DOCTYPE html>


<html>
<head>
	<title>Upload images</title>

	<link rel="stylesheet" type="text/css" href="../css/upload_images.css">
</head>
<body background="../Images/defood.gif">
	<div class="logo">
          <img src="../Images/food.png">
       </div>
       <h1>Image upload</h1><br>
<div class="form">
<h1>Image upload</h1><br>
<form method='post' action="upload_images.php" enctype="multipart/form-data">
		
	


		<label for="fooditem">Food Name:</label><br>
				<input type="text" name="fooditem"  placeholder="food item name" value="<?php echo $fooditem; ?>"><br/>

		<label for="foodImage">Image:</label><br/><br/>
		        <input type="file" name="foodImage" value=""  /><img src="../asets/>" width="150px" height="100px">
				
				

		<br/><br/>
		<label for="foodprice">Price</label><br/>	
		<input type="number" name="foodprice" id="foodprice" value="<?php echo $foodprice; ?>" > >
		<br/><br/>

		
		
		<label for="food Description">Food Description</label><br/>
		<input type="text" name="foodDescription" class="input" value="<?php echo $foodDescription; ?>">>
	<button class="btn" type="submit" name="save" >save</button>
<br/><br/>
	
			 
	</form>
	</div>
	
</body>
</html>




			



