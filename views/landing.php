<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan SMKN 1 Karang Baru</title>

  <!-- AdminLTE & Bootstrap -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    body {
      background-color: #f4f6f9;
    }

    /* HERO / BANNER */
    .hero {
      position: relative;
      background: url('foto/smkn1karangbaru.jpg') no-repeat center center/cover;
      height: 320px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .hero::after {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.45);
    }
    .hero-content {
      position: relative;
      z-index: 1;
    }
    .hero h1 {
      font-weight: bold;
      font-size: 35px;
    }

    /* NAVBAR */
    .navbar-custom {
      background-color: #1e3a8a; 
    }
    .navbar-custom .nav-link,
    .navbar-custom .navbar-brand {
      color: #fff !important;
      font-weight: bold;
    }
    .btn-login {
      border-radius: 30px;
      font-weight: bold;
    }

    /* CARD BUKU */
    .card-buku img {
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
    }

    footer {
      background-color: #1e3a8a;
      color: white;
      text-align: center;
      padding: 15px 0;
      margin-top: 40px;
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
      <a class="navbar-brand" href="#">PERPUSTAKAAN SMKN 1 KARANG BARU</a>

      <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon text-white"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item"><a href="welcome.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Kontak</a></li>

          <li class="nav-item">
            <a href="views/admin/loginadmin.php" class="btn btn-light btn-sm mx-2 btn-login">
              <i class="fas fa-user-shield"></i> Login Admin
            </a>
          </li>
          <li class="nav-item">
            <a href="views/peminjam/loginpeminjam.php" class="btn btn-warning btn-sm btn-login">
              <i class="fas fa-user"></i> Login Peminjam
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <div class="hero">
    <div class="hero-content">
      <h1>Koleksi Buku Terlengkap</h1>
      <p>Ribuan buku tersedia untuk dibaca dan dipinjam</p>

      <a href="#katalog" class="btn btn-primary btn-lg mt-2">
        <i class="fas fa-book"></i> Lihat Katalog
      </a>
    </div>
  </div>

  <!-- KATALOG -->
  <section id="katalog" class="container mt-5">
    <div class="text-center mb-4">
      <h2><b>Katalog Buku</b></h2>
      <p class="text-muted">Temukan buku favoritmu di perpustakaan</p>
    </div>

    <div class="row">
      <?php
      $query = mysqli_query($koneksi, "
        SELECT buku.*, kategori.namakategori 
        FROM buku 
        LEFT JOIN kategori ON buku.idkategori = kategori.idkategori
      ");

      while ($b = mysqli_fetch_assoc($query)) {
        $foto = !empty($b['foto']) ? "foto/" . $b['foto'] : "dist/img/noimage.jpg";
      ?>
        <div class="col-md-3 mb-4">
          <div class="card card-buku h-100 shadow-sm">

            <img src="<?php echo $foto; ?>" class="card-img-top" alt="Cover Buku">

            <div class="card-body">
              <h5 class="card-title text-center"><?php echo $b['judul']; ?></h5>

              <p>
                <b>Pengarang:</b> <?php echo $b['pengarang']; ?><br>
                <b>Kategori:</b> <?php echo $b['namakategori']; ?><br>
                <b>Tahun Terbit:</b> <?php echo $b['tahun_terbit']; ?><br>
                <b>Stok:</b> <?php echo $b['stok']; ?>
              </p>
            </div>

            <div class="card-footer text-center">
              <a href="#" class="btn btn-primary btn-sm">Lihat Selengkapnya</a>
            </div>

          </div>
        </div>
      <?php } ?>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <p>© <?php echo date("Y"); ?> Perpustakaan SMKN 1 Karang Baru</p>
  </footer>

  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
</body>
</html>
