<?php 

// Session adalah tempat menyimpan data sementara di server untuk mengingat siapa yang sedang login. Dengan menggunakan session, kita dapat menyimpan informasi tentang pengguna yang sedang login, seperti ID pengguna, nama pengguna, atau peran pengguna. Session memungkinkan kita untuk mengakses informasi ini di seluruh halaman web tanpa harus meminta pengguna untuk login kembali setiap kali mereka mengunjungi halaman baru.

session_start(); // Memulai session
include("pages/header/config.php");

// jika tombol login ditekan 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Uname = $_POST['username'];
    $Pass = $_POST['password'];

    // cek db
    $query = mysqli_query($koneksi, "SELECT * FROM `tbl_siswa` WHERE Username='$Uname' AND Password='$Pass'");

    // jika data ada
    if(mysqli_num_rows($query) == 1) {
        $data = mysqli_fetch_assoc($query);
        // var data (id, nama, kelas, jurusan)

        // Simpan dalam Session
        $_SESSION['login'] = true;
        $_SESSION['Nomor'] = $data['Nomor'];
        $_SESSION['Nama'] = $data['Nama'];

        // jika login berhasil, diarahkan ke index.php
        echo"<script> 
            alert('Login Berhasil');
            window.location='index.php';
        </script>";
    } else {
        echo"<script> 
            alert('Login Gagal');
            window.location='login.php';
        </script>";
    }
}
?>