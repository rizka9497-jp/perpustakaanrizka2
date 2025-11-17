<?php
function diskonHarga($harga, $diskon) {
  // Menghitung harga setelah diskon.
  $hargaSetelahDiskon = $harga - ($harga * $diskon / 100);
  return $hargaSetelahDiskon;
}

// Contoh penggunaan:
$hargaAwal = 200000;
$persenDiskon = 15;
$hargaAkhir = diskonHarga($hargaAwal, $persenDiskon);

echo "Harga awal: Rp" . $hargaAwal . "<br>";
echo "Diskon: " . $persenDiskon . "%<br>";
echo "Harga setelah diskon: Rp" . $hargaAkhir . "<br>";
?>