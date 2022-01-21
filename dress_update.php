<head>
<title>Dress Update</title>
</head>
<?php

if(isset($_GET['dressid']) && !empty($_GET['dressid'])){
    $id = $_GET['dressid'];

    ?>

<h1> Update Dress :- </h1>

<?php
 try{

    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query="SELECT * FROM dress WHERE designid='$id'";  /// insecure
    $returnval=$dbcon->query($query); ///PDOStatement
                
    $productstable=$returnval->fetchAll();
    

    foreach($productstable as $row){
        
        ?>
          <form action="dress_update2.php?did=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
           
           <label for="details" style="vertical-align: top;">Details:   </label>
           <textarea rows="5" cols="50" id="details" name="details"><?php echo $row['details'] ?></textarea><br><br>
           Image: <input type="file" name="pimage"><br><br>
           Price: <input type="number" name="price" value="<?php echo $row['price'] ?>"><br><br>
           Required_Meaurement <input type="text" name="required_measurement" value="<?php echo $row['required_measurement'] ?>"><br><br>
           Product Code: 
           


          

           <select name="productcode">
          <?php

          
               
               
               try{

                   $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                   $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
                   $query="SELECT productcode FROM category";  /// insecure
                   $returnval=$dbcon->query($query); ///PDOStatement
                               
                   $productstable=$returnval->fetchAll();
                   

                   foreach($productstable as $row2){
                       if($row['productcode'] == $row2['productcode']){
                        ?>
                        <option value="<?php echo $row2['productcode']?>" selected><?php echo $row2['productcode']?></option>  
                        <?php
                       }else{
                           ?>
                           <option><?php echo $row2['productcode']?></option>  

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

         
      