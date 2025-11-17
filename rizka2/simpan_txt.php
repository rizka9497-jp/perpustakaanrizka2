<?php
// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama  = $_POST['nama'] ?? '';
    $kelas = $_POST['kelas'] ?? '';
    $nilai = $_POST['nilai'] ?? '';

    // Susun format Nama|Kelas|Nilai
    $baris = $nama . '|' . $kelas . '|' . $nilai . PHP_EOL;

    // Simpan ke data.txt (append agar tidak menimpa data lama)
    file_put_contents('data.txt', $baris, FILE_APPEND | LOCK_EX);

    echo "<p style='color: green;'>Data berhasil disimpan ke
    <a href='data.txt' target='_blank'>data.txt</a></p>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Simpan ke TXT</title>
</head>

<body>
    <h2>Input Data Siswa</h2>
    <form method="POST">
        <!-- Input Nama -->
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <!-- Pilih Kelas (dropdown) -->
        <label>Kelas:</label><br>
        <select name="kelas" required>
            <option value="">-- Pilih Kelas --</option>
            <option value="XI RPL 1">XI RPL 1</option>
            <option value="XI RPL 2">XI RPL 2</option>
            <option value="XI DKV 1">XI DKV 1</option>
            <option value="XI DKV 2">XI DKV 2</option>
        </select><br><br>

        <!-- Pilih Nilai (dropdown) -->
        <label>Nilai:</label><br>
        <select name="nilai" required>
            <option value="">-- Pilih Nilai --</option>
            <?php
            // buat pilihan nilai 0-100
            for ($i = 50; $i <= 100; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select><br><br>

        <!-- Tombol Simpan -->
        <button type="submit">Simpan</button>
    </form>
</body>

</html>