<?php

function checkIfDuplicateId($i){
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query="SELECT productcode FROM category"; 
        try{
            $d_rows = $dbcon->query($query);
            

            $d_ids=$d_rows->fetchAll();
                        
            $found = False;
            foreach($d_ids as $row){
               // echo $row['productcode'];
                if($i == (string)$row['productcode']){
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

            
        <?php
    }


}

function getRowIndex(){
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query="SELECT productcode FROM category"; 
        try{
            $d_rows = $dbcon->query($query);
            
            $r = $d_rows->rowCount() + 1;
            $id_ = "p".(string)$r;
            
            $dup_id = 0;
            $isDup = checkIfDuplicateId($id_);
            echo $isDup ? 'True' : 'False';

            while($isDup == True){
                if(!checkIfDuplicateId($id_)){
                
                    return $id_;
    
                }else{

                    $dup_index = $r + 1;
                    $id_ = "p".(string)$dup_index;
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







 if(!empty($_POST['productname']) && isset($_POST['productname']) &&
!empty($_POST['description']) && isset($_POST['description']) &&
!empty($_POST['gender']) && isset($_POST['gender'])){
    /// to establish a connection with database server
    
    
    $productname=$_POST['productname']; /// using encoded password
    $description = $_POST['description'];
    $gender = $_POST['gender'];
    $productcode = getRowIndex();
    
    
        try{
            ///php-mysql 3 way. We will use PDO - PHP data object
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="INSERT INTO category (productcode, productname, description, gender) VALUES('$productcode', '$productname', '$description', '$gender')";  /// insecure
            
            try{
                /// to insert data to corresponding database
                $dbcon->exec($query);
                
                
                /// if successful, forward the user to the login page
                ?>
                    
                    <script>
                    alert("Successfully added! :)");
                    window.location.assign('tailorhomepage.php')</script>
                <?php
            }
            catch(PDOException $ex){
                /// if not successful, return back to sign up page
                echo $productcode;
                echo $ex->getMessage();
                ?>

                   
                    <script>//window.location.assign('tailorhomepage.php')</script>
                <?php
            }
            
        }
        catch(PDOException $ex){
            echo $productcode;

            echo $ex->getMessage();
            ?>
                <script>//window.location.assign('tailorhomepage.php')</script>
            <?php
        }


    
}
else{
    ?>
    
       <script>window.location.assign('tailorhomepage.php')</script>

    <?php
    
}

?>