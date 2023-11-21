<?php
session_start();
require "gateway.php";
require "header.php";   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            font-family:Helvetica;
        }
        form{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            gap:10px; 
        }
        .success{
            background-color: #2cf256;
            color:green;
            padding:10px;
            border-radius:3px;
        }

        input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #2196F3;
            outline: none;
        }
        
        textarea {
            padding: 10px;
            width: 300px;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        textarea:focus {
            border-color: #2196F3;
            outline: none;
        }

        input[type="submit"]{
            background-color: #1266F2;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover{
            background-color: #2196F3;
        }
    </style>
</head>
<body>
    <h1>Ajout d'article </h1>
    <form action="add_article_action.php" method="post">
        <label for="nomArticle">Nom de l'article</label>
        <input type="text" placeholder="Nom de l'article" name="nomArticle" id="nomArticle" required>

        <label for="contenuArticle">Contenu de l'article</label>
        <textarea id="contenuArticle" name="contenuArticle" rows="5" cols="33" placeholder="Contenu" required></textarea>

        <input type="submit">   
    </form>
</body>
</html>

<?php
if(isset($_SESSION["etat"])){
    if ($_SESSION["etat"] === "créé") {
        echo "<p class='success'>Le fichier XML a été créé avec succès.</p>";
        unset($_SESSION["etat"]);
    } else {
        echo "<p class='success'>Le fichier XML a été mis à jour avec succès.</p>";
        unset($_SESSION["etat"]);
    }
}
?>