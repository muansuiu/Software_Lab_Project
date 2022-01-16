<!DOCTYPE html>
<!--
    Be by TEMPLATE STOCK
    templatestock.co @templatestock
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>tailor admin plane</title>
    

    <!-- =============== Bootstrap Core CSS =============== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!-- =============== fonts awesome =============== -->
    <link rel="stylesheet" href="assets/font/css/font-awesome.min.css" type="text/css">
    <!-- =============== Plugin CSS =============== -->
    <link rel="stylesheet" href="assets/css/animate.min.css" type="text/css">
    <!-- =============== Custom CSS =============== -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- =============== Owl Carousel Assets =============== -->
    <link href="assets/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/owl-carousel/owl.theme.css" rel="stylesheet">
    
     <link rel="stylesheet" href="assets/css/isotope-docs.css" media="screen">
      <link rel="stylesheet" href="assets/css/baguetteBox.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>


<body>
    
   
     
        
    <!-- =============== Preloader =============== -->
    <div id="preloader">
        <div id="loading">
        <title>Tailor Homepage</title>  
        </div>
    </div>

    <!-- =============== nav =============== -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="container-fluid">
                
                 
                    <h2 style="  color: white ; font-size: 22px; text-align:center;"> Welcome Tailor Admin</h2>
               
                
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    </a>
                </div>


                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>

                            <a class="page-scroll" href="manage.php">Manage Orders</a><br/>
                             <div class="dropdown">
 
                              <div class="dropdown-content">
                                

                                <a href="pending_order.php">Pend</a>
                                     <a href="conform_order.php">Conf</a>
                                        <a href="delevery_order.php">Delev</a>
                                            </div>
                                                </div>
                                           


                        </li>
                        <li>
                            <a class="page-scroll" href="showmea.php">Customer Measurements</a><br/>
                        </li>
                        <li>
                            <a href="add_c_page.php">Add Category</a><br/>
                        </li>
                        <li>
                            <a class="page-scroll" href="update_c_page.php">Manage Categories</a><br/>
                        </li>
                        <li>
                            <a class="page-scroll" href="add_d_page.php">Add Dress</a><br/><br/>
                        </li>
                        <li>
                            <a class="page-scroll" href="update_d_page.php">Manage Dresses</a><br/>
                        </li>
                        <li>
                            <a class="page-scroll" href="add_m_page.php">Add Material</a><br/>
                        </li>
                        <li>
                            <a class="page-scroll" href="update_m_page.php">Manage Materials</a><br/>
                        </li>
                        <li>
                            <a class="page-scroll" href="logoutprocess.php">Log Out</a>
                        </li>


                    </ul>
                </div>
                <!-- =============== navbar-collapse =============== -->

            </div>
        </div>
        <!-- =============== container-fluid =============== -->
    </nav>
    <!-- =============== header =============== -->
    <header id="home" class="header">
        <!-- =============== container =============== -->
        <div class="container">
            <div class="header-content row">
                

                <div id="owl-demo" class="owl-carousel header1">
                  <div>
                  <div class="col-xs-12 col-sm-6 col-md-6 header-text">
                    <img src="https://th.bing.com/th/id/R.09abb36a7a6e65b104854ab3d268c25e?rik=IYKeFqGbC0PASg&pid=ImgRaw&r=0">
                   
                        <div class="btn btn-primary btn-lg btn-ornge wow bounceIn animated" data-wow-delay="1s">
                        </div>
                    </p>
                    </div>               
                </div>
                 <div>
                  <div class="col-xs-12 col-sm-6 col-md-6 header-text">
                    <img src="https://th.bing.com/th/id/OIP.NG0ejDA6Apcz6EVolM4CvQHaE8?pid=ImgDet&w=960&h=641&rs=1">>
                    <p>
                        <div class="btn btn-primary btn-lg btn-ornge wow bounceIn animated" data-wow-delay="1s">
                        </div>
                    </p>
                    </div>               
                </div>
                </div>               
                </div>


                
        </div>
        <!-- =============== container end =============== -->
    </header>
    <!-- =============== About =============== -->
    <section id="team" class="">
        
               
                 
     
                
                    <div class="righttable1">
                   <table>
        
           <h1> Category</h1>
          
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Gender</th>
                        
                  
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            $sqlquery="SELECT * FROM category order by CAST(SUBSTRING(productcode, 2, LENGTH(productcode)) AS INT)";
                            
                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $productstable=$returnval->fetchAll();
                                
                                foreach($productstable as $row){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['productcode'] ?></td>   
                                            <td><?php echo $row['productname'] ?></td>   
                                            <td><?php echo $row[' description '] ?></td>   
                                            <td><?php echo $row[' gender '] ?></td>
                                           
                                        </tr>
                                    <?php
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="5">Data read error ... ...</td>    
                                    </tr>
                                <?php
                            }
                            
                        }
                        catch(PDOException $ex){
                            ?>
                                <tr>
                                    <td colspan="5">Data read error ... ...</td>    
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>

                  
        </div>      
    
                 <div class="righttable2">
        

<table>

   <h1> Dress</h1>
        <thead>
            <tr>
                <th>Design ID</th>
                <th>Details</th>
                <th>Image</th>
                <th>price</th>
                <th>Required_Measurement</th>
                <th>Product Code</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sqlquery="SELECT * FROM dress order by CAST(SUBSTRING(designid, 2, LENGTH(designid)) AS INT)";
                    
                    try{
                        $returnval=$dbcon->query($sqlquery); ///PDOStatement
                        
                        $productstable=$returnval->fetchAll();
                        
                        foreach($productstable as $row){
                            ?>
                                <tr>
                                    <td><?php echo $row['designid'] ?></td>   
                                    <td><?php echo $row['details'] ?></td>   
                                    <td>
                                                <img width="100" height="100" alt="dress image" src="<?php echo $row['image'] ?>">
                                    </td>
                                    <td><?php echo $row['price'] ?></td>   
                                    <td><?php echo $row['required_measurement'] ?></td>   
                                    <td><?php echo $row['productcode'] ?></td>   
                                    
                                    <?php
                                        
                                           
                              }
                                    ?>
                                </tr>
                            <?php
                        }
                    
                    catch(PDOException $ex){
                        ?>
                            <tr>
                                <td colspan="5">Data read error ... ...</td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                            <td colspan="5">Data read error ... ...</td>    
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>

</div>

<div class="righttable3">
        

<table>

   <h1> Material</h1>
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
                try{
                    ///php-mysql 3 way. We will use PDO - PHP data object
                    $dbcon = new PDO("mysql:host=localhost:3306;dbname=tms_db;","root","");
                    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sqlquery="SELECT * from material order by CAST(SUBSTRING(mateid, 2, LENGTH(mateid)) AS INT)";
                    
                    try{
                        $return=$dbcon->query($sqlquery); ///PDOStatement
                        
                        $materialtable=$return->fetchAll();
                        
                        foreach($materialtable as $row){
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
                        }
                    
                    catch(PDOException $ex){
                        ?>
                            <tr>
                                <td colspan="5">Data read error ... ...</td>    
                            </tr>
                        <?php
                    }
                    
                }
                catch(PDOException $ex){
                    ?>
                        <tr>
                            <td colspan="5">Data read error ... ...</td>    
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>

</div>
        <!-- =============== container end =============== -->      
    </section>  
    <section id="contact">
    <!-- =============== container =============== -->
        <div class="container">
                <div class="row">
                <div class="title">
                <h2>Contact</h2>
                <p>Meet some of our lovely, passionate, positive people.</p>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 wow bounceIn animated" data-wow-delay=".1s">

                    <form action="#" method="post">
                        <div class="ajax-hidden">
                            <div class="col-xs-12 col-sm-6 col-md-6 form-group wow fadeInUp animated">
                                <label for="c_name" class="sr-only">Name</label>
                                <input type="text" placeholder="Name" name="name" class="form-control" id="name" required="">
                            </div>

                            <div data-wow-delay=".1s" class="col-xs-12 col-sm-6 col-md-6 form-group wow fadeInUp animated">
                                <label for="c_email" class="sr-only">Email</label>
                                <input type="email" placeholder="E-mail" name="email" class="form-control" id="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" placeholder="e.g. info@envato.com" required="">
                            </div>

                            <div data-wow-delay=".2s" class="col-xs-12 col-sm-12 col-md-12 form-group wow fadeInUp animated">
                                <textarea placeholder="Message" rows="7" name="description" id="description" class="form-control" required=""></textarea>
                            </div>

                            <button data-wow-delay=".3s" class="btn btn-sm btn-block wow fadeInUp animated" type="submit">Send Message</button>
                        </div>
                        <div class="ajax-response"></div>
                    </form>

                </div>              
            </div>
        </div><!-- =============== container end =============== -->
    </section>
    <!-- Footer -->
    <footer id="footer">
    <!-- =============== container =============== -->
    <div class="container">
                <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">

                    <ul class="social-links">
                        <li><a class="wow fadeInUp animated" href="index.html#" style="visibility: visible; animation-name: fadeInUp;"><i class="fa fa-facebook"></i></a></li>
                        <li><a data-wow-delay=".1s" class="wow fadeInUp animated" href="index.html#" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;"><i class="fa fa-twitter"></i></a></li>
                        <li><a data-wow-delay=".2s" class="wow fadeInUp animated" href="index.html#" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;"><i class="fa fa-google-plus"></i></a></li>
                        <li><a data-wow-delay=".4s" class="wow fadeInUp animated" href="index.html#" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;"><i class="fa fa-pinterest"></i></a></li>
                        <li><a data-wow-delay=".5s" class="wow fadeInUp animated" href="index.html#" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                    <p class="copyright">
                        &copy; We Are Also Here <a href="http://templatestock.co"></a>
                    </p>

                </div>
                <div data-wow-delay=".6s" class="col-xs-12 col-sm-6 col-md-6 wow bounceIn  animated" style="visibility: visible; animation-delay: 0.6s; animation-name: bounceIn;">

                      <section class="widget widget_text" id="text-15">
                         <h3 class="widget-title">Dhaka, Bangladesh</h3> <div class="textwidget">UIU,Mdina AVE<br>
                        <p>Tel: 0167-111-9337<br>
                        Mobile: 0167-111-9337<br>
                        E-mail: <a href="#">OTS@gmail.com</a></p>
                       
                    </section>

                </div>
            </div>
    </div><!-- =============== container end =============== -->
    </footer>    
    <!-- =============== jQuery =============== -->
    <script src="assets/js/jquery.js"></script>
     <script src="assets/js/isotope-docs.min.js"></script>
    <!-- =============== Bootstrap Core JavaScript =============== -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- =============== Plugin JavaScript =============== -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.fittext.js"></script>
    <script src="assets/js/wow.min.js"></script> 
    <!-- =============== owl carousel =============== -->
    <script src="assets/owl-carousel/owl.carousel.js"></script>  
    <!-- Isotope does NOT require jQuery. But it does make things easier -->

<script src="assets/js/baguetteBox.js" async></script>
<script src="assets/js/plugins.js" async></script>
 
    <!-- =============== Custom Theme JavaScript =============== -->
    <script src="assets/js/creative.js">    </script> 
<script src="assets/js/jquery.nicescroll.min.js"></script>

<script>
  $(document).ready(function() {
  
    var nice = $("html").niceScroll();  // The document page (body)
    
    $("#div1").html($("#div1").html()+' '+nice.version);
    
    $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#00F",boxzoom:true}); // First scrollable DIV

    $("#boxscroll2").niceScroll("#contentscroll2",{cursorcolor:"#F00",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true});  // Second scrollable DIV
    $("#boxframe").niceScroll("#boxscroll3",{cursorcolor:"#0F0",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true});  // This is an IFrame (iPad compatible)
    
    $("#boxscroll4").niceScroll("#boxscroll4 .wrapper",{boxzoom:true});  // hw acceleration enabled when using wrapper
    
  });
</script>
<script>
window.onload = function() {
    if(typeof oldIE === 'undefined' && Object.keys)
        hljs.initHighlighting();

    baguetteBox.run('.baguetteBoxOne');
    baguetteBox.run('.baguetteBoxTwo');
    baguetteBox.run('.baguetteBoxThree', {
        animation: 'fadeIn'
    });
    baguetteBox.run('.baguetteBoxFour', {
        buttons: false
    });
    baguetteBox.run('.baguetteBoxFive', {
        captions: function(element) {
            return element.getElementsByTagName('img')[0].alt;
        }
    });
};
</script>

</body>
</html>