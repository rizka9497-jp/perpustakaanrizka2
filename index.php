<?php
// =========================
//  ROUTE SENTRAL (index.php)
//  versi tanpa __DIR__ / BASE_PATH
// =========================

// Mulai session
session_start();

// koneksi tanpa __DIR__
include "koneksi.php";

// =========================
// HALAMAN DEFAULT = WELCOME
// =========================
if (!isset($_GET['halaman']) && !isset($_SESSION['role'])) {
    include "views/welcome.php";
    exit;
}

// =========================
// CEK LOGIN & REDIREKSI
// =========================
if (!isset($_SESSION['role'])) {
    if (isset($_GET['halaman']) && $_GET['halaman'] === 'loginadmin') {
        include "views/admin/loginadmin.php";
    } elseif (isset($_GET['halaman']) && $_GET['halaman'] === 'loginpeminjam') {
        include "views/peminjam/loginpeminjam.php";
    } else {
        include "views/welcome.php";
    }
    exit;
}

$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 'dashboard';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <?php include "pages/header.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="Logo" height="60" width="60">
  </div>

  <!-- NAVBAR -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php include "pages/navbar.php"; ?>
  </nav>

  <!-- SIDEBAR -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include "pages/sidebar.php"; ?>
  </aside>

  <!-- CONTENT WRAPPER -->
  <div class="content-wrapper">
    <section class="content pt-3">
      <div class="container-fluid">

        <?php
        // =========================
        // ROUTER HALAMAN
        // =========================
        if (isset($_GET['halaman'])) {
          switch ($_GET['halaman']) {

            // =========================
            // HALAMAN PUBLIC
            // =========================
            case "welcome":
                include "views/welcome.php";
                break;
            case "loginadmin":
                include "views/admin/loginadmin.php";
                break;
            case "loginpeminjam":
                include "views/peminjam/loginpeminjam.php";
                break;

            // =========================
            // ADMIN
            // =========================
            case "admin":
                include "views/admin/admin.php";
                break;
            case "tambahadmin":
                include "views/admin/tambahadmin.php";
                break;
            case "editadmin":
                include "views/admin/editadmin.php";
                break;
            case "tampiladmin":
                include "views/admin/tampiladmin.php";
                break;
            case "dashboardadmin":
                include "views/admin/dashboardadmin.php";
                break;

            // =========================
            // PEMINJAM
            // =========================
            case "peminjam":
                include "views/peminjam/peminjam.php";
                break;
            case "tambahpeminjam":
                include "views/peminjam/tambahpeminjam.php";
                break;
            case "editpeminjam":
                include "views/peminjam/editpeminjam.php";
                break;
            case "dashboardpeminjam":
                include "views/peminjam/dashboardpeminjam.php";
                break;

            // =========================
            // PEMINJAMAN
            // =========================
            case "daftarpeminjaman":
                include "views/peminjaman/daftarpeminjaman.php";
                break;
            case "tambahpeminjaman":
                include "views/peminjaman/tambahpeminjaman.php";
                break;
            case "editpeminjaman":
                include "views/peminjaman/editpeminjaman.php";
                break;
            case "detailpeminjaman":
                include "views/peminjaman/detailpeminjaman.php";
                break;
            case "prosespengembalian":
                include "views/peminjaman/prosespengembalian.php";
                break;
            case "daftarpengembalian":
                include "views/peminjaman/daftarpengembalian.php";
                break;

            // =========================
            // BUKU
            // =========================
            case "buku":
                include "views/buku/buku.php";
                break;
            case "tambahbuku":
                include "views/buku/tambahbuku.php";
                break;
            case "editbuku":
                include "views/buku/editbuku.php";
                break;

            // =========================
            // DENDA
            // =========================
            case "denda":
                include "views/denda/denda.php";
                break;
            case "tambahdenda":
                include "views/denda/tambahdenda.php";
                break;
            case "editdenda":
                include "views/denda/editdenda.php";
                break;

            // =========================
            // KATEGORI
            // =========================
            case "kategori":
                include "views/kategori/kategori.php";
                break;
            case "tambahkategori":
                include "views/kategori/tambahkategori.php";
                break;
            case "editkategori":
                include "views/kategori/editkategori.php";
                break;

            // =========================
            // RAK
            // =========================
            case "rak":
                include "views/rak/rak.php";
                break;
            case "tambahrak":
                include "views/rak/tambahrak.php";
                break;
            case "editrak":
                include "views/rak/editrak.php";
                break;

            // =========================
            // DEFAULT (jika halaman tidak dikenali)
            // =========================
            default:
                echo "<div class='alert alert-warning'>Halaman tidak ditemukan.</div>";
                break;
          }
        } else {

          // Jika tidak ada parameter, tampilkan dashboard sesuai role
          if ($_SESSION['role'] === 'admin') {
            include "views/admin/dashboar.php";
          } else {
            include "views/peminjam/dashboardpeminjam.php";
          }
        }
        ?>
      </div>
    </section>
  </div>

  <!-- FOOTER -->
  <footer class="main-footer text-center">
    <strong>&copy; </strong>
  </footer>

</div>

<!-- JS -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
