<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Choose</title>
    <link rel="stylesheet" href="css_files/order_category_style.css">


    <script>

    function ChooseCat(c){

        window.location.assign("dress_choose.php?param1="+c);

    }
    </script>
</head>

<header>
<a class="logo">Online Tailor Shop</a>
        <nav>
            <ul class="nav__links">   
                <li><a href="status.php">Orders</a></li>
                <li><a href="rating.php">Rating</a></li>
                <li><a href="profile.php">Profile Details</a></li>
                <li><a href="updatemea.php">Update Measurement</a></li>
                <li><a href="logoutprocess.php">Log Out</a></li>

            </ul>
        </nav>
    </header>
</header>
<body>
    <section>

  
    <h1> Select Category </h1>


    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT productcode, productname, description, gender FROM category";
                            
                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $productstable=$returnval->fetchAll();
                                ?>

                        

                                <?php
                                $ind = 0;
                                $pcode = "";



                                foreach($productstable as $row){
                                   
                                    $pcode = $row['productcode'];
                                    ?>
                                    <div class = "container">
                                        <div class="card">
                                        
                                        <!-- <div class="category" onclick=""> -->
                                            <p>Product Code: <?php echo $pcode ?></p> <br>
                                            <p> Product Name: <?php echo $row['productname'] ?></p> <br>
                                            <p> Desciption: <?php echo $row['description'] ?></p> <br>
                                            <p>Gender: <?php echo $row['gender'] ?></p><br>
                                        
                                            <div class="btn">
                                                <button onclick="ChooseCat('<?php echo $pcode;?>')">Select</button>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    
                                    
                                    

                                        
                                        
                                                    <?php
                                                     $ind = $ind + 1;
                                                }
                                            ?>

                                        
                                    
                                    <?php
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

    </section>
</body>
</html>