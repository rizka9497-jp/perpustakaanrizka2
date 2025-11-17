<?php

// Mendefinisikan fungsi hitungRataNilai()
function hitungRataNilai($nilai1, $nilai2, $nilai3) {
    $rata_rata = ($nilai1 + $nilai2 + $nilai3) / 3;
    return $rata_rata;
}

// Mendefinisikan fungsi gradeNilai()
function gradeNilai($nilai) {
    if ($nilai >= 90) {
        return "A";
    } elseif ($nilai >= 80) {
        return "B";
    } elseif ($nilai >= 75) {
        return "C";
    } else {
        return "D";
    }
}

// Mencetak hasil dari setiap fungsi
echo "Rata-rata Nilai: " . hitungRataNilai(80, 90, 75);
echo "<br>Grade: " . gradeNilai(81);
echo "<br>Nama (Uppercase): " . strtoupper("ahmad");
echo "<br>Tanggal: " . date('d M Y');

?>