<?php
$koneksi = new mysqli('localhost', 'root', '','db_uas_mic');

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
} 
?>