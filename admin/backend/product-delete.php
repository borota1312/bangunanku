<?php
// koneksi database
include '../../config.php';

// menangkap data id yang di kirim dari url
$product_id = $_POST['product_id'];


// menghapus data dari database
mysqli_query($conn, "delete from product_images where product_id='$product_id'");
mysqli_query($conn, "delete from products where product_id='$product_id'");

$alert = "Anda berhasil menghapus data.";
echo $alert;
