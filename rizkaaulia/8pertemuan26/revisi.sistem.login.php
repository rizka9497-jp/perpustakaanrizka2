<?php
// Aktifkan semua error (debugging mode)
error_reporting(E_ALL);

// login.php
// Pastikan variabel ada dengan isset() supaya tidak error notice
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

// Debugging: tampilkan semua input yang dikirim
echo "<pre>";
echo "=== DEBUG INFO ===\n";
echo "Data POST:\n";
print_r($_POST); // tampilkan seluruh data POST
echo "Username: ";
var_dump($username); // cek isi + tipe data
echo "Password: ";
var_dump($password);
echo "==================\n";
echo "</pre>";

// Cek input kosong
if ($username == "" || $password == null) {
    echo "Username dan Password tidak boleh kosong";
    exit; // hentikan eksekusi supaya tidak lanjut ke login
}

// Validasi login
if ($username == "admin" && $password == "12345") {
    echo "Selamat datang admin!";
} else {
    echo "Login gagal!";
}
?>