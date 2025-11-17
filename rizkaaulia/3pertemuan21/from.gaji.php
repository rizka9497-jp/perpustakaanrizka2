<?php
// Input jabatan (bisa diubah nilainya)
$jabatan = "Manager";

// Menampilkan jabatan
echo "Jabatan: $jabatan<br>";

// Menentukan gaji berdasarkan jabatan
switch ($jabatan) {
    case "Manager":
        echo "Gaji: Rp10.000.000";
        break;
    case "Staff":
        echo "Gaji: Rp6.000.000";
        break;
    case "Magang":
        echo "Gaji: Rp2.000.000";
        break;
    default:
        echo "Jabatan tidak ditemukan.";
}
?>