<?php
require '../config.php';
$delete = $_POST['iddelete'];
$idUser = base64_decode($_POST['id_user']);

$gq = "SELECT * FROM products WHERE product_id='$delete'";
$hasil = mysqli_query($conn, $gq);
$baris = mysqli_fetch_assoc($hasil);
$nama_barang = $baris["product_name"];

$gq = "SELECT * FROM cart WHERE product_id='$delete' AND user_id='$idUser'";
$hasil = mysqli_query($conn, $gq);
$baris = mysqli_fetch_assoc($hasil);
$id_delete = $baris["cart_id"];

$que = "DELETE FROM cart WHERE cart_id=$id_delete";
$res = mysqli_query($conn, $que);
$alert = $nama_barang . " berhasil dihapus dari keranjang anda.";
echo $alert;
