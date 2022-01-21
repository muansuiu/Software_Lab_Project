


<?php
session_start();

if(!empty($_GET['mid']) && isset($_GET['mid']) && !empty($_POST['details']) && isset($_POST['details']) &&
!empty($_POST['designid']) && isset($_POST['designid'])

){
    /// to establish a connection with database server

    ?>

    <?php
    $mateid = $_GET['mid'];

    echo $mateid;
    $details = $_POST['details'];


    if(isset($_POST['upload'])){

        $file_name = $_FILES['mimage']['name'];
        $file_type = $_FILES['mimage']['type'];
        $file_size = $_FILES['mimage']['size'];
        $file_tem_loc = $_FILES['mimage']['tmp_name'];
        $file_store = "staticfiles/".$file_name;

        move_uploaded_file($file_tem_loc, $file_store);
    }
   

    $designid=$_POST['designid'];
    

    
    
        try{
            ///php-mysql 3 way. We will use PDO - PHP data object
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="UPDATE material SET details='$details', image='$file_store', designid='$designid' WHERE mateid='$mateid'";  /// insecure
            
            try{
                /// to insert data to corresponding database
                $dbcon->exec($query);
               
                
                /// if successful, forward the user to the login page
                ?>
                    
                    <script>
                    alert("Successfully Updated Material! :)");
                    window.location.assign('update_m_page.php')
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