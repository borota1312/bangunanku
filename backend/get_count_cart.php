<?php
require '../config.php';
$idUser = base64_decode($_POST['id_user']);
$query = "SELECT * FROM cart WHERE user_id='$idUser'";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
echo json_encode($row);
