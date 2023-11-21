<?php
session_start();
$date = date("Y-m-d H:i:s");
try {
    // Charger le contenu actuel du fichier XML
    $articleActuel = file_get_contents('blog.xml');

    if ($articleActuel === false) {
        // Si le fichier n'existe pas on créer la structure du fichier
        $xml = new SimpleXMLElement('<blog></blog>');
    } else {
        // Si le fichier existe on récupère le contenu
        $xml = new SimpleXMLElement($articleActuel);
    }

    // Ajouter un nouvel article au fichier XML
    $nouvelArticle = $xml->addChild('article');
    $nouvelArticle->addChild('titre', $_POST["nomArticle"]);
    $nouvelArticle->addChild('contenu', $_POST["contenuArticle"]);
    $nouvelArticle->addChild('date', $date);
    // Convertir l'objet SimpleXML en une chaîne formatée XML
    $xmlString = $xml->asXML();

    // Écrire la chaîne XML dans un fichier
    file_put_contents('blog.xml', $xmlString);

    if ($articleActuel === false) {
        $_SESSION["etat"] = "créé";
    } else {
        $_SESSION["etat"] = "maj";
    }
    header("Location: add_article.php");
} catch (Exception $e) {
    echo 'Une exception a été capturée : ' . $e->getMessage();
}
?>