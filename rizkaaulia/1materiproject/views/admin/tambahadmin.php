<?php
include "koneksi.php";
?>

<section class="content">
  <div class="card">
    <div class="card-header bg-success text-white">
      <h5 class="mb-0"><i class="fas fa-user-plus"></i> Tambah Admin</h5>
    </div>

    <div class="card-body">
      <form action="views/admin/prosestambahadmin.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label>Nama Admin</label>
          <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-3">
          <i class="fas fa-save"></i> Simpan
        </button>

        <a href="?halaman=admin" class="btn btn-danger mt-3">
          <i class="fas fa-arrow-left"></i> Kembali
        </a>
      </form>
    </div>
  </div>
</section>
