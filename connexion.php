<?php 
session_start();
error_reporting(0);
if($_SESSION["connecte"]){
    header("Location:add_article.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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

        input[type="text"],input[type="password"] {
            padding: 10px;
            width: 300px;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,input[type="password"]:focus{
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
    <h1>Connexion</h1>
    <form action="connexion.php" method="post">
        <label for="nomUtilisateur">Nom d'utilisateur</label>
        <input type="text" name="nomUtilisateur" id="nomUtilisateur" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Connexion">   
    </form>
</body>
</html>

<?php 
if($_POST["nomUtilisateur"] != "" && $_POST["password"] != ""){
    if(($_POST["nomUtilisateur"] == "admin") && ($_POST["password"] == "passwd")){
        $_SESSION["connecte"] = true;
        header("Location:add_article.php");
    }
    else{
        echo "Mot de passe ou identifiant invalide";
    }
}
?>