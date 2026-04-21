<?php
    require_once "connection.php";
    require_once "article.php";

    
    $database = new Database();
    
    $conn = $database->getConnection();

   
    $article = new Articles($conn);


    $article1 = $article->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Back-office Articles</title>
</head>
<body>
    <div style="margin-bottom: 20px;">
    <a href="add.php" class="btn-add"> Add new article</a>
</div>
    <div class="container">
        <?php foreach($article1 as $art) { ?>
            <div style="border: 1px solid #000; margin: 10px; padding: 10px;">
    <h2><?php echo $art["title"]; ?></h2>
    <p><?php echo $art["content"]; ?></p>
    
    <a href="edit.php?id=<?php echo $art['id']; ?>" style="color: blue;">Modifier</a>
    | 
    <a href="delete.php?id=<?php echo $art['id']; ?>" style="color: red;" onclick="return confirm('Safi tmsah?')">Supprimer</a>
</div>

        <?php } ?>
   
</div>
</body>
</html>