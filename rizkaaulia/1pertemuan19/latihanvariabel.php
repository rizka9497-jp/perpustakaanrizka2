<?php
$nama = "riska "; 
$umur = "16<br>"; 

$tinggi = "162 cm <br>"; 
$is_siswa = true; 
$hobi = ["membaca", "menulis", "coding"];
define("Negara", "Indonesia"); 
echo "Nama: $nama<br>";
echo "Umur: $umur<br>";
echo "Tinggi: $tinggi <br>";
echo "siswa: " . ($is_siswa ? "Ya" : "Tidak") . "<br>";
echo "Hobi: " . implode(", ", $hobi) . "<br>";
echo "Negara: " . Negara . "<br><br>";
var_dump($nama);
echo "<br>";
var_dump($umur);
echo "<br>";
var_dump($tinggi);
echo "<br>";
var_dump($is_siswa);
echo "<br>";
var_dump($hobi);
echo "<br>";
var_dump(Negara);
?>