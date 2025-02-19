<?php require_once('../core/init.php') ?>

    <!--Место для кода-->

<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<?php
/** @var PDO $pdo */

$success = $pdo->query("DELETE FROM troc.categorie WHERE id_categorie = '{$_GET['id']}'");
if (!$success) {
    alertError('Something went wrong while trying to delete a category.');
}
?>
    <h2>Delete category</h2>

    <!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>