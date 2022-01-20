<?php
function getPrice($id){
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $index = 0;
            try{
                $query="SELECT price FROM orders WHERE orderno='$id'"; 
                $returnval=$dbcon->query($query); ///PDOStatement
                        
                $fetched =$returnval->fetchAll();
                //print_r($fetched);

                foreach($fetched as $p){
                $details = $p['price'];
                return $details;
                }

                
            }catch(PDOException $ex){

            }

           


        
    
}catch(PDOException $ex){
        /// if not successful, return back to sign up page
        ?>
        <script>alert('<?php echo $ex->getMessage()?>');</script>

        <?php
    }
}

function getPayDate($id){
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $index = 0;
            try{
                $query="SELECT orderdate FROM orders WHERE orderno='$id'"; 
                $returnval=$dbcon->query($query); ///PDOStatement
                        
                $fetched =$returnval->fetchAll();
                //print_r($fetched);

                foreach($fetched as $p){
                $details = $p['orderdate'];
                return $details;
                }

                
            }catch(PDOException $ex){

            }

           


        
    
}catch(PDOException $ex){
        /// if not successful, return back to sign up page
        ?>
        <script>alert('<?php echo $ex->getMessage()?>');</script>

        <?php
    }
}

?>

<?php

session_start();

if(isset($_POST['trans_txt']) && !empty($_POST['trans_txt']) &&
isset($_SESSION['email']) && !empty($_SESSION['email'])){

    $t_no = $_POST['trans_txt'];
    $order_no = $_SESSION['order_id'];

    
        
            try{
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $price = getPrice($order_no);
                $date =  date('Y-m-d', strtotime(getPayDate($order_no))); 

                $query="INSERT INTO payments (orderno, trans_no, paydate, payamount) VALUES('$order_no', '$t_no', 
                      '$date', '$price')";  /// insecure
                
                try{
                    /// to insert data to corresponding database
                    $dbcon->exec($query);
                    //echo $query;
                    
                    /// if successful, forward the user to the login page
                    ?>
                    <script>
                        alert("Order placed! :)");
                    </script>
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
                    
                    <?php
                    /// delete the session variable
                    /// forward to sign in page

                    session_start();

       
                    unset($_SESSION['order_id']);
                    

                    ?>
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
   alert("<?php echo $_POST['trans_txt'] ?>");
   alert("<?php echo $_SESSION['email'] ?>");
    alert("unassigned field");
    </script>

    <?php
    echo "<script>window.location.assign('homepage.php');</script>";
}

?>