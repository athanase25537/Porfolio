<?php
use Application\Model\PostRepository;
require_once '../src/lib/DatabaseConnection.php';

function getUser(): array{
    $repository = new PostRepository();
    $repository->connection = new DatabaseConnection();
    $query = 'SELECT username, password FROM users';
    $usersStatement = $repository->connection->getConnection()->query($query);
    $users = $usersStatement->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function isValidToLog(String $username, String $password): bool{
    $users = getUser();
    $isUser = false;
    foreach($users as $user){
        if($username == $user['username'] && $password == $user['password']){
            $isUser = true;
            break;
        }
    }
    return $isUser;
}