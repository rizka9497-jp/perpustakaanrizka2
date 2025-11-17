<?php
$produk = [
    ["nama" => "Laptop", "harga" => 7500000],
    ["nama" => "Mouse", "harga" => 150000],
    ["nama" => "Printer", "harga" => 1200000],
];

$i = 1; // Counter manual

foreach ($produk as $item) {
    echo $i . ". Produk: " . $item["nama"] . " - Harga: Rp." . number_format($item["harga"], 0, ',', '.') . "<br>";
$i++;
}
?>