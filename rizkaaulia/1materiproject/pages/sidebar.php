<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Logo -->
  <a href="index.php" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- User panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Rizka Aulia</a>
      </div>
    </div>

    <!-- Search form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
          style="overflow-y: auto; height: calc(100vh - 120px);">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="index.php?halaman=dashboard" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Admin -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Admin
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="index.php?halaman=admin" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Daftar Admin</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=tambahadmin" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Tambah Admin</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=editadmin" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Edit Admin</p></a></li>
          </ul>
        </li>

        <!-- Peminjam -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Peminjam
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="index.php?halaman=peminjam" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Daftar Peminjam</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=tambahpeminjam" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Tambah Peminjam</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=editpeminjam" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Edit Peminjam</p></a></li>
          </ul>
        </li>

        <!-- Peminjaman -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-reader"></i>
            <p>
              Peminjaman
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="index.php?halaman=daftarpeminjaman" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Daftar Peminjaman</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=editpeminjaman" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Edit Peminjaman</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=daftarpengembalian" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Daftar Pengembalian</p></a></li>
             <li class="nav-item"><a href="index.php?halaman=prosespengembalian" class="nav-link"><i class="far fa-circle nav-icon"></i><p>prosespengembalian</p></a></li>
              <li class="nav-item"><a href="index.php?halaman=tambahpeminjaman" class="nav-link"><i class="far fa-circle nav-icon"></i><p>tambahpeminjaman</p></a></li>
          </ul>
        </li>

        <!-- Buku -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Buku
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="index.php?halaman=buku" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Daftar Buku</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=tambahbuku" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Tambah Buku</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=editbuku" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Edit Buku</p></a></li>
          </ul>
        </li>

        <!-- Rak -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th-large"></i>
            <p>
              Rak
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="index.php?halaman=rak" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Daftar Rak</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=tambahrak" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Tambah Rak</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=editrak" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Edit Rak</p></a></li>
          </ul>
        </li>

        <!-- Kategori -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Kategori
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="index.php?halaman=kategori" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Daftar Kategori</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=tambahkategori" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Tambah Kategori</p></a></li>
            <li class="nav-item"><a href="index.php?halaman=editkategori" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Edit Kategori</p></a></li>
            
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</aside>
