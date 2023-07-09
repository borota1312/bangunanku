<?php
// koneksi database
include '../../config.php';

// menangkap data yang di kirim dari form
$coupon_code = $_POST['coupon_code'];
$discount_percentage = $_POST['discount_percentage'];
$expiration_date = $_POST['expiration_date'];
$terms_condition = $_POST['terms_condition'];

// menginput data ke database
mysqli_query($conn, "insert into coupons values('','$coupon_code','$discount_percentage', '$expiration_date', '$terms_condition')");

$_SESSION["sukses"] = 'Data Berhasil Disimpan';

header("location: ../cupons.php");
