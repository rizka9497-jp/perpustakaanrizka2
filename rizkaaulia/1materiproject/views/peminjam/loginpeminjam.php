<?php
// Tidak membutuhkan session di halaman login
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Peminjam | Perpustakaan Rizka</title>

  <!-- Assets -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <style>
    body {
      background: url('../../foto/bg-library.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    .login-box {
      width: 420px;
      margin-top: 90px;
    }

    .login-card-body {
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0px 0px 15px rgba(0,0,0,0.3);
      background: rgba(255,255,255,0.92);
      backdrop-filter: blur(4px);
    }

    .brand-logo img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.4);
    }

    .btn-success {
      border-radius: 25px;
      font-weight: bold;
      padding: 10px;
      font-size: 16px;
    }

    a { font-weight: bold; }
  </style>
</head>

<body class="hold-transition login-page">

<div class="login-box">

  <!-- LOGO -->
  <div class="text-center mb-2 brand-logo">
    <img src="../../dist/img/UserIcon.png" alt="User">
  </div>

  <!-- Judul -->
  <div class="text-center text-white mb-3">
    <h3 style="text-shadow: 1px 1px 4px black;">
      <b>Login Peminjam</b> Perpustakaan
    </h3>
  </div>

  <!-- CARD LOGIN -->
  <div class="card">
    <div class="card-body login-card-body">

      <p class="login-box-msg mb-4">
        Masukkan Username & Password Peminjam
      </p>

      <!-- FORM LOGIN -->
      <form action="../../db/dblogin.php?role=peminjam" method="POST">

        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-lock"></i>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-success btn-block">
          <i class="fas fa-sign-in-alt"></i> Masuk Sekarang
        </button>
      </form>

      <p class="mt-3 text-center">
        <a href="../../welcome.php" class="text-success">
          <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>
      </p>

    </div>
  </div>

</div>

<!-- JS -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
