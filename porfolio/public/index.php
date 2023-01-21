<?php
use Application\Model\PostRepository;

require '../src/controllers/add.php';
require '../src/controllers/delete.php';
require '../src/controllers/update.php';
require '../src/controllers/homePage.php';
require '../src/controllers/register.php';
require '../src/controllers/login.php';

if(login($_POST)){
    try{
        $action = key_exists('action', $_GET) ? $_GET['action'] : '';
        if(isset($action) && $action !== ''){
            if($action == 'add'){
                add($_POST, 'title', 'description', 'year');
            }elseif($action == 'delete'){
                if(!empty($_POST) && key_exists('btn',$_POST)){
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        delete($id, $_POST, 'btn', 'confirm', 'cancel');
                    }else{
                        throw new Exception('On a pas trouvre l\'idenfiant');
                    }
                }else{
                    require '../src/templates/delete.php';
                }
                
            }elseif($action == 'update'){
                if(!empty($_POST)){
                    update();
                }else{
                    if(!empty($_GET)){
                        if(isset($_GET['id']) && $_GET['id'] > 0){
                            $repository = new PostRepository();
                            $repository->connection = new DatabaseConnection();
                            $content = $repository->getContent($_GET['id']);
                            require '../src/templates/update.php';
                        }else{
                            throw new Exception('Erreur: id non valide');
                        }
                    }
                }
            }else{
                throw new Exception('La page n\'existe pas');
            }
        }else{
            home();
        }
    }catch(Exception $e){
        $e->getMessage();
    }
}elseif(!empty($_GET)){
    if(isset($_GET['action']) && $_GET['action'] == 'register'){
        if(!empty($_POST)){
            register($_POST['username'], $_POST['email'], $_POST['password']);
        }else{
            require '../src/templates/register.php';
        }
    }else{
        require '../src/templates/login.php';
    }

}else{
    require '../src/templates/login.php';

}