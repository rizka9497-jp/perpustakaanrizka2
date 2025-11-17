<?php
// Cek apakah data dikirim via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'] ?? '';
    $kelas  = $_POST['kelas'] ?? '';
    $hobi   = $_POST['hobi'] ?? '';
    $alamat = $_POST['alamat'] ?? '';

    // Tampilkan output
    echo "Halo, nama saya rizka $nama.<br>";
    echo "Saya dari kelas $kelas, hobi saya $hobi, dan saya tinggal di $alamat.<br><br>";
    echo "Data ini diproses oleh Una."; // Tambahan
} else {
    echo "Halo nama saya rizka.<br>";
    echo "saya dari kelas XI RPL2 <br>";
    echo "hobi saya adalah membaca<br>";
    echo "saya tinggal di babo";
}
?>