<?php
use Application\Model\PostRepository;
require_once '../src/model.php';
require_once '../src/lib/DatabaseConnection.php';

function delete(int $id, array $array, String $key, String $confirm, String $cancel){
    if($array[$key] == $confirm){
        $repository = new PostRepository();
        $repository->connection = new DatabaseConnection();
        $repository->deletecontent($id);
        header('Location: index.php?delete=success');
    }elseif($array[$key] == $cancel){
        header('Location: index.php');
    }else{
        die('Commande invalide');
    }
}