<?php

/**
 * Menghitung harga akhir setelah dikurangi diskon.
 *
 * @param float $harga Harga awal produk.
 * @param float $persen Persentase diskon (contoh: 20 untuk 20%).
 * @return float Harga akhir setelah diskon.
 */
function hitungDiskon($harga, $persen) {
    // Menghitung jumlah diskon
    $jumlahDiskon = $harga * ($persen / 100);
    
    // Menghitung harga setelah diskon
    $hargaSetelahDiskon = $harga - $jumlahDiskon;
    
    // Mengembalikan nilai harga akhir
    return $hargaSetelahDiskon;
}

// Contoh pemanggilan fungsi
echo hitungDiskon(100000, 20); // Output: 80000

?>