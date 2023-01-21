<?php
use Application\Model\PostRepository;
require_once '../src/lib/DatabaseConnection.php';

function registUser(String $username, String $email, String $password){
    $repository = new PostRepository();
    $repository->connection = new DatabaseConnection();
    $addQuery = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)';
    $addStatement = $repository->connection->getConnection()->prepare($addQuery);
    $add = $addStatement->execute([
    'username' => $username,
    'email' => $email,
    'password' => $password
    ]);
    return $add > 0;
}