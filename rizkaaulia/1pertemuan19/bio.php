<?php

// Menyimpan nama siswa dalam bentuk string

$nama = "rizka aulia<br>";



// Menyimpan umur siswa dalam bentuk integer

$umur = 16;



// Menyimpan tinggi badan dalam bentuk float

$tinggi_badan = 162.5;



// Menyimpan status apakah siswa aktif dalam bentuk Boolean

$is_siswa_aktif = true;


// Mendefinisikan konstanta SEKOLAH yang berisi nama sekolah

define("Sekolah", "SMK 1 KARANG BARU");

// Menampilkan informasi siswa menggunakan echo
echo "=== Biodata Siswa ===\n";
echo "Nama: $nama<br>";
echo "Umur: $umur tahun<br>";
echo "Tinggi Badan: $tinggi_badan cm<br>";
echo "Status Siswa Aktif: " . ($is_siswa_aktif ? "Ya" : "Tidak") . "<br>";
echo "Sekolah: " . Sekolah . "<br><br>";
// Menampilkan tipe data dan nilai dari dua variable
echo "=== Informasi Tipe Data ===<br>";
var_dump($tinggi_badan); // Menampilkan tipe data dan nilai dari tinggi_badan
var_dump($is_siswa_aktif); // Menampilkan tipe data dan nilai dari is_siswa_aktif
?>
<?php
// Menyimpan nama siswa dalam bentuk string
$nama = "rizka aulia<br>";
// Menyimpan umur siswa dalam bentuk integer
$umur = 16;
// Menyimpan tinggi badan dalam bentuk float
$tinggi_badan = 162.5;
// Menyimpan status apakah siswa aktif dalam bentuk boolean
$is_siswa_aktif = true;
// Mendefinisikan konstanta SEKOLAH yang berisi nama sekolah
define("Sekolah: ", "SMK 1 KARANG BARU");
// Menampilkan informasi siswa menggunakan echo
echo "=== Biodata Siswa ===<br>";
echo "Nama: $nama<br>";
echo "Umur: $umur tahun<br>";
echo "Tinggi Badan: $tinggi_badan cm<br>";
echo "Status Siswa Aktif: " . ($is_siswa_aktif ? "Ya" : "Tidak") . "<br>";
echo "Sekolah: " . Sekolah ,"<br>";
// Menampilkan tipe data dan nilai dari dua variabel
echo "=== Informasi Tipe Data ===<br>";
var_dump($tinggi_badan); // Menampilkan tipe data dan nilai dari tinggi_badan
var_dump($is_siswa_aktif); // Menampilkan tipe data dan nilai dari is_siswa_aktif
?>