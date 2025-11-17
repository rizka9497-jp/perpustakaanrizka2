<?php

// File: kalkulator_mini.php

// Deklarasi variabel
$a = 15;
$b = 4;

// --- Operasi Matematika ---

// Penjumlahan
$penjumlahan = $a + $b;
echo "Hasil penjumlahan $a + $b adalah: " . $penjumlahan . "<br>";

// Pengurangan
$pengurangan = $a - $b;
echo "Hasil pengurangan $a - $b adalah: " . $pengurangan . "<br>";

// Perkalian
$perkalian = $a * $b;
echo "Hasil perkalian $a * $b adalah: " . $perkalian . "<br>";

// Pembagian (untuk menunjukkan hasil pembagian, meskipun Anda hanya meminta modulus)
$pembagian = $a / $b;
echo "Hasil pembagian $a / $b adalah: " . $pembagian . "<br>";

// Modulus (sisa bagi)
$modulus = $a % $b;
echo "Hasil modulus (sisa bagi) $a % $b adalah: " . $modulus . "<br>";

?>