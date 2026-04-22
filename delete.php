<?php
 include 'header.php'; 

require_once "connection.php"; 
require_once "article.php";


$database = new Database();
$conn = $database->getConnection();


$article = new Articles($conn);


if(isset($_GET['id'])){
    $article->id = $_GET['id'];
    
    if($article->delete()){
        
        header("Location: index.php");
        exit();
    }
}
?>