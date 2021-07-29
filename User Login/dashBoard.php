<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Account</title>
    <link href="buaj_logo.png" rel="icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


     <!-- <script>
        jQuery(document).ready(function ($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script> -->


</head>
<body>

      

    <?php if (isset($_SESSION['userKey'])):?>


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
        <button type="button" class="btn btn-lg btn-light" disabled>Welcome Mr. <?php echo $_SESSION['userKey']?> <i class="fas fa-eye" style="color:green;"></i></button>
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

  $query1 = "SELECT * FROM adding_products";
  $running_query = mysqli_query($setting_connection,$query1);

?>

<div class="container">
  <div class="row">
<?php 
  while($row=mysqli_fetch_array($running_query)){
?>
    <div class="col-lg-4 mt-3 mb-3">
      <div class="card-deck">
        <div class="card border-info p-2">
        <img class="card-img-top" height="320" src="../Admin Panel/<?php echo $row['productImage'];?>"/>
        <h5 class="card-title">Product: <?php echo $row['productName'];?></h5>
        <h3>Price: <?php echo number_format($row['productPrice']);?>/-</h3>
        <a class="btn btn-outline-primary btn-lg" href="order.php ?id=<?php echo $row['id'];?>">Buy Now !!</a>
      </div>
      </div>
    </div>
  <?php } ?>
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
      <h1 class="display-4">Mr. <?php echo $_SESSION['userKey']?></h1>
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