


<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Add Dress</title>
        <style>
        body{
            background-color: white;
            color: black;
        }

        table, th, td{
            border: 1px solid lightblue;
            border-collapse: collapse;
            text-align: center;
            
        }
        tr{
            color: black;
        }
        tr:hover{
            background-color: #9AC1EF;
        }

        /* Add a black background color to the top navigation */
        .righttable1 {
        
        color: black;
        text-align: center;
        text-decoration: none;
        font-size: 25px;
        
        
        }

        a{
            font-size: 24px;
            color:black;
        }
        a:hover{
            color:red;
        }
        .options{
            background-color: gray;
        }
        h1{
            text-align:left;
            color: black;
        }
        </style>
    </head>
    
    <body>

     <div class="righttable1">

        <table>
           <h1> Category Table For Selecting: </h1>
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Gender</th>
                       
                  
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT * FROM category";
                            
                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $productstable=$returnval->fetchAll();
                                
                                foreach($productstable as $row){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['productcode'] ?></td>   
                                            <td><?php echo $row['productname'] ?></td>   
                                            <td><?php echo $row['description'] ?></td> 
                                            <td><?php echo $row['gender'] ?></td> 
                                           
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
            <br/>

        </div>

    <h1> Add A Dress :- </h1>
        <form action="add_d.php" method="POST" enctype="multipart/form-data">
           
            <label for="details" style="vertical-align: top;">Details:   </label>
            <textarea rows="5" cols="50" id="details" name="details"></textarea><br><br>
            Image: <input type="file" name="pimage"><br><br>
            Price: <input type="number" name="price"><br><br>
            Required_Meaurement <input type="text" name="required_measurement"><br><br>
            Product Code: 
            


           

            <select name="productcode">
           <?php

           
                
                
                try{

                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    $query="SELECT productcode FROM category";  /// insecure
                    $returnval=$dbcon->query($query); ///PDOStatement
                                
                    $productstable=$returnval->fetchAll();
                    

                    foreach($productstable as $row){
                        ?>
                        <option><?php echo $row['productcode']?></option>  
                        
                        
                        <script>
                        alert($row['productcode']);

                        </script>

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
            <input type="submit" name="upload" value="Add">
        </form>
    </body>
</html>


