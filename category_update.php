<?php

if(isset($_GET['cid']) && !empty($_GET['cid'])){
    $id = $_GET['cid'];

    ?>

<h1> Update Category :- </h1>

<?php
 try{

    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query="SELECT * FROM category WHERE productcode='$id'";  /// insecure
    $returnval=$dbcon->query($query); ///PDOStatement
                
    $productstable=$returnval->fetchAll();
    

    foreach($productstable as $row){
        
        ?>
          <form action="category_update2.php?cid=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
           
          Product Name:  <input type="text" name="productname" value="<?php echo $row['productname'] ?>"><br><br>
            Gender:  <select name="gender">
                <?php

                  if($row['gender'] == "Male"){
                      ?>
                      <option value="Male" selected>Male</option>
                      <option value="Female">Female</option>
                      <?php
                  }else{
                    ?>
                     <option value="Female" selected>Female</option>
                     <option value="Male">Male</option>

                    <?php
                  }
                ?>
                     
                      </select>
            
            
            <br><br>
            <label for="description" style="vertical-align: top;">Description:   </label>
            <textarea rows="5" cols="50" id="description" name="description"><?php echo $row['description'] ?></textarea><br><br>


          

          
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

         
      