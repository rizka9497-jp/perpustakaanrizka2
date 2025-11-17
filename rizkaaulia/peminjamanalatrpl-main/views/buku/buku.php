<?php
// views/buku/buku.php

// Pindahkan error reporting ke atas
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Hapus kode PHP di atas ini yang salah tempat

?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Buku</h3>
  </div>

  <div class="card-body">
    <div class="mb-3">
      <a href="index.php?halaman=tambahbuku" class="btn btn-primary float-right btn-sm mb-3">
        <i class="fas fa-plus"></i> Tambah Buku
      </a>
    </div>

    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Foto</th>
          <th>Judul</th>
          <th>Kategori</th>
          <th>Pengarang</th>
          <th>Tahun Terbit</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Tambahkan pengecekan koneksi sebelum menjalankan query
        if (!isset($koneksi) || mysqli_connect_errno()) {
            echo '<tr><td colspan="8" style="color:red; text-align:center;">ERROR: Koneksi database tidak tersedia.</td></tr>';
        } else {
            // Ambil data buku beserta nama kategori
            $sql = "
              SELECT 
                b.idbuku,  
                b.judul, 
                k.nama_kategori AS kategori, 
                b.pengarang, 
                b.tahun_terbit, 
                b.stok, 
                b.foto
              FROM buku b
              LEFT JOIN kategori k ON b.idkategori = k.idkategori
              ORDER BY b.idbuku
            ";
            
            // JALANKAN QUERY
            $query = mysqli_query($koneksi, $sql);
    
            if (!$query) {
                // Tampilkan error jika query gagal (misalnya salah nama kolom/tabel)
                echo '<tr><td colspan="8" style="color:red;">Query error: ' . htmlspecialchars(mysqli_error($koneksi)) . '</td></tr>';
            } else {
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) :
                    // Tangani foto (LOGIKA SUDAH BENAR)
                    $foto_db = $data['foto'];
                    if (!empty($foto_db)) {
                        $foto_path = (strpos($foto_db, '/') !== false) ? $foto_db : 'foto/' . $foto_db;
                        $server_file = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($foto_path, '/');
                        if (!file_exists($server_file)) {
                            $foto_path = 'dist/img/book-default.png';
                        }
                    } else {
                        $foto_path = 'dist/img/book-default.png';
                    }
        ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><img src="<?= htmlspecialchars($foto_path); ?>" class="img-thumbnail" style="width:60px;height:60px;object-fit:cover;"></td>
                        <td><?= htmlspecialchars($data['judul']); ?></td>
                        <td><?= htmlspecialchars($data['kategori']); ?></td>
                        <td><?= htmlspecialchars($data['pengarang']); ?></td>
                        <td><?= htmlspecialchars($data['tahun_terbit']); ?></td>
                        <td><?= htmlspecialchars($data['stok']); ?></td>
                        <td>
                            <a href="index.php?halaman=editbuku&id=<?= htmlspecialchars($data['idbuku']); ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus_buku.php?id=<?= htmlspecialchars($data['idbuku']); ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
        <?php
                endwhile;
            }
        } // Penutup else untuk cek $koneksi
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Foto</th>
          <th>Judul</th>
          <th>Kategori</th>
          <th>Pengarang</th>
          <th>Tahun Terbit</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>