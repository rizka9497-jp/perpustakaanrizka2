<?php
// Array nilai menu yang ingin diuji
$menu_values = ["pensil", "buku"];

// Tampilkan tabel HTML
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>No</th><th>nama produk</th><th>harga</th></tr>";

// Counter nomor
$no = 1;

foreach ($menu_values as $menu) {
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>$menu</td>";
    echo "<td>";

    // Switch case untuk menentukan harga produk
    switch ($menu) {
        case "pensil":
            echo "Rp2.000";
            break;
        case "buku":
            echo "Rp5.000";
            break;
        default:
            echo "Menu tidak ditemukan";
    }

    echo "</td>";
    echo "</tr>";

    // Tambahkan nomor untuk baris berikutnya
    $no++;
}

echo"</table>";
?>