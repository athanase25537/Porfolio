<?php
function countChar(String $s, array $arr){
    $cpt = 0;
    $key = array_keys($arr);
    foreach($arr as $n){
        if($s == $key[0][0]){
            $cpt += $n[1];
        }
    }
    return $cpt;
}