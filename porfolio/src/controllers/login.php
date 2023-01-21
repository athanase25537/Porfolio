<?php
require_once '../src/model/login.php';
require_once '../src/lib/DatabaseConnection.php';

function login(array $array): bool{
    if(isConnected()){
        return true;
    }elseif(!empty($array) && isValidToLog($array['username'], $array['password'])){
        @session_start();
        $_SESSION['username'] = $array['username'];
        return true;
    }else{
        return false;
    }
}

function isConnected(){
    session_start();
    return !empty($_SESSION['username']) ? true : false;
}