<?php
// Nilai dari 3 mata pelajaran
$nilai1 = 85;
$nilai2 = 75-84;
$nilai3 = 75;

// 1 Operator Aritmatika: Menghitung total dan rata-rata
$total = $nilai1 + $nilai2 + $nilai3; // Penjumlahan
$rata_rata = $total / 3; // Pembagian

// Tampilkan nilai rata-rata
echo "Rata-rata nilai = $rata_rata <br>";

// 2 Operator Perbandingan + Logika: Menentukan kelulusan
$lulus = $rata_rata >= 75 && $rata_rata <= 100; // true jika rata-rata antara 75–100

// Menampilkan status kelulusan
echo "Status kelulusan: ";
echo $lulus ? "Lulus" : "Tidak Lulus"; // 3 Operator logika ternary
echo "<br>";

// Menentukan kategori nilai berdasarkan rata-rata
if ($rata_rata >= 85) {
    $kategori = "A";
} elseif ($rata_rata >= 75) {
    $kategori = "B";
} else {
    $kategori = "C";
}

// Tampilkan kategori
echo "Kategori nilai: $kategori <br>";

// 4 Gunakan var_dump untuk melihat detail variabel
echo "Debugging rata-rata: ";
var_dump($rata_rata); // Menampilkan tipe data dan nilai
?>