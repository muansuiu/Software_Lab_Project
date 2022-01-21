<?php
session_start();


if(isset($_GET['cid']) && !empty($_GET['cid'])){
    $id = $_GET['cid'];

    try{
        ///php-mysql 3 way. We will use PDO - PHP data object
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query="DELETE FROM category WHERE productcode='$id'";  /// insecure
        
        try{
            /// to insert data to corresponding database
            $dbcon->exec($query);
           
            
            /// if successful, forward the user to the login page
            ?>
                
                <script>
                alert("Successfully Deleted Category! :)");
                window.location.assign('update_c_page.php')
                </script>
            <?php
        }
        catch(PDOException $ex){
            /// if not successful, return back to sign up page
            echo $ex->getMessage();
            ?>
        <script>alert('<?php echo $ex->getMessage()?>')</script>

        <?php
        ?>

                <script>window.location.assign('tailorhomepage.php')</script>
            <?php
        }
        
    }
    catch(PDOException $ex){
        ?>
        <script>alert('<?php echo $ex->getMessage()?>');</script>

        <?php

        ?>
            //<script>window.location.assign('tailorhomepage.php')</script>
        <?php
    }



}else{

}

?>