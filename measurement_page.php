<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Measurement</title>
        <link rel="stylesheet" href="css_files/measurement_style.css">
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
                    <li><a href="profile.php">Profile Details</a></li>

                </ul>
            </nav>
        </header>




<div class="container">
    <div class="title">Fill in the measurement details</div>
        <div class="content">
            <form action="measurement.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            Height: <input type="number" name="height" placeholder="Enter height in inches" required><br><br>
          </div>
          <div class="input-box">
            Weight: <input type="number" name="weight" placeholder="Enter weight in kg" required><br><br>
          </div>
          <div class="input-box">
          Neck: <input type="number" name="neck" placeholder="Enter neck size in inches" required><br><br>
          </div>
          <div class="input-box">
          Chest: <input type="number" name="chest" placeholder="Enter chest size in inches" required><br><br>
          </div>
          <div class="input-box">
          Waist: <input type="number" name="waist" placeholder="Enter waist size in inches" required><br><br>
          </div>
          <div class="input-box">
          Hips: <input type="number" name="hips" placeholder="Enter waist size in inches" required><br><br>
          </div>
          <div class="input-box">
          Shoulder: <input type="number" name="shoulder" placeholder="Enter shoulder size in inches" required><br><br>
          </div>
          <div class="input-box">
          Sleeve: <input type="number" name="sleeve" placeholder="Enter sleeve size in inches" required><br><br>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" value="Submit Measurement">
        </div>
      </form>
    </div>

 
  </div>

   
    
    </body>
</html>