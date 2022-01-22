<head>
<title>Manager Orders </title>
<meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/update.css" type="text/css">
    <script>
            

             function refund(orderno){
                //alert(orderno + " " + del_date);

                window.location.assign("refund.php?deliver=" + orderno);
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


    <h1> <span class="yellow"> Return Orders</span></h1>
    <table class="container">
   <h1> </h1>
        <thead>
            <tr>
                <th>Refund?</th>
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
                    
                    $sqlquery="SELECT orders.orderno as o, orders.c_userid as c_id, orders.orderdate as orderdate, orders.deliverydate as deliverydate, orders.status as status, orders.details as details, payments.trans_no as trans_no, payments.paydate as paydate, payments.payamount as payamount FROM orders JOIN payments ON orders.orderno=payments.orderno WHERE status='Returned' ";
                    //echo $sqlquery;
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement
                        
                        $productstable=$returnval->fetchAll();

                        if($returnval->rowCount() == 0){
                            ?>

                            <tr>
                                <td colspan="10">Empty</td>    
                            </tr>

                            <?php
                        }else{
                           
                        }
                        $index = 0;
                        foreach($productstable as $row){
                            
                            ?>
                           
                                <tr>
                                    <td><button onclick='refund(<?php echo $row['o'] ?>, <?php echo $row['o'] ?>)'>✓</button>
                                    
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
                            $index += 1;
                        }
                    }
                    catch(PDOException $ex){
                        ?>
                            <tr>
                                <td colspan="10"><?php echo $ex->getMessage() ?></td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                        <td colspan="10"><?php echo $ex->getMessage() ?></td>    
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