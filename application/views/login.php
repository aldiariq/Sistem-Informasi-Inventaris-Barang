<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=500, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>/assets/images/logo_kai.png">
    <title>Inventory Gudang unit IT PT KAI Divre III</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link href="<?php echo base_url() ?>assets_login/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_login/css/stylenew.css">
    <link href="<?php echo base_url() ?>assets_login/examples/carousel/carousel.css" rel="stylesheet">
    <style type="text/css">
        .bg {
            background: url(<?php echo base_url() ?>assets_login/images/bg.jpg);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            
        }
        .booking-content {
           background: fixed;
       }
       .booking-form{
        background-color: #1e208a;
        border-radius: 10px;
        font-family: Arial, Helvetica, sans-serif;
       }
       .avatar{
        z-index: 1000;
       }
   </style>
   <script type="text/javascript">
    function zoom() {
      document.body.style.zoom = "80%" 
    }
  </script>
</head>
<body class="bg" onload="zoom()">

    <div class="main">

        <div class="container">
         <div class="booking-content">

            <div class="booking-image">  
                <img src="assets_login/images/logo2.jpg" class="avatar">              
                <div id="myCarousel" class="carousel slide" data-ride="carousel" alt="Booking Image">
                  <!-- Indicators -->
                  
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="assets_login/images/k.jpeg" alt="First slide">
                      <div class="container">
                        
                      </div>
                  </div>
                  <div class="item">
                      <img src="assets_login/images/j.jpeg" alt="Second slide">
                  </div>
                  <div class="item">
                      <img src="assets_login/images/l.jpeg" alt="Third slide">
                  </div>
              </div>
              
          </div><!-- /.carousel -->
      </div>
      <div class="booking-form">
        <form action="<?php echo base_url('fungsilogin') ?>" method="POST" id="booking-form">
            <h2>Silahkan Login</h2>
            <div class="form-group form-input">
                <input type="text"  name="username"  required/>
                <label for="name" class="form-label">Username</label>
            </div>
            <div class="form-group form-input">
                <input type="password" name="password"  required />
                <label for="phone" class="form-label">Password</label>
            </div>
            
            <div class="form-submit">
                <input type="submit" class="submit" id="submit" name="submit" />
            </div>
        </form>
    </div>
</div>
</div>

</div>

<!-- JS -->
<script src="<?php echo base_url() ?>assets_login/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets_login/js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets_login/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets_login/js/docs.min.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>