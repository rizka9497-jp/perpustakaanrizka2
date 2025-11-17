<?php
include "../koneksi.php";
session_start();

$proses = $_GET['proses'] ?? '';

/**
 * Fungsi ambil idadmin default (tanpa login)
 * Ambil idadmin terkecil (atau pertama) dari tabel admin
 */
function getDefaultAdminId($koneksi) {
    $q = mysqli_query($koneksi, "SELECT idadmin FROM admin ORDER BY idadmin ASC LIMIT 1");
    $r = mysqli_fetch_assoc($q);
    return $r ? $r['idadmin'] : null;
}

// ===================================
// PROSES TAMBAH PEMINJAMAN
// ===================================
if ($proses == 'tambah') {

    $idpeminjam = $_POST['idpeminjam'] ?? '';
    if (empty($idpeminjam)) die("Error: Peminjam tidak dipilih!");

    // Ambil idadmin default
    $idadmin = getDefaultAdminId($koneksi);
    if (!$idadmin) die("Error: Tidak ada data admin di database!");

    // Buat record utama peminjaman
    $insertPeminjaman = mysqli_query($koneksi, "
        INSERT INTO peminjaman (idpeminjam, idadmin) 
        VALUES ('$idpeminjam', '$idadmin')
    ") or die("Error insert peminjaman: " . mysqli_error($koneksi));

    $idpeminjaman = mysqli_insert_id($koneksi);

    // Tanggal default (hari ini + 6 hari)
    $tanggal_pinjam = date("Y-m-d");
    $tanggal_kembali = date("Y-m-d", strtotime("+6 days"));
    $durasi = 6;

    // Loop daftar buku
    foreach ($_POST['idbuku'] as $i => $idbuku) {
        $jumlah = (int)$_POST['jumlah'][$i];
        if ($jumlah <= 0) continue;

        // Insert detail peminjaman
        mysqli_query($koneksi, "
            INSERT INTO detailpeminjaman 
            (idpeminjaman, idbuku, total, tanggalpinjam, tanggalkembali, tanggaldikembalikan, durasipeminjaman, jumlahharitelat, denda, keterangan, status)
            VALUES 
            ('$idpeminjaman', '$idbuku', '$jumlah', '$tanggal_pinjam', '$tanggal_kembali', NULL, '$durasi', 0, 0, 'belumkembali', 'Tidak')
        ") or die("Error insert detail: " . mysqli_error($koneksi));

        // Kurangi stok buku
        mysqli_query($koneksi, "UPDATE buku SET stok = stok - $jumlah WHERE idbuku='$idbuku'")
            or die("Error update stok: " . mysqli_error($koneksi));
    }

    header("Location: ../index.php?halaman=daftarpeminjaman&status=tambah_sukses");
    exit;
}

// ===================================
// PROSES EDIT PEMINJAMAN
// ===================================
elseif ($proses == 'edit') {

    $idpeminjaman = $_POST['idpeminjaman'] ?? '';
    $idpeminjam = $_POST['idpeminjam'] ?? '';

    if (empty($idpeminjaman) || empty($idpeminjam)) die("Error: Data tidak lengkap!");

    // 1. Kembalikan stok lama
    $detailLama = mysqli_query($koneksi, "SELECT * FROM detailpeminjaman WHERE idpeminjaman='$idpeminjaman'");
    while ($d = mysqli_fetch_assoc($detailLama)) {
        mysqli_query($koneksi, "UPDATE buku SET stok = stok + {$d['total']} WHERE idbuku='{$d['idbuku']}'");
    }

    // 2. Hapus detail lama
    mysqli_query($koneksi, "DELETE FROM detailpeminjaman WHERE idpeminjaman='$idpeminjaman'");

    // 3. Tambahkan detail baru dari form
    $tanggal_pinjam = date("Y-m-d");
    $tanggal_kembali = date("Y-m-d", strtotime("+6 days"));
    $durasi = 6;

    foreach ($_POST['idbuku'] as $i => $idbuku) {
        $jumlah = (int)$_POST['jumlah'][$i];
        if ($jumlah <= 0) continue;

        mysqli_query($koneksi, "
            INSERT INTO detailpeminjaman 
            (idpeminjaman, idbuku, total, tanggalpinjam, tanggalkembali, tanggaldikembalikan, durasipeminjaman, jumlahharitelat, denda, keterangan, status)
            VALUES 
            ('$idpeminjaman', '$idbuku', '$jumlah', '$tanggal_pinjam', '$tanggal_kembali', NULL, '$durasi', 0, 0, 'belumkembali', 'Tidak')
        ") or die("Error insert detail baru: " . mysqli_error($koneksi));

        // Kurangi stok baru
        mysqli_query($koneksi, "UPDATE buku SET stok = stok - $jumlah WHERE idbuku='$idbuku'");
    }

    // 4. Update header peminjaman
    mysqli_query($koneksi, "
        UPDATE peminjaman 
        SET idpeminjam='$idpeminjam' 
        WHERE idpeminjaman='$idpeminjaman'
    ") or die("Error update header: " . mysqli_error($koneksi));

    header("Location: ../index.php?halaman=daftarpeminjaman&status=edit_sukses");
    exit;
}

// ===================================
// PROSES HAPUS PEMINJAMAN
// ===================================
elseif ($proses == 'hapus') {

    $idpeminjaman = $_GET['idpeminjaman'] ?? '';
    if (empty($idpeminjaman)) die("Error: ID tidak ditemukan!");

    // Kembalikan stok buku sebelum hapus
    $detail = mysqli_query($koneksi, "SELECT * FROM detailpeminjaman WHERE idpeminjaman='$idpeminjaman'");
    while ($d = mysqli_fetch_assoc($detail)) {
        mysqli_query($koneksi, "UPDATE buku SET stok = stok + {$d['total']} WHERE idbuku='{$d['idbuku']}'");
    }

    mysqli_query($koneksi, "DELETE FROM detailpeminjaman WHERE idpeminjaman='$idpeminjaman'");
    mysqli_query($koneksi, "DELETE FROM peminjaman WHERE idpeminjaman='$idpeminjaman'");

    header("Location: ../index.php?halaman=peminjaman&status=hapus_sukses");
    exit;
}

else {
    die("Proses tidak dikenali!");
}

?>