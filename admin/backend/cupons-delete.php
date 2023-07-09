<?php
// koneksi database
include '../../config.php';

// menangkap data id yang di kirim dari url
$coupon_id = $_POST['coupon_id'];


// menghapus data dari database
mysqli_query($conn, "delete from coupons where coupon_id='$coupon_id'");

$alert = "Sukses.";
echo $alert;
