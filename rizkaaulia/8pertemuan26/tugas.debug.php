<?php
// Debugging step 1: Aktifkan error reporting untuk menampilkan semua error, warning, dan notice
// Ini penting agar PHP menampilkan jika ada variabel yang salah atau undefined
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Variabel
$nama_siswa = "rizka";
$nilai_matematika = 75;

// Kesalahan sengaja: Typo variabel untuk status.
// Seharusnya: $status = ...
// Tapi dibuat salah: menggunakan nama yang berbeda
$status_kelulusan = ""; // akan diisi kemudian

// Logika menentukan status kelulusan: nilai >= 70 maka "Lulus", else "Tidak Lulus"
if ($nilai_matematika >= 70) {
    $status = "Lulus"; // <-- variabel berbeda: $status, bukan $status_kelulusan
} else {
    $status = "Tidak Lulus";
}

// Debugging step 2: Gunakan var_dump() untuk memeriksa variabel-variabel
echo "<pre>";
echo "Debug variabel: \n";
var_dump($nama_siswa, $nilai_matematika, $status, $status_kelulusan);
echo "</pre>";

// Output informasi siswa
echo "Nama Siswa: " . $nama_siswa . "<br>";
echo "Nilai Matematika: " . $nilai_matematika . "<br>";

// Perbaikan: gunakan variabel yang benar untuk status kelulusan
// Komentar: mengubah menjadi $status_kelulusan agar sesuai logic
echo "Status Kelulusan: " . $status_kelulusan; // ini masih kosong—butuh perbaikan
?>