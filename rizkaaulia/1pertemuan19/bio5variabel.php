<?php
// Mendefinisikan konstanta sekolah
define("SEKOLAH", "SMK NEGERI 1 KARANG BARU"); // Konstanta digunakan karena nilai sekolah tidak berubah

// Membuat variabel biodata
$nama = "rizka aulia";                    // Tipe data string untuk menyimpan nama lengkap
$usia = 16;                               // Tipe data integer karena usia berupa angka bulat
$tinggi_badan = 160.5;                     // Tipe data float karena tinggi badan bisa mengandung desimal
$status_aktif = true;                   // Tipe data boolean untuk menunjukkan status aktif (true/false)
$email = "rizka9497@gmail.com";             // Tipe data string karena email berupa teks

// Menampilkan data menggunakan echo
echo "<h2>Biodata Siswa</h2>";
echo "Nama: $nama<br>";
echo "Usia: $usia tahun<br>";
echo "Tinggi Badan: $tinggi_badan cm<br>";
echo "Status Aktif: " . ($status_aktif ? "Aktif" : "Tidak Aktif") . "<br>"; // Ternary operator untuk boolean
echo "Email: $email<br>";
echo "Sekolah: " . SEKOLAH . "<br><br>";

// Menampilkan struktur dan tipe data dengan var_dump()
echo "<h3>Debugging dengan var_dump()</h3>";
var_dump($nama);
echo "<br>";
var_dump($usia);
echo "<br>";
var_dump($tinggi_badan);
echo "<br>";
var_dump($status_aktif);
echo "<br>";
var_dump($email);
echo "<br>";
var_dump(SEKOLAH);
?>