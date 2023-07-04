<?php
require 'config.php';
$page = "Checkout";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bangunanku - build your building.</title>
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

    $data_barang = json_encode($_SESSION["cart"]['data_barang']);

    date_default_timezone_set('Asia/Jakarta');
    $now = date('Y-m-d H:i:s');
    ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/Kursi-kantor-Medium.jpeg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <form id="form1" action="" method="post" class="billing-form">
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" placeholder="" name="firstname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" placeholder="" name="lastname" required>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">State / Country</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select id="country" class="form-control" required>
                                            <option value="Indonesia">Indonesia</option>
                                        </select>
                                    </div>
                                    <div style="display:none; color:red" id="country_check">
                                        Pilih Negara!
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Street Address</label>
                                    <input name="street" type="text" class="form-control" placeholder="House number and street name" required>
                                </div>
                                <div style="display:none; color:red" id="street_check">
                                    Isi Jalan!
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="province">Province</label>
                                    <input name="province" type="text" class="form-control" placeholder="" required>
                                </div>
                                <div style="display:none; color:red" id="province_check">
                                    Isi Provinsi!
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="towncity">Town / City</label>
                                    <input name="city" type="text" class="form-control" placeholder="" required>
                                </div>
                                <div style="display:none; color:red" id="city_check">
                                    Isi Kota!
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcodezip">Postcode / ZIP *</label>
                                    <input name="postcode" type="text" class="form-control" placeholder="" required>
                                </div>
                                <div style="display:none; color:red" id="postcode_check">
                                    Isi Kode Pos!
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" type="text" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email Address</label>
                                    <input name="email" type="text" value="<?php echo $_SESSION['email'] ?>" class="form-control" placeholder="" readonly required>
                                </div>
                            </div>
                            <div class="w-100"></div>
                        </div>
                    </form><!-- END -->
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3>Cart Totals</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span id="subtotal"></span>
                                </p>
                                <p class="d-flex">
                                    <span>Delivery</span>
                                    <span id="delivery"></span>
                                </p>
                                <p class="d-flex">
                                    <span id="htax"></span>
                                    <span id="tax"></span>
                                </p>
                                <p class="d-flex">
                                    <span id="hdiscount"></span>
                                    <span id="discount"></span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span id="totalAll"></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form id="form2">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Payment Method</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" value="Transfer bank" class="mr-2"> Transfer Bank</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" value="Virtual account" class="mr-2"> Virtual Account</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" value="Cash on delivery" class="mr-2"> Cash On Delivery</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display:none; color:red" id="metode_check">
                                        Pilih metode pembayaran!
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label><input name="agree" type="checkbox" value="Setuju" class="mr-2" required> I have read and accept the terms and conditions</label>
                                            </div>
                                            <div style="display:none; color:red" id="agree_check">
                                                Setujui dahulu!
                                            </div>
                                        </div>
                                    </div>
                                    <p><a href="#" id="submit" class="btn btn-primary py-3 px-4">Place an order</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->






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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

    <script>
        let subtotal = <?php echo $_SESSION["cart"]['subtotal']; ?>;
        let delivery = <?php echo $_SESSION["cart"]['delivery']; ?>;
        let data_barang = <?php echo $data_barang; ?>;
        let id_disc = <?php echo $_SESSION["cart"]['id_disc']; ?>;
        let discount = <?php echo $_SESSION["cart"]['discount']; ?>;;
        let discountm = 0;
        let tax = <?php echo $_SESSION["cart"]['tax']; ?>;
        let taxm = 0;
        let id_user = "<?php echo base64_encode($id); ?>";
        let order_date = "<?php echo $now; ?>";
        let total_amount = 0;

        Hitunghbarang();

        function Hitunghbarang() {
            // let subtotal2 = 0;
            let totalAll = 0;

            discountm = discount / 100 * subtotal;
            taxm = tax / 100 * subtotal;
            document.getElementById("htax").innerHTML = "Tax (" + tax + "%)";
            document.getElementById("hdiscount").innerHTML = "Discount (" + discount + "%)";
            document.getElementById("tax").innerHTML = formatRupiah(parseInt(taxm), 'Rp ');
            document.getElementById("discount").innerHTML = formatRupiah(parseInt(discountm), 'Rp ');
            document.getElementById("subtotal").innerHTML = formatRupiah(parseInt(subtotal), 'Rp ');
            totalAll = subtotal + taxm + delivery - discountm;
            total_amount = totalAll;
            document.getElementById("totalAll").innerHTML = formatRupiah(parseInt(totalAll), 'Rp ');
            document.getElementById("delivery").innerHTML = formatRupiah(parseInt(delivery), 'Rp ');

        }

        $(document).ready(function() {
            $(document).on("keyup", "input[name=street]", function(e) {
                e.preventDefault();
                $("#street_check").hide();
            });
            $(document).on("keyup", "input[name=province]", function(e) {
                e.preventDefault();
                $("#province_check").hide();
            });
            $(document).on("keyup", "input[name=city]", function(e) {
                e.preventDefault();
                $("#city_check").hide();
            });
            $(document).on("keyup", "input[name=postcode]", function(e) {
                e.preventDefault();
                $("#postcode_check").hide();
            });
            $(document).on("change", "input[name=optradio]", function(e) {
                e.preventDefault();
                $("#metode_check").hide();
            });
            $(document).on("change", "input[name=agree]", function(e) {
                e.preventDefault();
                $("#agree_check").hide();
            });
            $(document).on("click", "#submit", function(e) {
                e.preventDefault();
                let first = $("input[name=firstname]").val();
                let last = $("input[name=lastname]").val();
                let country = $("#country").find(":selected").val();
                let street = $("input[name=street]").val();
                let province = $("input[name=province]").val();
                let city = $("input[name=city]").val();
                let postcode = $("input[name=postcode]").val();
                let phone = $("input[name=phone]").val();
                let email = $("input[name=email]").val();
                let option = $("input[name=optradio]:checked").val();
                let alamat_lengkap = street + ', ' + city + ', ' + province + ', ' + country + ', ' + postcode;

                if (country == '') {
                    $("#country_check").show();
                } else if (street == '') {
                    $("#street_check").show();
                } else if (province == '') {
                    $("#province_check").show();
                } else if (city == '') {
                    $("#city_check").show();
                } else if (postcode == '') {
                    $("#postcode_check").show();
                } else if ($("input[name=optradio]:checked").length == 0) {
                    $("#metode_check").show();
                } else if (!$("input[name=agree]").prop("checked")) {
                    $("#agree_check").show();
                } else {
                    $.ajax({
                        url: 'backend/insert_order.php',
                        type: 'POST',
                        // dataType: 'JSON',
                        data: {
                            id_user: id_user,
                            order_date: order_date,
                            total_amount: total_amount,
                            id_disc: id_disc,
                            alamat_lengkap: alamat_lengkap,
                            option: option,
                            tax: tax,
                            data_barang: data_barang,
                            discount: discount,
                        },
                        success: function(data) {
                            Swal.fire(
                                'Berhasil',
                                data,
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "cart.php";
                                }
                            })
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>