<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>>Add Category</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet"><link rel="stylesheet" href="assets/css/s.css">
  <link rel="stylesheet" href="assets/css/update.css" type="text/css">

</head>
<body>

        
<!-- partial:index.partial.html -->
<section class='login' id='login'>
  <a href="tailorhomepage.php" class="myButton">Back</a>
  <div class='head'>
  <h1 class='company'>Add A Category</h1>
  </div>

  
  <div class='form'>
    <form action="add_c.php" method="POST">
        Product Name:  <input type="text" name="productname"><br><br>
            Gender:  <select name="gender">
                     <option>Male</option>
                     <option>Female</option> </select>
                     <br><br>

  <label for="description" style="vertical-align: top;">Description:   </label>
            <textarea rows="5" cols="50" id="description" name="description"></textarea><br><br>
            <input href="#" class='btn-login' id='do-login' type="submit" value="Add">
    </form>
  </div>
</section>

<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
