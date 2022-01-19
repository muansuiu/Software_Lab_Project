<head>
<style>
        body{
            background-color: white;
            color: black;
            font-size: 22px;
            text-align:center;
            
        }
       
        /* Add a black background color to the top navigation */
        .topnav {
            background-color: blue;
            border: black 2px solid;
            overflow: hidden;
        
            
            
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 25px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
        background-color: lightgreen;
        color: black;
        }

        /* Add a color to the active/current link */
        .topnav a.active {
        background-color: #4CAF50;
        color: black;
        }
        
        h1{
            text-align: center;
            color: black;
        }
        .pendingorders {
        float: left;
        color: blue;
        margin-right: 70px;
        margin-left: 70px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
        
        
        }
        table, th, td{
            border: 1px solid lightblue;
            border-collapse: collapse;
            text-align: center;
            font-size: 20px;
            
        }
        tr{
            color: black;
        }
        tr:hover{
            background-color: #9AC1EF;
        }
        .conforders{
        float: left;
        color: blue;
        text-align: center;
        margin-right: 70px;
        text-decoration: none;
        font-size: 18px;
        }
</style>


<title>Customer Homepage</title>
<script>
             function logout(){
                window.location.assign('logoutprocess.php');
             }
         </script>
</head>


<?php
    session_start();

    if(isset($_SESSION['id']) && !empty($_SESSION['id']) && isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['type']) && !empty($_SESSION['type'])){
        

         
            
          ?>
         <br />
         
          <div class="topnav">
            <a href="checkmeasurement.php">Place Order</a>
            <a href="status.php">Orders</a>
            <a href="rating.php">Rating</a>
            <a href="return_policy.php">Return Item</a>
            <a href="profile.php">Profile Details</a>
            <a href="updatemea.php">Update Measurement</a>

            <a href="logoutprocess.php">Log Out</a>
          </div><br><br><br>

          <?php

    if($_SESSION['type'] == "Customer"){
        echo "Welcome ".$_SESSION['id']."!\n";

    }
    else{
        echo "Welcome ".$_SESSION['id']."!\n";

    }

    ?>

    <hr>



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