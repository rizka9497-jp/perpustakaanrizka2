<?php
// Pastikan data dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Validasi Data
    // Periksa apakah semua field tidak kosong
    if (!empty($_POST['nama']) && !empty($_POST['jumlah']) && !empty($_POST['film']) && !empty($_POST['jadwal'])) {

        // 2. Ambil data dari formulir dan bersihkan
        $nama = htmlspecialchars($_POST['nama']);
        $jumlah = htmlspecialchars($_POST['jumlah']);
        $film = htmlspecialchars($_POST['film']);
        $jadwal = htmlspecialchars($_POST['jadwal']);

        // 3. Tampilkan hasil pemesanan
        echo "<h1>Terima kasih, " . $nama . ".</h1>";
        echo "<p>Anda memesan " . $jumlah . " tiket untuk film " . $film . " pada jadwal " . $jadwal . ".</p>";

    } else {
        // Jika ada field yang kosong, berikan pesan error
        echo "<h1>Error:</h1>";
        echo "<p>Semua field harus diisi. Silakan kembali ke halaman sebelumnya dan lengkapi formulir.</p>";
    }
} else {
    // Jika akses langsung ke file proses.php tanpa melalui formulir
    echo "<h1>Akses Ditolak</h1>";
    echo "<p>Silakan gunakan formulir untuk melakukan pemesanan.</p>";
}
?>