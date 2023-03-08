<?php
namespace Application\Controllers;

use Application\Model\Register as RegisterRegister;

class Register
{
    private String $username;
    private String $email;
    private String $password;
    public RegisterRegister $register;

    public function __construct(String $username, String $email, String $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function register()
    {
        $this->register->registUser();
        header('Location: index.php?action=login');
    }
}
