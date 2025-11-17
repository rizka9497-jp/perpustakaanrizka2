<?php
// Inisialisasi error
$errors = [];
$nama = $email = $telepon = $pesan = "";

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telepon = trim($_POST['telepon'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    // Validasi Nama
    if (empty($nama)) {
        $errors[] = "❌ Nama lengkap wajib diisi.";
    }

    // Validasi Email
    if (empty($email)) {
        $errors[] = "❌ Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "⚠ Email tidak valid.";
    }

    // Validasi Nomor Telepon
    if (empty($telepon)) {
        $errors[] = "❌ Nomor telepon wajib diisi.";
    } elseif (!ctype_digit($telepon)) {
        $errors[] = "⚠ Nomor telepon hanya boleh angka.";
    }

    // Validasi Pesan
    if (empty($pesan)) {
        $errors[] = "❌ Pesan wajib diisi.";
    } elseif (strlen($pesan) < 20) {
        $errors[] = "⚠ Pesan minimal 20 karakter.";
    }

    // Jika semua valid
    if (empty($errors)) {
        echo "<p style='color:green;font-weight:bold;'>✅ Pesan berhasil dikirim!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak Validasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #d57dafff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #1d4ed8;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 6px 0 12px 0;
            border: 1px solid #e189cfff;
            border-radius: 6px;
        }
        textarea {
            resize: vertical;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #1d4ed8;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #2563eb;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 6px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>📩 Form Kontak</h2>

        <?php
        // Tampilkan error jika ada
        if (!empty($errors)) {
            foreach ($errors as $err) {
                echo "<div class='error'>$err</div>";
            }
        }
        ?>

        <form method="post" action="">
            <label for="nama">👤 Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($nama); ?>">

            <label for="email">📧 Email</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">

            <label for="telepon">📞 Nomor Telepon</label>
            <input type="text" name="telepon" id="telepon" value="<?php echo htmlspecialchars($telepon); ?>">

            <label for="pesan">💬 Pesan</label>
            <textarea name="pesan" id="pesan" rows="4"><?php echo htmlspecialchars($pesan); ?></textarea>

            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>