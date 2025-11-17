<?php

function cekNamaLengkap($nama) {
    // Menampilkan jumlah karakter dari nama lengkap
    echo "Jumlah karakter dari nama " . $nama . " adalah: " . strlen($nama) . " karakter.\n";

    // Menampilkan tanggal saat ini
    echo "Tanggal hari ini adalah: " . date("d M Y") . "\n";
}

// Contoh pemanggilan fungsi
cekNamaLengkap("rizka aulia");

?>