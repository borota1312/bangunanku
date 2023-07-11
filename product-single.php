<?php
require 'config.php';
$page = "Product Single"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bangunanku - Build your building</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css" />

    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />

    <link rel="stylesheet" href="css/aos.css" />

    <link rel="stylesheet" href="css/ionicons.min.css" />

    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="css/jquery.timepicker.css" />

    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center">
                                <span class="icon-phone2"></span>
                            </div>
                            <span class="text">081234567890</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center">
                                <span class="icon-paper-plane"></span>
                            </div>
                            <span class="text">Bangunanku2019@gmail.com</span>
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
    if (isset($_GET["produk"])) {
        $produk = base64_decode($_GET["produk"]);
    }
    $query2 = "SELECT * FROM product_images WHERE product_id=$produk";
    $rs_result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($rs_result2);
    $link_image = $row2["image_url"];

    $query = "SELECT * FROM products WHERE product_id=$produk";
    $rs_result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($rs_result);
    ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/Kursi-kantor-Medium.jpeg')">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Product Single</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="admin/backend/<?php echo $link_image ?>" class="image-popup"><img src="admin/backend/<?php echo $link_image ?>" class="img-fluid" alt="Colorlib Template" /></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3><?php echo $row["product_name"] ?></h3>
                    <div class="rating d-flex">
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2">5.0</a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                        </p>
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #000">100 <span style="color: #bbb">Rating</span></a>
                        </p>
                        <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000">500 <span style="color: #bbb">Sold</span></a>
                        </p>
                    </div>
                    <p class="price"><span><?php echo rupiah($row["price"]) ?></span></p>
                    <p>
                        <?php echo $row["description"] ?>
                    </p>
                    <div class="row mt-4">
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000"><?php echo $row["stock_quantity"] ?> available</p>
                        </div>
                    </div>
                    <p>
                        <a href="#" id="addCart" data-id="<?php echo $row['product_id']; ?>" class="btn btn-black py-3 px-5">Add to Cart</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Products</span>
                    <h2 class="mb-4">Related Products</h2>
                    <p>Produk lainnya dapat dilihat di bawah ini</p>
                </div>
            </div>
        </div>
        <?php
        $link_link = array();
        $start_from = 0;
        $batas = 4;
        $query3 = "SELECT * FROM product_images WHERE product_id!=$produk LIMIT $start_from, $batas";
        $rs_result3 = mysqli_query($conn, $query3);
        while ($baris = mysqli_fetch_array($rs_result3)) {
            $query4 = "SELECT * FROM products WHERE product_id=$baris[product_id]";
            $rs_result4 = mysqli_query($conn, $query4);
            $row4 = mysqli_fetch_assoc($rs_result4);
            $nama_produk = $row4['product_name'];
            $harga = $row4['price'];
            $link_link[] = array(
                'id_produk' => $baris['product_id'],
                'nama_produk' => $nama_produk,
                'harga' => $harga,
                'image' => $baris['image_url']
            );
        }

        ?>
        <div class="container">
            <div class="row">
                <?php
                foreach ($link_link as $item) {
                ?>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="#" class="img-prod"><img class="img-fluid" src="admin/backend/<?php echo $item['image'] ?>" alt="Colorlib Template" />
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#"><?php echo $item['nama_produk'] ?></a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span><?php echo rupiah($item['harga']) ?></span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="product-single.php?produk=<?php echo base64_encode($item['id_produk']); ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="#" id="addCart" data-id="<?php echo $item['id_produk']; ?>" class=" buy-now d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <!-- tag scriptnya ada di navbar.php -->
                                        <a href="#" id="addWish" data-id="<?php echo $item['id_produk']; ?>" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px" class="mb-0">
                        Subcribe to our Newsletter
                    </h2>
                    <span>Get e-mail updates about our latest shops and special
                        offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address" />
                            <input type="submit" value="Subscribe" class="submit px-3" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel">
                            <span class="ion-ios-arrow-up"></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Bangunanku</h2>
                        <p>Build your building.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-twitter"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-instagram"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="shop.html" class="py-2 d-block">Shop</a></li>
                            <li><a href="about.html" class="py-2 d-block">About</a></li>
                            <li><a href="login.html" class="py-2 d-block">Login</a></li>
                            <li><a href="index.html" class="py-2 d-block">Home</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Help</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li>
                                    <a href="#" class="py-2 d-block">Shipping Information</a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 d-block">Returns &amp; Exchange</a>
                                </li>
                                <li>
                                    <a href="#" class="py-2 d-block">Terms &amp; Conditions</a>
                                </li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                <li><a href="#" class="py-2 d-block">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li>
                                    <span class="icon icon-map-marker"></span><span class="text">14.5 Kaliurang St. Sleman, DIY Yogyakarta,
                                        Indonesia</span>
                                </li>
                                <li>
                                    <a href="#"><span class="icon icon-phone"></span><span class="text">081234567890</span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="icon icon-envelope"></span><span class="text">bangunanku2019@gmail.com</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
</body>

</html>