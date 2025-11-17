<?php
include "koneksi.php";
// ============================
// DAFTAR PEMINJAMAN BUKU
// ============================

// Fungsi format Rupiah
if (!function_exists('formatRupiah')) {
    function formatRupiah($angka) {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

$no = 1;

// =============================================================
// Query utama daftar peminjaman (disesuaikan dengan ERD terbaru)
// =============================================================
$query = mysqli_query($koneksi, "
    SELECT 
        p.idpeminjaman,
        pm.namapeminjam,
        a.nama AS namaadmin,
        MIN(dp.tanggalpinjam) AS tanggalpinjam,
        MAX(dp.tanggalkembali) AS tanggalkembali,
        COALESCE(SUM(dp.denda), 0) AS total_denda
    FROM peminjaman p
    JOIN peminjam pm ON p.idpeminjam = pm.idpeminjam
    JOIN admin a ON p.idadmin = a.idadmin
    JOIN detailpeminjaman dp ON p.idpeminjaman = dp.idpeminjaman
    GROUP BY p.idpeminjaman, pm.namapeminjam, a.nama
    ORDER BY p.idpeminjaman DESC
");
?>

<div class="card card-solid">
    <div class="card-header">
        <h3 class="card-title">Daftar Peminjaman Buku</h3>
        <a href="index.php?halaman=tambahpeminjaman" class="btn btn-primary btn-sm float-right">
            <i class="fas fa-plus"></i> Tambah Peminjaman
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th>Peminjam</th>
                        <th>Admin</th>
                        <th>Buku yang Dipinjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Total Denda</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($query && mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                            $idpeminjaman = $data['idpeminjaman'];
                            $total_denda = (float)$data['total_denda'];

                            // Ambil daftar judul buku
                            $bukuList = [];
                            $qBuku = mysqli_query($koneksi, "
                                SELECT b.judul 
                                FROM detailpeminjaman dp
                                JOIN buku b ON dp.idbuku = b.idbuku
                                WHERE dp.idpeminjaman = '$idpeminjaman'
                            ");
                            while ($rowBuku = mysqli_fetch_assoc($qBuku)) {
                                $bukuList[] = htmlspecialchars($rowBuku['judul']);
                            }

                            // Tentukan status
                            $cekStatus = mysqli_query($koneksi, "
                                SELECT COUNT(*) AS belum 
                                FROM detailpeminjaman 
                                WHERE idpeminjaman='$idpeminjaman' 
                                AND keterangan='belumkembali'
                            ");
                            $cek = mysqli_fetch_assoc($cekStatus);
                            $status = ($cek['belum'] > 0) ? 'Belum Kembali' : 'Sudah Kembali';
                            $badgeStatus = ($status == 'Belum Kembali') ? 'badge-warning' : 'badge-success';
                    ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($data['namapeminjam']) ?></td>
                                <td><?= htmlspecialchars($data['namaadmin']) ?></td>
                                <td><?= implode(", ", $bukuList) ?></td>
                                <td><?= date('d-m-Y', strtotime($data['tanggalpinjam'])) ?></td>
                                <td><?= date('d-m-Y', strtotime($data['tanggalkembali'])) ?></td>
                                <td class="<?= ($total_denda > 0) ? 'text-danger font-weight-bold' : '' ?>">
                                    <?= formatRupiah($total_denda) ?>
                                </td>
                                <td><span class="badge <?= $badgeStatus ?>"><?= $status ?></span></td>

                                <td class="text-nowrap">
                                    <a href="index.php?halaman=detailpeminjaman&idpeminjaman=<?= $idpeminjaman ?>" 
                                       class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <?php if ($status == 'Belum Kembali'): ?>
                                        <a href="index.php?halaman=prosespengembalian&idpeminjaman=<?= $idpeminjaman ?>" 
                                           class="btn btn-success btn-sm" title="Proses Pengembalian">
                                            <i class="fas fa-undo"></i>
                                        </a>
                                    <?php endif; ?>

                                    <a href="index.php?halaman=editpeminjaman&idpeminjaman=<?= $idpeminjaman ?>" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="index.php?halaman=hapuspeminjaman&idpeminjaman=<?= $idpeminjaman ?>" 
                                       onclick="return confirm('Yakin ingin menghapus peminjaman ini?')" 
                                       class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php 
                        } 
                    } else { ?>
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data peminjaman.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
