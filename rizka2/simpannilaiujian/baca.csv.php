<?php
echo "<table border='1'><tr><th>Nama</th><th>Kelas</th><th>Nilai</th></tr>";
$file = fopen("data.csv","r");
while(($row = fgetcsv($file)) !== FALSE){
    echo "<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td></tr>";
}
fclose($file);
echo "</table>";
?>
