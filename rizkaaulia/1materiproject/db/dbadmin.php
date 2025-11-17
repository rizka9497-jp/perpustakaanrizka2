<?php
session_start();
include_once __DIR__ . '/../koneksi.php';

if (!isset($_GET['proses'])) {
    die("Aksi tidak dikenali.");
}

$proses = $_GET['proses'];

// =========================================================
// ===================== PROSES TAMBAH ======================
// =========================================================
if ($proses == 'tambah') {

    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = trim($_POST['password']);

    if (empty($nama) || empty($username) || empty($password)) {
        echo "<script>alert('Nama, username, dan password wajib diisi!');history.back();</script>";
        exit;
    }

    // Hash password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Upload Foto
    $fotoFinal = "default-user.png";

    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $folder = __DIR__ . '/../foto/admin/';

        if (!is_dir($folder)) mkdir($folder, 0777, true);

        $namaFileBaru = time() . "_" . basename($foto);

        if (move_uploaded_file($tmp, $folder . $namaFileBaru)) {
            $fotoFinal = $namaFileBaru;
        }
    }

    // Simpan database
    $query = "
        INSERT INTO admin (nama, username, password, foto)
        VALUES ('$nama', '$username', '$passwordHash', '$fotoFinal')
    ";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Admin berhasil ditambahkan!');window.location='../index.php?halaman=admin';</script>";
        exit;
    } else {
        die('Gagal menambah admin: ' . mysqli_error($koneksi));
    }
}



// =========================================================
// ======================= PROSES EDIT =======================
// =========================================================
elseif ($proses == 'edit') {

    $idadmin = intval($_POST['idadmin']);
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = trim($_POST['password']);

    // Ambil data lama
    $d_lama = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto FROM admin WHERE idadmin=$idadmin"));
    $foto_lama = $d_lama ? $d_lama['foto'] : "default-user.png";

    // Upload foto baru jika ada
    $fotoFinal = $foto_lama;

    if (!empty($_FILES['foto']['name'])) {
        $fotoBaru = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $folder = __DIR__ . '/../foto/admin/';

        if (!is_dir($folder)) mkdir($folder, 0777, true);

        $namaFileBaru = time() . "_" . basename($fotoBaru);

        if (move_uploaded_file($tmp, $folder . $namaFileBaru)) {
            $fotoFinal = $namaFileBaru;

            // Hapus foto lama
            if ($foto_lama != "default-user.png" && file_exists($folder . $foto_lama)) {
                unlink($folder . $foto_lama);
            }
        }
    }

    // Jika password diubah
    if (!empty($password)) {
        $passHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "
            UPDATE admin SET 
                nama='$nama',
                username='$username',
                password='$passHash',
                foto='$fotoFinal'
            WHERE idadmin=$idadmin
        ";
    } else {
        // Password tidak diubah
        $query = "
            UPDATE admin SET 
                nama='$nama',
                username='$username',
                foto='$fotoFinal'
            WHERE idadmin=$idadmin
        ";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data admin berhasil diperbarui!');window.location='../index.php?halaman=admin';</script>";
        exit;
    } else {
        die("Gagal update admin: " . mysqli_error($koneksi));
    }
}



// =========================================================
// ======================= PROSES HAPUS ======================
// =========================================================
elseif ($proses == 'hapus') {

    if (!isset($_GET['id'])) {
        die("ID tidak ditemukan.");
    }

    $idadmin = base64_decode($_GET['id']);

    // Cegah admin menghapus dirinya sendiri
    if (isset($_SESSION['idadmin']) && $_SESSION['idadmin'] == $idadmin) {
        echo "<script>alert('Tidak dapat menghapus diri sendiri!');window.location='../index.php?halaman=admin';</script>";
        exit;
    }

    // Ambil foto lama
    $d_lama = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto FROM admin WHERE idadmin=$idadmin"));
    $foto_lama = $d_lama['foto'] ?? "default-user.png";

    // Hapus admin
    $delete = mysqli_query($koneksi, "DELETE FROM admin WHERE idadmin=$idadmin");

    if ($delete) {
        if ($foto_lama != "default-user.png" && file_exists(__DIR__ . '/../foto/admin/' . $foto_lama)) {
            unlink(__DIR__ . '/../foto/admin/' . $foto_lama);
        }

        echo "<script>alert('Admin berhasil dihapus!');window.location='../index.php?halaman=admin';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal menghapus admin!');history.back();</script>";
    }
}

?>
