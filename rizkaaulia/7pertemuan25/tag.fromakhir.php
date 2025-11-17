<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Formulir POST</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        form { max-width: 500px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        label, input, textarea { display: block; width: 100%; margin-bottom: 10px; }
        input[type="submit"] { background-color: #4CAF50; color: white; border: none; cursor: pointer; padding: 10px; border-radius: 4px; }
    </style>
</head>
<body>

    <h2>Formulir Kontak</h2>

    <form action="proses_data.php" method="POST">
        
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" required>
        
        <label for="email">Alamat Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" rows="4" required></textarea>
        
        <input type="submit" value="Kirim Formulir">
    </form>

</body>
</html>