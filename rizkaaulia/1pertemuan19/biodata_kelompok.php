<?php

$nama = "riska aulia";
$umur = 16;
$status = "siswa";
$hobi = "Membaca dan Menulis";

define("JURUSAN", "rekayasa perangkat lunak");

echo "<h2>Informasi Diri</h2>";
echo "Nama: " . $nama . "<br>";
echo "Umur: " . $umur . " tahun<br>";
echo "Status: " . $status . "<br>";
echo "Hobi: " . $hobi . "<br>";
echo "Jurusan: " . JURUSAN . "<br><br>";

echo "<h2>Debugging dengan var_dump()</h2>";
echo "Informasi variabel \$nama:<br>";
var_dump($nama);

echo "<br><br>Informasi variabel \$umur:<br>";
var_dump($umur);

?>