<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require '../config.php';
$id_user = base64_decode($_POST['id_user']);
$order_date = $_POST['order_date'];
$total_amount = intval($_POST['total_amount']);
$id_disc = intval($_POST['id_disc']);
$alamat_lengkap = $_POST['alamat_lengkap'];
$option = $_POST['option'];
$tax = floatval($_POST['tax']);
$data_barang = $_POST['data_barang'];
$discount = floatval($_POST['discount']);

if ($id_disc == 0) {
    $que = "INSERT INTO orders(user_id, order_date, total_amount, coupon_id, shipping_address, payment_status, tax) VALUES ('$id_user','$order_date','$total_amount',NULL,'$alamat_lengkap','$option','$tax')";
} else {
    $que = "INSERT INTO orders(user_id, order_date, total_amount, coupon_id, shipping_address, payment_status, tax) VALUES ('$id_user','$order_date','$total_amount','$id_disc','$alamat_lengkap','$option','$tax')";
}

$res = mysqli_query($conn, $que);

$query = "SELECT * FROM orders WHERE user_id='$id_user' AND order_date='$order_date' AND total_amount='$total_amount' AND shipping_address='$alamat_lengkap' AND payment_status='$option'";
$result = mysqli_query($conn, $query);
$baris = mysqli_fetch_assoc($result);
$id_order = $baris['order_id'];

$que = "INSERT INTO order_history(user_id, order_id, order_date, total_amount, shipping_address) VALUES ('$id_user','$id_order','$order_date','$total_amount','$alamat_lengkap')";
$res = mysqli_query($conn, $que);

foreach ($data_barang as $item) {
    $product_id = $item['id_barang'];
    $quantity = $item['quantity'];
    $price = $item['price_per_unit'];

    $que = "INSERT INTO order_items(order_id, product_id, quantity, price_per_unit, discount_amount) VALUES ('$id_order','$product_id','$quantity','$price','$discount')";
    $res = mysqli_query($conn, $que);

    $que = "DELETE FROM cart WHERE product_id=$product_id AND user_id=$id_user";
    $res = mysqli_query($conn, $que);
}
$_SESSION["cart"] = [];
$alert = "Anda berhasil melakukan pemesanan.";
echo $alert;
