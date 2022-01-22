<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/profile_style.css">
    <title>Profile Details</title>

</head>


<body>

    <header>
        <a class="logo">Online Tailor Shop</a>
        <nav>
            <ul class="nav__links">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="checkmeasurement.php">Place Order</a></li>
                <li><a href="status.php">Orders</a></li>
                <li><a href="rating.php">Rating</a></li>


            </ul>
        </nav>
    </header>


    <?php

    try {
        session_start();

        ///php-mysql 3 way. We will use PDO - PHP data object
        $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;", "root", "");
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $c_e = $_SESSION['email'];
        $query = "SELECT * FROM customer WHERE email='$c_e'";


        try {
            /// to insert data to corresponding database
            $qex = $dbcon->query($query);

            $result = $qex->fetchAll();
            //print_r($result);

            foreach ($result as $r) {
    ?>

                <div class="container">
                    
                    <div class="right">
                    
                        <div class="content">
                            <h1>Your Profile Details:</h1>
                            <p>Customer ID: <?php echo $r['c_userid']; ?></p>
                            <p>Customer Name: <?php echo $r['fname'] . " " . $r['lname']; ?></p>
                            <p>Email: <?php echo $r['email']; ?></p>
                            <p>Phone: <?php echo $r['phone']; ?></p>
                            <p>Address: <?php echo $r['address']; ?></p>
                            <p>City: <?php echo $r['city']; ?></p>
                            <p>District: <?php echo $r['district']; ?></p>
                            <p>Postal Code: <?php echo $r['postalcode']; ?></p>
                            <p>Tailor Assigned ID: <?php echo $r['t_userid']; ?></p>
                        </div>
                    </div>


                </div>


                <h1>Measurement</h1>
                <table>

                    

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
                        try {
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;", "root", "");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $id =  $_SESSION['id'];
                            $sqlquery = "SELECT * FROM measurement WHERE c_userid='$id'";

                            try {
                                $returnval = $dbcon->query($sqlquery); ///PDOStatement

                                $productstable = $returnval->fetchAll();

                                foreach ($productstable as $row) {
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
                            } catch (PDOException $ex) {
                                ?>
                                <tr>
                                    <td colspan="9">Data read error ... ...</td>
                                </tr>
                            <?php
                            }
                        } catch (PDOException $ex) {
                            ?>
                            <tr>
                                <td colspan="9">Data read error ... ...</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>



            <?php

                /// if successful, forward the user to the login page
            }
            ?>


        <?php
        } catch (PDOException $ex) {
            /// if not successful, return back to sign up page
            echo $ex->getMessage();
        ?>

            <script>
                //window.location.assign('signup.php')
            </script>
        <?php
        }
    } catch (PDOException $ex) {
        ?>
        <script>
            //window.location.assign('signup.php')
        </script>
    <?php
    }


    ?>
</body>

</html>