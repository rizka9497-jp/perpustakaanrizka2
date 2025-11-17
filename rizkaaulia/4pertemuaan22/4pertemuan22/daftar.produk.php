<?php
// daftar_produk.php

// Membuat array asosiatif berisi 5 produk
$produk = [
    "Pensil" => 2000,
    "Buku" => 5000,
    "Pulpen" => 3000,
    "Penggaris" => 2500,
    "Penghapus" => 1500
];

// Menampilkan daftar produk menggunakan <ul>
echo "<h2>Daftar Produk</h2>";
echo "<ul>";
foreach ($produk as $nama => $harga) {
    echo "<li>Nama Produk: $nama - Harga: $harga</li>";
}
echo"</ul>";
?>