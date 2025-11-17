<?php
// produk_array.php

// Daftar produk dan harganya (dalam rupiah)
$produk = [
    "Laptop" => 7500000,
    "Mouse" => 150000,
    "Printer" => 1200000
];

// Menampilkan daftar produk
echo "<h2>Daftar Produk Toko Online</h2>";
echo "<ul>";
foreach ($produk as $nama => $harga) {
    echo "<li>$nama: Rp " . number_format($harga, 0, ',', '.') . "</li>";
}
echo"</ul>";
?>