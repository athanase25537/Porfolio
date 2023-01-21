<?php
use Application\Model\PostRepository;
require_once '../src/model.php';
require_once '../src/lib/DatabaseConnection.php';

function update(){
    $repository = new PostRepository();
    $repository->connection = new DatabaseConnection();
    $repository->updateContent($_POST['title'], $_POST['description'], $_POST['year'], $_POST['id']);
    header('Location: index.php?update=success');
}