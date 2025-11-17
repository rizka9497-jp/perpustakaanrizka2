<?php
// Pastikan metode pengiriman data adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama = htmlspecialchars($_POST['nama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $email = htmlspecialchars($_POST['email']);

    // Tampilkan data dalam format yang diminta
    echo "Selamat datang, " . $nama . "!<br>";
    echo "Anda terdaftar dari kelas " . $kelas . " dan akan kami hubungi melalui " . $email . ".";
}
?>