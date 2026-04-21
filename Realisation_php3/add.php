<?php
require_once "connection.php";
require_once "article.php";


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
    <title>Document</title>
</head>
<style>
    body { font-family: sans-serif; display: flex; justify-content: center; padding: 50px; }
    form { background: #f4f4f4; padding: 20px; border-radius: 8px; width: 300px; }
    input, textarea { width: 100%; margin-bottom: 10px; padding: 8px; border: 1px solid #ccc; }
    button { background: #28a745; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; }
</style>
<body>
    <form method="post" action = "add.php">

        <input type = "text" name ="title">
        <br>
        <textarea name="content" id=""></textarea>
        <br>
        <button type="submit" name = "add">Add</button>
    </form>
</body>
</html>