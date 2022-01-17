<!DOCTYPE html>
<html>
  <head>
      <!--meta information-->
      <meta charset="utf-8">
      <title>Home</title>
      <link rel="stylesheet" href="css_files/homepage_style.css">

      <script>
           // this function travels to the index.html page
            function placeOrder(){
                window.location.assign("checkmeasurement.php");
            }
      </script>
  </head>
  <body> 
      <header>
        <a class="logo">Online Tailor Shop</a>
        <nav>
            <ul class="nav__links">   
                <li><a href="status.php">Orders</a></li>
                <li><a href="rating.php">Rating</a></li>
                <li><a href="profile.php">Profile Details</a></li>
                <li><a href="updatemea.php">Update Measurement</a></li>
                <li><a href="logoutprocess.php">Log Out</a></li>

            </ul>
        </nav>
    </header>
    <div class = "banner_image">
    <img src = "staticfiles/home.jpg">
      <button class = "btn" onclick= "placeOrder()">Place Order</button>
    </div>
    
  </body>

<?php
    session_start();

    if(isset($_SESSION['id']) && !empty($_SESSION['id']) && isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['type']) && !empty($_SESSION['type'])){    
?>
            
        




    <?php
      
            

    
    }
    else{
        ///session doesn't contain any valid user email
        ?>
            <script>
                window.location.assign('signin.php');
            </script>
        <?php
    }
?>
</html>