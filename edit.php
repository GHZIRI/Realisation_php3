<?php

require_once "connection.php";
require_once "article.php";
 include 'header.php'; 


$database = new Database();


$conn = $database->getConnection();


$article = new Articles($conn);


if(isset($_GET['id'])){
    $article->id = $_GET['id'];
 
    $stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->execute([$article->id]);
    $old_data = $stmt->fetch(PDO::FETCH_ASSOC);
}


if(isset($_POST['update'])){
    $article->id = $_POST['id'];
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    
    if($article->update()){
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'article</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { max-width: 500px; margin: auto; display: flex; flex-direction: column; gap: 10px; }
        input, textarea { padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .btn-up { background: #007bff; color: white; border: none; padding: 10px; cursor: pointer; }
    </style>
</head>
<body>
    <form method="post">
        <h2>Modifier Article</h2>
        <input type="hidden" name="id" value="<?php echo $old_data['id']; ?>">
        <input type="text" name="title" value="<?php echo $old_data['title']; ?>">
        <textarea name="content" rows="5"><?php echo $old_data['content']; ?></textarea>
        <button type="submit" name="update" class="btn-up">Mettre à jour</button>
    </form>
</body>
</html>