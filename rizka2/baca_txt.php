<?php
// Pastikan file data.txt ada
$filename = 'data.txt';
$data = [];

// Jika file ada, baca isinya baris per baris
if (file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Pecah setiap baris menjadi array [Nama, Kelas, Nilai]
    foreach ($lines as $line) {
        $parts = explode('|', $line);
        if (count($parts) === 3) {
            $data[] = [
                'nama' => $parts[0],
                'kelas' => $parts[1],
                'nilai' => $parts[2]
            ];
        }
    }
} else {
    echo "<p style='color:red;'>File data.txt tidak ditemukan.</p>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Baca Data TXT</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Daftar Data Siswa</h2>

    <?php if (!empty($data)): ?>
        <table>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nilai</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['kelas']) ?></td>
                    <td><?= htmlspecialchars($row['nilai']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Tidak ada data untuk ditampilkan.</p>
    <?php endif; ?>
</body>

</html>