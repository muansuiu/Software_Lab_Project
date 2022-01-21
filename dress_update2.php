<head>
<title>Dress Update</title>
</head>


<?php
session_start();

if(!empty($_GET['did']) && isset($_GET['did']) && !empty($_POST['details']) && isset($_POST['details']) &&
!empty($_POST['price']) && isset($_POST['price']) && 
!empty($_POST['productcode']) && isset($_POST['productcode'])

){
    /// to establish a connection with database server

    ?>

    <?php
    $designid = $_GET['did'];

    echo $designid;
    $details = $_POST['details'];


    if(isset($_POST['upload'])){

        $file_name = $_FILES['pimage']['name'];
        $file_type = $_FILES['pimage']['type'];
        $file_size = $_FILES['pimage']['size'];
        $file_tem_loc = $_FILES['pimage']['tmp_name'];
        $file_store = "staticfiles/".$file_name;

        move_uploaded_file($file_tem_loc, $file_store);
    }
   

    $price = $_POST['price'];
    $required_measurement = $_POST['required_measurement'];
    $productcode=$_POST['productcode'];
    

    
    
        try{
            ///php-mysql 3 way. We will use PDO - PHP data object
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="UPDATE dress SET details='$details', image='$file_store', price='$price', required_measurement='$required_measurement', productcode='$productcode' WHERE designid='$designid'";  /// insecure
            
            try{
                /// to insert data to corresponding database
                $dbcon->exec($query);
               
                
                /// if successful, forward the user to the login page
                ?>
                    
                    <script>
                    alert("Successfully Updated Dress! :)");
                    window.location.assign('update_d_page.php')
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

                    <!-- <script>window.location.assign('tailorhomepage.php')</script>>
                <?php
            }
            
        }
        catch(PDOException $ex){
            ?>
            <!-- <script>window.location.assign('tailorhomepage.php')</script>>

            <?php

            ?>
                //<script>window.location.assign('tailorhomepage.php')</script>
            <?php
        }


    
}
else{
    ?>
       
       <script>
       alert("could not add to db");
       window.location.assign('tailorhomepage.php')</script>

    <?php
    
}

?>