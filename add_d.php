
<?php

function checkIfDuplicateId($id){
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query="SELECT designid FROM dress"; 
        try{
            $d_rows = $dbcon->query($query);
            

            $d_ids=$d_rows->fetchAll();
                        
            $found = False;
            foreach($d_ids as $row){
                if($id == $row['designid']){
                    $found = True;
                }

                ?>
                    
                        
                        <?php
                            
                               
                  }
                  return $found;
                        ?>
                    </tr>
                <?php
            }
            catch(PDOException $ex){

    }
}
    
catch(PDOException $ex){
        /// if not successful, return back to sign up page
        ?>
            <script>alert('<?php echo $ex->getMessage()?>');</script>

            <?php
    }


}

function getRowIndex(){
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query="SELECT designid FROM dress"; 
        try{
            $d_rows = $dbcon->query($query);
            
            $r = $d_rows->rowCount() + 1;
            $id_ = "d".(string)$r;
            
            $dup_id = 0;
            $isDup = checkIfDuplicateId($id_);
            echo $isDup ? 'True' : 'False';

            while($isDup == True){
                if(!checkIfDuplicateId($id_)){
                
                    return $id_;
    
                }else{

                    $dup_index = $r + 1;
                    $id_ = "d".(string)$dup_index;
                    echo $id_;
                    $isDup = checkIfDuplicateId($id_);
                    continue;
                    ?>
                    <?php
                    
                    
                }
            }
            return $id_;
        }catch(PDOException $ex){
            ?>
            <script>alert('<?php echo $ex->getMessage()?>');</script>

            <?php

    }
    
}catch(PDOException $ex){
        /// if not successful, return back to sign up page
        ?>
        <script>alert('<?php echo $ex->getMessage()?>');</script>

        <?php
    }
}

?>

<?php
if(!empty($_POST['details']) && isset($_POST['details']) &&
!empty($_POST['price']) && isset($_POST['price']) && 
!empty($_POST['productcode']) && isset($_POST['productcode'])

){
    /// to establish a connection with database server

    ?>

    <?php
    $designid = getRowIndex();
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
            
            $query="INSERT INTO dress (designid, details, image, price, required_measurement, productcode) VALUES('$designid', '$details', '$file_store', '$price', '$required_measurement', '$productcode')";  /// insecure
            
            try{
                /// to insert data to corresponding database
                $dbcon->exec($query);
               
                
                /// if successful, forward the user to the login page
                ?>
                    
                    <script>
                    alert("Successfully added! :)");
                    window.location.assign('tailorhomepage.php')
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


    
}
else{
    ?>
       
       <script>
       alert("could not add to db");
       window.location.assign('tailorhomepage.php')</script>

    <?php
    
}

?>