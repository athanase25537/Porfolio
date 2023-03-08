<?php
require '../vendor/autoload.php';

use Application\PostRepository;

use Application\Controllers\{
    Add,
    Delete,
    Home,
    Login,
    Register,
    Update
};

use Application\Model\{
    Login as ModelLogin,
    Register as RegisterRegister
};

$login = new Login($_POST);

if(!empty($_POST)){
    $login->login = new ModelLogin();
}
if($login->login()){
    try{
        $action = key_exists('action', $_GET) ? $_GET['action'] : '';
        if(isset($action) && $action !== ''){
            if($action == 'add'){
                $add = new Add($_POST, 'title', 'description', 'year');
                $add->add();
            }elseif($action == 'delete'){
                if(!empty($_POST) && key_exists('btn',$_POST)){
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $delete = new Delete($id, $_POST, 'btn', 'confirm', 'cancel');
                        $delete->delete();
                    }else{
                        throw new Exception('On a pas trouvre l\'idenfiant');
                    }
                }else{
                    require '../src/templates/delete.php';
                }
                
            }elseif($action == 'update'){
                if(!empty($_POST)){
                    $update = new Update();
                    $update->update();
                }else{
                    if(!empty($_GET)){
                        if(isset($_GET['id']) && $_GET['id'] > 0){
                            $repository = new PostRepository('success');
                            $repository->connection = new DatabaseConnection();
                            $content = $repository->getContent($_GET['id'], $_SESSION['id']);
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
            $home = new Home();
            $home->home();
        }
    }catch(Exception $e){
        $e->getMessage();
    }
}elseif(!empty($_GET)){
    if(isset($_GET['action']) && $_GET['action'] == 'register'){
        if(!empty($_POST)){
            $register = new Register($_POST['username'], $_POST['email'], $_POST['password']);
            $register->register = new RegisterRegister($_POST['username'], $_POST['email'], $_POST['password']);
            $register->register();
        }else{
            require '../src/templates/register.php';
        }
    }else{
        require '../src/templates/login.php';
    }

}else{
    require '../src/templates/login.php';

}