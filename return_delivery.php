<?php
 
 if(isset($_GET['return_policy']) && !empty($_GET['return_policy'])){

    ?>
    <script>
        alert("<?php echo $_GET['return_policy'] ?>");
    </script>
    <?php

    $original_string = $_GET['return_policy'];
    $p1 = explode('-', $original_string);
    $orderno = $p1[0];
   

    try{
        ///php-mysql 3 way. We will use PDO - PHP data object
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query="UPDATE orders SET status = 'Returned'  WHERE orderno='$orderno'";  /// insecure
        
        try{
            /// to insert data to corresponding database
            $dbcon->exec($query);
            //echo $query;
            
            /// if successful, forward the user to the login page
            ?>
                <script>window.location.assign('return_policy.php')</script>
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
            <script>window.location.assign('homepage.php')</script>
        <?php
    }


 }

?>