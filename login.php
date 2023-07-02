<?php $page = "Login"; ?>
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
  require 'config.php';
  if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = base64_encode($_POST["password"]);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
      if ($password == $row["password"]) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["user_id"];
        if ($row['username'] == 'admin' && $row['password'] == base64_encode('admin')) {
          echo "<script> window.location.href = 'admin/index.php'; </script>";
        } else {
          echo "<script> window.location.href = 'index.php'; </script>";
        }
      } else {
        echo "<script> Swal.fire('Perhatian','Password Salah','warning') </script>";
      }
    } else {
      echo
      "<script> Swal.fire('Perhatian','Email Belum Terdaftar','warning') </script>";
    }
  }
  ?>
  <!-- END nav -->

  <div class="hero-wrap hero-bread" style="background-image: url('images/tokocat.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1> <span class="mr-2"><a href="index.php">Bangunanku</a></span></h1>
          <h1 class="mb-0 bread">Login</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-light">
    <div class="row block-9">
      <div class="col-md-12 order-md-last d-flex">
        <form action="" method="post" class="bg-white p-5 contact-form">
          <h3> Login </h3>
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required value="">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required value="">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Login" class="btn btn-primary py-3 px-5">
          </div>
          <p class="breadcrumbs"><span class="mr-2"></span> <a href="register.php">Create New Account</a></span></p>
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