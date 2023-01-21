<?php
namespace Application\Model;

require_once '../src/lib/DatabaseConnection.php';

class Content{
    public String $title;
    public String $description;
    public int $year;
    public int $id;
}

class PostRepository{
    
    public \DatabaseConnection $connection;
    
    public function getContents(int $page){
        $offset = ($page - 1) * 3;
        $selectQuery = "SELECT * FROM reussite ORDER BY year DESC LIMIT 3 OFFSET $offset";
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
    
    public function getContent(int $id){
        $selectQuery = "SELECT * FROM reussite WHERE id = :id";
        $contentsStatement = $this->connection->getConnection()->prepare($selectQuery);
        $contentsStatement->execute([
            'id' => $id
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
        $query = 'SELECT COUNT(*) FROM reussite';
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
    
    public function deletecontent(int $id){
        $deleteQuery = 'DELETE FROM reussite WHERE id = :id';
        $deleteStatement = $this->connection->getConnection()->prepare($deleteQuery);
        $delete = $deleteStatement->execute([
            'id' => $id
        ]);
        return $delete > 0;
    }
    
    public function addContent(String $title, String $description, int $year){
        $addQuery = 'INSERT INTO reussite (title, description, year) VALUES (:title, :description, :year)';
        $addStatement = $this->connection->getConnection()->prepare($addQuery);
        $add = $addStatement->execute([
        'title' => $title,
        'description' => $description,
        'year' => $year
        ]);
        return $add > 0;
    }
    
    public function updateContent(String $title, String $description, int $year, int $id){
        $updateQuery = 'UPDATE reussite SET title = :title, description = :description, year = :year WHERE id = :id';
        $updateStatement = $this->connection->getConnection()->prepare($updateQuery);
        $update = $updateStatement->execute([
            'title' => $title,
            'description' => $description,
            'year' => $year,
            'id' => $id
        ]);
        return $update > 0;
    }
}


