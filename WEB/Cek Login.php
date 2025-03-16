<?php 
session_start();
include 'Koneksi.php';

$email    = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// 1. Ambil data user berdasarkan email, username, dan password (tanpa level).
$data = mysqli_query($koneksi, 
    "SELECT * FROM user 
     WHERE email='$email' 
       AND username='$username' 
       AND password='$password' 
     LIMIT 1"
);

// 2. Cek apakah data ditemukan.
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    // 3. Ambil detail user
    $d = mysqli_fetch_assoc($data);

    // 4. Simpan data ke session
    $_SESSION['email']    = $d['email'];
    $_SESSION['username'] = $d['username'];
    $_SESSION['level']    = $d['level'];
    $_SESSION['status']   = "login";

    // 5. Arahkan halaman berdasarkan level user
    if ($d['level'] == "Admin") {
        header("Location: index.php");
    } else {
        header("Location: HOMEPAGE PHP (2).php");
    }
} else {
    // 6. Jika tidak ditemukan, tampilkan pesan gagal
    header("Location: Index Pertama.php?pesan=gagal");
}
?>
