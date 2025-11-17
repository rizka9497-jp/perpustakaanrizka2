<?php

// Tentukan username dan password yang benar
$username_benar = "siswa";
$password_benar = "123";

// Dapatkan username dan password dari input (misalnya, dari form)
// Untuk simulasi ini, kita langsung menentukannya
$username_input = "siswa";
$password_input = "123";

// Periksa apakah username dan password cocok
if ($username_input == $username_benar && $password_input == $password_benar) {
    // Jika cocok, tampilkan pesan selamat datang
    echo "Selamat datang";
} else {
    // Jika tidak cocok, tampilkan pesan error
    echo "Username/password salah";
}

?>