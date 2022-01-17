
<?php
    /// received data collect

    // to receive the post data we need to call $_POST variable
    // $_POST represents an associative array

    if(!empty($_POST['fname']) && isset($_POST['fname']) &&
    !empty($_POST['lname']) && isset($_POST['lname']) &&
    !empty($_POST['email']) && isset($_POST['email']) &&
    !empty($_POST['phone']) && isset($_POST['phone']) &&
    !empty($_POST['address']) && isset($_POST['address']) 
    && isset($_POST['upass']) && !empty($_POST['upass']) ){
        /// to establish a connection with database server
        
        $type= $_POST['typebox'];
        $pass=md5($_POST['upass']); /// using encoded password
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        srand(time());
        $id = "sayed";
        
       
            try{
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $query="INSERT INTO tailor (t_userid, pass, fname, lname, email, phone, address) VALUES('$id', '$pass', '$fname', '$lname', '$email', '$phone', '$address')";  /// insecure
                
                try{
                    /// to insert data to corresponding database
                    $dbcon->exec($query);
                    
                    
                    /// if successful, forward the user to the login page
                    ?>
                        <script>window.location.assign('signin.php')</script>
                    <?php
                }
                catch(PDOException $ex){
                    /// if not successful, return back to sign up page
                    
                    ?>
                     <script>
                        alert("<?php echo $ex->getMessage()?>");
                    </script>
                  
                      <script>window.location.assign('signup_t.php')</script>
                    <?php
                }
                
            }
            catch(PDOException $ex){
                ?>
                
                   <script>window.location.assign('signup_t.php')</script>
                <?php
            }
        
    }
    else{
        ?>
           <script>window.location.assign('signup_t.php')</script>
    
        <?php
        
    }
?>