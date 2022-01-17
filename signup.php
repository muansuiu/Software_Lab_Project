<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="css_files/signup_style.css">

        <script>
            // this function travels back to the index.html page
            function goback(){
                window.location.assign("index.html");
            }
            // this function travels to the signin.php page
            function gosign(){
                window.location.assign("signin.php");
            }
        </script>
    </head>
    
    <body>
        <section>

        <div class="container">
        <div class="content">
            <center><a>Please insert your details</a></center>
            <form action="registeruser.php" method="POST">
            <div class="user-details">
           
          <div class="input-box">
            Email: <input type="email" name="email" required><br><br>
          </div>
          <div class="input-box">
            Password: <input type="password" name="upass" required><br><br>
          </div>
          <div class="input-box">
            First Name: <input type="text" name="fname" required><br><br>
          </div>
          <div class="input-box">
            Last  Name: <input type="text" name="lname" required><br><br>
          </div>
          <div class="input-box">
            Phone: <input type="number" name="phone" required><br><br>
          </div>
          <div class="input-box">
            Address: <input type="text" name="address" required></textarea><br/><br/>
          </div>
          <div class="input-box">
            City: <input type="text" name="city" required><br><br>
          </div>
          <div class="input-box">
             District: <input type="text" name="district" required><br><br>
          </div>
          <div class="input-box">
            Postal Code: <input type="text" name="postal" required><br><br>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" value="Register">
        </div>
             </form>
        </div>
    
        <div class="button2">
        <a>  Already have an account?</a><br><br>
            <button class="btn2" onclick="gosign()">Sign In</button>
        </div>
        </div>
        </section>
        <br>
        <br/>
        

    </body>
</html>