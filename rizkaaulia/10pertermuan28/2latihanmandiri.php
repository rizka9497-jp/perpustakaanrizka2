<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['nama'])) {
            $errors[] = "Nama tidak boleh kosong.";
        }
        if (!is_numeric($_POST['umur'])) {
            $errors[] = "Umur harus berupa angka.";
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Format email tidak valid.";
        }
        if (empty($_POST['alamat'])) {
            $errors[] = "Alamat tidak boleh kosong.";
        }

        if (empty($errors)) {
            echo "Data valid dan siap diproses.......";
        } else {
            foreach ($errors as $e) {
                echo "<p style='color:red;'>$e</p>";
            }
        }
    }
    ?>

    <form method="POST" action="">
        Nama: <input type="text" name="nama"><br>
        Umur: <input type="text" name="umur"><br>
        Email: <input type="text" name="email"><br>
        Alamat: <input type="text" name="alamat"><br>
        <input type="submit" value="Kirim">
    </form>

</body>
</html>