<!DOCTYPE html>

<meta charset="UTF-8">
<link rel="stylesheet" href="css_files/status_style.css">

<?php
session_start();
?>
<head>


<title>Order Status</title>

</head>

<body>
<header>

<a class="logo">Online Tailor Shop</a>
    <nav>
      <ul class="nav__links">
        <li><a href="homepage.php">Home</a></li>
        <li><a href="checkmeasurement.php">Place Order</a></li>
        <li><a href="status.php">Orders</a></li>
        <li><a href="rating.php">Rating</a></li>
        <li><a href="profile.php">Profile Details</a></li>
        <li><a href="return_policy.php">Return Order</a></li>

      </ul>
    </nav> 

</header>
<div class="pendingorders">

<table>
   <h1> Pending Orders</h1>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Details</th>
                <th>Transaction No</th>
                <th>Pay Date</th>
                <th>Total Price</th>
          
            </tr>
        </thead>
        
        <tbody>
            <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $id = $_SESSION['id'];
                    $sqlquery="SELECT orders.orderno as o, orders.c_userid as c_id, orders.orderdate as orderdate, orders.deliverydate as deliverydate, orders.status as status, orders.details as details, orders.rating as rating, payments.trans_no as trans_no, payments.paydate as paydate, payments.payamount as payamount FROM orders JOIN payments ON orders.orderno=payments.orderno WHERE status='Pending' AND orders.c_userid='$id'";
                    //echo $sqlquery;
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement
                        
                        $productstable=$returnval->fetchAll();

                        if($returnval->rowCount() == 0){
                            ?>

                            <tr>
                                <td colspan="8">Empty</td>    
                            </tr>

                            <?php
                        }else{
                           
                        }
                        
                        foreach($productstable as $row){
                            ?>
                                
                                <tr>
                                   
                                    <td><?php echo $row['o'] ?></td>   
                                    <td><?php echo $row['c_id'] ?></td>   
                                    <td><?php echo $row['orderdate'] ?></td>  
                                    <td><?php echo $row['status'] ?></td>  
                                    <td><?php echo $row['details'] ?></td>   
                                    <td><?php echo $row['trans_no'] ?></td>   
                                    <td><?php echo $row['paydate'] ?></td>
                                    <td><?php echo $row['payamount'] ?></td>
                                   
                                </tr>
                            <?php
                        }
                    }
                    catch(PDOException $ex){
                        ?>
                            <tr>
                                <td colspan="8"><?php echo $ex->getMessage() ?></td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                        <td colspan="8"><?php echo $ex->getMessage() ?></td>    
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table><br/>

</div>
<div class="conforders">
<table>
   <h1> Confirmed Orders</h1>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Details</th>
                <th>Delivery Date</th>
                <th>Transaction No</th>
                <th>Pay Date</th>
                <th>Total Price</th>
          
            </tr>
        </thead>
        
        <tbody>
            <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sqlquery="SELECT orders.orderno as o, orders.c_userid as c_id, orders.orderdate as orderdate, orders.deliverydate as deliverydate, orders.status as status, orders.details as details, orders.rating as rating, payments.trans_no as trans_no, payments.paydate as paydate, payments.payamount as payamount FROM orders JOIN payments ON orders.orderno=payments.orderno WHERE status='Confirmed' AND orders.c_userid='$id'";
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement

                        if($returnval->rowCount() == 0){
                            ?>

                            <tr>
                                <td colspan="9">Empty</td>    
                            </tr>

                            <?php
                        }else{
                           
                        }
                        
                        $productstable=$returnval->fetchAll();

                        
                        foreach($productstable as $row){
                            ?>
                               
                               <tr>
                                   
                                    
                               <tr>
                                   
                                   <td><?php echo $row['o'] ?></td>   
                                   <td><?php echo $row['c_id'] ?></td>   
                                   <td><?php echo $row['orderdate'] ?></td>  
                                   <td><?php echo $row['status'] ?></td>  
                                   <td><?php echo $row['details'] ?></td>  
                                   <td><?php echo $row['deliverydate'] ?></td>  
                                   <td><?php echo $row['trans_no'] ?></td>   
                                   <td><?php echo $row['paydate'] ?></td>
                                   <td><?php echo $row['payamount'] ?></td>
                                  
                               </tr>
                            <?php
                        }
                    }
                    catch(PDOException $ex){
                        ?>
                            <tr>
                                <td colspan="9">Data read error ... ...</td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                            <td colspan="9">Data read error ... ...</td>    
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table><br/>

</div>
<?php

$id = $_SESSION['id'];
?>
<div class="delorders">
<table>
   <h1> Delivered Orders</h1>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Details</th>
                <th>Rating</th>
                <th>Delivery Date</th>
                <th>Transaction No</th>
                <th>Pay Date</th>
                <th>Total Price</th>
                
          
            </tr>
        </thead>
        
        <tbody>
            <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sqlquery="SELECT orders.orderno as o, orders.c_userid as c_id, orders.orderdate as orderdate, orders.deliverydate as deliverydate, orders.status as status, orders.details as details, orders.rating as rating, payments.trans_no as trans_no, payments.paydate as paydate, payments.payamount as payamount FROM orders JOIN payments ON orders.orderno=payments.orderno WHERE status='Delivered' AND orders.c_userid='$id'";
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement

                        if($returnval->rowCount() == 0){
                            ?>

                            <tr>
                                <td colspan="10">Empty</td>    
                            </tr>

                            <?php
                        }else{
                           
                        }
                        
                        $productstable=$returnval->fetchAll();

                        
                        foreach($productstable as $row){
                            ?>
                                <tr>
                                   
                                    
                                    <td><?php echo $row['o'] ?></td>   
                                    <td><?php echo $row['c_id'] ?></td>   
                                    <td><?php echo $row['orderdate'] ?></td>  
                                    <td><?php echo $row['status'] ?></td>  
                                    <td><?php echo $row['details'] ?></td>  
                                    
                                    <?php
                                       if(empty($row['rating']) || !isset($row['rating'])){
                                           ?>
                                           <td>Not Rated! </th>
                                           <?php
                                       }else{
                                           ?>
                                           <td><?php echo $row['rating'] ?>/5</td>  
                                           <?php
                                       }
                                    ?>
                                    
                                    <td><?php echo $row['deliverydate'] ?></td>  

                                    
  
                                    <td><?php echo $row['trans_no'] ?></td>   
                                    <td><?php echo $row['paydate'] ?></td>
                                    <td><?php echo $row['payamount'] ?></td>
                                   
                                </tr>
                            <?php
                        }
                    }
                    catch(PDOException $ex){
                        ?>
                            <tr>
                                <td colspan="10"><?php echo $ex->getMessage()?></td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                            <td colspan="10"><?php echo $ex->getMessage()?></td>    
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table><br/>

    <table>
   <h1> Returned Orders</h1>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Details</th>
                <th>Rating</th>
                <th>Delivery Date</th>
                <th>Transaction No</th>
                <th>Pay Date</th>
                <th>Total Price</th>
                
                
          
            </tr>
        </thead>
        
        <tbody>
            <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sqlquery="SELECT orders.orderno as o, orders.c_userid as c_id, orders.orderdate as orderdate, orders.deliverydate as deliverydate, orders.status as status, orders.details as details, orders.rating as rating, payments.trans_no as trans_no, payments.paydate as paydate, payments.payamount as payamount FROM orders JOIN payments ON orders.orderno=payments.orderno WHERE status='Returned' AND orders.c_userid='$id'";
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement

                        if($returnval->rowCount() == 0){
                            ?>

                            <tr>
                                <td colspan="10">Empty</td>    
                            </tr>

                            <?php
                        }else{
                           
                        }
                        
                        $productstable=$returnval->fetchAll();

                        
                        foreach($productstable as $row){
                            ?>
                                <tr>
                                   
                                    
                                    <td><?php echo $row['o'] ?></td>   
                                    <td><?php echo $row['c_id'] ?></td>   
                                    <td><?php echo $row['orderdate'] ?></td>  
                                    <td><?php echo $row['status'] ?></td>  
                                    <td><?php echo $row['details'] ?></td>  
                                    
                                    <?php
                                       if(empty($row['rating']) || !isset($row['rating'])){
                                           ?>
                                           <td>Not Rated! </th>
                                           <?php
                                       }else{
                                           ?>
                                           <td><?php echo $row['rating'] ?>/5</td>  
                                           <?php
                                       }
                                    ?>
                                    
                                    <td><?php echo $row['deliverydate'] ?></td>  

                                    
  
                                    <td><?php echo $row['trans_no'] ?></td>   
                                    <td><?php echo $row['paydate'] ?></td>
                                    <td><?php echo $row['payamount'] ?></td>
                                   
                                </tr>
                            <?php
                        }
                    }
                    catch(PDOException $ex){
                        ?>
                            <tr>
                                <td colspan="10"><?php echo $ex->getMessage()?></td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                            <td colspan="10"><?php echo $ex->getMessage()?></td>    
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table><br/>



</div>

</body>

</html>