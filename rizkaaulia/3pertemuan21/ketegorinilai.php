<?php
$daftar_nilai = [95, 85, 73, 60];

foreach ($daftar_nilai as $nilai) {
    echo "Nilai: $nilai => Kategori: ";
    if ($nilai >= 90) {
        echo "A";
    } elseif ($nilai >= 80) {
        echo "B";
    } elseif ($nilai >= 70) {
        echo "C";
    } else {
        echo "D";
    }
    echo"<br>";
}
?>