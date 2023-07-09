<?php
// koneksi database
include '../../config.php';

// menangkap data yang di kirim dari form
$coupon_id = $_POST['coupon_id'];
$coupon_code = $_POST['coupon_code'];
$discount_percentage = $_POST['discount_percentage'];
$expiration_date = $_POST['expiration_date'];
$terms_condition = $_POST['terms_condition'];

// menginput data ke database
mysqli_query($conn, "UPDATE `coupons` SET `coupon_code` = '$coupon_code', `discount_percentage` = '$discount_percentage', `expiration_date` = '$expiration_date', `terms_condition` = '$terms_condition' WHERE `coupons`.`coupon_id` = '$coupon_id'; ");

$_SESSION["sukses"] = 'Data Berhasil Diupdate';

header("location: ../cupons.php");
