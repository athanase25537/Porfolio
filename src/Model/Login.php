<?php
namespace Application\Model;

use Application\Lib\DatabaseConnection;
use PDO;
use Application\PostRepository;

class Login
{

    public function getUser(): array{
        $repository = new PostRepository('users');
        $repository->connection = new DatabaseConnection();
        $query = "SELECT username, password, id FROM $repository->tableName";
        $usersStatement = $repository->connection->getConnection()->query($query);
        $users = $usersStatement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    
    public function isValidToLog(String $username, String $password): bool{
        if($this->getId($username, $password) > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function getId(String $username, String $password): int{
        $id = 0;
        $users = $this->getUser();
        foreach($users as $user){
            if($username == $user['username'] && password_verify($password, $user['password'])){
                $id = $user['id'];
                break;
            }
        }
    
        return $id;
    }
}