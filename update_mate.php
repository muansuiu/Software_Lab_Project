<?php

if(isset($_GET['mateid']) && !empty($_GET['mateid'])){
    $id = $_GET['mateid'];

    ?>

<h1> Update Material :- </h1>

<?php
 try{

    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query="SELECT * FROM material WHERE mateid='$id'";  /// insecure
    $return=$dbcon->query($query); ///PDOStatement
                
    $materialtable=$return->fetchAll();
    

    foreach($materialtable as $row){
        
        ?>
          <form action="update_mate2.php?mid=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
           
           <label for="details" style="vertical-align: top;">Details:   </label>
           <textarea rows="5" cols="50" id="details" name="details"><?php echo $row['details'] ?></textarea><br><br>
           Image: <input type="file" name="mimage"><br><br>
           Design ID: 
           
           <select name="designid">
          <?php

          
               
               
               try{

                   $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                   $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
                   $query="SELECT designid FROM dress";  /// insecure
                   $return=$dbcon->query($query); ///PDOStatement
                               
                   $materialtable=$return->fetchAll();
                   

                   foreach($materialtable as $row2){
                       if($row['designid'] == $row2['designid']){
                        ?>
                        <option value="<?php echo $row2['designid']?>" selected><?php echo $row2['designid']?></option>  
                        <?php
                       }else{
                           ?>
                           <option><?php echo $row2['designid']?></option>  

                           <?php
                       }
                       ?>
                       
                       
                       
                       

                       <?php
                   }

                   

               }
               catch(PDOException $ex){
                   ?>

                   <script>
                   alert("Error");
                   </script>

                   <?php
               }

              

              
          ?>
           </select> <br><br>
           <input type="submit" name="upload" value="Update">
       </form>
        
        
      
        <?php
    }

    

}
catch(PDOException $ex){
    ?>

    <script>
    alert("Error");
    </script>

    <?php
}

}
?>

         
      