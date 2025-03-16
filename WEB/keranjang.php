<?php
include 'Koneksi.php';

// Ambil data keranjang
$query = mysqli_query($koneksi, "
    SELECT k.id, k.produk_id, k.jumlah,
           p.nama_barang, p.harga, p.gambar_produk
    FROM keranjang k
    JOIN produk p ON k.produk_id = p.id
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
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
    <h2>Keranjang Belanja</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $total_semua = 0;
        while($row = mysqli_fetch_assoc($query)) {
            $subtotal = $row['harga'] * $row['jumlah'];
            $total_semua += $subtotal;
        ?>
        <tr>
            <td>
                <?php if(!empty($row['gambar_produk'])) { ?>
                    <img src="Tugas2/gambar/<?php echo $row['gambar_produk']; ?>" width="80">
                <?php } else { ?>
                    <img src="noimage.png" width="80">
                <?php } ?>
            </td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td>Rp.<?php echo number_format($row['harga']); ?></td>
            <td>
                <!-- Tombol minus -->
                <a href="update_keranjang.php?aksi=kurang&id=<?php echo $row['id']; ?>"> - </a>
                <?php echo $row['jumlah']; ?>
                <a href="update_keranjang.php?aksi=tambah&id=<?php echo $row['id']; ?>"> + </a>
            </td>
            <td>Rp.<?php echo number_format($subtotal); ?></td>
            <td>
                <a href="hapus_keranjang.php?id=<?php echo $row['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <p><strong>Total: Rp.<?php echo number_format($total_semua); ?></strong></p>
    <a href="index.php">Kembali Belanja</a> | 
    <a href="checkout.php">Checkout</a>
</body>
</html>
