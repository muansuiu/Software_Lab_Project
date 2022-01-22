
<?php

    // this condition checks if user is signed in or not
    if(isset($_POST['email']) && isset($_POST['upass']) 
       && !empty($_POST['email']) && !empty($_POST['upass'])){

        
        // here email, upass and typebox is stored in variables
        $var1=$_POST['email'];
        // here the passsword is encrypted using md5
        $var2=md5($_POST['upass']);
        $var3 = $_POST['typebox'];
        
        if($var3 == "Customer"){
            try{
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sqlquery="SELECT email FROM customer WHERE email='$var1' and pass='$var2'";
                
                try{
                    // this runs the query
                    $returnval=$dbcon->query($sqlquery);
                    // if it finds atleast one row with this email and password
                    if($returnval->rowCount()==1){
                        ///one valid user found
                        $find_id_q = "SELECT c_userid FROM customer WHERE email='$var1'";
                        try{
                            // again another query is run
                            $find_id = $dbcon->query($find_id_q);
                            // if atleast one row is found
                            if($find_id->rowCount()==1){
                                session_start();
                                // all rows are fetched
                                $ids = $find_id->fetchAll();
                                $id = "";
                                // foreach loop is used to get the c_userid and stored
                                foreach($ids as $f){
                                    $id = $f['c_userid'];
                                }

                                ?>
                                <script>
                                   // alert('<?php echo "$id" ?>');
                                </script>
                                <?php

                                // all the founded email and type and id are stored in the 
                                // session.
                                $_SESSION['email']=$var1;
                                $_SESSION['type']=$var3;
                                $_SESSION['id']=$id;
                               ?>
                               <script>
                                window.location.assign('homepage.php');
                               </script>
                            <?php
                            }else{
                                ?>
                            <script>
                            window.location.assign('signin.php');
                            </script>
                            <?php
                            }

                        }catch(PDOException $ex){
                            ?>
                            <script>
                            window.location.assign('signin.php');
                            </script>
                            <?php
                        }
                       
                        ?>
                        <?php
                    }
                    else{
                        ///invalid user
                        ?>
                            <script>
                                window.location.assign('signin.php');
                            </script>
                        <?php
                    }
                }
                catch(PDOException $ex){
                    ?>
                        <script>
                            window.location.assign('signin.php');
                        </script>
                    <?php
                }
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('signin.php');
                    </script>
                <?php
            }
        }
        
       

        // if type is tailor
        else{
            try{
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sqlquery="SELECT email FROM tailor WHERE email='$var1' and pass='$var2'";
                
                try{
                    // this runs the query
                    $returnval=$dbcon->query($sqlquery);
                    // if atleast one row is found
                    if($returnval->rowCount()==1){
                        ///one valid user found
                        $find_id_q = "SELECT t_userid FROM tailor WHERE email='$var1'";
                        try{
                            // runs another query
                            $find_id = $dbcon->query($find_id_q);
                            if($find_id->rowCount()==1){
                                session_start();
                        
                                // fetches all the rows
                                $ids = $find_id->fetchAll();
                                $id = "";
                                foreach($ids as $f){
                                    $id = $f['t_userid'];
                                }

                                ?>
                                <script>
                                   //alert('<?php echo "$id" ?>');
                                </script>
                                <?php

                                // all the founded email and type and id are stored in the 
                                // session.
                                $_SESSION['email']=$var1;
                                $_SESSION['type']=$var3;
                                $_SESSION['id']=$id;
                               ?>
                               <script>
                                window.location.assign('tailorhomepage.php');
                               </script>
                            <?php
                            }else{
                                ?>
                            <script>
                            window.location.assign('signin.php');
                            </script>
                            <?php
                            }

                        }catch(PDOException $ex){
                            ?>
                            <script>
                            window.location.assign('signin.php');
                            </script>
                            <?php
                        }
                       
                        ?>
                        <?php
                    }
                    else{
                        ///invalid user
                        ?>
                            <script>
                                window.location.assign('signin.php');
                            </script>
                        <?php
                    }
                }
                catch(PDOException $ex){
                    ?>
                        <script>
                            window.location.assign('signin.php');
                        </script>
                    <?php
                }
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('signin.php');
                    </script>
                <?php
            }
        
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
