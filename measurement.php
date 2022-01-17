
<?php
    /// received data collect

    // to receive the post data we need to call $_POST variable
    // $_POST represents an associative array
    session_start();
    if(!empty($_SESSION['id']) && isset($_SESSION['id']) &&
        !empty($_POST['height']) && isset($_POST['height']) &&
    !empty($_POST['weight']) && isset($_POST['weight']) &&
    !empty($_POST['neck']) && isset($_POST['neck']) &&
    !empty($_POST['chest']) && isset($_POST['chest']) &&
    !empty($_POST['waist']) && isset($_POST['waist']) &&
    !empty($_POST['hips']) && isset($_POST['hips']) &&
    !empty($_POST['shoulder']) && isset($_POST['shoulder']) &&
    !empty($_POST['sleeve']) && isset($_POST['sleeve']) ){
        /// to establish a connection with database server
        
        
        $height = $_POST['height']; /// using encoded password
        $weight = $_POST['weight'];
        $neck = $_POST['neck'];
        $chest = $_POST['chest'];
        $waist = $_POST['waist'];
        $hips = $_POST['hips'];
        $shoulder = $_POST['shoulder'];
        $sleeve = $_POST['sleeve'];

        
        $id = $_SESSION['id'];

        ?>
        <script>
            alert("<?php echo "Measurement Submission Successful!" ?>");
        </script>
        <?php
        
            try{
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $query="INSERT INTO measurement (c_userid, height, weight, neck, chest, waist, hips, shoulder, sleeve) VALUES('$id', '$height', '$weight', '$neck', '$chest', '$waist', '$hips', '$shoulder', '$sleeve')";  /// insecure
                
                try{
                    /// to insert data to corresponding database
                    $dbcon->exec($query);
                    echo $query;
                    
                    /// if successful, forward the user to the login page
                    ?>
                        <script>window.location.assign('order_category.php')</script>
                    <?php
                }
                catch(PDOException $ex){
                    /// if not successful, return back to sign up page
                   // echo $ex->getMessage();
                    ?>
                    <script>
                        alert("<?php echo $ex->getMessage()?>");
                    </script>
                    
                        <script>window.location.assign('measurement_page.php')</script>
                    <?php
                }
                
            }
            catch(PDOException $ex){
                ?>
                    <script>window.location.assign('measurement_page.php')</script>
                <?php
            }
        
    }
    else{
        ?>
        
           <script>window.location.assign('measurement_page.php')</script>
    
        <?php
        
    }
?>