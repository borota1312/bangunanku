<?php
include '../../config.php';

// menangkap data yang di kirim dari form
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$stock_quantity = $_POST['stock_quantity'];
$category_description = $_POST['category_description'];

// ambil data file
$namaFile = $_FILES['image_url']['name'];
$namaSementara = $_FILES['image_url']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "images/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
$namaFile = $dirUpload . $namaFile;



// menginput data ke database
$sql = mysqli_query($conn, "insert into products values('','$product_name','$price', '$category_description', '$category_id', '$stock_quantity')");
if ($sql === TRUE) {
    $last_id = mysqli_insert_id($conn);
    mysqli_query($conn, "insert into product_images value('', '$last_id', '$namaFile')");
    $_SESSION["sukses"] = 'Data Berhasil Disimpan';
} else {
    $_SESSION["error"] = 'Data Gagal Disimpan';
}


header("location: ../products.php");
