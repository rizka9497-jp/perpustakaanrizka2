<?php

// Ambil data dari tabel peminjam
$query = mysqli_query($koneksi, "SELECT * FROM peminjam");
?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Peminjam</h3>
  </div>

  <div class="card-body">
    <div class="col">
      <a href="index.php?halaman=tambahpeminjam" class="btn btn-primary float-right btn-sm mb-3">
        <i class="fas fa-user-plus"></i> Tambah Peminjam
      </a>
    </div>

    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Peminjam</th>
          <th>Username</th>
          <th>Asal</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) :
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['namapeminjam']; ?></td>
            <td><?= $data['username']; ?></td>
            <td><?= $data['asal']; ?></td>
            <td>
              <?php if (!empty($data['foto'])): ?>
                <img src="../../foto/<?= $data['foto']; ?>" width="60" height="60" class="rounded">
              <?php else: ?>
                <span class="text-muted">-</span>
              <?php endif; ?>
            </td>
            <td>
              <a href="index.php?halaman=editpeminjam&id=<?= $data['idpeminjam']; ?>" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i>
              </a>
              <a href="hapus_peminjam.php?id=<?= $data['idpeminjam']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>      
    </table>
  </div>
</div>
