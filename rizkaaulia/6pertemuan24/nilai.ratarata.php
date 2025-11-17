<?php

/**
 * Menghitung rata-rata dari tiga nilai.
 *
 * @param float $n1 Nilai pertama.
 * @param float $n2 Nilai kedua.
 * @param float $n3 Nilai ketiga.
 * @return float Rata-rata dari ketiga nilai.
 */
function rataRata($n1, $n2, $n3) {
    return ($n1 + $n2 + $n3) / 3;
}

/**
 * Menentukan kategori nilai berdasarkan skala.
 *
 * @param float $nilai Nilai yang akan dikategorikan.
 * @return string Kategori nilai (A, B, C, D, atau E).
 */
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

// Contoh penggunaan:
$nilai1 = 85;
$nilai2 = 92;
$nilai3 = 78;

// Menghitung rata-rata
$rata_rata_hasil = rataRata($nilai1, $nilai2, $nilai3);

// Menentukan kategori
$kategori_hasil = kategori($rata_rata_hasil);

// Menampilkan hasil
echo "Nilai 1: " . $nilai1 . "<br>";
echo "Nilai 2: " . $nilai2 . "<br>";
echo "Nilai 3: " . $nilai3 . "<br>";
echo "-------------------<br>";
echo "Rata-rata: " . number_format($rata_rata_hasil, 2) . "<br>";
echo "Kategori: " . $kategori_hasil . "<br>";

?>