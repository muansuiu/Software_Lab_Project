


<?php
session_start();

if(!empty($_GET['cid']) && isset($_GET['cid']) && !empty($_POST['productname']) && isset($_POST['productname']) &&
!empty($_POST['description']) && isset($_POST['description']) && 
!empty($_POST['gender']) && isset($_POST['gender'])

){
    /// to establish a connection with database server

    ?>

    <?php

    $productname=$_POST['productname']; /// using encoded password
    $description = $_POST['description'];
    $gender = $_POST['gender'];
    $id = $_GET['cid'];

    
    
        try{
            ///php-mysql 3 way. We will use PDO - PHP data object
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="UPDATE category SET productname='$productname', description='$description', gender='$gender' WHERE productcode='$id'";  /// insecure
            
            try{
                /// to insert data to corresponding database
                $dbcon->exec($query);
               
                
                /// if successful, forward the user to the login page
                ?>
                    
                    <script>
                    alert("Successfully Updated Categorys! :)");
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