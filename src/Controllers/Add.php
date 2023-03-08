<?php
namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\PostRepository;

class Add
{

    private array $array;
    private String $title;
    private String $description;
    private String $year;

    public function __construct(array $array, String $title, String $description, String $year)
    {
        $this->array = $array;
        $this->title = $title;
        $this->description = $description;
        $this->year = $year;
    }

    public function add(){
        if(!empty($this->array)){
            $repository = new PostRepository('success');
            $repository->connection = new DatabaseConnection();
            $repository->addContent($this->array[$this->title], $this->array[$this->description], $this->array[$this->year], $_SESSION['id']);
            header('Location: index.php?add=success');
        }else{
            require '../src/templates/add.php';
        }
    }
}