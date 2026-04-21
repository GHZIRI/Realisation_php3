<?php

class Articles {
    private $conn;
    private $table = "articles";
      
    public $id;
    public $title;
    public $content;

    function __construct($db){
        $this->conn = $db;
    }

    public function create(){
       
        $sql = "INSERT INTO {$this->table} (title, content) VALUES (:title, :content)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            "title" => $this->title,
            "content" => $this->content
        ]);
    }

   public function read(){
        $sql = "SELECT * FROM {$this->table}"; 
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update(){
       
        $sql = "UPDATE {$this->table} SET title = :title, content = :content WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            "title" => $this->title,
            "content" => $this->content,
            "id" => $this->id 
        ]);
    }

    public function delete(){
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'id' => $this->id
        ]); 
    }
}

?>