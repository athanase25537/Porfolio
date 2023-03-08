<?php
namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\PostRepository;

class Update
{
    public function update()
    {
        $repository = new PostRepository('success');
        $repository->connection = new DatabaseConnection();
        $repository->updateContent($_POST['title'], $_POST['description'], $_POST['year'], $_POST['id'], $_SESSION['id']);
        header('Location: index.php?update=success');
    }
}
