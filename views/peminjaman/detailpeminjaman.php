<?php

// Pastikan idpeminjaman dikirim
if (!isset($_GET['idpeminjaman'])) {
  echo "<div class='alert alert-info m-3'>
          <h5><i class='fas fa-info-circle'></i> Silakan pilih data peminjaman dari daftar terlebih dahulu.</h5>
          <p>Klik menu <a href='index.php?halaman=daftarpeminjaman'>Daftar Peminjaman</a> dan pilih salah satu untuk melihat detailnya.</p>
        </div>";
  exit;
}

$idpeminjaman = intval($_GET['idpeminjaman']);

// Ambil data utama peminjaman
$query_peminjaman = mysqli_query($koneksi, "
  SELECT p.idpeminjaman, pm.namapeminjam, a.nama
  FROM peminjaman p
  JOIN peminjam pm ON p.idpeminjam = pm.idpeminjam
  LEFT JOIN admin a ON p.idadmin = a.idadmin
  WHERE p.idpeminjaman = '$idpeminjaman'
  LIMIT 1
");

if (mysqli_num_rows($query_peminjaman) == 0) {
  echo "<div class='alert alert-warning m-3'>
          <i class='fas fa-exclamation-circle'></i> Data peminjaman dengan ID $idpeminjaman tidak ditemukan.
        </div>";
  exit;
}

$data = mysqli_fetch_assoc($query_peminjaman);

// Ambil detail buku-buku yang dipinjam
$query_detail = mysqli_query($koneksi, "
  SELECT dp.*, b.judul
  FROM detailpeminjaman dp
  JOIN buku b ON dp.idbuku = b.idbuku
  WHERE dp.idpeminjaman = '$idpeminjaman'
");
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Detail Peminjaman</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=daftarpeminjaman">Daftar Peminjaman</a></li>
          <li class="breadcrumb-item active">Detail Peminjaman</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
          <tr><th>ID Peminjaman</th><td><?= $data['idpeminjaman'] ?></td></tr>
          <tr><th>Nama Peminjam</th><td><?= htmlspecialchars($data['namapeminjam']) ?></td></tr>
          <tr><th>Admin</th><td><?= htmlspecialchars($data['nama']) ?></td></tr>
        </table>

        <h5 class="mt-4">Daftar Buku yang Dipinjam</h5>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Buku</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Tanggal Dikembalikan</th>
              <th>Status</th>
              <th>Keterangan</th>
              <th>Denda</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_detail) > 0) {
              $no = 1;
              while ($det = mysqli_fetch_assoc($query_detail)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>" . htmlspecialchars($det['judul']) . "</td>
                        <td>{$det['tanggalpinjam']}</td>
                        <td>{$det['tanggalkembali']}</td>
                        <td>" . ($det['tanggaldikembalikan'] ?: '-') . "</td>
                        <td>{$det['status']}</td>
                        <td>{$det['keterangan']}</td>
                        <td>Rp " . number_format($det['denda'], 0, ',', '.') . "</td>
                      </tr>";
                $no++;
              }
            } else {
              echo "<tr><td colspan='8' class='text-center'>Tidak ada data detail peminjaman.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
