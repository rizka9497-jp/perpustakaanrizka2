<?php

// Fungsi untuk menghitung rata-rata dari tiga nilai
function hitungRataNilai($nilai1, $nilai2, $nilai3) {
    // Mengembalikan hasil penjumlahan dari ketiga nilai dibagi 3
    return ($nilai1 + $nilai2 + $nilai3) / 3;
}

// Mendefinisikan nilai-nilai yang akan dihitung
$nilaiSiswa1 = 80;
$nilaiSiswa2 = 90;
$nilaiSiswa3 = 75;

// Memanggil fungsi dan menyimpan nilai yang dikembalikan
$rataRata = hitungRataNilai($nilaiSiswa1, $nilaiSiswa2, $nilaiSiswa3);

// Menampilkan hasil rata-rata
echo "Nilai rata-rata siswa adalah: " . $rataRata;

?>