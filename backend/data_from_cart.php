<?php
require '../config.php';
$id_user = base64_decode($_POST['id_user']);
$data_barang = $_POST['data_barang'];
$id_disc = $_POST['id_disc'];
$discount = $_POST['discount'];
$subtotal = $_POST['subtotal'];
$delivery = $_POST['delivery'];
$tax = $_POST['tax'];

$_SESSION["cart"]["data_barang"] = $data_barang;
$_SESSION["cart"]["subtotal"] = $subtotal;
$_SESSION["cart"]["delivery"] = $delivery;
$_SESSION["cart"]["tax"] = $tax;
$_SESSION["cart"]["id_disc"] = $id_disc;
$_SESSION["cart"]["discount"] = $discount;

echo json_encode($_SESSION);
