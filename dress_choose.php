<head>
    <title>Dress Choose</title>
    <link rel = "stylesheet" href="css_files/dress_style.css">

</head>

<?php

session_start();

if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {

    if (isset($_GET['param1']) && !empty($_GET['param1'])) {
?>
        <table class="content">
            <h1> Select dress and enter quantity: </h1>
            <thead>
                <tr>
                    <th>Select </th>
                    <th>Design ID</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th>price</th>
                    <th>Required_Measurement</th>
                    <th>Product Code</th>
                    <th>Quantity</th>
                    <th>Material ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;", "root", "");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $searchval = $_GET['param1'];
                    $sqlquery = "";
                    if (!empty($searchval)) {
                        $sqlquery = "SELECT * from dress where productcode LIKE '%$searchval%' order by CAST(SUBSTRING(designid, 2, LENGTH(designid)) AS INT)";
                    }


                    try {
                        //session_start();
                        $returnval = $dbcon->query($sqlquery); ///PDOStatement

                        $productstable = $returnval->fetchAll();
                        $index = 0;
                        foreach ($productstable as $row) {
                            $did = $row['designid'];
                ?>

                            <tr>
                                <td>

                                    <input type="checkbox" id="checkDress<?php echo $index; ?>" name="checkDress" +<?php echo $index; ?> value="">
                                    <label for="checkDress" +<?php echo $index; ?>> Select Dress</label>
                                    <input type="hidden" id="hidden<?php echo $index; ?>" value="<?php echo $row['designid'] ?>">
                                </td>
                                <td><?php echo $row['designid'] ?></td>
                                <td><?php echo $row['details'] ?></td>
                                <td>
                                    <img width="150" height="150" alt="dress image" src="<?php echo $row['image'] ?>">
                                </td>
                                <td id="pricetag<?php echo $index ?>"><?php echo $row['price'] ?></td>
                                <td><?php echo $row['required_measurement'] ?></td>
                                <td><?php echo $row['productcode'] ?></td>
                                <td><label for="quantity">Quantity: </label>
                                    <input type="number" id="quantity<?php echo $index; ?>" name="quantity" min="1" max="5">

                                </td>

                                <td>

                                    <select id="materials<?php echo $index ?>">
                                        <?php




                                        try {

                                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;", "root", "");
                                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                            $query = "SELECT mateid, image, details FROM material where designid = '$did'";
                                            $returnval = $dbcon->query($query); ///PDOStatement

                                            $productstable = $returnval->fetchAll();
                                            $index1 = 0;

                                            foreach ($productstable as $row) {
                                        ?>

                                                <option><?php echo $row['mateid'] ?></option>







                                            <?php
                                                $index1++;
                                            }
                                        } catch (PDOException $ex) {
                                            ?>

                                            <script>
                                                alert("Error");
                                            </script>

                                        <?php
                                        }




                                        ?>
                                    </select> <br><br>
                                </td>




                            <?php
                            $index = $index + 1;
                        }


                            ?>


            </tbody>
        </table>

        <table class="content">

            <h1> Check your cloth material:</h1>
            <thead>
                <tr>
                    <th>Material ID</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th>Design ID</th>
                </tr>
            </thead>

            <tbody>
                <?php
                        try {
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;", "root", "");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sqlquery = "SELECT * from material order by CAST(SUBSTRING(mateid, 2, LENGTH(mateid)) AS INT)";

                            try {
                                $return = $dbcon->query($sqlquery); ///PDOStatement

                                $materialtable = $return->fetchAll();

                                foreach ($materialtable as $row) {
                ?>
                            <tr>
                                <td><?php echo $row['mateid'] ?></td>
                                <td><?php echo $row['details'] ?></td>
                                <td>
                                    <img width="100" height="100" alt="material image" src="<?php echo $row['image'] ?>">
                                </td>
                                <td><?php echo $row['designid'] ?></td>

                            <?php


                                }
                            ?>
                            </tr>
                        <?php
                            } catch (PDOException $ex) {
                        ?>
                            <tr>
                                <td colspan="5">Data read error ... ...</td>
                            </tr>
                        <?php
                            }
                        } catch (PDOException $ex) {
                        ?>
                        <tr>
                            <td colspan="5">Data read error ... ...</td>
                        </tr>
                    <?php
                        }
                    ?>
            </tbody>
        </table>
        <br />

        <h1>Price: <span id="total">0</span></h1>
        <div class="btn1">
            <button onclick="Calc(<?php echo $index ?>)" type="button" name="calc_btn">Calculate Price</button>
        </div>
        <div class="btn2">
            <button onclick="Order(<?php echo $index ?>)" type="button" name="order_btn">Order Right Away!</button>
        </div>
            
                     


        <script>
            function Calc(number) {
                var total = 0;
                for (var lp = 0; lp < number; lp++) {
                    var field = document.getElementById('checkDress' + lp);
                    if (field.checked) {
                        console.log(document.getElementById('quantity' + lp).value);

                        total += parseInt(document.getElementById('pricetag' + lp).textContent) * parseInt(document.getElementById('quantity' + lp).value);
                    }
                }
                document.getElementById('total').innerText = total + " Tk";

            }

            function Order(number) {
                var total = 0;
                var backendstring = "";
                for (var lp = 0; lp < number; lp++) {
                    var field = document.getElementById('checkDress' + lp);
                    var hiddenfield = document.getElementById('hidden' + lp);
                    var mat = document.getElementById('materials' + lp);
                    //alert(mat.value);
                    if (field.checked) {
                        backendstring += hiddenfield.value + "-" + document.getElementById('quantity' + lp).value + "-" + document.getElementById('materials' + lp).value + ",";
                    }
                }
                if (confirm('Confirm Order?')) {
                    window.location.assign("addorder_db.php?cart=" + backendstring);
                } else {
                    // Do nothing!
                    window.location.assign("homepage.php");
                }


            }
        </script>


    <?php
                    } catch (PDOException $ex) {
    ?>
        <tr>
            <td colspan="5">Data read error ... ...</td>
        </tr>
    <?php
                    }
                } catch (PDOException $ex) {
    ?>
    <tr>
        <td colspan="5">Data read error ... ...</td>
    </tr>
<?php
                }
?>




<?php
    } else {
?>
    <script>
        window.location.assign('homepage.php');
    </script>
<?php
    }
} else {
?>
<script>
    window.location.assign('signin.php');
</script>
<?php
}

?>