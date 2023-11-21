<?php
$xmlFile = 'blog.xml';

if (isset($_GET['date'])) {
    $date = $_GET['date'];

    $xml = simplexml_load_file($xmlFile);

    $elementToDelete = null;
    foreach ($xml->children() as $child) {
        if ((string)$child->date == $date) {
            $child->titre = $_GET["titre"];
            $child->contenu = $_GET["contenu"];
            $child->dateModif = date("Y-m-d H:i:s");
        }
    }
    file_put_contents($xmlFile, $xml->asXML());
}
header('Location: liste_article.php');
exit;
?>