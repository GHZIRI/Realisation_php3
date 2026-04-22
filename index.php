<?php
    require_once "connection.php";
    require_once "article.php";
    include 'header.php'; 

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


       
    <div>
        <a href="add.php" class="add-link">+ Add New Article</a>
    </div>

    <div class="container">
    <?php foreach($article1 as $art) { ?>
        <div class="cart">
            <h2><?php echo $art["title"]; ?></h2>
            <p><?php echo $art["content"]; ?></p>
            
            <div class="actions">
                <a href="edit.php?id=<?php echo $art['id']; ?>" class="btn-edit">Modifier</a>
                <a href="delete.php?id=<?php echo $art['id']; ?>" class="btn-delete" onclick="return confirm('Safi tmsah?')">Supprimer</a>
            </div>
        </div>
        <?php } ?>
</div>

</body>
</html>