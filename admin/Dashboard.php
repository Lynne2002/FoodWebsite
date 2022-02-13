<?php include('../backend/Registration.php');

if(!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: ../logoutSuccessful.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

    if ($record->num_rows == 1) {
      $n = mysqli_fetch_array($record);
      global $db, $errors, $username, $email;


$username = $n['username'];
$email = $n['email'];
$user_type = $n['user_type'];
$password = $n['password'];



   }
}
      
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HOTEL WEBSITE</title>
    <link rel="stylesheet" type="text/css" href="../css/DashboardStyle.css">
          </head>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
  
  
  
      

<body background="../Images/defood.gif">

  <div class="navbar">
    <div class="logo">
          <img src="../images/logo.png">
        </div>
    <div class="details">
      <span class="title">Kitchen Jungle</span>
    </div>
    <ul class="navlinks">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="name">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="upload_images.php">
            <i class='bx bx-box' ></i>
            <span class="name">Image upload</span>
          </a>
        </li>
        
        <li>
          <a href="EditFood.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="name">View Food</span>
          </a>
        </li>
        <li>
          <a href="viewFoodHTMLTable.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="name">Food Table</span>
          </a>
        </li>
        
        <li>
          <a href="viewOrderInfo.php">
            <i class='bx bx-user' ></i>
            <span class="name">Food Orders</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="name">Favorite Food</span>
          </a>
        </li>
        
        
      </ul>
  </div>

<section class="homesection">
    <nav>
      <div class="sidebarbutton">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>






      <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>




    <?php endif ?>
    <div class="profile_info">
      <img src="../Images/avatar.png"  >

      <div>
        <?php  if (isset($_SESSION['user'])) : ?>
          <strong><?php echo $_SESSION['user']['username']; ?></strong>

          <small>
            <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
            <br>
            <a href="Dashboard.php?logout='1'" style="color: red;">logout</a>
                       &nbsp; <a href="create_user.php" style="color: white;"> + add user</a>
          </small>
        <?php endif ?>
      </div>

      
    
    
      
    </nav>
  </section>

<div class="home-content">
      <div class="overview-boxes">


        <div class="box">
            <div class="right-side">
            <div class="box-topic">Total Orders</div>
            <div class="number">50,000</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>


        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number">60,632</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>

        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number">300,000</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
</div>

        
     <div class="title"> 
             <h2>Registered Users<br>
              and admins</h2>  
     </div> 
<div class="table">
<?php $results = mysqli_query($db, "SELECT * FROM users"); ?>
      <table id="Table" class="display" cellpadding="0" width="100%">
     <thead>
     <tr>
      <th>id</th>
      <th>username</th>
      <th>email</th>
      <th>user type</th>
      <th>password</th>
      <th colspan="6">Action</th>
    </tr>
   </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['user_type']; ?></td>
      <td><?php echo $row['password']; ?></td>
      <td>
        <a href="../registration.php?edit=<?php echo $row['id']; ?>" class="edit" >Edit</a>
      </td>
      <td>
        <a href="../backend/Registration.php?del=<?php echo $row['id']; ?>" class="delete">Delete</a>
      </td>
    </tr>
  <?php } ?>

</table>
</div>

</div>

</html>
