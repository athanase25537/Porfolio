<?php
namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\PostRepository;

class Home
{

    public function home(){
        $repository = new PostRepository('success');
        $repository->connection = new DatabaseConnection;
        $page = $repository->getPage($_GET);
        $contents = $repository->getContents($page, $_SESSION['id']);
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

}
