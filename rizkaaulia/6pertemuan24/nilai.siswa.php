<?php

// Function untuk menghitung rata-rata dari tiga nilai
function rataRata($n1, $n2, $n3) {
    return ($n1 + $n2 + $n3) / 3;
}

// Function untuk menentukan kategori berdasarkan nilai
function kategori($nilai) {
    if ($nilai >= 90) {
        return "A";
    } elseif ($nilai >= 80) {
        return "B";
    } elseif ($nilai >= 70) {
        return "C";
    } elseif ($nilai >= 60) {
        return "D";
    } else {
        return "E";
    }
}

// Tiga nilai yang akan dihitung
$nilai1 = 78;
$nilai2 = 84;
$nilai3 = 91;

// Hitung rata-rata
$rata_rata_siswa = rataRata($nilai1, $nilai2, $nilai3);

// Tentukan kategori
$kategori_siswa = kategori($rata_rata_siswa);

// Tampilkan hasil
echo "Nilai 1: " . $nilai1 . "\n";
echo "Nilai 2: " . $nilai2 . "\n";
echo "Nilai 3: " . $nilai3 . "\n";
echo "Rata-rata: " . number_format($rata_rata_siswa, 2) . "\n";
echo "Kategori: " . $kategori_siswa . "\n";

?>