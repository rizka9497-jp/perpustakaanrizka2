<?php
// Nama file CSV
$csvFile = 'data.csv';

// Cek file
if (!file_exists($csvFile)) {
    echo "<p><strong>File data.csv belum ada.</strong><br>Silakan input data lewat simpan_csv.php dahulu.</p>";
    exit;
}

$rows = [];
$headers = null;

if (($handle = fopen($csvFile, 'r')) !== false) {
    // Baca baris pertama
    $first = fgetcsv($handle);

    if ($first === false || $first === null) {
        echo "<p><strong>Tidak ada data di data.csv.</strong></p>";
        fclose($handle);
        exit;
    }

    // Hilangkan BOM jika ada di kolom pertama
    if (isset($first[0])) {
        $first[0] = preg_replace('/^\xEF\xBB\xBF/', '', $first[0]);
    }

    // Deteksi apakah baris pertama adalah header
    $lower = array_map('mb_strtolower', $first);
    $isHeader = in_array('nama', $lower, true) && in_array('kelas', $lower, true) && in_array('nilai', $lower, true);

    if ($isHeader) {
        $headers = $first;
    } else {
        // Tidak ada header di file, gunakan header default
        $headers = ['Nama', 'Kelas', 'Nilai'];
        $rows[] = $first; // masukkan baris pertama sebagai data
    }

    // Baca sisa baris
    while (($data = fgetcsv($handle)) !== false) {
        // Lewati baris kosong
        if ($data === [null] || $data === false) continue;
        $rows[] = $data;
    }

    fclose($handle);
} else {
    echo "<p><strong>Gagal membuka file data.csv.</strong></p>";
    exit;
}

// Tampilkan tabel HTML
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data CSV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 24px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 720px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background: #f3f3f3;
            text-align: left;
        }

        caption {
            text-align: left;
            font-weight: bold;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <table>
        <caption>Daftar Data dari data.csv</caption>
        <thead>
            <tr>
                <?php foreach ($headers as $h): ?>
                    <th><?= htmlspecialchars($h) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($rows)): ?>
                <tr>
                    <td colspan="<?= count($headers) ?>">Belum ada data.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($rows as $r): ?>
                    <tr>
                        <?php
                        // Pastikan jumlah kolom konsisten dengan header
                        for ($i = 0; $i < count($headers); $i++):
                            $val = $r[$i] ?? '';
                        ?>
                            <td><?= htmlspecialchars($val) ?></td>
                        <?php endfor; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>