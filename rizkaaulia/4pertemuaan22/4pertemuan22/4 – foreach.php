<?php
// Array awal
$hewan = ["Kucing", "Kelinci", "Burung"];

// Menambahkan elemen ke array
$hewan[] = "kucing";
$hewan[] = "kelinci";
$hewan[] = "burung";

// Menampilkan daftar hewan
foreach ($hewan as $h) {
    echo $h."<br>";
}
?>