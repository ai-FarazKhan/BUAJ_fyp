<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>User Login</title>
    <!-- <link href="../img/piaic_logo.png" rel="icon">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body class="text-center">

<form class="form-signin" method="POST" enctype="multipart/form-data">

    <div class="text-center mb-4">
    <a href="../index.php"><img class="mb-4" src="buaj_logo.png" alt="" width="180" height="180"></a>
      <h1 class="h5 mb-3 font-weight-normal">Sign In To Access Your Account</h1>
    </div>

    <!-- <input type="text" name="inputUserName" id="inputEmail" class="form-control" placeholder="User Name" required autofocus> -->
    <br>
    <div class="alert alert-primary" role="alert">
        Select your Picture in order to Recognize you !!
    </div>

    <input type="file" class="form-control-file" name="file" required> 

    <button class="btn btn-outline-primary btn-block" name="loginBtn" type="submit" style="margin-top: 20px;"><span style="font-weight:bold; font-size: 20px;">Login</span></button>
    <p class="mt-5 mb-3 text-muted">&copy 2020 BUAJ</p>

</form>


<!-- Modal -->
<div class="modal fade text-center" style="background-color:#2F363F;" id="notification_of_incorrect_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" style="background-color:#0A3D62;">
      <h1 class="display-3" style="color:#EAF0F1">Can't Recognize you !!!</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-lg" style="margin:0 auto;" data-dismiss="modal">Ok Got it !!</button>
      </div>
    </div>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

<?php
    require 'aws-autoloader.php';

    $server_Name = 'localhost';
    $user_Name = 'root';
    $user_Pass = '';
    $db_name = 'buaj_db';
    
    $setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);


$hold_result = '';

    if(isset($_POST['loginBtn']))
    {
      $generating_unique_key_for_User = rand(10,100);
      //$input_user_the_Name = $_POST['inputUserName'];
    
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
            $fileDestination = 'C:\Xamp\htdocs\BUAJ Website\User Login\Source Images\ '.$fileNewName;
      
              $query4 = "INSERT INTO checking_users (username,user_Image) VALUES ('$generating_unique_key_for_User','$fileDestination')";
      
              $running_query4 =  mysqli_query($setting_connection,$query4);
              move_uploaded_file($fileTempName, $fileDestination);
    
              if(file_exists($fileDestination)){
                  $filenewDestination = 'C:\Xamp\htdocs\BUAJ Website\User Login\Source Images\ '.$generating_unique_key_for_User.'.jpg';
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


        $client = new Aws\Rekognition\RekognitionClient([
          'version' => 'latest',
          'region' => 'us-east-1',
          'credentials' =>[
              'key' => 'AKIAXJPWGQZ7V7GZ6QMT',
              'secret' => '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'
          ]
      ]);

// now Comparing faces.
$dir_path = "Target Images/";

if(is_dir($dir_path)){
    $files = scandir($dir_path);
   //  print_r($files);

    for($i = 0; $i < count($files); $i++){
        if($files[$i] != '.' && $files[$i] != '..'){
            $result = $client->compareFaces([
                'SimilarityThreshold' => 70,
                'SourceImage' => [
                    'Bytes' => file_get_contents($filenewDestination),
                 ],
        
                 'TargetImage' => [
                     'Bytes' => file_get_contents($dir_path.$files[$i]),
                 ],
         ]);
          //$hold_result= $result['FaceMatches'];
        }
        if ($result['FaceMatches'] != null ){
          $hold_result = $result['FaceMatches'];
        break;
        }
    }
}


if($hold_result == null){
error_reporting(0);
//  echo 'Not Matched';

echo"<script>$(document).ready(function(){
  $('#notification_of_incorrect_info').modal();
});</script>";

$clearing_full_checking_users_table = "TRUNCATE TABLE checking_users"; 
mysqli_query($setting_connection,$clearing_full_checking_users_table);

 //deleting file from folder
 unlink($filenewDestination);

}

else{

//  echo 'Matched !!';
 $_SESSION['userKey'] = $generating_unique_key_for_User;
 header('location: index.php');

 $clearing_full_checking_users_table = "TRUNCATE TABLE checking_users"; 
 mysqli_query($setting_connection,$clearing_full_checking_users_table);

 //deleting file from folder
 unlink($filenewDestination);

}

// echo $result;


}



 ?>

 