<?php

$koneksi = mysqli_connect("localhost","root","","e-commerce");

if (mysqli_connect_errno()) {
    echo "Koneksi Database Gagal : " . mysqli_connect_errno(); 
}

?>