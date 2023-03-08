<?php
namespace Application\Model;

use Application\PostRepository;

class Register
{
    private String $username;
    private String $email;
    private String $password;

    public function __construct(String $username, String $email, String $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function registUser(){
        $repository = new PostRepository('users');
        $repository->connection = new \DatabaseConnection();
        $addQuery = "INSERT INTO $repository->tableName (username, email, password) VALUES (:username, :email, :password)";
        $addStatement = $repository->connection->getConnection()->prepare($addQuery);
        $add = $addStatement->execute([
        'username' => $this->username,
        'email' => $this->email,
        'password' => password_hash($this->password, 1)
        ]);
        return $add > 0;
    }
}

