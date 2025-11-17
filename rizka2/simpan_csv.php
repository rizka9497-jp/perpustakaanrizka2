<?php
// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama  = $_POST['nama'] ?? '';
    $kelas = $_POST['kelas'] ?? '';
    $nilai = $_POST['nilai'] ?? '';

    // Buka file CSV dalam mode append
    $file = fopen('data.csv', 'a');

    if ($file) {
        // Simpan data dalam format CSV
        fputcsv($file, [$nama, $kelas, $nilai]);
        fclose($file);
        echo "Data berhasil disimpan ke data.csv";
    } else {
        echo "Gagal membuka file data.csv";
    }
}
?>

<!-- Form input data -->
<form method="post" action="">
    <label>Nama:
        <input type="text" name="nama" required>
    </label><br><br>

    <label>Kelas:
        <select name="kelas" required>
            <option value="">-- Pilih Kelas --</option>
            <option value="X RPL">X</option>
            <option value="XI RPL">XI</option>
            <option value="XII RPL">XII</option>
        </select>
    </label><br><br>

    <label>Nilai:
        <input type="number" name="nilai" required>
    </label><br><br>

    <button type="submit">Simpan</button>
</form>
<br><br>

<p>
    <a href="data.csv">Lihat Data Tersimpan</a>
</p>