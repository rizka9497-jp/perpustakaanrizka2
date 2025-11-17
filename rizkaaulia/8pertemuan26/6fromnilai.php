<?php
// --- Debugging aktif ---
error_reporting(E_ALL);
ini_set('display_errors', 1);

// eror 1: syntax error sudah diperbaiki
$nama = "rizka"; 

// definisikan variabel $nilai agar tidak runtime error
$nilai = 85; 

// debugging: cek apakah variabel sudah ada
if (isset($nilai)) {
    var_dump($nilai); // tampilkan isi variabel
} else {
    echo "Variabel \$nilai belum didefinisikan<br>";
}

// eror 2: runtime error diperbaiki
if ($nilai > 70) {
    echo "lulus<br>";
} else {
    echo "tidak lulus<br>";
}

// eror 3: logical error diperbaiki (== bukan =)
if ($nilai == 100){
    echo "Nilai sempurna<br>";
} else {
    echo "Belum sempurna<br>";
}

// tambahan debugging
var_dump($nama); 
?>