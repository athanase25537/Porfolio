<?php
require 'src/controllers/cavio.php';

function compteur(String $s, array $arr){
    $cpt = 0;
    $key = array_keys($arr);
    $i = 0;
    foreach($arr as $n){
        $key = array_keys($arr);
        $key[$i][0];
        if($s == $key[$i][0]){
            $cpt += (int)$n;
        }
        $i++;
    }
    return $cpt;
}

$inv = 0;
$rea = 0;
$art = 0;
$soci = 0;
$ent = 0;
$conv = 0;

if($_GET['action'] == 'cavio'){
    $inv = compteur('I', $_POST);
    $rea = compteur('R', $_POST);
    $art = compteur('A', $_POST);
    $soci = compteur('S', $_POST);
    $ent = compteur('E', $_POST);
    $conv = compteur('V', $_POST);

    echo "REALISTE : " . $rea . '<br>';
    echo "INVESTIGATEUR : " . $inv . '<br>';
    echo "ARTISTE : " . $art . '<br>';
    echo "SOCIAL : " . $soci . '<br>';
    echo "ENTREPRENANT : " . $ent . '<br>';
    echo "CONVENTIONNEL : " . $conv . '<br>';
}

