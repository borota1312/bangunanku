<?php
include '../../config.php';
// menangkap data yang di kirim dari form
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$stock_quantity = $_POST['stock_quantity'];
$description = $_POST['description'];

if (file_exists($_FILES['image_url']['tmp_name']) || is_uploaded_file($_FILES['image_url']['tmp_name'])) {
    // ambil data file
    $namaFile = $_FILES['image_url']['name'];
    $namaSementara = $_FILES['image_url']['tmp_name'];
    $dirUpload = "images/";
    $namaFile = $dirUpload . $namaFile;
    if (file_exists($namaFile)) {
        unlink($namaFile);
    }
    // // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $namaFile);
}

$sql = mysqli_query($conn, "update products set product_name='$product_name', price='$price', description='$description', category_id='$category_id', stock_quantity='$stock_quantity' where product_id='$product_id'");
if ($sql === TRUE) {
    mysqli_query($conn, "delete from product_images where product_id='$product_id'");
    mysqli_query($conn, "insert into product_images value('', '$product_id', '$namaFile')");
    $_SESSION["sukses"] = 'Data Berhasil Disimpan';
} else {
    $_SESSION["error"] = 'Data Gagal Disimpan';
}
header("location: ../products.php");
