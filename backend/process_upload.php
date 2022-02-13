<?php



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




  $fooditem = "";
$foodprice   = "";
$foodImage  = "";
$foodDescription="";
$id=0;
$update=false;



function getData($sql){
	$link= connect();
	$result=mysqli_query($link, $sql);

	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$rows[]=$row;
	}
	return $rows;
}
function setData($sql){
	$link=connect();

	if(mysqli_query($link, $sql)){
		return true;
	}
	else{
		return false;
	}
}



if(isset($_POST["save"]))
 {
  $fooditem = $_POST['fooditem'];
  $foodprice = $_POST['foodprice'];
  $foodDescription = $_POST['foodDescription'];

  
  $imgFile = $_FILES['foodImage']['name'];
  $tmp_dir = $_FILES['foodImage']['tmp_name'];
  $imgSize = $_FILES['foodImage']['size'];
  
  
  if(empty($fooditem)){
   $errMSG = "Please Enter the food name.";
  }
  else if(empty($foodprice)){
   $errMSG = "Please Enter the food price.";
  }
  else if(empty($foodDescription)){
    $errMSG = "Please Enter the food Description.";
   }
  else if(empty($imgFile)){
   $errMSG = "Please Select Image File.";
  }
  else
  {
   $upload_dir = '../assets/'; 
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
  
   
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
  
   
   $foodImage = rand(1000,1000000).".".$imgExt;
    
   
   if(in_array($imgExt, $valid_extensions)){   
    
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$foodImage);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
  }
  
  
  
  if(!isset($errMSG))
  {
   $stmt = $con->prepare('INSERT INTO images(fooditem,foodprice,foodImage, foodDescription) VALUES(:item, :price, :img, :Descr)');
   $stmt->bindParam(':item',$fooditem);
   $stmt->bindParam(':price',$foodprice);
   $stmt->bindParam(':img',$foodImage);
   $stmt->bindParam(':Descr',$foodDescription);
   
   if($stmt->execute())
   {
    $successMSG = "new record succesfully inserted ...";
    header("refresh:0;displayImages.php"); 
   }
   else
   {
    $errMSG = "error while inserting....";
   }
  }
 }


 









  ?>
