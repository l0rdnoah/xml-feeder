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
    <script>
function deleteRecord(date) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet enregistrement?")) {
        window.location.href = 'delete_article.php?date=' + date;
    }
}
function updateRecord(date) {
    let champTitre = document.getElementById("editTitre" + date);
    let champContenu = document.getElementById("editContenu" + date);
    let validerModif = document.getElementById("validerModif"+date);
    let modifier = document.getElementById("edit"+date);
    let annulerModif = document.getElementById("annulerModif"+date);
    let valeurTitre = document.getElementById("titre" + date);
    let valeurContenu = document.getElementById("contenu" + date);

    champTitre.style.display = "block";
    champTitre.value = valeurTitre.textContent;
    champContenu.style.display = "block";
    champContenu.value = valeurContenu.textContent;

    valeurTitre.style.display = "none";
    valeurContenu.style.display = "none";

    validerModif.style.display = "block"; 
    annulerModif.style.display = "block";
    modifier.style.display = "none";
}

function validerModif(date){
    let valeurTitre = document.getElementById("editTitre" + date).value;
    let valeurContenu = document.getElementById("editContenu" + date).value;
    alert(valeurTitre);
    alert(valeurContenu);
    window.location.href = 'update_article.php?date=' + date + '&titre=' + encodeURIComponent(valeurTitre) + '&contenu=' + encodeURIComponent(valeurContenu);
}

function annulerModif(date){
    let champTitre = document.getElementById("editTitre" + date);
    let champContenu = document.getElementById("editContenu" + date);
    let validerModif = document.getElementById("validerModif"+date);
    let modifier = document.getElementById("edit"+date);
    let annulerModif = document.getElementById("annulerModif"+date);
    let valeurTitre = document.getElementById("titre" + date);
    let valeurContenu = document.getElementById("contenu" + date);

    champTitre.style.display = "none";
    champContenu.style.display = "none";
    validerModif.style.display = "none";
    annulerModif.style.display = "none";

    modifier.style.display = "block";
    valeurTitre.style.display = "block";
    valeurContenu.style.display = "block";
}
</script>

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
            echo "<article><p id='titre" . $article->date . "'>" . $article->titre . "</p>";
            echo "<p id='contenu". $article->date . "'>" . $article->contenu . "</p>";
            echo "<input type='text' id='editTitre".$article->date."' style='display:none'>";
            echo "<input type='text' id='editContenu".$article->date."' style='display:none'>";
            echo "<p id='edit".$article->date."' class='edit' onclick='updateRecord(\"".$article->date."\")'>Modifier</p>"; 
            echo "<p id='validerModif".$article->date."' onclick='validerModif(\"".$article->date."\")' style='display:none'>Valider</p>"; 
            echo "<p id='annulerModif".$article->date."' onclick='annulerModif(\"".$article->date."\")' style='display:none'>Annuler</p>"; 
            echo "<p class='delete' onclick='deleteRecord(\"".$article->date."\")'>Supprimer</p></article>"; 
        }
    ?>
    </div>
</body>
</html>