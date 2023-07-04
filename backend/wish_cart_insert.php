<?php
require '../config.php';
$cartId = $_POST['cart_id'];
$idUser = base64_decode($_POST['id_user']);

$gq = "SELECT * FROM products WHERE product_id='$cartId'";
$hasil = mysqli_query($conn, $gq);
$baris = mysqli_fetch_assoc($hasil);
$nama_barang = $baris["product_name"];

$query = "SELECT * FROM cart WHERE product_id='$cartId' AND user_id='$idUser'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $cart_id = $row['product_id'];
    $jumlah = $row["quantity"] + 1;
    $que = "UPDATE cart SET quantity = $jumlah WHERE product_id='$cart_id' AND user_id='$idUser'";
    $alert = $nama_barang . " berhasil di pindah ke keranjang, dan sekarang jumlahnya jadi " . $jumlah;
} else if (mysqli_num_rows($result) == 0) {
    $cart_id = $cartId;
    $jumlah = 1;
    $que = "INSERT INTO cart(user_id, product_id, quantity) VALUES ('$idUser','$cart_id','$jumlah')";
    $alert = $nama_barang . " berhasil di pindah ke keranjang anda.";
}
$res = mysqli_query($conn, $que);

$que = "DELETE FROM wishlist WHERE product_id=$cartId AND user_id=$idUser";
$res = mysqli_query($conn, $que);
echo $alert;
