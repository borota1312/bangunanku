<?php
// koneksi database
include '../../config.php';

// menangkap data id yang di kirim dari url
$category_id = $_POST['category_id'];


// menghapus data dari database
mysqli_query($conn, "delete from categories where category_id='$category_id'");

$alert = "Anda berhasil melakukan pemesanan.";
echo $alert;
