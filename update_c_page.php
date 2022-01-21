<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Update Dress</title>
        <link rel="stylesheet" href="assets/css/update.css" type="text/css">


        <script>
            function goback(){
                window.location.assign("tailorhomepage.php");
            }

            function delRec(cid){
                window.location.assign("delete_category.php?cid="+cid);
            }

            function uRec(cid){
                window.location.assign("category_update.php?cid="+cid);
            }
        </script>
    </head>
    
    <body>
        <h1> <span class="yellow"> Measurements</span></h1>
             <table class="container">
     
        

        
        
          
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Gender</th>
                        <th>Delete/Update</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT * from category order by CAST(SUBSTRING(productcode, 2, LENGTH(productcode)) AS INT)";
                            $index = 0;
                            try{
                                
                                $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $productstable=$returnval->fetchAll();
                                
                                foreach($productstable as $row){
                                    $c_id = $row['productcode'];
                                    ?>
                                        <tr>
                                            <td><?php echo $row['productcode'] ?></td>   
                                            <td><?php echo $row['productname'] ?></td>   
                                            <td><?php echo $row['description'] ?></td>   
                                            <td><?php echo $row['gender'] ?></td>
                                             
                                            <td><button onclick="delRec('<?php echo  $c_id ?>')" name="delBtn<?php echo $index; ?>">Delete</button>
                                                <button onclick="uRec('<?php echo $c_id ?>')" name="uBtn<?php echo $index; ?>">Update</button>
                                            </td>
                                           
                                        </tr>
                                    <?php
                                    $index += 1;
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="5">Data read error ... ...</td>    
                                    </tr>
                                <?php
                            }
                        }
                        catch(PDOException $ex){
                            ?>
                                <tr>
                                    <td colspan="5">Data read error ... ...</td>    
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
            <br/><br/>
            <button onclick="goback()">Go Back</button>
            <br/><br/>
        
        </div>

        
   


        
        

    </body>
</html>