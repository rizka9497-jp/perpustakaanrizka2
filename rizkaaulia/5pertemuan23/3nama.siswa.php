<?php

// Array multidimensi berisi data siswa
$siswa = [
    ["nama" => "Ahmad", "kelas" => "XI RPL", "nilai" => 87],
    ["nama" => "Siti", "kelas" => "XI RPL", "nilai" => 90],
    ["nama" => "Rani", "kelas" => "XI RPL", "nilai" => 78]
];

// Loop untuk menampilkan data siswa "Ahmad"
foreach ($siswa as $data) {
    if ($data['nama'] === "Ahmad") {
        echo $data['nama'] . " dari kelas " . $data['kelas'] . " mendapatkan nilai " . $data['nilai'] . ".\n";
    }
}

?>