<?php

session_start();

if(isset($_SESSION['email']) && !empty($_SESSION['email']) &&
isset($_SESSION['order_id']) && !empty($_SESSION['order_id'])
){

    $order_no = $_SESSION['order_id'];

    
        
            try{
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                

                $query="DELETE FROM orders_dress WHERE ordersorderno='$order_no'";  /// insecure
                
                $query2 = "DELETE FROM orders WHERE orderno='$order_no'";

                $query3 = "DELETE FROM material_orders_dress WHERE orders_dressordersorderno='$order_no'";  /// insecure
                
                try{
                    /// to insert data to corresponding database
                    $dbcon->exec($query3);
                    
                    
                    /// if successful, forward the user to the login page
                    ?>

                    <?php
                }
                catch(PDOException $ex){
                    /// if not successful, return back to sign up page
                   // echo $ex->getMessage();
                    ?>
                    <script>
                        alert("<?php echo $ex->getMessage()?>");
                    </script>
                    
                        <script>window.location.assign('homepage.php')</script>
                    <?php
                }


                try{
                    /// to insert data to corresponding database
                    $dbcon->exec($query);
                    
                    
                    /// if successful, forward the user to the login page
                    ?>

                    <?php
                }
                catch(PDOException $ex){
                    /// if not successful, return back to sign up page
                   // echo $ex->getMessage();
                    ?>
                    <script>
                        alert("<?php echo $ex->getMessage()?>");
                    </script>
                    
                        <script>window.location.assign('homepage.php')</script>
                    <?php
                }

                

                try{
                    /// to insert data to corresponding database
                    $dbcon->exec($query2);
                    
                    
                    /// if successful, forward the user to the login page
                    ?>
                    <script>
                        alert("Order Canceled :(!");
                    </script>
                    <?php
                        /// delete the session variable
                        /// forward to sign in page

                        session_start();

                        unset($_SESSION['order_id']);
                        

                        echo "<script>window.location.assign('signin.php');</script>";
                    ?>
                        <script>window.location.assign('orderidel.php')
                        </script>
                    <?php
                }
                catch(PDOException $ex){
                    /// if not successful, return back to sign up page
                   // echo $ex->getMessage();
                    ?>
                    <script>
                        alert("<?php echo $ex->getMessage()?>");
                    </script>
                    
                        <script>window.location.assign('homepage.php')</script>
                    <?php
                }
                
            }
            catch(PDOException $ex){
                ?>
                    <script>
                   alert("<?php echo $ex->getMessage()?>");
                   </script>
                    <script>window.location.assign('homepage.php')</script>
                <?php
            }







}else{
    ?>
    <script>
   
</script>


    <script>
    //alert("adsdsassd");
  
    alert("error canceling order");
    </script>

    <?php
    echo "<script>window.location.assign('homepage.php');</script>";
}

?>