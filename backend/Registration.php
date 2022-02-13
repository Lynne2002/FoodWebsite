<?php
session_start();

 
$db = new mysqli("127.0.0.1", "root",'', "hoteldb");
    
  
$username = "";
$email    = "";
$errors   = array(); 
$id=0;
$update=false;

if (isset($_POST['save'])){
  

   global $db, $errors, $username, $email;

$username    =  e($_POST['username']);
$email       =  e($_POST['email']);
 $password  =  e($_POST['password']);
 

if (empty($username)) { 
    array_push($errors, "Username is required"); 
  }
  if (empty($email)) { 
    array_push($errors, "Email is required"); 
  }
  if (empty($password)) { 
    array_push($errors, "Password is required"); 
  }
  

  if (count($errors) == 0) {
    

    if (isset($_POST['user_type'])) {
      $user_type = e($_POST['user_type']);
      $query = "INSERT INTO users(username, Email, user_type, password) 
            VALUES('$username', '$email', '$user_type', '$password')";
      mysqli_query($db, $query);
      $_SESSION['success']  = "New user successfully created!";
      header('location: ../registrationSuccessful.php');
    }else{
      $query = "INSERT INTO users(username, email, user_type, password) 
            VALUES('$username', '$email', 'user', '$password')";
      mysqli_query($db, $query);

      
      $logged_in_user_id = mysqli_insert_id($db);

      $_SESSION['user'] = getUserById($logged_in_user_id); 
      $_SESSION['success']  = "You are now logged in";
      header('location: ../registrationSuccessful.php');   
      
}
}
}
    




  if (isset($_POST['update'])) {

    
  $id = $_POST['id'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $user_type = $_POST['user_type'];
  $password = $_POST['password'];

  mysqli_query($db, "UPDATE users SET username='$username', email='$email', user_type='$user_type', password='$password'WHERE id=$id");
  
  header('location: ../updateSuccessful.php');
}

if (isset($_GET['del'])) {
  $id = $_GET['del'];
  mysqli_query($db, "DELETE FROM users WHERE id=$id");
  
  header('location: ../deleteSuccessful.php');
}

function getUserById($id){
  global $db;
  $query = "SELECT * FROM  users WHERE id=" . $id;
  $result = mysqli_query($db, $query);

  $user = mysqli_fetch_assoc($result);
  return $user;
}


function e($val){
  global $db;
  return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
  global $errors;

  if (count($errors) > 0){
    echo '<div class="error">';
      foreach ($errors as $error){
        echo $error .'<br>';
      }
    echo '</div>';
  }
} 
function isLoggedIn()
{
  if (isset($_SESSION['user'])) {
    return true;
  }else{
    return false;
  }
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  unset($_SESSION['shopping_cart']);
  header("location: login.php");
}
function isAdmin()
{
  if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
    return true;
  }else{
    return false;
  }
}






if (isset($_POST['login_btn'])) {
  login();
}


function login(){
  global $db, $username, $errors;

  
  $username = e($_POST['username']);
  $password = e($_POST['password']);

 
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  
  if (count($errors) == 0) {
    

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { 
      
      $logged_in_user = mysqli_fetch_assoc($results);
      if ($logged_in_user['user_type'] == 'admin') {

        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        header('location: admin/Dashboard.php');     
      }else{
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";

        header('location: homePage1.php');
      }
    }

    else {
      array_push($errors, "Wrong email/password combination");
      header('location: loginUnsuccessful.php');
    
  }
}
}
