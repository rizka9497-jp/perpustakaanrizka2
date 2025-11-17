<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota Perpustakaan</title>
</head>
<body>
    <h2>Formulir Pendaftaran Anggota Perpustakaan</h2>
    <form action="proses.php" method="post">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Kelas:</label><br>
        <input type="text" name="kelas" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Daftar">
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $email = $_POST['email'];

    echo "Selamat datang, $nama!<br>";
    echo "Anda terdaftar dari kelas $kelas dan akan kami hubungi melalui $email.";
} else {
    echo "Tidak ada data yang dikirim.";
}
?>

    </form>
</body>
</html>