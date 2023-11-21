<?php
session_start();
require "gateway.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
    require "header.php";   
    ?>
    <h1>Liste des articles</h1>
    <div id="wrapperArticle">
    <?php 
        $fichierArticle = file_get_contents('blog.xml');
        $article = new SimpleXMLElement($fichierArticle);
        $nbArticle = count($article->article);
        
        foreach ($article->article as $article){
            echo "<article><p>Titre de l'article : " . $article->titre . "</p>";
            echo "<p>Contenu de l'article : " . $article->contenu . "</p></article>";
        }
    ?>
    </div>
</body>
</html>