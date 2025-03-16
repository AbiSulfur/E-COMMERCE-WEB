<?php
include 'Koneksi.php';

$id = $_GET['id'];
$aksi = $_GET['aksi'];

// Ambil data item keranjang
$q = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id = '$id'");
$row = mysqli_fetch_assoc($q);

if ($aksi == 'tambah') {
    $jumlah_baru = $row['jumlah'] + 1;
    mysqli_query($koneksi, "UPDATE keranjang SET jumlah = '$jumlah_baru' WHERE id = '$id'");
} elseif ($aksi == 'kurang') {
    if ($row['jumlah'] > 1) {
        $jumlah_baru = $row['jumlah'] - 1;
        mysqli_query($koneksi, "UPDATE keranjang SET jumlah = '$jumlah_baru' WHERE id = '$id'");
    } else {
        // Jika jumlah tinggal 1 dan dikurangi lagi, hapus item
        mysqli_query($koneksi, "DELETE FROM keranjang WHERE id = '$id'");
    }
}

header("Location: keranjang.php");
exit;
?>
