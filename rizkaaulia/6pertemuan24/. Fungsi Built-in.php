<?php

// 1. Validasi Panjang Nama Menggunakan strlen()
$nama = "rizka aulia";

// Menggunakan strlen() untuk mendapatkan panjang string
if (strlen($nama) > 3) {
    echo "Halo, " . $nama . "! Nama Anda valid.<br>";
} else {
    echo "Nama tidak valid. Nama harus lebih dari 3 karakter.<br>";
}

// 2. Mengubah Nama Menjadi Huruf Kapital Menggunakan strtoupper()
$nama_huruf_besar = strtoupper($nama);
echo "Nama Anda dalam huruf kapital adalah: " . $nama_huruf_besar . "<br>";

echo "---<br>";

// 3. Mencetak Tanggal Sekarang Menggunakan date()
echo "Tanggal dan waktu saat ini adalah: " . date("d-m-Y H:i:s") . "<br>";
echo "Hari ini adalah hari: " . date("l") . "<br>";

echo "---<br>";

// 4. Memformat Nilai Mata Uang Menggunakan number_format()
$harga_produk = 1500000;
$mata_uang = "Rp";

// number_format(nilai, jumlah_desimal, pemisah_desimal, pemisah_ribuan)
$harga_terformat = number_format($harga_produk, 0, ',', '.');
echo "Harga produk: " . $mata_uang . " " . $harga_terformat . "<br>";

?>