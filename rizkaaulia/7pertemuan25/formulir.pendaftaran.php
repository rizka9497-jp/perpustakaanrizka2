<!DOCTYPE html>
<html>
<head>
    <title>Form Data Siswa</title>
</head>
<body>
    <h2>Formulir Data Siswa</h2>
    <form action="proses.php" method="post">
        <label for="nama">Nama Lengkap:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="kelas">Kelas:</label><br>
        <input type="text" id="kelas" name="kelas" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Kirim">
    </form>
</body>
</html>