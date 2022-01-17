<!DOCTYPE html> <!-- html comment: html version 5 -->
<html>
    <head>
        <!--meta information-->
        <meta charset="utf-8">
        <title>Sign In</title>
        <link rel="stylesheet" href="css_files/signin_style.css">

       <script>
           // this function travels to the index.html page
            function goback(){
                window.location.assign("index.html");
            }
            // this function travels to the signup.php page
            function goregister(){
                window.location.assign("signup.php");
            }
        </script>
    </head>
    
    <body>
    <section>
        <div class = "container">
            <div class="right">
                <div class="content">
                    <form action="verifyuser.php" method="POST">
                    User Email: <input type="email" name="email" required><br><br>
                    Password:  <input type="password" name="upass" required><br><br>
                    User Type:  
                    <select id="type" name="typebox">
                    <option value="Customer">Customer</option>
                    <option value="Tailor">Tailor</option>
                    </select><br/>
                    <br/>
                    <div class="btn1">
                        <input type="submit" value="Sign In">
                    </div>
                    </form>
                    
                    <div class="other_button">
                    <a>Don't have an account?</a><br><br>
                        <button class="btn2" onclick ="document.location='signup.php'">Sign Up</button>
                        <button class="btn3" onclick ="document.location='index.html'">Back to Home</button>
                    </div>

                    
                </div>
            </div>
        </div>
        </section>
    
        

        
        <br/>
        <br/>
        
    </body>
</html>