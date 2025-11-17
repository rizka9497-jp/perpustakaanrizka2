<?php
// Array nilai menu yang ingin diuji
$menu_values = [1, 2, 3, 5];

// Tampilkan tabel HTML
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Nilai \$menu</th><th>Output</th></tr>";

foreach ($menu_values as $menu) {
    echo "<tr>";
    echo "<td>$menu</td>";
    echo "<td>";

    // Switch case untuk menentukan menu
    switch ($menu) {
        case 1:
            echo "Nasi Goreng - Rp15.000";
            break;
        case 2:
            echo "Mie Ayam - Rp12.000";
            break;
        case 3:
            echo "Bakso - Rp13.000";
            break;
        default:
            echo "Menu tidak ditemukan";
    }

    echo "</td>";
    echo "</tr>";
}

echo"</table>";
?>