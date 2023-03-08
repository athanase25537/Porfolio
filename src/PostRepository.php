<?php
namespace Application;

use Application\Lib\DatabaseConnection;

class Content{
    public String $title;
    public String $description;
    public int $year;
    public int $id;
}

class PostRepository{
    
    public DatabaseConnection $connection;

    public String $tableName;

    public function __construct(String $tableName)
    {
        $this->tableName = $tableName;
    }
    
    public function getContents(int $page, $idUser){
        $offset = ($page - 1) * 3;
        $selectQuery = "SELECT * FROM $this->tableName WHERE id_user = $idUser ORDER BY year DESC LIMIT 3 OFFSET $offset";
        $contentsStatement = $this->connection->getConnection()->query($selectQuery);
        $contents = [];
        while($row = $contentsStatement->fetch()){
            $content = new Content();
            $content->title =  $row['title'];
            $content->description = $row['description'];
            $content->year = $row['year'];
            $content->id = $row['id'];
            $contents[] = $content;
        }
        return $contents;
    }
    
    public function getContent(int $id, $idUser){
        $selectQuery = "SELECT * FROM $this->tableName WHERE id = :id AND id_user = :id_user";
        $contentsStatement = $this->connection->getConnection()->prepare($selectQuery);
        $contentsStatement->execute([
            'id' => $id,
            'id_user' => $idUser
        ]);
        $row = $contentsStatement->fetch(\PDO::FETCH_ASSOC);
        $content = new Content();
        $content->title =  $row['title'];
        $content->description = $row['description'];
        $content->year = $row['year'];
        $content->id = $row['id'];
        return $content;
    }
    
    public function getMaxPage(){
        $query = "SELECT COUNT(*) FROM $this->tableName";
        $totalStatement = $this->connection->getConnection()->query($query);
        $total = $totalStatement->fetch(\PDO::FETCH_ASSOC);
        $maxPage = ceil($total['COUNT(*)']/3);
        return $maxPage;
    }
    
    public function getPage(array $array){
        $page = 1;
        if(key_exists('page', $array)){
            $page = $array['page'];
        }
        return $page;
    }
    
    public function deletecontent(int $id, $idUser){
        $deleteQuery = "DELETE FROM $this->tableName WHERE id = :id AND id_user = :id_user";
        $deleteStatement = $this->connection->getConnection()->prepare($deleteQuery);
        $delete = $deleteStatement->execute([
            'id' => $id,
            'id_user' => $idUser
        ]);
        return $delete > 0;
    }
    
    public function addContent(String $title, String $description, int $year, $idUser){
        $addQuery = "INSERT INTO $this->tableName (title, description, year, id_user, created_at) VALUES (:title, :description, :year, :id_user, NOW())";
        $addStatement = $this->connection->getConnection()->prepare($addQuery);
        $add = $addStatement->execute([
        'title' => $title,
        'description' => $description,
        'year' => $year,
        'id_user' => $idUser
        ]);
        return $add > 0;
    }
    
    public function updateContent(String $title, String $description, int $year, int $id, $idUser){
        $updateQuery = "UPDATE $this->tableName SET title = :title, description = :description, year = :year WHERE id = :id AND id_user = :id_user";
        $updateStatement = $this->connection->getConnection()->prepare($updateQuery);
        $update = $updateStatement->execute([
            'title' => $title,
            'description' => $description,
            'year' => $year,
            'id' => $id,
            'id_user' => $idUser
        ]);
        return $update > 0;
    }
}


