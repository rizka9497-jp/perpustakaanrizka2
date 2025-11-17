<?php

$umur = 30;

if ($umur < 17) {
    $kategori = "Anak-anak";
} elseif ($umur >= 17 && $umur <= 25) {
    $kategori = "Remaja";
} elseif ($umur >= 26 && $umur <= 45) {
    $kategori = "Dewasa";
} else {
    $kategori = "Lansia";
}

echo "Usia Anda adalah " . $umur . " tahun, Anda termasuk dalam kategori " . $kategori . ".";

?>