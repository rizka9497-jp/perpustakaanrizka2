<?php
// db/dbpengembalian.php
session_start();
include "../koneksi.php";

// Pastikan form dikirim via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Error: Akses tidak diperbolehkan.");
}

// Ambil data dari form
$idpeminjaman = $_POST['idpeminjaman'] ?? '';
$tanggalbayar = $_POST['tanggalbayar'] ?? date('Y-m-d');
$detail = $_POST['detail'] ?? [];
$totaldenda = floatval($_POST['totaldenda'] ?? 0);
$dibayar = floatval($_POST['dibayar'] ?? 0);
$tunggakan = floatval($_POST['tunggakan'] ?? 0);

// Validasi minimal
if (empty($idpeminjaman) || empty($detail)) {
    die("Error: Data pengembalian tidak lengkap.");
}

// ====================================
// UPDATE DETAIL PEMINJAMAN
// ====================================
foreach ($detail as $iddetail => $d) {
    $tgl_kembali_input = $_POST['tgl_kembali'][$iddetail] ?? date('Y-m-d');
    $jumlahharitelat = intval($d['jumlahharitelat'] ?? 0);
    $denda = floatval($d['denda'] ?? 0);
    $status = $d['status'] === 'terlambat' ? 'Terlambat' : 'Tidak';
    $keterangan = 'sudahkembali';

    // Update detailpeminjaman
    $stmt = $koneksi->prepare("
        UPDATE detailpeminjaman 
        SET tanggaldikembalikan = ?, 
            jumlahharitelat = ?, 
            denda = ?, 
            status = ?, 
            keterangan = ?
        WHERE iddetailpeminjaman = ?
    ");
    $stmt->bind_param(
        "sidssi", 
        $tgl_kembali_input, 
        $jumlahharitelat, 
        $denda, 
        $status, 
        $keterangan, 
        $iddetail
    );
    $stmt->execute();
    $stmt->close();

    // Tambahkan stok buku kembali
    $k = $koneksi->query("SELECT idbuku, total FROM detailpeminjaman WHERE iddetailpeminjaman = $iddetail");
    if ($k && $row = $k->fetch_assoc()) {
        $idbuku = $row['idbuku'];
        $jumlah = $row['total'];
        $koneksi->query("UPDATE buku SET stok = stok + $jumlah WHERE idbuku = $idbuku");
    }
}

// ====================================
// SIMPAN KE TABEL DENDA (opsional)
// ====================================
if ($totaldenda > 0) {
    $stmt = $koneksi->prepare("
        INSERT INTO denda (jumlahdenda, statuspembayaran)
        VALUES (?, ?)
    ");
    $statuspembayaran = $tunggakan > 0 ? "Belum Lunas" : "Lunas";
    $stmt->bind_param("ds", $totaldenda, $statuspembayaran);
    $stmt->execute();
    $stmt->close();

    // Ambil iddenda terakhir
    $iddenda = $koneksi->insert_id;

    // Update semua detailpeminjaman untuk idpeminjaman ini dengan iddenda
    $koneksi->query("UPDATE detailpeminjaman SET iddenda = $iddenda WHERE idpeminjaman = $idpeminjaman");
}

// ====================================
// Redirect ke halaman daftar pengembalian
// ====================================
header("Location: ../index.php?halaman=daftarpengembalian&status=sukses");
exit;
?>