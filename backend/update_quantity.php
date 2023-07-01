<?php
require '../config.php';
$updateId = $_POST['id'];
$idUser = base64_decode($_POST['id_user']);
$qty = $_POST['qty'];

$que = "UPDATE cart SET quantity = $qty WHERE product_id='$updateId' AND user_id='$idUser'";
$res = mysqli_query($conn, $que);
