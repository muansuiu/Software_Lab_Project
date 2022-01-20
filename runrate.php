<?php
 
 if(isset($_GET['rate']) && !empty($_GET['rate'])){

    ?>
    <script>
        alert("<?php echo $_GET['rate'] ?>");
    </script>
    <?php

    $original_string = $_GET['rate'];
    $p1 = explode('-', $original_string);
    $rating = $p1[0];
    $orderno = $p1[1];

    try{
        ///php-mysql 3 way. We will use PDO - PHP data object
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query="UPDATE orders SET rating='$rating' WHERE orderno='$orderno'";  /// insecure
        
        try{
            /// to insert data to corresponding database
            $dbcon->exec($query);
            //echo $query;
            
            /// if successful, forward the user to the login page
            ?>
                <script>window.location.assign('rating.php')</script>
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