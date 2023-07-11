<?php
require '../config.php';
$wishId = $_POST['wish_id'];
$idUser = base64_decode($_POST['id_user']);

$gq = "SELECT * FROM products WHERE product_id='$wishId'";
$hasil = mysqli_query($conn, $gq);
$baris = mysqli_fetch_assoc($hasil);
$nama_barang = $baris["product_name"];

$query = "SELECT * FROM wishlist WHERE product_id='$wishId' AND user_id='$idUser'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $alert = $nama_barang . " sudah ada di Wishlistmu";
} else if (mysqli_num_rows($result) == 0) {
    $que = "INSERT INTO wishlist(user_id, product_id) VALUES ('$idUser','$wishId')";
    $res = mysqli_query($conn, $que);
    $alert = $nama_barang . " berhasil ditambah di Wishlistmu";
}
echo $alert;
