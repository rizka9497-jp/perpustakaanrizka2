<?php
// Array indeks berisi minimal 5 nama mahasiswa
$mahasiswa = ["Siti", "Andi", "Rani", "Budi", "Dina"];

echo "Daftar Mahasiswa (menggunakan for):<br>";
for ($i = 0; $i < count($mahasiswa); $i++) {
    echo ($i + 1) . ". " . $mahasiswa[$i] . "<br>";
}

echo "<br>Daftar Mahasiswa (menggunakan foreach):<br>";
$no = 1;
foreach ($mahasiswa as $nama) {
    echo $no . ". " . $nama . "<br>";
$no++;
}
?>