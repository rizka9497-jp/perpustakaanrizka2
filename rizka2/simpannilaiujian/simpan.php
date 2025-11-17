<?php
$nama  = $_POST["nama"];
$kelas = $_POST["kelas"];
$nilai = $_POST["nilai"];

if(isset($_POST['simpan_txt'])){
    $file = fopen("data.txt","a");
    fwrite($file,"$nama|$kelas|$nilai\n");
    fclose($file);
    echo "Data disimpan ke data.txt";
}

if(isset($_POST['simpan_csv'])){
    $file = fopen("data.csv","a");
    fputcsv($file, [$nama, $kelas, $nilai]);
    fclose($file);
    echo "Data disimpan ke data.csv";
}
?>
