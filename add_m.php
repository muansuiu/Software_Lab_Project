
<?php

function checkIfDuplicateId($id){
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query="SELECT mateid FROM material"; 
        try{
            $d_rows = $dbcon->query($query);
            

            $d_ids=$d_rows->fetchAll();
                        
            $found = False;
            foreach($d_ids as $row){
                if($id == $row['mateid']){
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
    
        $query="SELECT mateid FROM material"; 
        try{
            $d_rows = $dbcon->query($query);
            
            $r = $d_rows->rowCount() + 1;
            $id_ = "m".(string)$r;
            
            $dup_id = 0;
            $isDup = checkIfDuplicateId($id_);
            echo $isDup ? 'True' : 'False';

            while($isDup == True){
                if(!checkIfDuplicateId($id_)){
                
                    return $id_;
    
                }else{

                    $dup_index = $r + 1;
                    $id_ = "m".(string)$dup_index;
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
!empty($_POST['designid']) && isset($_POST['designid'])

){
    /// to establish a connection with database server

    ?>

    <?php
    $mateid = getRowIndex();
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
            
            $query="INSERT INTO material (mateid, details, image, designid) VALUES('$mateid', '$details', '$file_store', '$designid')";  /// insecure
            
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