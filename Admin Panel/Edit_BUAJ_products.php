<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    <link href="buaj_logo.png" rel="icon">

</head>
<body>



    <?php if (isset($_SESSION['userLoginName'])):?>


    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#2F363F;">
  <div class="container">
    <a class="navbar-brand" href="../index.php">
          <img src="buaj_logo.png" height="75" width="80">
        </a>
    <button class="navbar-toggler btn btn-outline-danger" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
      <br>
        <li class="nav-item active" style="padding-right: 10px; padding-top: 10px;">
        <button type="button" class="btn btn-lg btn-light" disabled>Welcome Mr.<?php echo $_SESSION['userLoginName']?> To Edit BUAJ Product Section <i class="fas fa-eye" style="color:green;"></i></button>
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
<br>


<div class="container-fluid">
  <h1 class="display-3 text-center" style="font-family: 'Lobster', cursive;">Welcome To Edit BUAJ Product Section.</h1>
</div>
<br>
<br>
<br>


<?php

$server_Name = 'localhost';
$user_Name = 'root';
$user_Pass = '';
$db_name = 'buaj_db';

$setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

    $getting_id_of_buaj_product = $_GET['id'];
    $query1 = "SELECT * FROM adding_products WHERE id = '$getting_id_of_buaj_product'"; 
    $running_query1 = mysqli_query($setting_connection,$query1);
  
    $holding_product_name = "";

    if(isset($_POST['update_btn']))
    {
        $taking_input_Product_Name =$_POST['product_name_txt'];
        $taking_input_Product_Price = $_POST['product_price_txt'];
        $taking_input_Product_Quantity = $_POST['product_quantity_txt'];

        if($taking_input_Product_Name == '' && $taking_input_Product_Price == '')
        {
            echo"insert something";
        }

        else{
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
                $fileDestination = 'BUAJ Products Images\ '.$fileNewName;
          
                // $query3 = "INSERT INTO adding_products (productName,productPrice,productQuantity,productImage) VALUES('$taking_product_name_input','$taking_product_price_input','$taking_product_quantity_input','$fileDestination')";
                // $running_add_product_query = mysqli_query($setting_connection,$query3);
    
                $query3 = "UPDATE adding_products SET productName = '$taking_input_Product_Name', productPrice = '$taking_input_Product_Price', productQuantity = '$taking_input_Product_Quantity', productImage = '$fileDestination' WHERE id = ('$getting_id_of_buaj_product')";
                mysqli_query($setting_connection,$query3);
                header ('location: add_BUAJ_product.php');

                
                  move_uploaded_file($fileTempName, $fileDestination);
        
                  if(file_exists($fileDestination)){
                      $filenewDestination = 'BUAJ Products Images\ '.$taking_input_Product_Name.'.jpg';
                      rename($fileDestination,$filenewDestination);

                      //updating location of image in Database, after inserting and renaming the file.
                    
                      $updating_image_location_query = "UPDATE adding_products SET productImage = '$filenewDestination' WHERE productName = ('$taking_input_Product_Name')";
                      mysqli_query($setting_connection, $updating_image_location_query);
                      echo "<script type='text/javascript'>window.top.location='add_BUAJ_product.php';</script>";
                  }
              }
              else{
                echo "File Size is greater";
              }
            }
            else{
              echo "Can not upload this type of file!!";
            }
        }

    }

    if(isset($_POST['delete_btn']))
    {
        $getting_product_Name = "SELECT productName FROM adding_products WHERE id = '$getting_id_of_buaj_product'";
        $running_getting_product_Name_query = mysqli_query($setting_connection,$getting_product_Name);
        $holding_product_name = $running_getting_product_Name_query->fetch_array();
        unlink('BUAJ Products Images\ '.$holding_product_name['productName'].'.jpg');
        $query2 = "DELETE FROM adding_products WHERE id = '$getting_id_of_buaj_product'";
        mysqli_query($setting_connection,$query2);
        header('location: add_BUAJ_product.php');
    }

    if(isset($_POST['cancel_btn']))
    {
        header ('location: add_BUAJ_product.php');
    }

?>


<div class="container" style="text-align: center;">
<form action="" method="post" enctype="multipart/form-data">
  
  <?php while($row = $running_query1->fetch_array()) : ?>

  <div class="form-group">
  <label style="color:#AE1438; font-size: 30px; display:inline;">Product Name</label>
    <input type="text" name="product_name_txt" class="form-control" value="<?php echo $row['productName']?>" required>
    <label style="color:#AE1438; font-size: 30px; display:inline;">Product Price</label>
    <input type="text" name="product_price_txt" class="form-control" value="<?php echo $row['productPrice']?>" required>
    <label style="color:#AE1438; font-size: 30px; display:inline;">Product Quantity</label>
    <input type="text" name="product_quantity_txt" class="form-control" value="<?php echo $row['productQuantity']?>" required>
    <label style="color:#AE1438; font-size: 30px; display:inline;">Product Image</label>
    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
  </div>


<?php endwhile;?>


  <button type="submit" name="update_btn" class="btn btn-primary btn-lg">Update Product Status</button>
  <button type="submit" name="delete_btn" class="btn btn-danger btn-lg">Delete Product Status</button>
  <button type="submit" name="cancel_btn" class="btn btn-success btn-lg">Cancel</button>
  

</form>

</div>






    <?php else  :?>
    <?php header('location: login.php');?>

    <?php endif; ?>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


