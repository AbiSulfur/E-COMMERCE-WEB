<?php
include 'Koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "delete from keranjang where id='$id'");
header("Location: keranjang.php");
exit;
?>
