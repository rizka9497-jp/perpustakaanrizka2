<?php


// Ambil semua peminjaman yang belum dikembalikan
$query = mysqli_query($koneksi, "
    SELECT p.idpeminjaman, p.idpeminjam, pm.namapeminjam,
           SUM(dp.total) AS jumlah_buku
    FROM peminjaman p
    JOIN peminjam pm ON p.idpeminjam = pm.idpeminjam
    JOIN detailpeminjaman dp ON dp.idpeminjaman = p.idpeminjaman
    WHERE dp.keterangan = 'belumkembali'
    GROUP BY p.idpeminjaman
    ORDER BY p.idpeminjaman DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengembalian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body class="bg-light">
<div class="container-fluid px-4 mt-4">

    <div class="card">
        <div class="card-header bg-primary text-white">
            <strong>Daftar seluruh PEMINJAM yang sedang meminjam Buku</strong>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam yang Sedang Meminjam</th>
                        <th class="text-center">Jumlah Buku</th>
                        <th class="text-center">Lebih Detail</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($p = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($p['namapeminjam']) ?></td>
                            <td class="text-center"><?= $p['jumlah_buku'] ?></td>
                            <td class="text-center">
                                <a href="detailpeminjaman.php?idpeminjaman=<?= $p['idpeminjaman'] ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> LebihDetail
                                </a>
                            </td>
                            <td class="text-center">

                                <a href="index.php?halaman=prosespengembalian&idpeminjaman=<?= $p['idpeminjaman'] ?>" class="btn btn-success btn-sm">Kembalikan</a>

                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
</body>
</html>


