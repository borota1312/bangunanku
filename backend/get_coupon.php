<?php
require '../config.php';
$kode = $_POST['kode'];
$query = "SELECT * FROM coupons WHERE coupon_code='$kode'";
$result = mysqli_query($conn, $query);
$baris = mysqli_fetch_assoc($result);
$idk = $baris['coupon_id'];
$percent = floatval($baris['discount_percentage']);
$data = [
    'id' => $idk,
    'percent' => $percent
];
echo json_encode($data);
