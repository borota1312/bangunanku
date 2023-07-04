<?php
// koneksi database
include '../../config.php';

// menangkap data yang di kirim dari form
$category_id = $_POST['category_id'];
$category_name = $_POST['category_name'];
$category_description = $_POST['category_description'];

// update data ke database
mysqli_query($conn, "update categories set category_name='$category_name', category_description='$category_description' where category_id='$category_id'");

$_SESSION["sukses"] = 'Data Berhasil Diupdate';

header("location: ../category.php");
