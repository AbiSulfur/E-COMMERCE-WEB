<?php
include 'Koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap input form
    $nama_penerima   = $_POST['nama_penerima'];
    $alamat_penerima = $_POST['alamat_penerima'];
    $nomor_hp        = $_POST['nomor_hp'];

    // Hitung total harga dari keranjang
    $total_harga = 0;
    $query_keranjang = mysqli_query($koneksi, "
        SELECT k.*, p.harga
        FROM keranjang k
        JOIN produk p ON k.produk_id = p.id
    ");

    while ($row = mysqli_fetch_assoc($query_keranjang)) {
        $subtotal = $row['jumlah'] * $row['harga'];
        $total_harga += $subtotal;
    }

    // Masukkan ke tabel checkout
    mysqli_query($koneksi, "INSERT INTO checkout 
        (nama_penerima, alamat_penerima, nomor_hp, total_harga) 
        VALUES 
        ('$nama_penerima', '$alamat_penerima', '$nomor_hp', '$total_harga')");

    // Ambil ID checkout terakhir
    $checkout_id = mysqli_insert_id($koneksi);

    // Masukkan detail barang
    $query_keranjang = mysqli_query($koneksi, "
        SELECT k.*, p.harga
        FROM keranjang k
        JOIN produk p ON k.produk_id = p.id
    ");

    while ($row = mysqli_fetch_assoc($query_keranjang)) {
        $subtotal = $row['jumlah'] * $row['harga'];
        mysqli_query($koneksi, "INSERT INTO checkout_detail 
            (checkout_id, produk_id, jumlah, harga_total)
            VALUES 
            ('$checkout_id', '".$row['produk_id']."', '".$row['jumlah']."', '$subtotal')");
    }

    // Kosongkan keranjang
    mysqli_query($koneksi, "DELETE FROM keranjang");

    // Langsung arahkan ke riwayat.php
    header("Location: riwayat.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        body {
            background-color: #161129; /* Warna dasar sesuai gambar */
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #6236ff; /* Warna lebih gelap seperti di gambar */
            color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #2D1057;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #6236ff; /* Warna ungu dari gambar */
        }
        img {
            max-width: 100px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #6236ff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #42279b;
            color: white;
        }

        h1 {
            color: white;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Form Checkout</h2>
    <form method="POST">
        <p>
            <label>Nama Penerima:</label><br>
            <input type="text" name="nama_penerima" required>
        </p>
        <p>
            <label>Alamat Penerima:</label><br>
            <textarea name="alamat_penerima" required></textarea>
        </p>
        <p>
            <label>Nomor HP:</label><br>
            <input type="text" name="nomor_hp" required>
        </p>
        <button type="submit">Proses Checkout</button>
    </form>
</body>
</html>
