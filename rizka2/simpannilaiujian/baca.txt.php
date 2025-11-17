<?php
echo "<table border='1'><tr><th>Nama</th><th>Kelas</th><th>Nilai</th></tr>";
$file = fopen("data.txt","r");
while(!feof($file)){
    $line = fgets($file);
    if(trim($line) != ""){
        list($nama,$kelas,$nilai) = explode("|",$line);
        echo "<tr><td>$nama</td><td>$kelas</td><td>$nilai</td></tr>";
    }
}
fclose($file);
echo "</table>";
?>
