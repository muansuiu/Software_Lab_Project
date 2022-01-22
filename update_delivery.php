<?php
 if(isset($_GET['deliver']) && !empty($_GET['deliver'])){

    ?>
    <?php

    $original_string = $_GET['deliver'];
    $p1 = explode('-', $original_string);
    $orderno = $p1[0];
    ?>

    <?php

    
    

    try{
        ///php-mysql 3 way. We will use PDO - PHP data object
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query="UPDATE orders SET status='Delivered' WHERE orderno='$orderno'";  /// insecure
        
        try{
            /// to insert data to corresponding database
            $dbcon->exec($query);
            //echo $query;
            
            /// if successful, forward the user to the login page
            ?>
                <script>window.location.assign('manage.php')</script>
            <?php
        }
        catch(PDOException $ex){
            /// if not successful, return back to sign up page
           // echo $ex->getMessage();
            ?>
            <script>
                alert("<?php echo $ex->getMessage()?>");
            </script>
            
                <script>window.location.assign('manage.php')</script>
            <?php
        }
        
    }
    catch(PDOException $ex){
        ?>
            <script>window.location.assign('manage.php')</script>
        <?php
    }


 }


 if(isset($_GET['delivery']) && !empty($_GET['delivery'])){

    ?>
    <?php

    $original_string = $_GET['delivery'];
    $p1 = explode('-', $original_string);
    $orderno = $p1[0];
    $date = $p1[1];
    ?>

    <?php
    

    try{
        ///php-mysql 3 way. We will use PDO - PHP data object
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query="UPDATE orders SET deliverydate=STR_TO_DATE('$date', '%Y/%m/%d'), status='Confirmed' WHERE orderno='$orderno'";  /// insecure
        
        try{
            /// to insert data to corresponding database
            $dbcon->exec($query);
            //echo $query;
            
            /// if successful, forward the user to the login page
            ?>
                <script>window.location.assign('manage.php')</script>
            <?php
        }
        catch(PDOException $ex){
            /// if not successful, return back to sign up page
           // echo $ex->getMessage();
            ?>
            <script>
                alert("<?php echo $ex->getMessage()?>");
            </script>
            
                <script>window.location.assign('manage.php')</script>
            <?php
        }
        
    }
    catch(PDOException $ex){
        ?>
            <script>window.location.assign('manage.php')</script>
        <?php
    }


 }

?>