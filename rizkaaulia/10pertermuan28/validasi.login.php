<?php
// Inisialisasi variabel error
$errors = [];

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil input user, gunakan trim() untuk menghapus spasi di awal/akhir
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // --- Validasi Username ---
    if (empty($username)) { // cek apakah username kosong
        $errors[] = "❌ Username tidak boleh kosong."; // jika kosong, masukkan pesan error
    }

    // --- Validasi Password ---
    if (empty($password)) { // cek apakah password kosong
        $errors[] = "❌ Password tidak boleh kosong."; // jika kosong, tampilkan error
    } elseif (strlen($password) < 6) { // cek apakah panjang password kurang dari 6
        $errors[] = "❌ Password minimal 6 karakter."; // kalau kurang dari 6 → error
    } elseif (strlen($password) > 6) { // cek apakah panjang password lebih dari 6
        $errors[] = "❌ Password terlalu panjang, harus tepat 6 karakter."; // kalau lebih dari 6 → error
    }

    // Jika tidak ada error, login dianggap berhasil
    if (empty($errors)) {
        echo "<p style='color:green; font-weight:bold;'>✅ Login berhasil!</p>";
    }
}
?>

<!-- Form HTML -->
<h2>Form Login</h2>

<?php
// Tampilkan semua pesan error jika ada
if (!empty($errors)) {
    echo "<div style='color:red;'>";
    foreach ($errors as $err) {
        echo "<p>$err</p>"; // tampilkan pesan error satu per satu
    }
    echo "</div>";
}
?>

<form method="post" action="">
    <label for="username">Username:</label><br>
    <!-- Isi kembali input username agar tidak hilang setelah submit -->
    <input type="text" name="username" id="username" 
           value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>"><br><br>

    <label for="password">Password:</label><br>
    <!-- Password tidak ditampilkan kembali demi keamanan -->
    <input type="password" name="password" id="password"><br><br>

    <button type="submit">Login</button>
</form>