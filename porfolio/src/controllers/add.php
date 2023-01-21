<?php
use Application\Model\PostRepository;
require_once '../src/model.php';
require_once '../src/lib/DatabaseConnection.php';

function add(array $array, String $title, String $description, $year){
    if(!empty($array)){
        $repository = new PostRepository();
        $repository->connection = new DatabaseConnection();
        $repository->addContent($array[$title], $array[$description], $array[$year], 'reussite');
        header('Location: index.php?add=success');
    }else{
        require '../src/templates/add.php';
    }
}