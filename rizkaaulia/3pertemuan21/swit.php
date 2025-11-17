<?php

$umur = 17;
$status_umur = ($umur >= 18) ? 'Dewasa' : 'Belum Dewasa';

switch ($status_umur) {
    case 'Dewasa':
        echo "Dewasa";
        break;
    case 'Belum Dewasa':
        echo "Belum Dewasa";
        break;
}

?>