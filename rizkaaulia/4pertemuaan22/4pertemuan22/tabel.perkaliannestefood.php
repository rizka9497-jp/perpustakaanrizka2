<?php
echo "<h2>Tabel Perkalian 1 - 10</h2>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";

// Baris pertama (header kolom)
echo "<tr><th>x</th>";
for ($i = 1; $i <= 10; $i++) {
    echo "<th>$i</th>";
}
echo "</tr>";

// Baris-baris berikutnya (isi tabel)
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    echo "<th>$i</th>"; // header baris

    for ($j = 1; $j <= 10; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }

    echo "</tr>";
}

echo"</table>";
?>