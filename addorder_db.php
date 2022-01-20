
<html>
    <head>
        <title>Confirm Order</title>
        <link rel="stylesheet" href="css_files/dress_style.css">
    </head>



<?php

function checkIfDuplicateId($id){
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query="SELECT orderno FROM orders"; 
        try{
            $d_rows = $dbcon->query($query);
            

            $d_ids=$d_rows->fetchAll();
                        
            $found = False;
            foreach($d_ids as $row){
                if($id == $row['orderno']){
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
    
        $query="SELECT orderno FROM orders"; 
        try{
            $d_rows = $dbcon->query($query);
            
            $r = $d_rows->rowCount() + 1;
            $id_ = $r;
            
            $dup_id = 0;
            $isDup = checkIfDuplicateId($id_);
           // echo $isDup ? 'True' : 'False';

            while($isDup == True){
                if(!checkIfDuplicateId($id_)){
                
                    return $id_;
    
                }else{

                    $dup_index = $r + 1;
                    $id_ = $dup_index;
                    //echo $id_;
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

function getDressDetails($id){
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $index = 0;
            try{
                $query="SELECT details FROM dress WHERE designid='$id'"; 
                $returnval=$dbcon->query($query); ///PDOStatement
                        
                $fetched =$returnval->fetchAll();
                //print_r($fetched);

                foreach($fetched as $p){
                $details = $p['details'];
                return $details;
                }

                
            }catch(PDOException $ex){

            }

           


        
    
}catch(PDOException $ex){
        /// if not successful, return back to sign up page
        ?>
        <script>alert('<?php echo $ex->getMessage()?>');</script>

        <?php
    }
}

function getDressImage($id){
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $index = 0;
            try{
                $query="SELECT image FROM dress WHERE designid='$id'"; 
                $returnval=$dbcon->query($query); ///PDOStatement
                        
                $fetched =$returnval->fetchAll();
                //print_r($fetched);

                foreach($fetched as $p){
                $details = $p['image'];
                return $details;
                }

                
            }catch(PDOException $ex){

            }

           


        
    
}catch(PDOException $ex){
        /// if not successful, return back to sign up page
        ?>
        <script>alert('<?php echo $ex->getMessage()?>');</script>

        <?php
    }
}


function getTotalPrice($order_no){
   
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       

            try{
                $query="SELECT orderno, price FROM orders WHERE orderno='$order_no'"; 
                $returnval=$dbcon->query($query); ///PDOStatement
                        
                $fetched =$returnval->fetchAll();
                //print_r($fetched);

                foreach($fetched as $p){
                $price = $p['price'];
                return $price;
                }

                
            }catch(PDOException $ex){

            }

         



        
     
          
        

      
    
    
}catch(PDOException $ex){
        /// if not successful, return back to sign up page
        ?>
        <script>alert('<?php echo $ex->getMessage()?>');</script>

        <?php
    }
}

function getTotalPrice2($ids, $q){
    $total_price = 0.0;
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $index = 0;

        foreach($ids as $i){
            try{
                $query="SELECT designid, price FROM dress WHERE designid='$i'"; 
                $returnval=$dbcon->query($query); ///PDOStatement
                        
                $fetched =$returnval->fetchAll();
                //print_r($fetched);

                foreach($fetched as $p){
                $price = $p['price'];
                $total_price += (double)$price * $q[$index];
                }

                
            }catch(PDOException $ex){

            }

            $index += 1;



        }
     
          
        

        return $total_price;
    
    
}catch(PDOException $ex){
        /// if not successful, return back to sign up page
        ?>
        <script>alert('<?php echo $ex->getMessage()?>');</script>

        <?php
    }
}


function getSinglePrice($id){
    $total_price = 0.0;
    try{
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $index = 0;
       
            try{
                $query="SELECT designid, price FROM dress WHERE designid='$id'"; 
                $returnval=$dbcon->query($query); ///PDOStatement
                        
                $fetched =$returnval->fetchAll();
                //print_r($fetched);

                foreach($fetched as $p){
                $price = $p['price'];
                return $price;
                }

                
            }catch(PDOException $ex){

            }

            $index += 1;


        

      
    
    
}catch(PDOException $ex){
        /// if not successful, return back to sign up page
        ?>
        <script>alert('<?php echo $ex->getMessage()?>');</script>

        <?php
    }
}

    session_start();

    if(isset($_SESSION['id']) && !empty($_SESSION['id']) && 
    isset($_SESSION['email']) && !empty($_SESSION['email'])){

        if(isset($_GET['cart']) && !empty($_GET['cart'])){
        ?> 
 
                    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            
                            $searchval=$_GET['cart'];
                            $design_quant = [];
                            $sqlquery="";
                            $ids = array();
                            $q = array();
                            $mat = array();

                            if(!empty($searchval)){
                                if(strpos($searchval, ',') && strpos($searchval, '-')){
                                    $design_quant = array_filter(explode(',', $searchval));

                                     
                               // print_r($design_quant);

                                $index = 0;
                                $details_str = "";
                            
                                foreach($design_quant as $key => $value){
                                    //echo $value;
                                    $y = explode('-', $value);
                                    //print_r(array_values($y));

                                 
                                    $ids[$index] = $y[0];
                                    $details_str = $details_str."Dress Design ID: ".$y[0].", Quantity: ";

                                    $q[$index] = $y[1];
                                    
                                    $details_str = $details_str.$y[1].", Material ID: ";


                                    $mat[$index] = $y[2];
                                    $details_str = $details_str.$y[2]."<br/>";
                                    //array_push($ids, $y[0]);
                                    //array_push($q,  $y[1]);
                                    $index = $index + 1;

                                }

                              // print_r($ids);
                               //print_r($q);
                                }else{
                                    $design_quant = array_filter(explode('-', $searchval));;
                                    $ids[0] =$design_quant[0];
                                    $q[0] =  $design_quant[1];
                                    $mat[0] = $design_quant[2];

                                }
                               

                               $c_id = $_SESSION['id'];
                               $or_id = 0;

                               if(isset($_SESSION['order_id']) && !empty($_SESSION['order_id'])){
                                $or_id = $_SESSION['order_id'];
                               }

                               else{
                                $or_id = getRowIndex();

                               }
                                

                                $_SESSION['order_id'] = $or_id; 

                                
                                    $price = getTotalPrice2($ids, $q);


                                    $date = date('Y-m-d');
    
                                    $sqlquery="INSERT INTO orders(orderno, c_userid, orderdate, status, price, details) VALUES('$or_id', '$c_id', '$date', 'Pending', '$price', '$details_str')";
                                   try{
                                       $dbcon->exec($sqlquery);
                                   }catch(PDOException $ex){

                                   }
                                    $index = 0;

                                    $sql_order = "SELECT orderno FROM orders";
                                    try{
                                     
                                     
                                       
                                       
                                        $o = $_SESSION['order_id'];
                                        foreach($ids as $i){

                                            $sql2 = "INSERT INTO orders_dress(ordersorderno, dressdesignid, quantity) VALUES('$o', '$ids[$index]', '$q[$index]')";
                                            //echo $sql2;
                                            $dbcon->exec($sql2);
                                            $index += 1;

                                        }
                                       
                                       
                                    }catch(PDOException $ex){

                                    }

                                    try{
                                     
                                     
                                       
                                        $index = 0;
                                        $o = $_SESSION['order_id'];
                                        foreach($mat as $i){

                                            $sql2 = "INSERT INTO material_orders_dress(materialmateid, orders_dressordersorderno, orders_dressdressdesignid) VALUES('$mat[$index]', '$o', '$ids[$index]')";
                                            //echo $sql2;
                                            $dbcon->exec($sql2);
                                            $index += 1;

                                        }
                                       
                                       
                                    }catch(PDOException $ex){
                                        echo $ex->getMessage();

                                    }

                                    
                                    

                                   
                               

                                

                              



                                ?>


<table class="content">
   <h1> Ordered Table: </h1>
        <thead>
            <tr>
                <th>Order No.</th>
                <th>Dress Details</th>
                <th>Image</th>
                <th>Single Price</th>
                <th>Quantity</th>
                
            </tr>
        </thead>
        
        
            <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $c_order_id = $_SESSION['order_id'];
                    $sqlquery="SELECT * FROM orders WHERE orderno='$c_order_id'";
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement
                        
                        $productstable=$returnval->fetchAll();
                        ?>
                       
                        
                        <?php
                        foreach($productstable as $row){
                            ?>
                               <tr>
                                    <td><?php echo $row['orderno'] ?></td> 
                               
                                  
                                    <td style="vertical-align:top">
                                    <?php
                                    
                                       foreach($ids as $i){
                                           ?>
                                       
                                            
                                       <div>
                                       <p style="vertical-align: top;">
                                           <?php echo getDressDetails($i) ?><br/><br/><br/><br/><br/><br/>
                                        </p>
                                           </div>
                                          
                                           
                                           <?php
                                       }
                                       
                                    ?>
                                   </td>  
                               

                                    

                        

                        

                                   <td style="vertical-align:top">
                                    <?php
                                    
                                       foreach($ids as $i){
                                           ?>
                                        
                                        <div>
                                           <img style="vertical-align: top;" width="100" height="100" alt="dress image" src="<?php echo getDressImage($i) ?>">
                                          </div>
                    
                                           
                                         
                                           
                                           <?php
                                       }
                                       
                                    ?>
                                    </td>

                                    <td style="vertical-align:top">
                                    <?php
                                    
                                       foreach($ids as $i){
                                           ?>
                                        
                                        <div>
                                            <p style="vertical-align: top;">
                                                <?php echo getSinglePrice($i) ?><br/><br/><br/><br/><br/><br/>
                                            </p>
                                          </div>
                    
                                           
                                         
                                           
                                           <?php
                                       }
                                       
                                    ?>
                                    </td>


                                    <td style="vertical-align:top">
                                    <?php
                                    
                                       foreach($q as $i){
                                           ?>
                                        
                                        <div>
                                            <p style="vertical-align: top;">
                                                <?php echo $i ?><br/><br/><br/><br/><br/><br/>
                                            </p>
                                          </div>
                    
                                           
                                         
                                           
                                           <?php
                                       }
                                       
                                    ?>
                                    </td>


                            
                            </tr>
                                 
                         
                                    
                                    
                                    
                                   
                                   


                                   
                          
                                     <?php  
                                           
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
       
    </table>

    <h1>Total Price: <?php echo getTotalPrice($or_id) ?> Taka </h1>
    <div class="transaction">
    <form action="addpay.php" method="POST">
        
    Transaction ID: <input type="text" name="trans_txt" id="trans_txt"> <br/><br/>
        <div class="btn_submit">
         <input type="submit" value="Confirm Order"><br/></br>
         </div>    
        </form>
    </div>    
     
        <button onclick="window.location.assign('cancelorder.php')" name="cancelBtn">Cancel Order</button>
  
    

                                <?php
                           
                           
                            }else{

                            }
                            
                            
                          

        
                        }catch(PDOException $ex){

                        }
                    }else{
            ?>
                <script>
                    window.location.assign('homepage.php');
                </script>
            <?php
        }
    
    }
    else{
        ?>
            <script>
                window.location.assign('signin.php');
            </script>
        <?php
    }

?>
</html>