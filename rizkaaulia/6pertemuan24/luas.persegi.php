<?php

// luaspersegi.php

/**
 * Menghitung luas persegi.
 *
 * @param float $sisi Panjang sisi persegi.
 * @return float Luas persegi.
 */
function luasPersegi($sisi) {
    return $sisi * $sisi;
}

// Contoh penggunaan:
$sisi1 = 5;
$luas1 = luasPersegi($sisi1);
echo "Luas persegi dengan sisi " . $sisi1 . " adalah " . $luas1 . "<br>";

$sisi2 = 10;
$luas2 = luasPersegi($sisi2);
echo "Luas persegi dengan sisi " . $sisi2 . " adalah " . $luas2 . "<br>";

?>