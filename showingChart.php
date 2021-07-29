<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showing Chart</title>
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
</head>
<body>
    

<div class="container text-center">
<a href="index.php"><img src="Admin Panel/buaj_logo.png" class="img-fluid" alt="Responsive image"></a>
</div>




  <?php

$server_Name = 'localhost';
$user_Name = 'root';
$user_Pass = '';
$db_name = 'buaj_db';


// $input_select_item = $_POST['select_Price_List'];
error_reporting(0);

$setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

$query = "SELECT itemPrice FROM imtiaz_prices WHERE itemName = '$_GET[select_Price_List]'";
$running_query = mysqli_query($setting_connection,$query);


if($_GET['select_Price_List'] == ''){
  echo ("<script>location.href='index.php'</script>");
}

else{

$row = $running_query->fetch_array();
$getting_Name_Of_Imtiaz_product = "'$_GET[select_Price_List]'";



$query2 = "SELECT itemPrice FROM binhashim_prices WHERE itemName = '$_GET[select_Price_List]'";
$running_query2 = mysqli_query($setting_connection,$query2);
$row2 = $running_query2->fetch_array();
$getting_Name_Of_BinHashim_product = "'$_GET[select_Price_List]'";



$query3 = "SELECT itemPrice FROM metro_prices WHERE itemName = '$_GET[select_Price_List]'";
$running_query3 = mysqli_query($setting_connection,$query3);
$row3 = $running_query3->fetch_array();
$getting_Name_Of_Metro_product = "'$_GET[select_Price_List]'";

}

?>





<script>
$(document).ready(function(){
    $("#graph_modal").modal();

});
</script>



 <div class="modal fade" id="graph_modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
      <h2 class="display-3 ml-auto" style="font-family: 'Lobster', cursive; color:#0A3D62">Comparison Results</h1>
      <!-- <p class="text-justify"></p> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div style="text-align: center;">
        <h6 class="" style="color: #FFB6C1;">Imtiaz</h6>
        <h6 class="" style="color: #3BB9FF;">Bin Hashim</h6>
        <h6 class="" style="color: #F0E68C;">Metro</h6>
      </div>
      <div class="container">
    <canvas id="myChart"></canvas>
  </div>
      <script>
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:[<?php echo $getting_Name_Of_Imtiaz_product; ?>, <?php echo $getting_Name_Of_BinHashim_product; ?>, <?php echo $getting_Name_Of_Metro_product; ?>],
        datasets:[{
          label:'Price',
          data:[
            <?php echo $row['itemPrice']; ?>,
            <?php echo $row2['itemPrice']; ?>,
            <?php echo $row3['itemPrice']; ?>
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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