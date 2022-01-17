
<?php
    /// received data collect

    // to receive the post data we need to call $_POST variable
    // $_POST represents an associative array

    if(!empty($_POST['fname']) && isset($_POST['fname']) &&
    !empty($_POST['lname']) && isset($_POST['lname']) &&
    !empty($_POST['email']) && isset($_POST['email']) &&
    !empty($_POST['phone']) && isset($_POST['phone']) &&
    !empty($_POST['address']) && isset($_POST['address']) &&
    !empty($_POST['city']) && isset($_POST['city']) &&
    !empty($_POST['district']) && isset($_POST['district']) &&
    !empty($_POST['postal']) && isset($_POST['postal']) &&
    isset($_POST['upass']) && !empty($_POST['upass']) ){
        /// to establish a connection with database server
        
        
        $pass=md5($_POST['upass']); /// using encoded password
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $postal = $_POST['postal'];

        // generate random id
        srand(time());
        $id = strtolower(trim($fname))."-".rand(0, 100);
        ?>
        <script>
            alert("<?php echo "Registration Successfull, Your ID: ",$id ?>");
        </script>
        <?php
        
            try{
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $query="INSERT INTO customer (c_userid, t_userid, pass, fname, lname, email, phone, address, city, district, postalcode) VALUES('$id', 'masud-79', '$pass', '$fname', '$lname', '$email', '$phone', '$address', '$city', '$district', '$postal')";  /// insecure
                
                try{
                    /// to insert data to corresponding database
                    $dbcon->exec($query);
                    echo $query;
                    
                    /// if successful, forward the user to the login page
                    ?>
                        <script>window.location.assign('signin.php')</script>
                    <?php
                }
                catch(PDOException $ex){
                    /// if not successful, return back to sign up page
                   // echo $ex->getMessage();
                    ?>
                    <script>
                        alert("<?php echo $ex->getMessage()?>");
                    </script>
                    
                        <script>window.location.assign('signup.php')</script>
                    <?php
                }
                
            }
            catch(PDOException $ex){
                ?>
                    <script>window.location.assign('signup.php')</script>
                <?php
            }
        
    }
    else{
        ?>
        
           <script>window.location.assign('signup.php')</script>
    
        <?php
        
    }
?>