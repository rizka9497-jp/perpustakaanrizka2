<?php

function gradeNilai($rata) {
    if ($rata >= 90) {
        return "A";
    } elseif ($rata >= 80) {
        return "B";
    } elseif ($rata >= 70) {
        return "C";
    } elseif ($rata >= 60) {
        return "D";
    } else {
        return "E";
    }
}

// Contoh penggunaan fungsi
$nilaiRata = 85;
$grade = gradeNilai($nilaiRata);

echo "Nilai rata-rata: " . $nilaiRata . "\n";
echo "Grade: " . $grade . "\n";

?>