<?php
$password = 'athanase';
$passwordHashed = password_hash($password, 1);
var_dump(password_verify($password, $passwordHashed));