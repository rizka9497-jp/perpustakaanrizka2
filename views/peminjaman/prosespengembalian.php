<?php
date_default_timezone_set('Asia/Jakarta');

if (!isset($_GET['idpeminjaman'])) {
  echo "<script>alert('ID peminjaman tidak ditemukan!'); window.location='daftarpengembalian.php';</script>";
  exit;
}

$idpeminjaman = intval($_GET['idpeminjaman']);

// Ambil data peminjam dan peminjaman
$q = mysqli_query($koneksi, "
    SELECT p.*, pm.namapeminjam 
    FROM peminjaman p
    JOIN peminjam pm ON p.idpeminjam = pm.idpeminjam
    WHERE p.idpeminjaman = '$idpeminjaman'
");
if (mysqli_num_rows($q) == 0) {
  echo "<script>alert('Data peminjaman tidak ditemukan!'); window.location='daftarpengembalian.php';</script>";
  exit;
}
$peminjaman = mysqli_fetch_assoc($q);

// Ambil detail buku yang dipinjam
$qDetail = mysqli_query($koneksi, "
    SELECT dp.*, b.judul 
    FROM detailpeminjaman dp
    JOIN buku b ON dp.idbuku = b.idbuku
    WHERE dp.idpeminjaman = '$idpeminjaman'
");
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Proses Pengembalian Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container-fluid px-4 mt-4">

    <div class="alert alert-warning">
      <h3>Sedang memproses pengembalian dari
        <strong><?= htmlspecialchars($peminjaman['namapeminjam']) ?></strong>
      </h3>
    </div>

    <form method="POST" action="db/dbpengembalian.php">


      <input type="hidden" name="idpeminjaman" value="<?= $idpeminjaman ?>">
      <input type="hidden" name="tanggalbayar" value="<?= date('Y-m-d') ?>">

      <div class="table-responsive">
        <table class="table table-bordered w-100">
          <thead class="bg-info text-white">
            <tr>
              <th>No</th>
              <th>Judul Buku</th>
              <th>Tanggal Pinjam</th>
              <th>Durasi</th>
              <th>Harus Kembali</th>
              <th>Tanggal Pengembalian</th>
              <th>Status</th>
              <th>Keterangan</th>
              <th>Terlambat (hari)</th>
              <th>Denda</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            while ($d = mysqli_fetch_assoc($qDetail)):
              $sudahKembali = ($d['keterangan'] === 'sudahkembali');
              $tglHariIni = date('Y-m-d');
            ?>
              <tr data-id="<?= $d['iddetailpeminjaman'] ?>">
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($d['judul']) ?></td>
                <td><?= $d['tanggalpinjam'] ?></td>
                <td><?= $d['durasipeminjaman'] ?> hari</td>
                <td class="tgl-kembali-asli"><?= $d['tanggalkembali'] ?></td>
                <td>
                  <?php if ($sudahKembali): ?>
                    <input type="date" class="form-control" value="<?= $d['tanggaldikembalikan'] ?>" readonly>
                  <?php else: ?>
                    <input type="date"
                      name="tgl_kembali[<?= $d['iddetailpeminjaman'] ?>]"
                      class="form-control tgl-kembali"
                      value="<?= $tglHariIni ?>">
                  <?php endif; ?>
                </td>
                <td class="status">
                  <span class="badge bg-secondary">Belum dihitung</span>
                </td>
                <td>
                  <?php if ($sudahKembali): ?>
                    <span class="badge bg-primary">Sudah Kembali</span>
                  <?php else: ?>
                    <span class="badge bg-warning text-dark">Belum Kembali</span>
                  <?php endif; ?>
                </td>
                <td class="hari-terlambat">0</td>
                <td class="denda">Rp0</td>

                <input type="hidden" name="detail[<?= $d['iddetailpeminjaman'] ?>][jumlahharitelat]" class="input-terlambat">
                <input type="hidden" name="detail[<?= $d['iddetailpeminjaman'] ?>][denda]" class="input-denda">
                <input type="hidden" name="detail[<?= $d['iddetailpeminjaman'] ?>][status]" class="input-status">
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>

      <div class="row align-items-center mt-4 text-center">
        <!-- Total Denda -->
        <div class="col-md-2">
          <label class="fw-bold d-block fs-6">Total Denda</label>
          <span id="total-denda" class="badge bg-info text-white fs-4 fw-bold px-4 py-3 d-block">Rp0</span>
          <input type="hidden" name="totaldenda" id="input-total-denda">
        </div>

        <!-- Dibayar -->
        <div class="col-md-3">
          <label class="fw-bold d-block fs-6">Dibayar</label>
          <div class="d-flex justify-content-center align-items-center gap-2">
            <input type="number" class="form-control form-control-lg text-center" name="dibayar" id="uang-bayar" value="0" min="0" style="max-width: 140px;">
            <span id="badge-bayar" class="badge bg-warning text-dark fs-5 fw-bold px-3 py-2">Rp0</span>
          </div>
        </div>

        <!-- Tunggakan -->
        <div class="col-md-2">
          <label class="fw-bold d-block fs-6">Tunggakan</label>
          <span id="tunggakan" class="badge bg-danger text-white fs-4 fw-bold px-4 py-3 d-block">Rp0</span>
          <input type="hidden" name="tunggakan" id="input-tunggakan">
        </div>

        <!-- Kembalian -->
        <div class="col-md-2">
          <label class="fw-bold d-block fs-6">Kembalian</label>
          <span id="kembalian" class="badge bg-success text-white fs-4 fw-bold px-4 py-3 d-block">Rp0</span>
        </div>

        <!-- Tombol -->
        <div class="col-md-3 text-end">
          <label class="d-block">&nbsp;</label>
          <div class="d-flex justify-content-end gap-2">
            <a href="daftarpengembalian.php" class="btn btn-primary btn-sm">Pengembalian</a>
            <a href="daftarpeminjaman.php" class="btn btn-secondary btn-sm">Peminjaman</a>
            <button type="reset" class="btn btn-warning">Reset</button>
            <button type="submit" class="btn btn-danger">Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const rows = document.querySelectorAll('tbody tr');
      const totalDendaEl = document.getElementById('total-denda');
      const inputTotalDenda = document.getElementById('input-total-denda');
      const inputTunggakan = document.getElementById('input-tunggakan');
      const uangBayarEl = document.getElementById('uang-bayar');
      const kembalianEl = document.getElementById('kembalian');
      const tunggakanEl = document.getElementById('tunggakan');
      const badgeBayar = document.getElementById('badge-bayar');

      const formatRupiah = num => 'Rp' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

      const hitungDenda = () => {
        let totalDenda = 0;

        rows.forEach(row => {
          const inputTgl = row.querySelector('.tgl-kembali');
          const tglKembaliAsli = new Date(row.querySelector('.tgl-kembali-asli').textContent.trim());
          const statusEl = row.querySelector('.status');
          const hariTerlambatEl = row.querySelector('.hari-terlambat');
          const dendaEl = row.querySelector('.denda');
          const inputTerlambat = row.querySelector('.input-terlambat');
          const inputDenda = row.querySelector('.input-denda');
          const inputStatus = row.querySelector('.input-status');

          if (inputTgl) {
            const tglKembali = new Date(inputTgl.value);
            const selisihHari = Math.max(Math.floor((tglKembali - tglKembaliAsli) / (1000 * 60 * 60 * 24)), 0);
            const denda = selisihHari * 1000;

            statusEl.innerHTML = selisihHari > 0 ?
              '<span class="badge bg-danger">Terlambat</span>' :
              '<span class="badge bg-success">Tepat Waktu</span>';

            hariTerlambatEl.textContent = selisihHari;
            dendaEl.textContent = formatRupiah(denda);

            inputTerlambat.value = selisihHari;
            inputDenda.value = denda;
            inputStatus.value = selisihHari > 0 ? 'terlambat' : 'tidakterlambat';

            totalDenda += denda;
          }
        });

        const dibayar = parseInt(uangBayarEl.value) || 0;
        const tunggakan = Math.max(totalDenda - dibayar, 0);
        const kembalian = Math.max(dibayar - totalDenda, 0);

        inputTotalDenda.value = totalDenda;
        inputTunggakan.value = tunggakan;

        totalDendaEl.textContent = formatRupiah(totalDenda);
        tunggakanEl.textContent = formatRupiah(tunggakan);
        kembalianEl.textContent = formatRupiah(kembalian);
        badgeBayar.textContent = formatRupiah(dibayar);
      };

      rows.forEach(row => {
        const input = row.querySelector('.tgl-kembali');
        if (input) input.addEventListener('change', hitungDenda);
      });

      uangBayarEl.addEventListener('input', hitungDenda);
      hitungDenda();
    });
  </script>
</body>

</html>