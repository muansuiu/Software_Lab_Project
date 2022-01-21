<header>
<title>Show Measurement</title>
 <meta charset="utf-8">
        <title>Update Dress</title>
        <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/update.css" type="text/css">


<script>
             function goback(){
                window.location.assign('tailorhomepage.php');
             }

             function search(x){
                window.location.assign('showmea.php?k='+x);

             }
         </script>
</header>

<body>
<?php
    session_start();

    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        ?>

        <?php
        if(isset($_GET['k']) && !empty($_GET['k'])){
            ?>
        
                <div class="searchBox">
            Search Customer by ID: <input type="search" id="searchbox"> 
            <button class="searchButton" onclick="search(document.getElementById('searchbox').value)">Search</button>
            <br/>
        </div>
         <h1> <span class="yellow"> Measurements</span></h1>
             <table class="container">
                
            
               
              
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Neck</th>
                            <th>Chest</th>
                            <th>Waist</th>
                            <th>Hips</th>
                            <th>Shoulder</th>
                            <th>Sleeve</th>
                            
                      
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            try{
                                ///php-mysql 3 way. We will use PDO - PHP data object
                                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $i = $_GET['k'];
                                $sqlquery="SELECT * FROM measurement WHERE c_userid='$i'";
                                
                                try{
                                    $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                    
                                    $productstable=$returnval->fetchAll();
                                    
                                    foreach($productstable as $row){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['c_userid'] ?></td>   
                                                <td><?php echo $row['height'] ?></td>   
                                                <td><?php echo $row['weight'] ?></td>   
                                                <td><?php echo $row['neck'] ?></td>
                                                <td><?php echo $row['chest'] ?></td>
                                                <td><?php echo $row['waist'] ?></td>
                                                <td><?php echo $row['hips'] ?></td>
                                                <td><?php echo $row['shoulder'] ?></td>
                                                <td><?php echo $row['sleeve'] ?></td>
                                               
                                            </tr>
                                        <?php
                                    }
                                }
                                catch(PDOException $ex){
                                    ?>
                                        <tr>
                                            <td colspan="9">Data read error ... ...</td>    
                                        </tr>
                                    <?php
                                }
                                
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="9">Data read error ... ...</td>    
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
    
            </div>

            <button onclick="goback()">Go Back</button>

    
            <?php
        }else{
            ?>
        
       
            Search Customer by ID: <input type="search" id="searchbox"> 
            <button onclick="search(document.getElementById('searchbox').value)">Search</button>
            <br/>
            <table>
            
               <h1> Measurements</h1>
              
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Neck</th>
                            <th>Chest</th>
                            <th>Waist</th>
                            <th>Hips</th>
                            <th>Shoulder</th>
                            <th>Sleeve</th>
                            
                      
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            try{
                                ///php-mysql 3 way. We will use PDO - PHP data object
                                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                
                                $sqlquery="SELECT * FROM measurement";
                                
                                try{
                                    $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                    
                                    $productstable=$returnval->fetchAll();
                                    
                                    foreach($productstable as $row){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['c_userid'] ?></td>   
                                                <td><?php echo $row['height'] ?></td>   
                                                <td><?php echo $row['weight'] ?></td>   
                                                <td><?php echo $row['neck'] ?></td>
                                                <td><?php echo $row['chest'] ?></td>
                                                <td><?php echo $row['waist'] ?></td>
                                                <td><?php echo $row['hips'] ?></td>
                                                <td><?php echo $row['shoulder'] ?></td>
                                                <td><?php echo $row['sleeve'] ?></td>
                                               
                                            </tr>
                                        <?php
                                    }
                                }
                                catch(PDOException $ex){
                                    ?>
                                        <tr>
                                            <td colspan="9">Data read error ... ...</td>    
                                        </tr>
                                    <?php
                                }
                                
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="9">Data read error ... ...</td>    
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
    
            </div>

            <button onclick="goback()">Go Back</button>

    
            <?php
        }
       

    }
        


?>

</body>

