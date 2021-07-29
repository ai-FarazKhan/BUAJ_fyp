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

if(isset($_GET['id'])){

  $getting_product_id = $_GET['id'];

  $query1 = "SELECT * FROM adding_products WHERE id = '$getting_product_id'";
  $running_query = mysqli_query($setting_connection,$query1);

  $row = mysqli_fetch_array($running_query);

  $product_name = $row['productName'];
  $prodcut_price = $row['productPrice'];
  $product_image = $row['productImage'];
  $delivary_charges = 50;
  $total_charges = $prodcut_price + $delivary_charges;

}
else{
    echo "NO product found !!";
}

?>



<div class="container">

<div class="row justify-content-center">
<div class="col-md-10 mb-5">

<h2 class="text-center p-2 text-primary">Fill the details to complete your order !!</h2>
<h3>Product Detail: </h3>

<table class="table table-bordered" width="500px">

<tr>
<th>Product Name: </th>
<td><?php echo $product_name;?></td>
<td rowspan="4" class="text-center"><img src="../Admin Panel/<?php echo $product_image;?>" width=200 height=150></td>
</tr>

<tr>
<th>Product Price: </th>
<td><?php echo number_format($prodcut_price);?>/-</td>
</tr>

<tr>
<th>Delivery Charges:</th>
<td><?php echo number_format($delivary_charges);?>/-</td>
</tr>

<tr>
<th>Total Price: </th>
<td><?php echo number_format($total_charges);?>/-</td>
</tr>

</table>

<form action="pay.php" method="post" accept-charset="utf-8">

<input type="hidden" name="product_name" value="<?php echo $product_name;?>">
<input type="hidden" name="product_name" value="<?php echo $prodcut_price;?>">

<div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Enter your Name" required>
</div>

<div class="form-group">
<input type="email" name="email" class="form-control" placeholder="Enter your E-mail" required>
</div>

<div class="form-group">
<input type="tel" name="phone" class="form-control" placeholder="Enter your Phone Number" required>
</div>


<div class="form-group">
<input type="submit" name="submit" class="btn btn-danger btn-lg" value="Click To pay <?php echo number_format($total_charges);?>/- !!">
</div>

</form>

</div>
</div>

</div>






<!-- <div class="container">
  <div class="row">
    <div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr>
		      <th scope="col">Day</th>
		      <th scope="col">Image</th>
		      <th scope="col">Article Name</th>
              <th scope="col">Image</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">1</th>
		      <td>Bootstrap 4 CDN and Starter Template</td>
		      <td>Cristina</td>
		      <td class="w-25">
			      <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/sheep-3.jpg" class="img-fluid img-thumbnail" alt="Sheep">
		      </td>
		    </tr>
		  </tbody>
		</table>   
    </div>
  </div>
</div> -->














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