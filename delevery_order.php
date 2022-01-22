<head>
<title>Manager Orders </title>
<meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/update.css" type="text/css">
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


<?php
    session_start();

    if(isset($_SESSION['id']) && !empty($_SESSION['id']) && isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['type']) && !empty($_SESSION['type'])){
        

         
            
          ?>
         <br />
         
          <?php

   

    ?>
    <br/>
        <a href="manage.php" class="myButton">Back</a>

    <h1> <span class="yellow"> Delivered Orders</span></h1>
    <table class="container">
   <h1> </h1>
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
                    
                    $sqlquery="SELECT orders.orderno as o, orders.c_userid as c_id, orders.orderdate as orderdate, orders.deliverydate as deliverydate, orders.status as status, orders.details as details, orders.rating as rating, payments.trans_no as trans_no, payments.paydate as paydate, payments.payamount as payamount FROM orders JOIN payments ON orders.orderno=payments.orderno WHERE status='Delivered'";
                    
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
                                           <td>Not Rated! :( </th>
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
                                <td colspan="10">Data read error ... ...</td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                            <td colspan="10">Data read error ... ...</td>    
                        </tr>
                    <?php
                }
            ?>
        </tbody>
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