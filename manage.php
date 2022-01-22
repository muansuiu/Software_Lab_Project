<head>
<title>Manager Orders </title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  
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
        float: none;
        position: absolute;
        
        left: 50%;
        transform: translate(-50%, -50%);
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
            position: top;
        float: left;
        color: blue;
        margin-right: 70px;
        margin-left: 70px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
        
        
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
        .delorders{
        float: left;
        color: blue;
        text-align: center;
        margin-right: 70px;
        text-decoration: none;
        font-size: 18px;
        }
        .btn {
  border: none;
  display: block;
  text-align: center;
  cursor: pointer;
  text-transform: uppercase;
  outline: none;
  overflow: hidden;
  position: relative;
  color: #fff;
  font-weight: 700;
  font-size: 15px;
  background-color: #222;
  padding: 17px 60px;
  margin: 0 auto;
  box-shadow: 0 5px 15px rgba(0,0,0,0.20);
}

.btn span {
  position: relative; 
  z-index: 1;
}

.btn:after {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  height: 490%;
  width: 140%;
  background: #78c7d2;
  -webkit-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out;
  -webkit-transform: translateX(-98%) translateY(-25%) rotate(45deg);
  transform: translateX(-98%) translateY(-25%) rotate(45deg);
}

.btn:hover:after {
  -webkit-transform: translateX(-9%) translateY(-25%) rotate(45deg);
  transform: translateX(-9%) translateY(-25%) rotate(45deg);
}
</style>


<script>
             function conf(orderno, d){
                 var del_date = document.getElementById(d).value;
                 //sdel_date = del_date.toString();

                 del_date = del_date.replaceAll('-', '/');
                 alert(del_date);

                 window.location.assign("update_delivery.php?delivery=" + orderno + "-" + del_date);
                 
             }

             function deliver(orderno){
                //alert(orderno + " " + del_date);

                window.location.assign("update_delivery.php?deliver=" + orderno);
             }

             function getback(){
                 window.location.assign("tailorhomepage.php");
             }
             function logout(){
                window.location.assign('logoutprocess.php');
             }
         </script>
</head>
<div id="preloader">
        <div id="loading">
        <title>Tailor Homepage</title>  
        </div>
    </div>



<?php
    session_start();

    if(isset($_SESSION['id']) && !empty($_SESSION['id']) && isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['type']) && !empty($_SESSION['type'])){
        

         
            
          ?>
         <br />
         
          <?php

   

    ?>
<body style="background-color: orange">
    <span>
    <a href="tailorhomepage.php"> 
    <button class="btn"><span>Back</span></button></a>
</span>
    <hr>
    <a href="pending_order.php"> 
    <button class="btn"><span>Pending Order</span></button></a>
<div class="filter">
</div>


<table>
   <h1> Pending Orders</h1>
       
    </table>

    <hr>
    <a href="conform_order.php"> 
    <button class="btn"><span>Conform Order</span></button></a>

</div>
<table>
   <h1> Conform Order</h1>
       
    </table>
<hr>
    <a href="delevery_order.php"> 
    <button class="btn"><span>Delevery Order</span></button></a>

</div>
<table>
   <h1> Delever Order</h1>
       
    </table>



    <hr>
    <a href="return_order.php"> 
    <button class="btn"><span>return order</span></button></a>

</div>
<table>
   <h1> return order</h1>
       
    </table>


</div>


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
</body>