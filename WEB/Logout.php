<?php
session_start();
session_destroy(); // Hancurkan semua session
header("Location: Index Pertama.php"); // Arahkan kembali ke halaman login
exit();
?>