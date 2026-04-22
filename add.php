<?php
require_once "connection.php";
require_once "article.php";
 include 'header.php'; 

$database = new Database();
$conn = $database->getConnection();
$article = new Articles($conn);

if(isset($_POST['add'])){
    $article->title = $_POST["title"];
    $article->content = $_POST["content"];
    if($article->create()){
        header ("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
</head>
<body>
    <form method="post" action="add.php">
        <label>Title:</label>
        <input type="text" name="title">
        <br>
        <label>Content:</label>
        <textarea name="content"></textarea>
        <br>
        <button type="submit" name="add" id = "add">Add</button>
    </form>
</body>
</html>