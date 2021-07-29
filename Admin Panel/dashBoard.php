<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link href="buaj_logo.png" rel="icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


     <script>
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>


</head>
<body>

      

    <?php if (isset($_SESSION['userLoginName'])):?>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#2F363F;">
  <div class="container">
    <a class="navbar-brand" href="../index.php">
          <img src="buaj_logo.png" height="100" width="100">
        </a>
    <button class="navbar-toggler btn btn-outline-danger" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
      <br>
        <li class="nav-item active" style="padding-right: 10px; padding-top: 10px;">
        <button type="button" class="btn btn-lg btn-light" disabled>Welcome Mr. <?php echo $_SESSION['userLoginName']?> <i class="fas fa-eye" style="color:green;"></i></button>
        </li>
        <li class="nav-item active" style="padding-right: 10px; padding-top: 10px;">
          <a class="nav-link btn btn-outline-danger btn-lg" href="index.php">DashBoard
          </a>
        </li>
        <li class="nav-item active" style="padding-right: 10px; padding-top: 10px;">
          <a class="nav-link btn btn-outline-danger btn-lg" href="logOut.php">LogOut</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<br>
<br>
<br>
<br>
<br>


<?php
    $server_Name = 'localhost';
    $user_Name = 'root';
    $user_Pass = '';
    $db_name = 'buaj_db';
  
    $setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);
  
    $query1 = "SELECT COUNT(*) FROM binhashim_prices";
    $running_query1 = mysqli_query($setting_connection,$query1);

    $query2 = "SELECT COUNT(*) FROM imtiaz_prices";
    $running_query2 = mysqli_query($setting_connection,$query2);    

    $query3 = "SELECT COUNT(*) FROM metro_prices";
    $running_query3 = mysqli_query($setting_connection,$query3);

    $query4 = "SELECT COUNT(*) FROM admin_users";
    $running_query4 = mysqli_query($setting_connection,$query4);

    $query5 = "SELECT COUNT(*) FROM contact_us";
    $running_query5 = mysqli_query($setting_connection,$query5);

    $query6 = "SELECT COUNT(*) FROM adding_products";
    $running_query6 = mysqli_query($setting_connection,$query6);



    $fetchingData1 = mysqli_fetch_array($running_query1);
    $fetchingData2 = mysqli_fetch_array($running_query2);
    $fetchingData3 = mysqli_fetch_array($running_query3);
    $fetchingData4 = mysqli_fetch_array($running_query4);
    $fetchingData5 = mysqli_fetch_array($running_query5);
    $fetchingData6 = mysqli_fetch_array($running_query6);

?>



<div class="container-fluid">
  <h1 class="display-3 text-center" style="font-family: 'Lobster', cursive;">Welcome To Admin Panel</h1>
</div>



<div class="card-group w-75 p-3 text-center" style="margin:0 auto;">

  <div class="card" style="margin-right: 20px;">
    <img src="metro.jpg" height="190" class="card-img-top" alt="...">
    <div class="card-body" style="background-color: #0A3D62">
      <h5 class="card-title" style="color: #F5BCBA">Total No of Products.</h5>
      <div class="counter" style="color: #F5BCBA; font-size: 50px;"><?php echo $fetchingData3[0];?></div>
      <a href="add_metro_products.php" class="btn btn-outline-light btn-lg text-black">Add more Products</a>
    </div>
  </div>

  <div class="card" style="margin-right: 20px;">
    <img src="bin-hashim.jpg" height="190" width="100" class="card-img-top" alt="...">
    <div class="card-body" style="background-color: #0A3D62">
      <h5 class="card-title text-center" style="color: #F5BCBA">Total No of Products.</h5>
      <div class="counter" style="color: #F5BCBA; font-size: 50px;"><?php echo $fetchingData1[0];?></div>
      <a href="add_binhashim_products.php" class="btn btn-outline-light btn-lg text-black">Add more Products</a></div>
  </div>

  <div class="card" style="margin-right: 20px;">
    <img src="imtiaz.jpg" height="190" class="card-img-top" alt="...">
    <div class="card-body" style="background-color: #0A3D62">
      <h5 class="card-title text-center" style="color: #F5BCBA">Total No of Products.</h5>
      <div class="counter" style="color: #F5BCBA; font-size: 50px;"><?php echo $fetchingData2[0];?></div>
      <a href="add_imtiaz_products.php" class="btn btn-outline-light btn-lg text-black">Add more Products</a>
    </div>
  </div>



  <div class="card" style="margin-right: 20px;">
    <img src="contact_us.jpg" height="190" class="card-img-top" alt="...">
    <div class="card-body" style="background-color: #0A3D62">
      <h5 class="card-title text-center" style="color: #F5BCBA">Check Feed <br> Back's</h5>
      <div class="counter" style="color: #F5BCBA; font-size: 50px;"><?php echo $fetchingData5[0];?></div><br>
      <a href="checkFeedBacks.php" class="btn btn-outline-light btn-lg text-black">Check Now !</a>
    </div>
  </div>


</div>


<!-- w-50 p-3 -->

<div class="card-group w-75 p-5 text-center" style="margin:0 auto;">

  <div class="card" style="margin-right: 20px;">
    <img src="admin.jpeg" height="390" width="100" class="card-img-top" alt="...">
    <div class="card-body" style="background-color: #0A3D62">
      <h5 class="card-text text-center" style="color: #F5BCBA; font-size: 30px;">Add More Admins</h5>
      <div class="counter" style="color: #F5BCBA; font-size: 50px;"><?php echo $fetchingData4[0];?></div>
      <a href="Showing_Admin_Users.php" class="btn btn-outline-light btn-lg text-black">Add !!</a>
    </div>
  </div>

  <div class="card" style="margin-right: 20px;">
    <img src="Cart-add-icon.png" height="390" width="100" class="card-img-top" alt="...">
    <div class="card-body" style="background-color: #0A3D62">
      <h5 class="card-text text-center" style="color: #F5BCBA; font-size: 30px;">Add Products In BUAJ.</h5>
      <div class="counter" style="color: #F5BCBA; font-size: 50px;"><?php echo $fetchingData6[0];?></div>
      <a href="add_BUAJ_product.php" class="btn btn-outline-light btn-lg text-black">Add !!</a>
    </div>
  </div>


</div>


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
      <h1 class="display-3">Welcome Back</h1>
      <h1 class="display-4">Mr. <?php echo $_SESSION['userLoginName']?></h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-lg" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    <?php else  :?>
    <?php header('location: login.php');?>

    <?php endif; ?>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js"></script>
    <script src="jquery.counterup.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>