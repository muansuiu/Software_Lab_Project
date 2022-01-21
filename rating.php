<!DOCTYPE html>


<head>
    <title>
        Rating Page

    </title>
    <link rel="stylesheet" href="css_files/rating_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
          function rate(no, orderno){

            window.location.assign("runrate.php?rate=" + no + "-" + orderno);

}
    </script>

</head>

<body>
    <header>
        <a class="logo">Online Tailor Shop</a>
        <nav>
            <ul class="nav__links">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="status.php">Orders</a></li>
                <li><a href="profile.php">Profile Details</a></li>
                <li><a href="updatemea.php">Update Measurement</a></li>
                <li><a href="logoutprocess.php">Log Out</a></li>

            </ul>
        </nav>
    </header>

    <?php
    session_start();
    ?>



    <table>
        <h1> Delivered Orders</h1>
        <thead>
            <tr>
                <th>Order No</th>
                <th>Order Date</th>
                <th>Delivery Date</th>
                <th>Details</th>
                <th>Status</th>
                <th>Total Price</th>
                <th>Rating</th>


            </tr>
        </thead>

        <tbody>
            <?php
            try {
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;", "root", "");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $id = $_SESSION['id'];
                $sqlquery = "SELECT * FROM orders WHERE status='Delivered' AND c_userid='$id'";
                //echo $sqlquery;

                try {
                    $returnval = $dbcon->query($sqlquery); ///PDOStatement

                    $productstable = $returnval->fetchAll();

                    if ($returnval->rowCount() == 0) {
            ?>

                        <tr>
                            <td colspan="7">Empty</td>
                        </tr>

                    <?php
                    } else {
                    }

                    foreach ($productstable as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row['orderno'] ?></td>
                            <td><?php echo $row['orderdate'] ?></td>
                            <td><?php echo $row['deliverydate'] ?></td>
                            <td><?php echo $row['details'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td><?php echo $row['price'] ?></td>
                            <td width=200px>
                                <?php
                                if ($row['rating'] == 5) {
                                ?>
                                    <button onclick='rate(1, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(2, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(3, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(4, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(5, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                <?php
                                } else if ($row['rating'] == 4) {
                                ?>
                                    <button onclick='rate(1, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(2, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(3, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(4, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(5, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                <?php

                                } else if ($row['rating'] == 3) {
                                ?>
                                    <button onclick='rate(1, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(2, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(3, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(4, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <button onclick='rate(5, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                <?php

                                } else if ($row['rating'] == 2) {
                                ?>
                                    <button onclick='rate(1, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(2, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(3, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <button onclick='rate(4, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <button onclick='rate(5, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i'></button>
                                <?php

                                } else if ($row['rating'] == 1) {
                                ?>
                                    <button onclick='rate(1, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star"></i></button>
                                    <button onclick='rate(2, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <button onclick='rate(3, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <button onclick='rate(4, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <button onclick='rate(5, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                <?php

                                } else if ($row['rating'] == null) {
                                    ?>
                                    <button onclick='rate(1, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <button onclick='rate(2, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <button onclick='rate(3, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <button onclick='rate(4, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <button onclick='rate(5, <?php echo $row['orderno'] ?>)' class="btn"><i class="fa fa-star-o"></i></button>
                                    <?php
                                }
                                else{
                                    ?>
                                    <button onclick='rate(1, <?php echo $row['orderno'] ?>)'>*</button>
                                    <button onclick='rate(2, <?php echo $row['orderno'] ?>)'>&nbsp;</button>
                                    <button onclick='rate(3, <?php echo $row['orderno'] ?>)'>&nbsp;</button>
                                    <button onclick='rate(4, <?php echo $row['orderno'] ?>)'>&nbsp;</button>
                                    <button onclick='rate(5, <?php echo $row['orderno'] ?>)'>&nbsp;</button>
                                    <?php

                                }

                                ?>
                                    

                            </td>
                        </tr>
                    <?php
                    }
                } catch (PDOException $ex) {
                    ?>
                    <tr>
                        <td colspan="5"><?php echo $ex->getMessage() ?></td>
                    </tr>
                <?php
                }
            } catch (PDOException $ex) {
                ?>
                <tr>
                    <td colspan="5"><?php echo $ex->getMessage() ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <br /><br />

</body>

</html>