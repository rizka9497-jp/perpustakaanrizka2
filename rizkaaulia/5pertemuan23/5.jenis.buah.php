<?php
// Bagian 1: Array Indeks
// Buat array indeks berisi 5 jenis buah
$buah = ["Apel", "Jeruk", "Mangga", "Pisang", "Anggur"];
echo "<h2>Menampilkan Buah dengan Loop 'for'</h2>";
// Tampilkan semua buah menggunakan for
for ($i = 0; $i < count($buah); $i++) {
    echo $buah[$i] . "<br>";
}
echo "<h2>Menampilkan Buah dengan Loop 'foreach'</h2>";
// Tampilkan semua buah menggunakan foreach
foreach ($buah as $item) {
    echo $item . "<br>";
}

// Bagian 2: Array Asosiatif
echo "<h2>Menampilkan Produk dan Harga</h2>";
// Buat array asosiatif berisi nama produk dan harganya
$produk = [
    "apel" => 7500000,
    "jeruk" => 1250000,
    "mangga" => 150000,
    "pisang" => 7400,
    "anggur"=> 15.00
];
// Tampilkan nama dan harga dengan format yang diminta
// Menggunakan number_format() untuk memformat angka menjadi format mata uang
foreach ($produk as $nama_produk => $harga) {
    echo "Produk: {$nama_produk} - Harga: Rp. " . number_format($harga, 0, ',', '.') . "<br>";
}
?>