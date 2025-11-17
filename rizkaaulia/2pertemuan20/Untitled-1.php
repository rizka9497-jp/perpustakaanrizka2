<?php

class Perpustakaan {
    private $buku = [];
    private $peminjaman = [];
    private $dendaPerHari = 1000; // Denda per hari dalam Rupiah

    public function __construct() {
        // Contoh buku yang tersedia di perpustakaan
        $this->tambahBuku('The Lord of the Rings', 'J.R.R. Tolkien', 10);
        $this->tambahBuku('Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 5);
        $this->tambahBuku('The Hobbit', 'J.R.R. Tolkien', 8);
    }

    public function tambahBuku($judul, $penulis, $stok) {
        $this->buku[] = [
            'judul' => $judul,
            'penulis' => $penulis,
            'stok' => $stok,
        ];
    }

    public function tampilkanDaftarBuku() {
        echo "<h2>Daftar Buku di Perpustakaan</h2>";
        foreach ($this->buku as $index => $buku) {
            echo "ID: $index | Judul: {$buku['judul']} | Penulis: {$buku['penulis']} | Stok: {$buku['stok']}<br>";
        }
        echo "<hr>";
    }

    public function pinjamBuku($idBuku, $namaPeminjam, $tanggalPinjam, $tanggalKembali) {
        if (!isset($this->buku[$idBuku])) {
            return "Buku dengan ID $idBuku tidak ditemukan.<br>";
        }

        if ($this->buku[$idBuku]['stok'] > 0) {
            $this->buku[$idBuku]['stok']--;
            $this->peminjaman[] = [
                'idBuku' => $idBuku,
                'namaPeminjam' => $namaPeminjam,
                'tanggalPinjam' => new DateTime($tanggalPinjam),
                'tanggalKembali' => new DateTime($tanggalKembali),
                'status' => 'dipinjam',
            ];
            return "{$namaPeminjam} berhasil meminjam buku '{$this->buku[$idBuku]['judul']}'.<br>";
        } else {
            return "Maaf, stok buku '{$this->buku[$idBuku]['judul']}' sedang kosong.<br>";
        }
    }

    public function kembalikanBuku($idPeminjaman) {
        if (!isset($this->peminjaman[$idPeminjaman])) {
            return "Peminjaman dengan ID $idPeminjaman tidak ditemukan.<br>";
        }

        $peminjaman = $this->peminjaman[$idPeminjaman];
        if ($peminjaman['status'] === 'dikembalikan') {
            return "Buku sudah dikembalikan sebelumnya.<br>";
        }

        $tanggalPengembalian = new DateTime();
        $tanggalJatuhTempo = $peminjaman['tanggalKembali'];

        if ($tanggalPengembalian > $tanggalJatuhTempo) {
            $selisihHari = $tanggalPengembalian->diff($tanggalJatuhTempo)->days;
            $denda = $selisihHari * $this->dendaPerHari;
            echo "Buku '{$this->buku[$peminjaman['idBuku']]['judul']}' dikembalikan terlambat {$selisihHari} hari.<br>";
            echo "Total denda yang harus dibayar: Rp " . number_format($denda, 0, ',', '.') . ",-<br>";
        } else {
            echo "Buku '{$this->buku[$peminjaman['idBuku']]['judul']}' dikembalikan tepat waktu.<br>";
        }

        // Update status peminjaman dan kembalikan stok buku
        $this->peminjaman[$idPeminjaman]['status'] = 'dikembalikan';
        $idBuku = $peminjaman['idBuku'];
        $this->buku[$idBuku]['stok']++;

        return "Pengembalian buku berhasil.<br>";
    }

    public function tampilkanDaftarPeminjaman() {
        echo "<h2>Daftar Peminjaman</h2>";
        foreach ($this->peminjaman as $index => $peminjaman) {
            $judulBuku = $this->buku[$peminjaman['idBuku']]['judul'];
            $tanggalPinjam = $peminjaman['tanggalPinjam']->format('Y-m-d');
            $tanggalKembali = $peminjaman['tanggalKembali']->format('Y-m-d');
            $status = $peminjaman['status'];
            echo "ID: $index | Peminjam: {$peminjaman['namaPeminjam']} | Buku: {$judulBuku} | Tanggal Pinjam: {$tanggalPinjam} | Jatuh Tempo: {$tanggalKembali} | Status: {$status}<br>";
        }
        echo "<hr>";
    }
}

// --- Contoh Penggunaan ---

// Inisialisasi perpustakaan
$perpustakaan = new Perpustakaan();

// Tampilkan daftar buku yang tersedia
$perpustakaan->tampilkanDaftarBuku();

// Proses peminjaman buku
echo $perpustakaan->pinjamBuku(0, 'Andi', '2025-08-01', '2025-08-08');
echo $perpustakaan->pinjamBuku(1, 'Budi', '2025-08-05', '2025-08-12');
echo $perpustakaan->pinjamBuku(0, 'Citra', '2025-08-10', '2025-08-17');

echo "<hr>";

// Tampilkan daftar peminjaman
$perpustakaan->tampilkanDaftarPeminjaman();

// Proses pengembalian buku (kasus tepat waktu)
echo $perpustakaan->kembalikanBuku(2); // ID Peminjaman 2 adalah Citra

echo "<hr>";

// Ganti tanggal saat ini menjadi tanggal 15 Agustus 2025 untuk simulasi denda
// NOTE: Ini hanya untuk simulasi, dalam aplikasi nyata, tanggal akan diambil dari sistem
$tanggalSaatIni = new DateTime('2025-08-15');
$tanggalSaatIni->setTimezone(new DateTimeZone('Asia/Jakarta')); // Sesuaikan zona waktu
$GLOBALS['tanggalSaatIni'] = $tanggalSaatIni;

// Simulasi pengembalian buku yang terlambat
echo "Simulasi pengembalian terlambat:<br>";
// Peminjaman ID 1 (Budi) jatuh tempo tanggal 2025-08-12.
// Saat ini disimulasikan tanggal 2025-08-15.
echo $perpustakaan->kembalikanBuku(1);

echo "<hr>";

// Tampilkan status terbaru
$perpustakaan->tampilkanDaftarBuku();
$perpustakaan->tampilkanDaftarPeminjaman();

// Untuk membuat simulasi pengembalian terlambat bekerja, kita perlu sedikit modifikasi pada fungsi kembalikanBuku
// agar ia mengambil tanggal dari variabel global yang disimulasikan.
// Berikut adalah versi yang disesuaikan:

class PerpustakaanSimulasi extends Perpustakaan {
    public function kembalikanBuku($idPeminjaman) {
        if (!isset($this->peminjaman[$idPeminjaman])) {
            return "Peminjaman dengan ID $idPeminjaman tidak ditemukan.<br>";
        }

        $peminjaman = $this->peminjaman[$idPeminjaman];
        if ($peminjaman['status'] === 'dikembalikan') {
            return "Buku sudah dikembalikan sebelumnya.<br>";
        }

        // Gunakan tanggal dari variabel global yang disimulasikan
        global $tanggalSaatIni;
        $tanggalPengembalian = $tanggalSaatIni ?? new DateTime();
        $tanggalJatuhTempo = $peminjaman['tanggalKembali'];

        if ($tanggalPengembalian > $tanggalJatuhTempo) {
            $selisihHari = $tanggalPengembalian->diff($tanggalJatuhTempo)->days;
            $denda = $selisihHari * 1000; // Denda per hari
            echo "Buku '{$this->buku[$peminjaman['idBuku']]['judul']}' dikembalikan terlambat {$selisihHari} hari.<br>";
            echo "Total denda yang harus dibayar: Rp " . number_format($denda, 0, ',', '.') . ",-<br>";
        } else {
            echo "Buku '{$this->buku[$peminjaman['idBuku']]['judul']}' dikembalikan tepat waktu.<br>";
        }

        $this->peminjaman[$idPeminjaman]['status'] = 'dikembalikan';
        $idBuku = $peminjaman['idBuku'];
        $this->buku[$idBuku]['stok']++;

        return "Pengembalian buku berhasil.<br>";
    }
}
?>