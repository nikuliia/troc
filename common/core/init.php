<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<?php require_once('session.php') ?>
<?php require_once('mysql.php') ?>
<?php require_once('alerts.php') ?>
<?php require_once('functions.php') ?>
<?php
const URL_ADMIN = 'http://localhost/troc/admin/';
const URL_FRONTEND = 'http://localhost/troc/frontend/';
const FILES_PATH = __DIR__ . '/../../assets/uploads/images/';
const FILES_URL = 'http://localhost/troc/assets/uploads/images/';
const PER_PAGE = 10;

// boucle foreach qui va protéger toutes les valeurs provenant de l'URL avec htmlspecialchars pour contrer les injections SQL dans l'URL
foreach($_GET as $key => $value){
    $_GET[$key] = htmlspecialchars(trim($value));
}

// boucle foreach qui va protéger toutes les valeurs provenant des inputs d'un formulaire avec htmlspecialchars pour contrer les injections SQL et failles XSS injéctées dans un formulaire
// fonction prédéfinie qui supprime en début et fin de chaine de caractères tous les espaces inutiles. Permet de ganger en espace mémoire
foreach($_POST as $key => $value){
    $_POST[$key] = htmlspecialchars(trim($value));
}
