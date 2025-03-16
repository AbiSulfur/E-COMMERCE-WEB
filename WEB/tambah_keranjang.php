<?php
include 'Koneksi.php';

if (isset($_GET['id'])) {
    $produk_id = $_GET['id'];
    $cek = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE produk_id = '$produk_id'");
    if (mysqli_num_rows($cek) > 0) {
        mysqli_query($koneksi, "UPDATE keranjang SET jumlah = jumlah + 1 WHERE produk_id = '$produk_id'");
    } else {
        mysqli_query($koneksi, "INSERT INTO keranjang (produk_id, jumlah) VALUES ('$produk_id', 1)");
    }

    header("Location: keranjang.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>
