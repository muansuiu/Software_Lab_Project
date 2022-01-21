<!DOCTYPE html>

<head>
  <title>Update Measurement</title>
  <link rel="stylesheet" href="css_files/measurement_style.css">
</head>
<header>
  <a class="logo">Online Tailor Shop</a>
  <nav>
    <ul class="nav__links">
      <li><a href="status.php">Orders</a></li>
      <li><a href="rating.php">Rating</a></li>
      <li><a href="profile.php">Profile Details</a></li>
      <li><a href="logoutprocess.php">Log Out</a></li>

    </ul>
  </nav>
</header>

<?php

try {
  session_start();
  $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;", "root", "");
  $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $id = $_SESSION['id'];

  $query = "SELECT * FROM measurement WHERE c_userid='$id'";  /// insecure
  $returnval = $dbcon->query($query); ///PDOStatement

  $productstable = $returnval->fetchAll();


  foreach ($productstable as $row) {

?>
    <div class="container">
      <div class="title">Update the measurement details</div>
      <div class="content">
        <form action="updatemea2.php" method="POST">
          <div class="user-details">
            <div class="input-box">
              Height: <input type="number" value="<?php echo $row['height']?>" name="height" placeholder="Enter height in inches"><br><br>
            </div>
            <div class="input-box">
              Weight: <input type="number" value="<?php echo $row['weight']?>" name="weight"><br><br>
            </div>
            <div class="input-box">
              Neck: <input type="number" name="neck" value="<?php echo $row['neck']?>"><br><br>
            </div>
            <div class="input-box">
              Chest: <input type="number" name="chest" value="<?php echo $row['chest']?>"><br><br>
            </div>
            <div class="input-box">
              Waist: <input type="number" name="waist"  value="<?php echo $row['waist']?>"><br><br>
            </div>
            <div class="input-box">
              Hips: <input type="number" name="hips"  value="<?php echo $row['hips']?>"><br><br>
            </div>
            <div class="input-box">
              Shoulder: <input type="number" name="shoulder"  value="<?php echo $row['shoulder']?>"><br><br>
            </div>
            <div class="input-box">
              Sleeve: <input type="number" name="sleeve" value="<?php echo $row['sleeve']?>"><br><br>
            </div>
          </div>

          <div class="button">
            <input type="submit" value="Submit Measurement">
          </div>
        </form>
      </div>



    <?php
  }
} catch (PDOException $ex) {
    ?>

    <script>
      alert("Error");
    </script>

  <?php
}
  ?>

  </html>