<?php
// je récupère pour tout le projet la connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=troc', 'root', '', array (
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
);

// je récupère pour tout le projet le session_start
session_start();

// permet de cibler notre localhost, que ce soit en local comme plus tard en ligne, en récupérant cette info dans $_SERVER [DOCUMENT_ROOT] : D:/xampp/htdocs
// print_r($_SERVER);

// constante, je donne son nom, puis sa valeur, qui va me permettre de définir la racine du site. Cette racine du site, sera valable ensuite en ligne. Je concatène avec /boutique/ pour pointer vers mon projet
define('RACINE_SITE', $_SERVER['DOCUMENT_ROOT'] . '/troc-project/');

// Autre constante, pour définir l'URL (nom de domaine) du site. A modifier une fois en ligne (exemple, pour mon nom de domaine chez Ionos => https://fatz-studios.com)
define('URL', 'http://localhost/troc-project/');

// initialisation de qlq variables
$erreur = '';
$erreur_index = '';

// for users
$validate = '';
$validate_index = '';

// for backend
$content = '';

// boucle foreach qui va protéger toutes les valeurs provenant de l'URL avec htmlspecialchars pour contrer les injections SQL dans l'URL
foreach($_GET as $key => $value){
    $_GET[$key] = htmlspecialchars(trim($value));
}

// boucle foreach qui va protéger toutes les valeurs provenant des inputs d'un formulaire avec htmlspecialchars pour contrer les injections SQL et failles XSS injéctées dans un formulaire
// fonction prédéfinie qui supprime en début et fin de chaine de caractères tous les espaces inutiles. Permet de ganger en espace mémoire
foreach($_POST as $key => $value){
    $_POST[$key] = htmlspecialchars(trim($value));
}

require_once('functions.php');