<?php

// --- Soal 1 & 2: Array Indeks ---

// 1. Membuat array indeks berisi daftar 5 kota besar di Indonesia
$kota = ["Jakarta", "Surabaya", "Bandung", "Medan", "Makassar"];

echo "<h2>Daftar Kota dengan perulangan FOR:</h2>";
// 2. Menampilkan isi array menggunakan perulangan for
for ($i = 0; $i < count($kota); $i++) {
    // Menampilkan elemen array dengan indeksnya
    echo "Kota ke-" . ($i + 1) . ": " . $kota[$i] . "<br>";
}

echo "<br>"; // Baris kosong untuk pemisah

echo "<h2>Daftar Kota dengan perulangan FOREACH:</h2>";
// 2. Menampilkan isi array menggunakan perulangan foreach
foreach ($kota as $nama_kota) {
    // Menampilkan setiap elemen array
    echo "Nama Kota: " . $nama_kota . "<br>";
}


// --- Soal 3 & 4: Array Asosiatif ---

// 3. Membuat array asosiatif berisi data nilai siswa
$nilai = [
    "Andi" => 85,
    "Budi" => 78,
    "Citra" => 92,
    "Dewi" => 95,
    "Eko" => 80
];

echo "<br>"; // Baris kosong untuk pemisah
echo "<h2>Daftar Nilai Siswa:</h2>";
// 4. Menampilkan daftar siswa dan nilai menggunakan foreach
// $nama adalah key (nama siswa) dan $nilai_siswa adalah value (nilai)
foreach ($nilai as $nama => $nilai_siswa) {
    echo "Nama: " . $nama . ", Nilai: " . $nilai_siswa . "<br>";
}

?>