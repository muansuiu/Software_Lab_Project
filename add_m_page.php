
<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Add Dress</title>
        <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet"><link rel="stylesheet" href="assets/css/s.css">
        <link rel="stylesheet" href="assets/css/update.css" type="text/css">
    </head>
    
    <body>

     <section class='login' id='login'>
  <div class='head'>
    <h1 class='company'> Add Material :- </h1>
  </div> <div class='form'>

    
        <form action="add_m.php" method="POST" enctype="multipart/form-data">
           
            <label for="details" style="vertical-align: top;">Details:   </label>
            <textarea rows="5" cols="50" id="details" name="details"></textarea><br><br>
            Image: <input type="file" name="mimage"><br><br>
            Design ID: 
            


           

            <select name="designid">
           <?php

           
                
                
                try{

                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    $query="SELECT designid FROM dress";  /// insecure
                    $returnval=$dbcon->query($query); ///PDOStatement
                                
                    $productstable=$returnval->fetchAll();
                    

                    foreach($productstable as $row){
                        ?>
                        <option><?php echo $row['designid']?></option>  
                        
                        
                        <script>
                        alert($row['designid']);

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
    </section>
    <section style="color: black" id="team" class="">

       <h1> <span class="yellow">  Dress Table For Selecting:</span></h1>
    <table class="container">
           <h1> </h1>
                <thead>
                    <tr>
                        <th>Dress Code</th>
                        <th>Dress Detail</th>
                        <th>Dress Image</th>
                       
                  
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT * FROM dress";
                            
                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $productstable=$returnval->fetchAll();
                                
                                foreach($productstable as $row){
                                    ?>
                                        <tr>
                                        <td><?php echo $row['designid'] ?></td>   
                                        <td><?php echo $row['details'] ?></td>   
                                        <td>
                                                <img width="100" height="100" alt="dress image" src="<?php echo $row['image'] ?>">
                                        </td>
                                           
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
         <br/><br/>
             <a href="tailorhomepage.php" class="myButton">Back</a>
              <br/><br/>
        
        
        </section>

    </body>

    
</html>


