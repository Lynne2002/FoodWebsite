
<!DOCTYPE html>
<html lang="en">

<head>
    
    <link rel="stylesheet" href="css/loginUnsuccessful.css">
    
    
    
</head>
<body background="images/defood.gif">
    <div class="logo">
                    <img src="images/food.png">
                </div>
    <div class="title">
        
           <h1>Kitchen Jungle</h1>
            
            <h2>You have Logged out successfully. <br>
            </h2>
        </div>
   
    </div>
    <div class="content">
       
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
        
                <?php  if (isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>

                    <small>
                        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                        <br>
                        <a href="logoutSuccessful.php?logout='1'" style="color: red;">logout</a>
                    </small>

                <?php endif ?>
                </div>
    
    <a href="login.php"><button class="btn1">Login</button></a>
     <a href="#"><button class="btn2">Cancel</button></a>

        
    </div>
</body>
</html>