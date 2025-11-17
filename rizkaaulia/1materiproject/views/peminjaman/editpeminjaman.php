<?php
include "koneksi.php";

// ===== CEK ID PEMINJAMAN =====
if (!isset($_GET['idpeminjaman']) || empty($_GET['idpeminjaman'])) {
  echo "<script>alert('Silakan pilih data peminjaman dari daftar.'); window.location='index.php?halaman=daftarpeminjaman';</script>";
  exit;
}

$idpeminjaman = intval($_GET['idpeminjaman']);

// ===== AMBIL DATA PEMINJAMAN =====
$qPeminjaman = mysqli_query($koneksi, "
  SELECT p.*, pm.namapeminjam 
  FROM peminjaman p
  JOIN peminjam pm ON p.idpeminjam = pm.idpeminjam
  WHERE p.idpeminjaman = '$idpeminjaman'
");
if (!$qPeminjaman || mysqli_num_rows($qPeminjaman) == 0) {
  echo "<script>alert('ID peminjaman tidak ditemukan.'); window.location='index.php?halaman=daftarpeminjaman';</script>";
  exit;
}

$data = mysqli_fetch_assoc($qPeminjaman);

// ===== AMBIL DETAIL BUKU =====
$qDetail = mysqli_query($koneksi, "
  SELECT dp.*, b.judul, b.stok 
  FROM detailpeminjaman dp
  JOIN buku b ON dp.idbuku = b.idbuku
  WHERE dp.idpeminjaman = '$idpeminjaman'
");
$detailBuku = [];
while ($row = mysqli_fetch_assoc($qDetail)) {
  $detailBuku[] = $row;
}
?>

<!-- ===== HEADER HALAMAN ===== -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Data Peminjaman</h1>
      </div>
    </div>
  </div>
</section>

<!-- ===== FORM EDIT PEMINJAMAN ===== -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary shadow-sm">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title">Form Edit Peminjaman</h3>
      </div>

      <form action="db/dbpeminjaman.php?proses=edit" method="POST" id="formEditPeminjaman">
        <input type="hidden" name="idpeminjaman" value="<?= $data['idpeminjaman'] ?>">

        <div class="card-body">

          <!-- === PEMINJAM === -->
          <div class="form-group">
            <label><strong>Nama Peminjam</strong></label>
            <select name="idpeminjam" class="form-control" required>
              <option value="">-- Pilih Peminjam --</option>
              <?php
              $peminjam = mysqli_query($koneksi, "SELECT idpeminjam, namapeminjam FROM peminjam ORDER BY namapeminjam ASC");
              while ($row = mysqli_fetch_assoc($peminjam)) {
                $selected = ($row['idpeminjam'] == $data['idpeminjam']) ? 'selected' : '';
                echo "<option value='{$row['idpeminjam']}' $selected>{$row['namapeminjam']}</option>";
              }
              ?>
            </select>
          </div>

          <div class="row">
            <div class="col-md-6">
              <label><strong>Tanggal Pinjam</strong></label>
              <input type="date" name="tanggal_pinjam" class="form-control"
                value="<?= date('Y-m-d', strtotime($detailBuku[0]['tanggalpinjam'] ?? '')) ?>" required>
            </div>
            <div class="col-md-6">
              <label><strong>Tanggal Kembali</strong></label>
              <input type="date" name="tanggal_kembali" class="form-control"
                value="<?= date('Y-m-d', strtotime($detailBuku[0]['tanggalkembali'] ?? '')) ?>" required>
            </div>
          </div>

          <hr>

          <!-- === DAFTAR BUKU DIPINJAM === -->
          <div class="form-group">
            <label><strong>Daftar Buku Dipinjam</strong></label>
            <table class="table table-bordered text-sm" id="tabelBuku">
              <thead class="bg-light">
                <tr>
                  <th>Buku</th>
                  <th width="120">Stok Tersedia</th>
                  <th width="100">Jumlah</th>
                  <th width="80" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="daftarBuku">
                <?php foreach ($detailBuku as $det): ?>
                  <tr class="buku-item">
                    <td>
                      <select name="idbuku[]" class="form-control pilihBuku" required>
                        <option value="">-- Pilih Buku --</option>
                        <?php
                        $buku = mysqli_query($koneksi, "SELECT idbuku, judul, stok FROM buku ORDER BY judul ASC");
                        while ($b = mysqli_fetch_assoc($buku)) {
                          $sel = ($b['idbuku'] == $det['idbuku']) ? 'selected' : '';
                          echo "<option value='{$b['idbuku']}' data-stok='{$b['stok']}' $sel>{$b['judul']} (Stok: {$b['stok']})</option>";
                        }
                        ?>
                      </select>
                    </td>
                    <td class="text-center stokBuku">
                      <?= isset($det['stok']) ? htmlspecialchars($det['stok']) : '0' ?>
                    </td>
                    <td>
                      <input
                        type="number"
                        name="jumlah[]"
                        class="form-control jumlahPinjam"
                        value="<?= isset($det['jumlah']) && is_numeric($det['jumlah']) ? htmlspecialchars($det['jumlah']) : '1' ?>"
                        min="1"
                        required>
                    </td>
                    <td class="text-center">
                      <button type="button" class="btn btn-danger btnHapusBuku">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                  </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
            <button type="button" id="btnTambahBuku" class="btn btn-sm btn-primary mt-2">
              <i class="fas fa-plus"></i> Tambah Buku
            </button>
          </div>
        </div>

        <div class="card-footer text-right">
          <button type="submit" class="btn btn-success">Simpan Perubahan</button>
          <a href="index.php?halaman=daftarpeminjaman" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- ===== SCRIPT VALIDASI & STOK ===== -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const daftar = document.getElementById('daftarBuku');
    const btnTambah = document.getElementById('btnTambahBuku');

    btnTambah.addEventListener('click', function() {
      const itemBaru = daftar.querySelector('.buku-item').cloneNode(true);
      itemBaru.querySelectorAll('select').forEach(sel => sel.selectedIndex = 0);
      itemBaru.querySelectorAll('input').forEach(inp => inp.value = '');
      daftar.appendChild(itemBaru);
    });

    document.addEventListener('click', function(e) {
      if (e.target.closest('.btnHapusBuku')) {
        const item = e.target.closest('.buku-item');
        if (document.querySelectorAll('.buku-item').length > 1) {
          item.remove();
        } else {
          alert('Minimal satu buku harus dipinjam.');
        }
      }
    });

    document.addEventListener('input', function(e) {
      if (e.target.classList.contains('jumlahPinjam') || e.target.classList.contains('pilihBuku')) {
        const row = e.target.closest('.buku-item');
        const select = row.querySelector('.pilihBuku');
        const jumlahInput = row.querySelector('.jumlahPinjam');
        const stok = parseInt(select.options[select.selectedIndex].getAttribute('data-stok')) || 0;
        const jumlah = parseInt(jumlahInput.value) || 0;
        row.querySelector('.stokBuku').innerText = stok;
        if (jumlah > stok && stok > 0) {
          alert(`Jumlah melebihi stok (${stok})!`);
          jumlahInput.value = stok;
        }
      }
    });
  });
</script>