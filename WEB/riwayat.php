<?php
include 'Koneksi.php';

// Ambil semua data checkout, urutkan dari yang terbaru
$queryCheckout = mysqli_query($koneksi, "SELECT * FROM checkout ORDER BY tanggal_checkout DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <style>
        /* Gaya dasar halaman */
        body {
            background-color: #161129; /* Warna dasar sesuai gambar */
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }

        h2 {
            color: #e0e0e0;
            margin-bottom: 20px;
        }

        /* Garis pemisah */
        hr {
            border: 1px solid #6236ff;
            width: 80%;
            margin: 20px auto;
        }

        /* Gaya tabel */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: linear-gradient(145deg, #40248a, #6236ff); /* Gradasi warna */
            color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        th {
            background-color: #4a1e9a; /* Warna ungu lebih gelap */
            font-weight: bold;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Efek hover */
        }

        /* Gaya tombol */
        a {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 20px;
            background: linear-gradient(145deg, #4a1e9a, #6236ff);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.2);
        }

        a:hover {
            background: #42279b;
            box-shadow: 0 6px 12px rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            table {
                width: 95%;
            }
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <h2>Riwayat Pembelian</h2>

    <?php 
    while ($rowC = mysqli_fetch_assoc($queryCheckout)) {
        $checkout_id = $rowC['id'];
        echo "<hr>";
        echo "<h3>Checkout ID: ".$checkout_id."</h3>";
        echo "<p>Nama Penerima: <b>".$rowC['nama_penerima']."</b></p>";
        echo "<p>Alamat Penerima: <b>".$rowC['alamat_penerima']."</b></p>";
        echo "<p>Nomor HP: <b>".$rowC['nomor_hp']."</b></p>";
        echo "<p>Total Harga: <b>Rp.".number_format($rowC['total_harga'])."</b></p>";
        echo "<p>Tanggal: <b>".$rowC['tanggal_checkout']."</b></p>";

        // Ambil detail item
        $queryDetail = mysqli_query($koneksi, "
            SELECT cd.*, p.nama_barang 
            FROM checkout_detail cd
            JOIN produk p ON cd.produk_id = p.id
            WHERE cd.checkout_id = '$checkout_id'
        ");
        ?>
        <table>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Total</th>
            </tr>
            <?php while($rowD = mysqli_fetch_assoc($queryDetail)) { ?>
            <tr>
                <td><?php echo $rowD['nama_barang']; ?></td>
                <td><?php echo $rowD['jumlah']; ?></td>
                <td>Rp.<?php echo number_format($rowD['harga_total']); ?></td>
            </tr>
            <?php } ?>
        </table>
        <?php
    }
    ?>
    <hr>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
