<?php

// kelulusan.php

/**
 * Memeriksa kelulusan berdasarkan nilai.
 *
 * @param int|float $nilai Nilai yang akan diperiksa.
 * @return string Mengembalikan "Lulus" jika nilai >= 75, dan "Tidak Lulus" jika nilai < 75.
 */
function cekLulus($nilai) {
    if ($nilai >= 75) {
        return "Lulus";
    } else {
        return "Tidak Lulus";
    }
}

// Pengujian dengan 3 nilai berbeda
$nilai1 = 80;
$nilai2 = 74;
$nilai3 = 95.5;

echo "Nilai " . $nilai1 . ": " . cekLulus($nilai1) . "\n";
echo "Nilai " . $nilai2 . ": " . cekLulus($nilai2) . "\n";
echo "Nilai " . $nilai3 . ": " . cekLulus($nilai3) . "\n";

?>