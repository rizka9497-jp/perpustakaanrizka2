
<?php
// Mengambil nilai dari input (misalnya dari form)
$nilai = 85; // Ganti dengan nilai yang diinginkan
// Menentukan status penilaian
if ($nilai >= 90) {
    $status = "Sangat Baik";
} elseif ($nilai >= 80) {
    $status = "Baik";
} elseif ($nilai >= 70) {
    $status = "Cukup";
} else {
    $status = "Kurang";
}
// Menentukan status kelulusan
if ($nilai >= 75) {
    $kelulusan = "Lulus";
} else {
    $kelulusan = "Tidak Lulus";
}
// Menampilkan hasil
echo "Nilai: $nilai<br>";
echo "Status Penilaian: $status<br>";
echo "Status Kelulusan: $kelulusan<br>";
?>

