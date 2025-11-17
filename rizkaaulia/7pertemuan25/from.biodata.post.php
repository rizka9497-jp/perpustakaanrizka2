<?php

// Pastikan data dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    // 1. Validasi: Semua kolom wajib diisi
    if (empty($nama) || empty($umur) || empty($email) || empty($status)) {
        header("Location: form_biodata.php?error=Semua kolom wajib diisi!");
        exit();
    }

    // 2. Validasi: Email harus valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: form_biodata.php?error=Format email tidak valid!");
    exit();
}

    // Jika semua validasi berhasil, Anda bisa melanjutkan memproses data
    // Contoh: Menampilkan data yang telah divalidasi
    echo "<h2>Data Biodata Berhasil Diterima</h2>";
    echo "Nama: " . htmlspecialchars($nama) . "<br>";
    echo "Umur: " . htmlspecialchars($umur) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Status Siswa: " . htmlspecialchars($status) . "<br>";

} else {
    // Jika akses langsung ke file ini, kembalikan ke formulir
    header("Location: form_biodata.php");
    exit();
}
