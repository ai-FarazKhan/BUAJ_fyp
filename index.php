<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Welcome To BUAJ</title>

<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
   jQuery(document).ready(function ($) {
       $('.counter').counterUp({
           delay: 10,
           time: 1000
       });
   });
</script>

<link href="buaj_logo.png" rel="icon">

</head>
<body id="page-top">


        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#page-top">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Our Amazing Team</a></li>
                        <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About Us</a></li> -->
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#register">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>






        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase" >Choose <span style="color: #BB2CD9;">your</span> Best Super Mart !!</div>
                <a class="btn btn-outline-warning text-uppercase js-scroll-trigger" href="#comparePriceSection">Show Me Price Comparison </a>
            </div>
        </header>

<!-- Compare Price section-->


<section class="page-section" id="comparePriceSection">
<div class="container">

<h1 class="display-3 text-center" style="font-family: 'Lobster', cursive; color:#0A3D62">Select your Product Name !!</h1>
<h1 class="display-4 text-center" style="font-family: 'Lobster', cursive; color:#0A3D62">To get Comparison</h1>

<br><br>


<?php

  $server_Name = 'localhost';
  $user_Name = 'root';
  $user_Pass = '';
  $db_name = 'buaj_db';

  $setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

  $query = "SELECT itemName FROM imtiaz_prices";
  $running_query = mysqli_query($setting_connection,$query);

?>


<div class="text-center">
<div class="btn-group">
<form action="showingChart.php" method="POST?select_Price_List">
<select id="inputState" name="select_Price_List" class="form-control-lg" required>
        <option selected="true" disabled="true">Choose...</option>
          <?php
            while ($row = $running_query->fetch_array()) :
          ?>
        <option><?php echo $row['itemName']; ?></option>
          <?php endwhile;?> 
</select>
      <button type="submit" class="btn btn-outline-dark btn-lg">Check</button>
</form>      
</div>
</div>
</div>
</section>


        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing</h2>
                    <h3 class="section-heading text-uppercase">Team</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal">
                                <img class="img-fluid" src="assets/img/portfolio/faraz khan.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Faraz Khan</div>
                                <div class="portfolio-caption-subheading text-muted">Python, Java, PHP, AWS rekognition, SQL, MySQL, OpenCV, C# desktop Application development </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal">
                                <img class="img-fluid" src="assets/img/portfolio/huzaifa picture.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">S.M Huzaifa Ali</div>
                                <div class="portfolio-caption-subheading text-muted">PHP, SQL, HTML, CSS</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal">
                                <img class="img-fluid"  src="assets/img/portfolio/shaheer second picture.png" style="width:480px;height:370px;" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Shaheer Ahmed Khan</div>
                                <div class="portfolio-caption-subheading text-muted">CCNA,Designing,MySQL,Documentation.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6" style="margin:0 auto;">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal">
                                <img class="img-fluid" src="assets/img/portfolio/06-thumbnail.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">M.Fahad Iqbal</div>
                                <div class="portfolio-caption-subheading text-muted"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




<!-- Register section -->

<section class="page-section" id="register">

<div class="container text-center">
<h1 class="text-center">Get Register Your Self <span class="badge badge-secondary">Now !!</span></h1>
<br><br>
<form method="POST" enctype="multipart/form-data">
    <!-- <label for="exampleFormControlFile1">Example file input</label> -->
    <h1>Enter Your Name</h1>
    <input type="text" class="form-control form-control-lg" name="user_name_txt" placeholder="Faraz etc" required>
    <br>
    <input type="file" class="form-control-file" name="file" required>
    <br>
    <button type="submit" name="btn_register" class="btn btn-primary btn-lg btn-block">Submit</button>

</form>



<?php 

$server_Name = 'localhost';
$user_Name = 'root';
$user_Pass = '';
$db_name = 'buaj_db';

$setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);


if(isset($_POST['btn_register']))
{
  $input_user_the_Name = $_POST['user_name_txt'];

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTempName = $file['tmp_name'];
    $fileSize = $file['size'];
  
    $fileSepExt = explode('.', $fileName);
    $fileActualExtension = strtolower(end($fileSepExt));
  
    $allowingFiles = array('jpg','jpeg','png');
  
    if (in_array($fileActualExtension, $allowingFiles)) {
      if ($fileSize <= 50000000) {
        $fileNewName = uniqid('',true).'.'.$fileActualExtension;
        $fileDestination = 'C:\Xamp\htdocs\BUAJ Website\User Login\Target Images\ '.$fileNewName;
  
          $query4 = "INSERT INTO registered_users (username,user_Image) VALUES ('$input_user_the_Name','$fileDestination')";
  
          $running_query4 =  mysqli_query($setting_connection,$query4);
          move_uploaded_file($fileTempName, $fileDestination);

          if(file_exists($fileDestination)){
              $filenewDestination = 'C:\Xamp\htdocs\BUAJ Website\User Login\Target Images\ '.$input_user_the_Name.'.jpg';
              rename($fileDestination,$filenewDestination);
          }
      }
      else{
        echo "File Size is greater";
      }
    }
    else{
      echo "Can not upload this type of file!!";
    }
    echo "<script>window.top.location='index.php'</script>";
}


?>










</div>


</section>




<?php 

$server_Name = 'localhost';
$user_Name = 'root';
$user_Pass = '';
$db_name = 'buaj_db';

$setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

if(isset($_POST['submit_message_btn']))
{
    $input_User_name = $_POST['User_name'];
    $input_User_message = $_POST['User_message'];

    $contact_us_query = "INSERT INTO contact_us (useremail,userMessage) VALUES ('$input_User_name','$input_User_message')";
    $running_contact_us_query = mysqli_query($setting_connection,$contact_us_query);
    echo "<script>window.top.location='index.php'</script>";
}
?>


        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                </div>
                <form method="POST">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" name="User_name" type="text" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                            <input class="form-control" name="User_message" type="text" placeholder="Your Message *" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button type="submit" class="btn btn-primary btn-xl text-uppercase" name="submit_message_btn">Send Message</button>
                    </div>
                </form>
            </div>
        </section>









        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © BUAJ Website 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        




<!-- Bootstrap Model -->

<!-- <div class="container-fluid">
  <h1 class="display-3 text-center" style="font-family: 'Lobster', cursive;">Welcome To BUAJ !!</h1>
</div> -->

<script>
$(document).ready(function(){
    $("#welcome_notification").modal();

});
</script>

<!-- Modal -->
<div class="modal fade text-center" id="welcome_notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <h1 class="display-3">Welcome To BUAJ !!!</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-lg" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>


</body>
</html>