<?php
// Inisialisasi variabel error
$errors = [];

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil input
    $nama   = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email  = isset($_POST['email']) ? trim($_POST['email']) : '';
    $umur   = isset($_POST['umur']) ? trim($_POST['umur']) : '';
    $setuju = isset($_POST['setuju']) ? $_POST['setuju'] : '';

    // Validasi Nama
    if (empty($nama)) {
        $errors[] = "❌ Nama tidak boleh kosong.";
    }

    // Validasi Email
    if (empty($email)) {
        $errors[] = "❌ Email tidak boleh kosong.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "❌ Format email tidak valid.";
    }

    // Validasi Umur
    if (empty($umur)) {
        $errors[] = "❌ Umur tidak boleh kosong.";
    } elseif (!is_numeric($umur)) {
        $errors[] = "❌ Umur harus berupa angka.";
    }

    // Validasi Checkbox
    if (empty($setuju)) {
        $errors[] = "❌ Anda harus menyetujui syarat.";
    }

    // Jika tidak ada error
    if (empty($errors)) {
        echo "<p style='color:green; font-weight:bold;'>✅ Data berhasil disimpan!</p>";
    }
}
?>

<!-- Form HTML -->
<h2>Form Pendaftaran</h2>

<?php
// Tampilkan pesan error jika ada
if (!empty($errors)) {
    echo "<div style='color:red;'>";
    foreach ($errors as $err) {
        echo "<p>$err</p>";
    }
    echo "</div>";
}
?>

<form method="post" action="">
    <label for="nama">Nama Lengkap:</label><br>
    <input type="text" name="nama" id="nama" value="<?php echo isset($nama) ? htmlspecialchars($nama) : ''; ?>"><br><br>

    <label for="email">Alamat Email:</label><br>
    <input type="text" name="email" id="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"><br><br>

    <label for="umur">Umur:</label><br>
    <input type="text" name="umur" id="umur" value="<?php echo isset($umur) ? htmlspecialchars($umur) : ''; ?>"><br><br>

    <input type="checkbox" name="setuju" id="setuju" value="1" <?php if(isset($setuju) && $setuju) echo "checked"; ?>>
    <label for="setuju">Saya setuju dengan syarat & ketentuan</label><br><br>

    <button type="submit">Kirim</button>
</form>