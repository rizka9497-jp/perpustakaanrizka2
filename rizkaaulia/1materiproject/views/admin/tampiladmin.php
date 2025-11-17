<?php
include_once __DIR__ . '/../../koneksi.php';

// Pastikan ada parameter id di URL
if (!isset($_GET['id'])) {
  echo "<script>alert('ID tidak ditemukan');window.location='?halaman=admin';</script>";
  exit;
}

$idadmin = base64_decode($_GET['id']);
$q = mysqli_query($koneksi, "
  SELECT * FROM admin 
  WHERE idadmin='$idadmin'
");
$data = mysqli_fetch_assoc($q);

// Jika data tidak ditemukan
if (!$data) {
  echo "<script>alert('Data tidak ditemukan');window.location='?halaman=admin';</script>";
  exit;
}
?>

<section class="content">
  <div class="card shadow-sm border-0">

    <!-- Header -->
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-user-shield"></i> Detail Admin</h5>
    </div>

    <!-- Body -->
    <div class="card-body">

      <div class="row">
        
        <!-- Foto Admin -->
        <div class="col-md-4 text-center">
          <img src="foto/admin/<?= !empty($data['foto']) ? $data['foto'] : 'default-user.png'; ?>" 
               class="rounded-circle shadow mb-3"
               width="150" height="150"
               style="object-fit: cover; border: 3px solid #007bff;"
               alt="Foto Admin">
               
          <h5 class="fw-bold"><?= htmlspecialchars($data['nama']); ?></h5>
          <span class="badge bg-success px-3 py-2">Admin</span>
        </div>

        <!-- Tabel Detail -->
        <div class="col-md-8">
          <table class="table table-bordered table-striped">
            <tr>
              <th width="30%"><i class="fas fa-user"></i> Nama</th>
              <td><?= htmlspecialchars($data['nama']); ?></td>
            </tr>

            <tr>
              <th><i class="fas fa-user-tag"></i> Username</th>
              <td><?= htmlspecialchars($data['username']); ?></td>
            </tr>

            <tr>
              <th><i class="fas fa-lock"></i> Password</th>
              <td>
                ••••••••• (disembunyikan)
              </td>
            </tr>

          </table>
        </div>
      </div>

      <!-- Tombol Aksi -->
      <div class="mt-4 text-center">

        <a href="?halaman=editadmin&id=<?= base64_encode($data['idadmin']); ?>" 
           class="btn btn-warning me-2">
          <i class="fas fa-edit"></i> Edit Profil
        </a>

        <a href="?halaman=admin" class="btn btn-danger">
          <i class="fas fa-arrow-left"></i> Kembali
        </a>
      </div>

    </div>
  </div>
</section>
