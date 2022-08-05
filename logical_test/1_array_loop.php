<?php

$aplikasi[1] = 'gtAkademik';
$aplikasi[2] = 'gtFinansi';
$aplikasi[3] = 'gtPrizinan';
$aplikasi[4] = 'eCampuz';
$aplikasi[5] = 'eOviz';

$arrayLength = count($aplikasi);
$i = 1;

while ( $i <= $arrayLength ) {

    echo $aplikasi[$i] . ' ';
    $i++;

}

?>