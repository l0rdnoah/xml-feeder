<?php
error_reporting(0);

session_start();

if (!isset($_SESSION["connecte"]) || !$_SESSION["connecte"]) {
    header("Location: connexion.php");
    exit();
}
?>