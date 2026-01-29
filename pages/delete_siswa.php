<?php
include("config.php");

// ambil id dari URL
$id = $_GET['id'] ?? null;

// Proses Delete
mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE Nomor='$id'");

// Kembali ke Page Siswa
header("location: siswa.php");
?>