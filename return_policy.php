<head>
<title>
Return
</title>
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

        button{
            background-color: darkblue;
            color: yellow;
            font-size: 20px;
        }
        button:hover{
            background-color: cyan;
            
            color: black;
            font-size: 20px;
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
<script>
  function rate(no, orderno){

      window.location.assign("runrate.php?rate=" + no + "-" + orderno);

  }
  function returnDelivery(orderno){
    window.location.assign("return_delivery.php?return_policy=" + orderno);
  }
  function goback(){
    window.location.assign('homepage.php');
  }
  

  
</script>

</head>

<?php 
session_start();
?>

<div class="pendingorders">

<table>
   <h1> Delivered Orders</h1>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Order Date</th>
                <th>Delivery Date</th>
                <th>Details</th>
                <th>Status</th>
                <th>Total Price</th>
                <th>Return?</th>
                
          
            </tr>
        </thead>
        
        <tbody>
            <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $id = $_SESSION['id'];
                    $sqlquery="SELECT * FROM orders WHERE status='Delivered' AND c_userid='$id' AND DATEDIFF(CURRENT_DATE, deliverydate) < 7 ";
                    //echo $sqlquery;
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement
                        
                        $productstable=$returnval->fetchAll();

                        if($returnval->rowCount() == 0){
                            ?>

                            <tr>
                                <td colspan="7">Empty</td>    
                            </tr>

                            <?php
                        }else{
                           
                        }
                        
                        foreach($productstable as $row){
                            ?>
                                <tr>
                                    <td><?php echo $row['orderno'] ?></td>   
                                    <td><?php echo $row['orderdate'] ?></td>
                                    <td><?php echo $row['deliverydate'] ?></td>
                                    <td><?php echo $row['details'] ?></td>
                                    <td><?php echo $row['status'] ?></td>   
                                    <td><?php echo $row['price'] ?></td>
                                   
                                    <td>
                                
                                        <button onclick="returnDelivery(<?php echo $row['orderno'] ?>)">Return this</button>
                                      

                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    catch(PDOException $ex){
                        ?>
                            <tr>
                                <td colspan="5"><?php echo $ex->getMessage() ?></td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                        <td colspan="5"><?php echo $ex->getMessage() ?></td>    
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
 <br/><br/>
    <button onclick="goback()">Go Back</button>

</div>

<?php

?>