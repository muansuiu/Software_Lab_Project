<head>
<title>Check Measurement</title>
</head>
<?php

session_start();
    if(!empty($_SESSION['id']) && isset($_SESSION['id'])){
        $id = $_SESSION['id'];

        try{
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM measurement WHERE c_userid = '$id'";  /// insecure


            $return=$dbcon->query($query); ///PDOStatement
                        
            if($return->rowCount() == 1){
                ?>
                   <script>
                     window.location.assign("order_category.php");
                   </script>
                <?php
                

            }else{
                ?>
                    <script>
                     window.location.assign("measurement_page.php");
                   </script>
                <?php
            }

        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
        
    }

?>