db<?php
session_start();
include "../koneksi.php";

// Cek apakah role admin
if (!isset($_GET['role']) || $_GET['role'] != "admin") {
    echo "<script>alert('Akses ditolak!'); window.location='../index.php';</script>";
    exit;
}

// Ambil data dari form
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

// Query ke tabel admin
$query = mysqli_query($koneksi, "
    SELECT * FROM admin 
    WHERE username='$username' AND password='$password'
");

$data = mysqli_fetch_assoc($query);

// Jika data ditemukan
if ($data) {
    // Set session
    $_SESSION['idadmin'] = $data['idadmin'];
    $_SESSION['nama']    = $data['nama'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['foto']    = $data['foto'];
    $_SESSION['role']    = "admin";

    // Redirect ke dashboard admin
    echo "<script>
        alert('Login berhasil! Selamat datang admin $data[nama]');
        window.location='../index.php?halaman=dashboardadmin';

    </script>";
} else {
    // Login gagal
    echo "<script>
        alert('Username atau password salah!');
        window.location='../views/admin/loginadmin.php';
    </script>";
}
?>
