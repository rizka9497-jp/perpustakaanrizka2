<!-- ====== HEADER HALAMAN ====== -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Tambah Peminjaman</h1>
      </div>
    </div>
  </div>
</section>

<!-- ====== FORM TAMBAH PEMINJAMAN ====== -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary shadow-sm">
      <div class="card-header bg-primary text-white">
        <h3 class="card-title">Tambah Peminjaman Baru</h3>
      </div>

      <form action="db/dbpeminjaman.php?proses=tambah" method="POST" id="formPeminjaman">
        <div class="card-body">

          <!-- === PILIH PEMINJAM === -->
          <div class="form-group">
            <label><strong>Nama Peminjam</strong></label>
            <table class="table table-bordered table-striped text-sm">
              <thead class="bg-light">
                <tr>
                  <th>Nama</th>
                  <th class="text-center">Pilih</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $peminjam = mysqli_query($koneksi, "SELECT idpeminjam, namapeminjam FROM peminjam ORDER BY namapeminjam ASC");
                while ($row = mysqli_fetch_assoc($peminjam)) {
                  echo "
                    <tr>
                      <td>" . htmlspecialchars($row['namapeminjam']) . "</td>
                      <td class='text-center'>
                        <input type='radio' name='idpeminjam' value='{$row['idpeminjam']}' required>
                      </td>
                    </tr>
                  ";
                }
                ?>
              </tbody>
            </table>
          </div>

          <hr>

          <!-- === INFORMASI OTOMATIS === -->
          <div class="row">
            <div class="col-md-3">
              <label><strong>Tanggal Pinjam</strong></label>
              <input type="text" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control" readonly>
            </div>
            <div class="col-md-3">
              <label><strong>Tanggal Kembali (Batas)</strong></label>
              <input type="text" id="tanggal_kembali" name="tanggal_kembali" class="form-control" readonly>
            </div>
            <div class="col-md-3">
              <label><strong>Durasi Peminjaman</strong></label>
              <input type="text" id="durasi" class="form-control" readonly>
            </div>
            <div class="col-md-3">
              <label><strong>Denda per Hari</strong></label>
              <input type="text" value="Rp 1.000" class="form-control" readonly>
            </div>
          </div>

          <hr>

          <!-- === PILIH BUKU YANG DIPINJAM === -->
          <div class="form-group">
            <label><strong>Daftar Buku yang Akan Dipinjam</strong></label>
            <div id="daftarBuku">
              <div class="row buku-item mb-2">
                <div class="col-md-8">
                  <select name="idbuku[]" class="form-control pilihBuku" required>
                    <option value="">-- Pilih Buku --</option>
                    <?php
                    $buku = mysqli_query($koneksi, "SELECT idbuku, judul, stok FROM buku ORDER BY judul ASC");
                    while ($row = mysqli_fetch_assoc($buku)) {
                      $judul = htmlspecialchars($row['judul']);
                      $stok = (int)$row['stok'];
                      echo "<option value='{$row['idbuku']}' data-stok='{$stok}'>{$judul} (Stok: {$stok})</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <input type="number" name="jumlah[]" class="form-control jumlahPinjam" min="1" placeholder="Jumlah" required>
                </div>
                <div class="col-md-1 text-center">
                  <button type="button" class="btn btn-danger btnHapusBuku" title="Hapus Buku Ini">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </div>
            </div>

            <button type="button" id="btnTambahBuku" class="btn btn-sm btn-primary mt-2">
              <i class="fas fa-plus"></i> Tambah Buku
            </button>
          </div>
        </div>

        <!-- === FOOTER FORM === -->
        <div class="card-footer text-right">
          <button type="reset" class="btn btn-warning">Reset</button>
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="?halaman=peminjaman" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- ====== SCRIPT VALIDASI DAN OTOMATIS ====== -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  const tglPinjamInput = document.getElementById('tanggal_pinjam');
  const tglKembaliInput = document.getElementById('tanggal_kembali');
  const durasiInput = document.getElementById('durasi');

  // Set tanggal otomatis (durasi 6 hari)
  const today = new Date();
  const durasiHari = 6;
  const batasKembali = new Date(today);
  batasKembali.setDate(today.getDate() + durasiHari);

  const toDateInput = date => date.toISOString().split('T')[0];
  tglPinjamInput.value = toDateInput(today);
  tglKembaliInput.value = toDateInput(batasKembali);
  durasiInput.value = `${durasiHari} hari`;

  // Tambah baris buku baru
  document.getElementById('btnTambahBuku').addEventListener('click', () => {
    const daftar = document.getElementById('daftarBuku');
    const itemBaru = daftar.querySelector('.buku-item').cloneNode(true);
    itemBaru.querySelectorAll('input').forEach(i => i.value = '');
    itemBaru.querySelector('select').selectedIndex = 0;
    daftar.appendChild(itemBaru);
  });

  // Hapus baris buku
  document.addEventListener('click', e => {
    if (e.target.closest('.btnHapusBuku')) {
      const items = document.querySelectorAll('.buku-item');
      if (items.length > 1) {
        e.target.closest('.buku-item').remove();
      } else {
        alert('Minimal satu buku harus dipinjam.');
      }
    }
  });

  // === Validasi stok buku ===
  document.addEventListener('input', function(e) {
    if (e.target.classList.contains('jumlahPinjam') || e.target.classList.contains('pilihBuku')) {
      const item = e.target.closest('.buku-item');
      const select = item.querySelector('.pilihBuku');
      const inputJumlah = item.querySelector('.jumlahPinjam');
      const stok = parseInt(select.options[select.selectedIndex].getAttribute('data-stok')) || 0;
      const jumlah = parseInt(inputJumlah.value) || 0;

      if (jumlah > stok && stok > 0) {
        alert(`Jumlah yang dimasukkan (${jumlah}) melebihi stok tersedia (${stok}).`);
        inputJumlah.value = stok;
      }
    }
  });

  // === Validasi sebelum submit ===
  document.getElementById('formPeminjaman').addEventListener('submit', function(e) {
    let valid = true;
    document.querySelectorAll('.buku-item').forEach(item => {
      const select = item.querySelector('.pilihBuku');
      const inputJumlah = item.querySelector('.jumlahPinjam');
      const stok = parseInt(select.options[select.selectedIndex].getAttribute('data-stok')) || 0;
      const jumlah = parseInt(inputJumlah.value) || 0;
      if (jumlah > stok) {
        alert(`Jumlah buku "${select.options[select.selectedIndex].text}" melebihi stok (${stok}).`);
        valid = false;
      }
    });
    if (!valid) e.preventDefault();
  });
});
</script>
