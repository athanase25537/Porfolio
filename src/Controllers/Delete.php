<?php
namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\PostRepository;

class Delete
{

    private int $id;
    private array $array;
    private String $key;
    private String $confirm;
    private String $cancel;

    public function __construct(int $id, array $array, String $key, String $confirm, String $cancel)
    {
        $this->id = $id;
        $this->array = $array;
        $this->key = $key;
        $this->confirm = $confirm;
        $this->cancel = $cancel;
    }

    public function delete()
    {
        if($this->array[$this->key] == $this->confirm){
            $repository = new PostRepository('success');
            $repository->connection = new DatabaseConnection();
            $repository->deletecontent($this->id, $_SESSION['id']);
            header('Location: index.php?delete=success');
        }elseif($this->array[$this->key] == $this->cancel){
            header('Location: index.php');
        }else{
            die('Commande invalide');
        }
    }
}