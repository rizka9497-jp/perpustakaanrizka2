<?php

// Anggap saja ini adalah nilai yang dimasukkan oleh siswa
$nilaiSiswa = 85; 

// Menggunakan if-elseif-else untuk mengecek kriteria
if ($nilaiSiswa >= 90) {
    echo "Sangat Baik";
} elseif ($nilaiSiswa >= 75) {
    echo "Baik";
} elseif ($nilaiSiswa >= 60) {
    echo "Cukup";
} else {
    echo "Kurang";
}

?>