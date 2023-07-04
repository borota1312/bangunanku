<?php
// koneksi database
include '../../config.php';

// menangkap data yang di kirim dari form
$category_name = $_POST['category_name'];
$category_description = $_POST['category_description'];

// menginput data ke database
mysqli_query($conn, "insert into categories values('','$category_name','$category_description')");

$_SESSION["sukses"] = 'Data Berhasil Disimpan';

header("location: ../category.php");
