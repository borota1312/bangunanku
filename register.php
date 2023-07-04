<?php $page = "Create"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bangunanku - Build your building.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="goto-here">
  <div class="py-1 bg-primary">
    <div class="container">
      <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
        <div class="col-lg-12 d-block">
          <div class="row d-flex">
            <div class="col-md pr-4 d-flex topper align-items-center">
              <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
              <span class="text">081234567890</span>
            </div>
            <div class="col-md pr-4 d-flex topper align-items-center">
              <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
              <span class="text">bangunanku2019@gmail.com</span>
            </div>
            <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
              <span class="text">3-5 Business days delivery &amp; Free Returns</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include 'navbar.php';
  // require 'config.php';
  if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT *FROM users WHERE email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
      echo "<script> Swal.fire('Perhatian','Email Sudah Terdaftar','warning') </script>";
    } else {
      if ($password == $confirmpassword) {
        try {
          $pass = base64_encode($password);
          $query = "INSERT INTO users (username,password,email) VALUES('$name','$pass','$email')";
          mysqli_query($conn, $query);
          echo
          "<script> Swal.fire('Berhasil','Registrasi Berhasil','success') </script>";
        } catch (mysqli_sql_exception $e) {
          var_dump($e);
          exit;
        }
      } else {
        echo
        "<script> Swal.fire('Perhatian','Masukkan Konfirmasi Password dengan benar','warning') </script>";
      }
    }
  }
  ?>
  <!-- END nav -->

  <div class="hero-wrap hero-bread" style="background-image: url('images/tokocat.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h2><span class="mr-2"><a href="index.html">Bangunanku</a></span></h2>
          <h1 class="mb-0 bread">Create Account</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-light">
    <div class="row block-9">
      <div class="col-md-12 order-md-last d-flex">
        <form action="" method="post" class="bg-white p-5 contact-form">
          <h3> Create Account</h3>
          <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required value="">
          </div>
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required value="">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required value="">
          </div>
          <div class="form-group">
            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" required value="">
          </div>
          <div class="form-group">
            <button type="submit" name="submit" value="Register" class="btn btn-primary py-3 px-5">Create</button>
          </div>
        </form>

      </div>

  </section>






  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>