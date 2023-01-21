<?php
use Application\Model\PostRepository;
require_once '../src/model.php';
require_once '../src/lib/DatabaseConnection.php';

function home(){
    $repository = new PostRepository();
    $repository->connection = new DatabaseConnection();
    $page = $repository->getPage($_GET);
    $contents = $repository->getContents($page);
    $maxPage = $repository->getMaxPage();
    $success = false;
    if(!empty($_GET)){
        if(in_array('success', $_GET)){
            $success = true;
            if (key_exists('add', $_GET)){
                $message = 'Votre ajout a ete enregistrer';
            }elseif(key_exists('delete', $_GET)){
                $message = 'Suppression terminer';
            }elseif(key_exists('update', $_GET)){
                $message = 'Vos modifications a bien ete apporter';
            }else{
                $success = false;
            }
        }
    }
    require '../src/templates/homePage.php';
}