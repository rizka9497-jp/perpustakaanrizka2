<?php
include_once __DIR__ . '/../../koneksi.php';

// Cek ID dari URL
if (!isset($_GET['id'])) {
    die("ID Admin tidak ditemukan.");
}

$encodedId = $_GET['id'];
$decodedId = base64_decode($encodedId, true);

if ($decodedId === false || !is_numeric($decodedId)) {
    die("ID Admin tidak valid.");
}

$idadmin = intval($decodedId);

// Ambil data admin
$q = mysqli_query($koneksi, "SELECT * FROM admin WHERE idadmin = $idadmin");
$data = mysqli_fetch_assoc($q);

if (!$data) {
    die("Data admin tidak ditemukan.");
}

// Tentukan foto
$foto = (!empty($data['foto']) && file_exists(__DIR__ . "/../../foto/admin/" . $data['foto']))
    ? "foto/admin/" . $data['foto']
    : "dist/img/default-user.png";
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h4><i class="fas fa-user-edit"></i> Edit Admin</h4>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card p-4 shadow-sm">

                <form action="db/dbadmin.php?proses=edit" method="POST" enctype="multipart/form-data">

                    <!-- Hidden ID -->
                    <input type="hidden" name="idadmin" value="<?= $data['idadmin']; ?>">

                    <!-- Nama -->
                    <div class="form-group mb-3">
                        <label class="fw-semibold">Nama Admin</label>
                        <input type="text" name="nama" class="form-control"
                            value="<?= htmlspecialchars($data['nama']); ?>" required>
                    </div>

                    <!-- Username -->
                    <div class="form-group mb-3">
                        <label class="fw-semibold">Username</label>
                        <input type="text" name="username" class="form-control"
                            value="<?= htmlspecialchars($data['username']); ?>" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label class="fw-semibold">Password (kosongkan bila tidak diubah)</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••">
                    </div>

                    <!-- Foto -->
                    <div class="form-group mb-3">
                        <label class="fw-semibold">Foto Admin</label>
                        <input type="file" name="foto" class="form-control">

                        <div class="mt-2">
                            <img src="<?= $foto; ?>" height="100"
                                 class="rounded shadow-sm border">
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-warning me-2">
                            <i class="fas fa-save"></i> Update
                        </button>

                        <a href="?halaman=admin" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>
