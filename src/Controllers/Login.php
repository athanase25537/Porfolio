<?php
namespace Application\Controllers;

use Application\Model\Login as ModelLogin;

class Login
{
    private array $array;
    public ModelLogin $login;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function login(): bool{
        if($this->isConnected()){
            return true;
        }elseif(!empty($this->array) && $this->login->isValidToLog($this->array['username'], $this->array['password'])){
            @session_start();
            $_SESSION['username'] = $this->array['username'];
            $_SESSION['id'] = $this->login->getId($this->array['username'], $this->array['password']);
            return true;
        }else{
            return false;
        }
    }

    private function isConnected(){
        session_start();
        return !empty($_SESSION['username']) ? true : false;
    }
}