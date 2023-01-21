<?php
require_once '../src/model/register.php';

function register(String $username, String $email, String $password){
    registUser($username, $email, $password);
    header('Location: index.php?action=login');
}