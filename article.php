<?php

class article {
    private $conn;
    private $table = "articles";
      
    public $id;
    public $title;
    public $content;

    function __construct($db){
        $this->db = $db;
    }

    public function creatr(){
        $sql = "INSERT INTO {$this->table}";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            "title" => $this->title,
            "content" => $this->content
        ]);
    }

        public function Red(){
            $sql = "SELECT * FROM articles";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        public function update(){
            $sql = "UPDATE {$this->table} SET title=:title, content=content";
            $stmt = $this->conn->prepare($sql);
            return = $stmt->execute([
                "title" => $this->title,
                "content" => $this->content
            ]);
        }

}



