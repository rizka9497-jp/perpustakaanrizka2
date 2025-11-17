<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Tiket Film</title>
</head>
<body>
    <h2>Formulir Pemesanan Tiket</h2>
    <form action="process.php" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="film">Pilih Film:</label><br>
        <select id="film" name="film" required>
            <option value="">-- Pilih salah satu --</option>
            <option value="Film A">Film A</option>
            <option value="Film B">Film B</option>
            <option value="Film C">Film C</option>
        </select><br><br>

        <label for="jumlah_tiket">Jumlah Tiket:</label><br>
        <input type="number" id="jumlah_tiket" name="jumlah_tiket" min="1" required><br><br>

        <label>Jadwal Tayang:</label><br>
        <input type="radio" id="pagi" name="jadwal" value="Pagi" required>
        <label for="pagi">Pagi</label><br>
        <input type="radio" id="siang" name="jadwal" value="Siang" required>
        <label for="siang">Siang</label><br>
        <input type="radio" id="malam" name="jadwal" value="Malam" required>
        <label for="malam">Malam</label><br><br>

        <input type="submit" value="Pesan Sekarang">
    </form>
</body>
</html>


